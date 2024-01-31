<?php

namespace App\Http\Controllers\hrd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;
use Illuminate\Support\Js;

class HrdController extends Controller
{
    public function index(){
        $period = date("d-m-Y");
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        $listCriteria = ApiHelper::GetApiWithCookie('criteria');
        $listAssessments = ApiHelper::GetApiWithCookie("assessments/admin-check/{$period}");

        $listUsersId = array_map(function($a){ return $a['userId']; }, $listUsers->json("data"));
        $filteredArray = array_filter($listAssessments->json('data'), fn ($a) => in_array($a['userId'], $listUsersId));

        $employeeFinish = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) >= count($listUsersId));
        $employeeNotFinish = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) > 0 && count($a['finishedAssessment']) < count($listUsersId));
        $employeeNotStarted = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) == 0);

        return view('hrd/index', [
            'listUsers' => $listUsers->json("data"),
            'listCriteria' => $listCriteria->json("data"),
            'employeeFinish' => $employeeFinish,
            'employeeNotFinish' => $employeeNotFinish,
            'employeeNotStarted' => $employeeNotStarted,
        ]);
    }
    public function lihat_kriteria(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view('hrd/lihat_data_kriteria', [
        'criteria' => $criteria->json("data")
        ]);
    }

    public function tambah_kriteria(){
        return view('hrd/tambah_data_kriteria');
    }

    public function proses_tambah_kriteria(Request $request){
        $name = $request->name;
        $description = $request->description;
        $position = $request->position;

        $criteria = ApiHelper::PostApiWithoutCredential('criteria', [
            'name'=>$name,
            'description'=>$description,
            'position'=>$position,

    ]);
        return view('hrd/lihat_data_kriteria');
    }

    public function edit_kriteria(){
        return view('hrd/edit_data_kriteria');
    }

    public function update_kriteria(){
        return view('hrd/lihat_data_kriteria');
    }

    public function hapus_kriteria(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        $criteria = json_decode($criteria, true);
        unset($criteria['id']);

        return redirect('hrd/lihat_data_kriteria');
    }

    public function lihat_laporan_penilaian(){

        return view ('hrd/lihat_laporan_penilaian');
    }

    public function lihat_nama_laporan(){
        $period = date("d-m-Y");
        $assessments = ApiHelper::GetApiWithCookie("assessments/total/{$period}");

        return view ('hrd/lihat_nama_laporan', [
            'assessments' => $assessments->json("data"),
        ]);
    }

    public function lihat_jumlah_employee(){
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        return view ('hrd/lihat_jumlah_employee', [
            'users' => $listUsers->json("data"),
        ]);
    }

    public function lihat_jumlah_kriteria(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view ('hrd/lihat_jumlah_kriteria', [
            'criteria' => $criteria->json("data"),
        ]);
    }

    public function lihat_sudah_mengisi(){
        $period = date("d-m-Y");
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        $listAssessments = ApiHelper::GetApiWithCookie("assessments/admin-check/{$period}");

        $listUsersId = array_map(function($a){ return $a['userId']; }, $listUsers->json("data"));
        $filteredArray = array_filter($listAssessments->json('data'), fn ($a) => in_array($a['userId'], $listUsersId));

        $employeeFinish = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) >= count($listUsersId));

        return view ('hrd/lihat_sudah_mengisi', [
            'assessments' => $employeeFinish,
        ]);
    }

    public function lihat_belum_mengisi(){
        $period = date("d-m-Y");
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        $listAssessments = ApiHelper::GetApiWithCookie("assessments/admin-check/{$period}");

        $listUsersId = array_map(function($a){ return $a['userId']; }, $listUsers->json("data"));
        $filteredArray = array_filter($listAssessments->json('data'), fn ($a) => in_array($a['userId'], $listUsersId));

        $employeeNotStarted = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) == 0);


        return view ('hrd/lihat_belum_mengisi', [
            'assessments' => $employeeNotStarted,
        ]);
    }

    public function lihat_masih_mengisi(){
        $period = date("d-m-Y");
        $listUsers = ApiHelper::GetApiWithCookie('users/roles/employee');
        $listAssessments = ApiHelper::GetApiWithCookie("assessments/admin-check/{$period}");

        $listUsersId = array_map(function($a){ return $a['userId']; }, $listUsers->json("data"));
        $filteredArray = array_filter($listAssessments->json('data'), fn ($a) => in_array($a['userId'], $listUsersId));

        $employeeNotFinish = array_filter($filteredArray, fn($a) => count($a['finishedAssessment']) > 0 && count($a['finishedAssessment']) < count($listUsersId));

        return view ('hrd/lihat_masih_mengisi', [
            'assessments' => $employeeNotFinish,
        ]);
    }

    public function createReport() {
        $period = date("d-m-Y");
        $response = ApiHelper::GetApiWithCookie("assessments/report/{$period}");

        file_put_contents('./tes.xlsx', base64_decode($response->json("buffers")));
    }

    public function lihat_logs(){
        $logs = ApiHelper::GetApiWithCookie("auth/users/logs");
        return view('hrd/logs', [
            'logs' => $logs->json("data"),
        ]);
    }

    public function sendEmail(Request $request) {
        $email = $request->email;

        $response = ApiHelper::PostApiWithCookie('email/send-email', [
            'email' => $email
        ]);

        return redirect()->back();
    }

}
