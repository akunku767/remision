<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

use App\Models\Vehicle;
use App\Models\User;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Vehicle::orderBy('created_at', 'desc')->get())
                ->addColumn('action', function (Vehicle $vehicle) {
                    return '
                    <center>
                        <button class="btn bg-gradient-primary" style="margin-bottom:0px!important; padding:10px!important" onclick="detail(\'' . $vehicle->identity . '\')" >
                            <i class="fa-solid fa-eye text-white"></i>
                        </button>
                        <button class="btn bg-gradient-success" style="margin-bottom:0px!important; padding:10px!important" onclick="showEdit(\'' . $vehicle->identity . '\')" >
                            <i class="fa-solid fa-pencil text-white"></i>
                        </button>
                        <button class="btn bg-gradient-danger" style="margin-bottom:0px!important; padding:10px!important" onclick="alertDelete(\'' . $vehicle->license_plate . '\', \'' . $vehicle->identity . '\')" >
                            <i class="fa-solid fa-trash text-white"></i>
                        </button>
                    </center>
                ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $users = User::select('name', 'identity')->where('role_id', '3')->get();
        return view('admin.pages.management.vehicle.index', compact('users'));
    }

    public function add(Request $request)
    {
        if ($request->account == "-") {
            $user = User::create([
                'role_id' => '1',
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt('12345678'),
                'identity' => Str::random(10),
            ]);
        } else {
            $user = User::where('identity', $request->account)->first();
        }

        if ($user) {

            if($request->category == "Sepeda Motor 2 langkah" && $request->productionYear > 2010){
                $request->category == "Sepeda Motor";
            }else if($request->category == "Sepeda Motor 4 langkah" && $request->productionYear > 2010){
                $request->category == "Sepeda Motor";
            }

            if ($request->category == "Sepeda Motor 2 langkah" && $request->productionYear <= 2010) {
                $threshold_id = '1';
            }else if ($request->category == "Sepeda Motor 4 langkah" && $request->productionYear <= 2010) {
                $threshold_id = '2';
            }else if ($request->category == "Sepeda Motor" && ($request->productionYear >= 2010 && $request->productionYear <= 2016)) {
                $threshold_id = '3';
            }else if ($request->category == "Sepeda Motor" && $request->productionYear > 2016) {
                $threshold_id = '4';
            }else if ($request->category == "Mobil Penumpang" && $request->productionYear < 2007) {
                $threshold_id = '5';
            }else if ($request->category == "Mobil Penumpang" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
                $threshold_id = '6';
            }else if ($request->category == "Mobil Penumpang" && $request->productionYear > 2018) {
                $threshold_id = '7';
            }else if ($request->category == "Mobil Barang" && $request->productionYear < 2007) {
                $threshold_id = '8';
            }else if ($request->category == "Mobil Barang" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
                $threshold_id = '9';
            }else if ($request->category == "Mobil Barang" && $request->productionYear > 2018) {
                $threshold_id = '10';
            }else if ($request->category == "Truck" && $request->productionYear < 2007) {
                $threshold_id = '11';
            }else if ($request->category == "Truck" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
                $threshold_id = '12';
            }else if ($request->category == "Truck" && $request->productionYear > 2018) {
                $threshold_id = '13';
            }

            $create = Vehicle::create([
                'user_id' => $user->id,
                'threshold_id' => $threshold_id,
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
    }

    public function show(Request $request, string $identity)
    {
        $vehicle = Vehicle::where('identity', $identity)->first();
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
        if ($request->category == "Sepeda Motor 2 langkah" && $request->productionYear <= 2010) {
            $threshold_id = '1';
        }else if ($request->category == "Sepeda Motor 4 langkah" && $request->productionYear <= 2010) {
            $threshold_id = '2';
        }else if ($request->category == "Sepeda Motor" && ($request->productionYear >= 2010 && $request->productionYear <= 2016)) {
            $threshold_id = '3';
        }else if ($request->category == "Sepeda Motor" && $request->productionYear > 2016) {
            $threshold_id = '4';
        }else if ($request->category == "Mobil Penumpang" && $request->productionYear < 2007) {
            $threshold_id = '5';
        }else if ($request->category == "Mobil Penumpang" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
            $threshold_id = '6';
        }else if ($request->category == "Mobil Penumpang" && $request->productionYear > 2018) {
            $threshold_id = '7';
        }else if ($request->category == "Mobil Barang" && $request->productionYear < 2007) {
            $threshold_id = '8';
        }else if ($request->category == "Mobil Barang" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
            $threshold_id = '9';
        }else if ($request->category == "Mobil Barang" && $request->productionYear > 2018) {
            $threshold_id = '10';
        }else if ($request->category == "Truck" && $request->productionYear < 2007) {
            $threshold_id = '11';
        }else if ($request->category == "Truck" && ($request->productionYear >= 2007 && $request->productionYear <= 2018)) {
            $threshold_id = '12';
        }else if ($request->category == "Truck" && $request->productionYear > 2018) {
            $threshold_id = '13';
        }

        $update = Vehicle::where('identity', $identity)->update([
            'rfid' => $request->rfid,
            'threshold_id' => $threshold_id,
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
            $vehicle = Vehicle::where('identity', $identity)->delete();
            if ($vehicle) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil hapus data'
                ]);
            }
        }
    }
}
