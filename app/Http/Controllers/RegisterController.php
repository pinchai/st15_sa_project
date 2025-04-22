<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    //
    public function doRegister(Request $request){
        $username = $request->username;
        $email = $request->email;
        $phone = $request->phone;
        $password = $request->password;
        $user = DB::table('users')->insert([
            [
                'name' => $username,
                'email' => $email,
                'password' => $password
            ],
        ]);

        if ($user){
            return redirect('/register-list');
        }else{
            return  "Error";
        }

    }

    public  function registerList(Request $request){
        $user = DB::table('users')
            ->select('*')
            ->get();
        return view('register_list', ['user'=>$user]);
    }

    public function getDelete(Request $request){
        $user_id = $request->id;
        $user = DB::table('users')->delete($user_id);
        if ($user){
            return redirect('/register-list');
        }else{
            return 'error';
        }
    }
}
