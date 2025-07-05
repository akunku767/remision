<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Threshold;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class ThresholdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Threshold::all())
                ->addColumn('action', function (Threshold $threshold) {
                    return '
                    <center>
                        <button class="btn bg-gradient-success" style="margin-bottom:0px!important; padding:10px!important" onclick="showEdit(\'' . $threshold->identity . '\')" >
                            <i class="fa-solid fa-pencil text-white"></i>
                        </button>
                    </center>
                ';
                })
                ->rawColumns(['action'])
                ->addColumn('range_year', function (Threshold $threshold) {
                    if ($threshold->start_year == null) {
                        return $threshold->notation . " " . $threshold->end_year;
                    } else {
                        return $threshold->start_year . " " . $threshold->notation . " " . $threshold->end_year;
                    }
                })
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.pages.management.threshold.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Threshold $threshold)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Threshold $threshold)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Threshold $threshold)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Threshold $threshold)
    {
        //
    }
}
