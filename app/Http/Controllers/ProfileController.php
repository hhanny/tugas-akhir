<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $data = User::with('user_profile')->find($user->id);
        return view('contents.profile.index', compact('data'));
    }

    /**
     * Show the form for creating aPP new resource.
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

    function updateImage(Request $request, string $id) {
        // dd($request);

        $request->validate([
            'image'             => 'required|image|file|max:1024|mimes:jpeg,jpg,png,webp,svg',
        ]);

        try {
            if($request->old_image){
                Storage::delete($request->old_image);
            }
    
            $file = $request->file('image')->store('users-image');
    
            $userProfile = UserProfile::where('user_id', $id)->first();
            UserProfile::updateorCreate(
                ['id'   => optional($userProfile)->id ?? null],
                [
                    'image' => $file,
                    'user_id' => $id,
                ]
            );

            // return response()->json([
            //     'status'    => true,
            //     'message'   => 'Foto profil berhasil diperbarui!',
            // ]);

            return redirect()->back()->with('success', 'Foto profil berhasil diperbarui!');
            
        } catch (\Throwable $th) {
            // dd($th);
            return redirect()->back()->with('error', 'Something went wrong!');
            // return response()->json([
            //     'status'    => false,
            //     'message'   => 'Something went wrong!',
            // ]);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => 'required|min:6|max:50',
            'nip_nim' => 'required|max:10',
            'phone_number' => 'required|min:11|numeric',
            'address' => 'required',
        ];
        $user = User::find($request->id);
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        if($request->username != $user->username){
            $rules['username'] = 'required|min:6|max:50|unique:users';
        }
        if($request->email != $user->email){
            $rules['email'] = 'required|email|unique:users';
        }
        $request->validate($rules);

        try {
            User::updateorCreate(
                ['id'   => optional($user)->id ?? null],
                [
                    'username' => $request->username,
                    'email' => $request->email,
                ],
            );
    
            UserProfile::updateorCreate(
                ['id'   => optional($userProfile)->id ?? null],
                [
                    'name' => $request->name,
                    'nip_nim' => $request->nip_nim,
                    'user_id' => $user->id,
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]
            );

            return response()->json([
                'status'    => true,
                'message'   => 'Profil Berhasil diperbarui!',
            ]);

        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => 'Something Went Wrong!',
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyImage(string $id)
    {
        try {
            $userProfile = UserProfile::where('user_id', $id)->first();
            $image = $userProfile->image;
            if($image != null){
                Storage::delete($image);
            }
            $userProfile->update([
                'image' => null
            ]);
    
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil menghapus foto!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => 'Somthing went wrong!',
            ]);
        }
    }
}
