<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function index()
    {
        return view('visitor.search.index');
    }

    public function vehicle(string $chassis)
    {
        $vehicle = Vehicle::where('chassis_number', $chassis)->first();
        $results = Result::where('vehicle_id', $vehicle->id)->get();

        return view('visitor.search.vehicle', compact('results', 'chassis'));
    }

    public function test(string $chassis, string $identity)
    {
        $vehicle = Vehicle::where('chassis_number', $chassis)->first();
        $result = Result::where('identity', $identity)->first();
        $CO = $vehicle->threshold->CO;
        $HC = $vehicle->threshold->HC;

        if ($vehicle->id == $result->vehicle_id) {
            if ($result->CO <= $CO && $result->HC <= $HC) {
                $status = "Lulus";
                return view('visitor.search.test', compact('result', 'chassis', 'status'));
            } else {
                $status = "Tidak Lulus";
                return view('visitor.search.test', compact('result', 'chassis', 'status'));
            }
        }
    }

    public function certificate(string $chassis, string $identity)
    {
        Carbon::setLocale('id');

        $vehicle = Vehicle::where('chassis_number', $chassis)->first();
        $result = Result::where('identity', $identity)->first();
        $year = \Carbon\Carbon::parse($result->tested_at)->format('Y');
        $user = $vehicle->user;
        $CO = $vehicle->threshold->CO;
        $HC = $vehicle->threshold->HC;


        $qrCode = 'data:image/svg+xml;base64,' . base64_encode(
            QrCode::format('svg')->size(80)->generate(route('user.result.download', $result->identity))
        );

        // Cek apakah hasil uji emisi LULUS atau TIDAK
        $status = ($result->CO <= $CO && $result->HC <= $HC) ? 'LULUS' : 'TIDAK LULUS';

        $data = [
            'license_plate' => $vehicle->license_plate,
            'year' => $year,
            'user' => $user,
            'O2' => $result->O2 . ' %',
            'CO2' => $result->CO2 . ' %',
            'CO' => $result->CO . ' %',
            'HC' => $result->HC . ' ppm',
            'result' => $status,
            'brand' => $vehicle->brand,
            'production_year' => $vehicle->production_year,
            'qrCode' => $qrCode,
            'date' => Carbon::parse($result->tested_at)->translatedFormat('d F Y'),
            'now' => Carbon::now()->translatedFormat('d F Y'),
            'number' => Carbon::parse($result->tested_at)->format('Y/m/') . "EMISI/II" . Carbon::parse($result->tested_at)->format('/d') . "/" . $result->reference_number,
        ];

        // Generate PDF
        $pdf = Pdf::loadView('admin.layout.pdf.TestResult', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);
        return $pdf->stream('preview.pdf');
    }
}
