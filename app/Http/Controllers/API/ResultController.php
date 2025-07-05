<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ResultResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Result;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Jobs\GeneratePdfAndSendEmail;

use Illuminate\Contracts\View\View;

class ResultController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::all();
        return $this->sendResponse(ResultResource::collection($results), 'Products retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function exCreate(Request $request)
    {
        $reff_num = mt_rand(1000000000, 9999999999);
        $create = Result::create([
            'vehicle_id' => $request->vehicle_id,
            'tested_at' => $request->tested_at,
            'CO' => $request->CO,
            'HC' => $request->HC,
            'reference_number' => $reff_num,
            'identity' => Str::random(10),
        ]);

        if ($create) {
            $vehicle = $create->vehicle;
            $user = $vehicle->user;
            $CO = $vehicle->threshold->CO;
            $HC = $vehicle->threshold->HC;

            if ($request->CO <= $CO && $request->HC <= $HC) {
                $data = [
                    'license_plate' => $vehicle->license_plate,
                    'CO' => $request->CO . ' %',
                    'HC' => $request->HC . ' ppm',
                    'brand' => $vehicle->brand,
                    'result' => 'LULUS',
                    'date' => $request->tested_at,
                    'number' => "" . Carbon::now()->format('Y/m/') . "EMISI/II" . Carbon::now()->format('/d') . "/" . $reff_num,
                ];
            } else {
                $data = [
                    'license_plate' => $vehicle->license_plate,
                    'CO' => $request->CO . ' %',
                    'HC' => $request->HC . ' ppm',
                    'brand' => $vehicle->brand,
                    'result' => 'TIDAK LULUS',
                    'date' => $request->tested_at,
                    'number' => "" . Carbon::now()->format('Y/m/') . "EMISI/II" . Carbon::now()->format('/d') . "/" . $reff_num,
                ];
            }

            // Generate PDF dari view
            $pdf = Pdf::loadView('admin.layout.pdf.TestResult', $data)
                ->setPaper('A4', 'portrait') // Sesuaikan ukuran dan orientasi kertas
                ->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

            // Menyimpan PDF ke file
            $pdfFileName = 'TestResult_' . Str::random(10) . '.pdf';
            $pdf->save(storage_path('app/public/' . $pdfFileName));

            // Kirim email dengan lampiran PDF
            Mail::send([], [], function ($message) use ($data, $user, $pdfFileName) {
                $message->to($user->email)
                    ->subject('Hasil Uji Emisi')
                    ->html(view('admin.layout.mail.TestResult', $data)->render())
                    ->attach(storage_path('app/public/' . $pdfFileName), [
                        'as' => $pdfFileName,
                        'mime' => 'application/pdf'
                    ]);
            });

            // Opsional: Hapus file PDF setelah email terkirim
            unlink(storage_path('app/public/' . $pdfFileName));

            return response()->json([
                'status' => 'success',
                'message' => 'Success added data',
            ]);
        }
    }

    public function create(Request $request)
    {
        $tested_at = Carbon::now();
        $reff_num = mt_rand(1000000000, 9999999999);
        $create = Result::create([
            'vehicle_id' => $request->vehicle_id,
            'tested_at' => $tested_at,
            'CO' => $request->CO,
            'HC' => $request->HC,
            'reference_number' => $reff_num,
            'identity' => Str::random(10),
        ]);

        if ($create) {
            $vehicle = $create->vehicle;
            $user = $vehicle->user;
            $CO = $vehicle->threshold->CO;
            $HC = $vehicle->threshold->HC;

            $data = [
                'license_plate' => $vehicle->license_plate,
                'CO' => $request->CO . ' %',
                'HC' => $request->HC . ' ppm',
                'brand' => $vehicle->brand,
                'year' => $vehicle->production_year,
                'result' => ($request->CO <= $CO && $request->HC <= $HC) ? 'LULUS' : 'TIDAK LULUS',
                'date' => $tested_at,
                'number' => Carbon::now()->format('Y/m/') . "EMISI/II" . Carbon::now()->format('/d') . "/" . $reff_num,
            ];

            // Dispatch job ke queue
            GeneratePdfAndSendEmail::dispatch($data, $user);

            return response()->json([
                'status' => 'success',
                'message' => 'Success added data, email and PDF process in background',
            ]);
        }
    }


    // public function check

    /**
     * Store a newly created resource in storage.
     */
    public function d(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
