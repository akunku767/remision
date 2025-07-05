<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('visitor.home.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function mail()
    {
        $number = "".Carbon::now()->format('Y/m/')."EMISI/".Carbon::now()->format('/d')."xSmwejEyxv";
        return view('admin.layout.pdf.TestResult')->with(['license_plate' => 'L 3127 UV', 'date' => Carbon::now(), 'number' => $number, 'CO' => '3 %', 'HC' => '950 ppm', 'result' => 'LULUS']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
