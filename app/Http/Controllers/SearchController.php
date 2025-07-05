<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Result;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $vehicle = Vehicle::where('chassis_number', $chassis)->first();
        $result = Result::where('identity', $identity)->first();
        $year = \Carbon\Carbon::parse($result->tested_at)->format('Y');
        $user = $vehicle->user;
        $CO = $vehicle->threshold->CO;
        $HC = $vehicle->threshold->HC;

        // Cek apakah hasil uji emisi LULUS atau TIDAK
        if ($result->CO <= $CO && $result->HC <= $HC) {
            $data = [
                'license_plate' => $vehicle->license_plate,
                'year' => $year,
                'user' => $user,
                'O2' => $result->O2 . ' %',
                'CO2' => $result->CO2 . ' %',
                'CO' => $result->CO . ' %',
                'HC' => $result->HC . ' ppm',
                'result' => 'LULUS',
                'brand' => $vehicle->brand,
                'date' => $result->tested_at,
                'number' => Carbon::parse($result->tested_at)->format('Y/m/') . "EMISI/II" . Carbon::parse($result->tested_at)->format('/d') . "/" . $result->reference_number,
            ];
        } else {
            $data = [
                'license_plate' => $vehicle->license_plate,
                'year' => $year,
                'user' => $user,
                'O2' => $result->O2 . ' %',
                'CO2' => $result->CO2 . ' %',
                'CO' => $result->CO . ' %',
                'HC' => $result->HC . ' ppm',
                'result' => 'TIDAK LULUS',
                'brand' => $vehicle->brand,
                'date' => $result->tested_at,
                'number' => Carbon::parse($result->tested_at)->format('Y/m/') . "EMISI/II" . Carbon::parse($result->tested_at)->format('/d') . "/" . $result->reference_number,
            ];
        }

        $pdf = Pdf::loadView('admin.layout.mail.TestResult', $data);
        return $pdf->stream('preview.pdf');
    }
}
