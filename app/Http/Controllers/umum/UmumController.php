<?php

namespace App\Http\Controllers\umum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class UmumController extends Controller
{
    public function beranda(){
        return view('umum/beranda');
    }

    public function login(){
        return view('umum/login');
    }

    public function proses_login(Request $request){

    $email = $request->email;
    $password = $request->password;

    $response = ApiHelper::PostApiWithoutCredential('auth/signin', [
        'email'=>$email,
        'password'=>$password,
    ]);

    if ($response->successful()) {
        $accessToken = $response->json('accessToken');
        $refreshToken = $response->json('refreshToken');

        ApiHelper::setCookie($accessToken, $refreshToken);

        if($response->json('roleId') == 1){
            return redirect()->route('admin_dashboard');
        }else if($response->json('roleId') == 2){
            return redirect()->route('hrd_dashboard');
        }else if($response->json('roleId') == 3){
            return redirect()->route('employee_dashboard');
        }
    } else {
            return redirect()->route('login')->with('Gagal');
        }
    }

}


