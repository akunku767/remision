<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class ResultController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Result::orderBy('tested_at', 'desc')->get())
                ->addColumn('action', function (Result $result) {
                    return '
                    <center>
                        <a class="btn bg-gradient-primary" style="margin-bottom:0px!important; padding:10px!important" target="_blank" href="' . route('admin.management.result.download', $result->identity) . '">
                            <i class="fa-solid fa-download text-white"></i>
                        </a>
                    </center>
                ';
                })
                ->rawColumns(['action'])
                ->addColumn('license_plate', function (Result $result) {
                    return $result->vehicle->license_plate;
                })
                ->addColumn('brand', function (Result $result) {
                    return $result->vehicle->brand;
                })
                ->addColumn('test_result', function (Result $result) {
                    $vehicle = $result->vehicle;
                    $CO = $vehicle->threshold->CO;
                    $HC = $vehicle->threshold->HC;
                    if ($result->CO <= $CO && $result->HC <= $HC) {
                        return "Passed";
                    } else {
                        return "Not Pass";
                    };
                })
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pages.management.result.index');
    }

    public function download(string $identity)
    {
        $result = Result::where('identity', $identity)->first();

        if (!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data not found',
            ], 404);
        }
        $vehicle = $result->vehicle;
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

        // Generate PDF
        $pdf = Pdf::loadView('admin.layout.pdf.TestResult', $data)
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
                'margin-top' => 0,
                'margin-bottom' => 0,
                'margin-left' => 0,
                'margin-right' => 0
            ]);

        // Nama file PDF
        $pdfFileName = 'Result_' . $vehicle->license_plate . '_' . Carbon::parse($result->tested_at)->format('d_m_Y') . '.pdf';
        $pdfPath = 'public/' . $pdfFileName;

        // Simpan file ke storage Laravel
        Storage::put($pdfPath, $pdf->output());

        // Ambil path lengkap dari storage Laravel
        $fullPath = Storage::path($pdfPath);

        // Kembalikan response download dan hapus file setelah diunduh
        return response()->download($fullPath)->deleteFileAfterSend(true);
    }

    public function add(Request $request)
    {
        $create = Result::create([
            'rfid' => $request->rfid,
            'license_plate' => $request->licensePlateA . " " . $request->licensePlateNumber . " " . $request->licensePlateB,
            'category' => $request->category,
            'brand' => $request->brand,
            'production_year' => $request->productionYear,
            'fuel' => $request->fuel,
            'color' => $request->color,
            'chassis_number' => $request->chassisNumber,
            'identity' => Str::random(10),
        ]);

        if ($create) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambah data'
            ]);
        }
    }

    public function show(Request $request, string $identity)
    {
        $vehicle = Result::where('identity', $identity)->first();
        $slicePlate = explode(" ", $vehicle->license_plate);

        if ($vehicle) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mencari data',
                'data' => [
                    'rfid' => $vehicle->rfid,
                    'licensePlate' => $vehicle->license_plate,
                    'licensePlateA' => $slicePlate[0],
                    'licensePlateNumber' => $slicePlate[1],
                    'licensePlateB' => $slicePlate[2],
                    'category' => $vehicle->category,
                    'brand' => $vehicle->brand,
                    'productionYear' => $vehicle->production_year,
                    'fuel' => $vehicle->fuel,
                    'color' => $vehicle->color,
                    'chassisNumber' => $vehicle->chassis_number,
                    'identity' => $vehicle->identity,
                ],
            ]);
        }
    }

    public function edit(Request $request, string $identity)
    {
        $update = Result::where('identity', $identity)->update([
            'rfid' => $request->rfid,
            'license_plate' => $request->licensePlateA . " " . $request->licensePlateNumber . " " . $request->licensePlateB,
            'category' => $request->category,
            'brand' => $request->brand,
            'production_year' => $request->productionYear,
            'fuel' => $request->fuel,
            'color' => $request->color,
            'chassis_number' => $request->chassisNumber,
        ]);

        if ($update) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengubah data'
            ]);
        }
    }

    public function delete(Request $request, string $identity)
    {
        if ($request->ajax()) {
            $vehicle = Result::where('identity', $identity)->delete();
            if ($vehicle) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil hapus data'
                ]);
            }
        }
    }
}
