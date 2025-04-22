<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function user(Request $request)
    {
        $module = 'user';
        return view('admin.user.user', ['module' => $module]);
    }

    public function fetchUserRecord(Request $request)
    {
        $data = DB::table('users')
            ->select(
                'id',
                'name',
                'email',
                'role'
            )
            ->get();
        return response()->json($data);
    }

    public function createUserRecord(Request $request)
    {

        $image = $request->profile_base64;// your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time().'.'.'png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        $user = DB::table('users')
            ->insert(
                [
                    'name'=>$request->username,
                    'password'=>Hash::make($request->password),
                    'email'=>$request->email,
                    'role'=>$request->role,
                    'profile'=>$imageName,
                ]
            );
        return response()->json(['status'=>"create successfully"]);
    }

    public function updateUserRecord(Request $request)
    {
        $user = DB::table('users')
            ->where('id', $request->id)
            ->update(
                [
                    'name'=>$request->username,
                    'email'=>$request->email,
                    'role'=>$request->role,
                ]
            );
        return response()->json(['status'=>"create successfully"]);
    }

    public function deleteUserRecord(Request $request){
        $id = $request->id;
        $data = DB::table('users')
            ->where('id', $id)
            ->delete();

        return response()->json($data);
    }
}
