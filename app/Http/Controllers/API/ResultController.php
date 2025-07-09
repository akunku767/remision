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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;

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

    public function create(Request $request)
    {
        Log::info('Save result', [
            'time' => now()
        ]);
        Carbon::setLocale('id');
        $tested_at = Carbon::now();
        $reff_num = mt_rand(1000000000, 9999999999);
        $create = Result::create([
            'vehicle_id' => $request->vehicle_id,
            'tested_at' => $tested_at,
            'O2' => $request->O2,
            'CO2' => $request->CO2,
            'CO' => $request->CO,
            'HC' => $request->HC,
            'reference_number' => $reff_num,
            'identity' => Str::random(10),
        ]);

        if ($create) {
            $vehicle = $create->vehicle;
            $user = $vehicle->user;
            $year = \Carbon\Carbon::parse($create->tested_at)->format('Y');
            $CO = $vehicle->threshold->CO;
            $HC = $vehicle->threshold->HC;

            $qrCode = 'data:image/svg+xml;base64,' . base64_encode(
                QrCode::format('svg')->size(80)->generate(route('user.result.download', $create->identity))
            );

            $status = ($create->CO <= $CO && $create->HC <= $HC) ? 'LULUS' : 'TIDAK LULUS';

            $data = [
                'license_plate' => $vehicle->license_plate,
                'year' => $year,
                'user' => $user,
                'O2' => $create->O2 . ' %',
                'CO2' => $create->CO2 . ' %',
                'CO' => $create->CO . ' %',
                'HC' => $create->HC . ' ppm',
                'result' => $status,
                'brand' => $vehicle->brand,
                'production_year' => $vehicle->production_year,
                'qrCode' => $qrCode,
                'date' => Carbon::parse($create->tested_at)->translatedFormat('d F Y'),
                'now' => Carbon::now()->translatedFormat('d F Y'),
                'number' => Carbon::parse($create->tested_at)->format('Y/m/') . "EMISI/II" . Carbon::parse($create->tested_at)->format('/d') . "/" . $create->reference_number,
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
