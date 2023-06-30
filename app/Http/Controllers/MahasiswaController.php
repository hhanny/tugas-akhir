<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehycle;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('read');
        return view('contents.mahasiswa-account.index');
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
        // dd($request);
        
        $request->validate([
            'username' => 'required|unique:users|min:6',
            'email' => 'required|unique:users|email:dns',
            'card_id' => 'required',
            'brand' => 'required|max:10',
            'type' => 'required|max:10',
            'vehycle_number' => 'required|max:10',
            'vehycle_number' => 'required|max:12',
            'chassis_number' => 'required|max:12',
            'image' => 'required|image|file|max:1024|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            $data = User::get();
    
            $user = User::create([
                'username'          => $request->username,
                'email'             => $request->email,
                'password'          => bcrypt('password'),
            ])->assignRole('mahasiswa');
    
            UserProfile::create([
                'user_id' => $user->id,
                'card_id' => $request->card_id,
            ]);
    
            $file = $request->file('image')->store('vehycle-images');
            
            Vehycle::create([
                'user_id' => $user->id,
                'brand' => $request->brand,
                'type' => $request->type,
                'image' => $file,
                'vehycle_number' => $request->vehycle_number,
                'chassis_number' => $request->chassis_number,
            ]);
    
    
            return response()->json([
                'status'    => true,
                'message'   => 'Success add mahasiswa account!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => 'Something Went Wrong!',
            ]);
        }
        
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
    public function edit($id)
    {
        return response()->json([
            'data'  => User::with(['user_profile', 'vehycle'])->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        $rules = [
            'username' => 'required|min:6',
            'email' => 'required|email:dns'
        ];
        
        if ($request->username != $data->username) {
            $rules['username'] = 'required|unique:users|min:6';
        }
        if ($request->email != $data->email) {
            $rules['email'] = 'required|unique:users|email:dns';
        }
        
        $validatedData = $request->validate($rules);

        
        User::where('id', $id)->update($validatedData);

        return response()->json([
            'status'    => true,
            'message'   => 'Success update mahasiswa account!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::find($id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Success delete account!',
        ]);
    }

    public function datatable(Request $request){
        $data = User::role('mahasiswa')->get();

        return DataTables::of($data)->make();
    }
}
