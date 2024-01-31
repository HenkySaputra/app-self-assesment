<?php

namespace App\Http\Controllers\super;

use App\Helpers\ApiHelper as HelpersApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Session;

class SuperController extends Controller
{
    public function index(){
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        $listCriteria = ApiHelper::GetApiWithCookie('criteria');
        $listAllusers = ApiHelper:: GetApiWithCookie('users/');
        return view('super/index', [
           'listUsers' => $listUsers->json("data"),
           'listCriteria' => $listCriteria->json("data"),
           'listAllusers' => $listAllusers->json("data")
        ]);

    }

    public function lihat_user(){
        $users = ApiHelper::GetApiWithCookie('users');
        return view('super/lihat_data_user', [
            'users' => $users->json('data')
        ]);
    }

    public function tambah_user(){
        return view('super/tambah_data_user');
    }
    public function proses_tambah_user(Request $request){
        $email = $request->email;
        $password = $request->password;
        $name = $request->name;
        $workDate = $request->workDate;
        $position = $request->position;
        $roleId = $request->roleId;

        $users = ApiHelper::PostApiWithCookie('users', [
            'email'=>$email,
            'password'=>$password,
            'name'=>$name,
            'workDate'=>$workDate,
            'position'=>$position,
            'roleId'=>$roleId
        ]);

        if (!$users->successful()) {
            session()->flash('msg', 'Gagal Menambah Users!');
            return redirect()->back();
        };
        return redirect('super/lihat-user');
    }

    public function edit_user(){
        $users = ApiHelper::GetApiWithCookie('users');
        return view('super/edit_data_user', [
            'user' => $users->json("data")
        ]);

    }

    public function getCurrentuser(){
        $userId = request('userId');
        $users = ApiHelper::GetApiWithCookie("users/{$userId}");
        return view('super/edit_data_user', [
            'users' => $users->json("data"),
        ]);
    }

    public function update_user(Request $request){
        $userId = request('userId');
        $email = $request->email;
        $name = $request->name;
        $workDate = $request->workDate;
        $position = $request->position;
            $response = ApiHelper::PutApiWithCookie("users/{$userId}", [
                'email'=>$email,
                'name'=>$name,
                'workDate'=>$workDate,
                'position'=>$position,
            ]);
        return redirect()->route('lihat_user');

    }
    public function hapus_user(){
        $userId = request('userId');
        $respone = ApiHelper::DeleteApiWithCookie("users/{$userId}");
        dd($respone->json('data'));
        return view('super/lihat_data_user');
    }

    // Manajemen kriteria
    public function lihat_kriteria(){
         $criteria = ApiHelper::GetApiWithCookie('criteria');
            return view('super/lihat_data_kriteria', [
            'criteria' => $criteria->json("data")
        ]);
    }
    public function tambah_kriteria(){
        return view('super/tambah_data_kriteria');
    }
    public function proses_tambah_kriteria(Request $request){
        $name = $request->name;
        $description = $request->description;
        $position = $request->position;

        $criteria = ApiHelper::PostApiWithCookie('criteria', [
            'name'=>$name,
            'description'=>$description,
            'position'=>$position,
        ]);

        if (!$criteria->successful()) {
            session()->flash('msg', 'Gagal menambah Kriteria!');
            return redirect()->back();
        };
        return redirect('super/lihat-kriteria');
    }

    public function edit_data_kriteria(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view('super/edit_data_kriteria', [
            'criteria' => $criteria->json("data")
        ]);
    }

    public function getCurrentkriteria(Request $request){
        $criterionId = request('criteriaId');
        $criteria = ApiHelper::GetApiWithCookie("criteria/{$criterionId}");
        return view('super/edit_data_kriteria', [
            'criteria' => $criteria->json("data"),
        ]);
    }

    public function update_kriteria(Request $request){
        $criteriaId = request('criteriaId');
        $name = $request->name;
        $description = $request->description;
        $position = $request->position;
            $response = ApiHelper::PutApiWithCookie("criteria/{$criteriaId}", [
                'name'=>$name,
                'description'=>$description,
                'position'=>$position
            ]);
        return redirect()->route('lihat_kriteria');
    }

    public function hapus_kriteria(){
        $criteriaId = request('criteriaId');

        $respone = ApiHelper::DeleteApiWithCookie("criteria/{$criteriaId}");
        return redirect('super/lihat-kriteria');
    }

    public function lihat_logs(){
        $logs = ApiHelper::GetApiWithCookie("auth/users/logs");
        return view('super/logs', [
            'logs' => $logs->json("data"),
        ]);
    }

    public function lihat_jumlah_employee(){
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        return view ('super/lihat_jumlah_employee', [
            'users' => $listUsers->json("data"),
        ]);
    }

    public function lihat_jumlah_kriteria(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view ('super/lihat_jumlah_kriteria', [
            'criteria' => $criteria->json("data"),
        ]);
    }

    public function lihat_jumlah_users(){
        $listAllusers = ApiHelper::GetApiWithCookie('users/');
        return view ('super/lihat_jumlah_users', [
        'users' => $listAllusers->json("data"),
        ]);
    }

     public function logout(){
        return redirect('/');
    }

}
