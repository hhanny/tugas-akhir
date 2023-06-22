<?php

namespace App\Http\Controllers\api;

use App\Models\Park;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(string $id)
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

    public function in(Request $request, string $id)
    {
        try {
            $user = UserProfile::where('card_id', $id)->with(['user', 'user.vehycle'])->first();
            if ($user->user->vehycle->count() == 0) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data kendaraan belum terdaftar',
                ], 400);
            }
            $data = Park::create([
                'vehycle_id' => $user->user->vehycle[0]->id,
                'image' => $request->image,
                'status' => 'Masuk',
                'time_in' => now()
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Parkir',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'data' => null
            ], 500);
        }
        
    }

    public function out($id)
    {
        try {
            $user = UserProfile::where('card_id', $id)->with(['user', 'user.vehycle'])->first();

            $data =Park::where([
                ['vehycle_id', '=', $user->user->vehycle[0]->id],
                ['status', '=', 'Masuk'],
                ['time_out', '=', null]
            ])->update([
                'status' => 'keluar',
                'time_out' => now(),
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil keluar parkir',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
                'data' => null
            ], 500);
        }
        
    }
}
