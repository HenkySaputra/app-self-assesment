<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ApiHelper;

class EmployeeController extends Controller
{

    public function index(){
        $period = date("d-m-Y");
        $listUsers = ApiHelper::GetApiWithCookie('users/');
        $assessments = ApiHelper::GetApiWithCookie("assessments/employee-check/{$period}");
        $myId = ApiHelper::GetApiWithCookie('users/myId');

        $listUsersArranged = array();

        foreach ($listUsers->json("data") as $key => $value) {
            if ($value["userId"] == $myId->json("data")) {
                array_unshift($listUsersArranged, $value);
            } else {
                array_push($listUsersArranged, $value);
            }
        }

        $finishedAssessmentsReceiverId = array_map(fn ($a) => $a["receiverId"], $assessments->json("data")["finishedAssessment"]);
        return view('employee/index', [
            'myId' => $myId->json("data"),
            'listUsers' => $listUsersArranged,
            'finishedReceivers' => $finishedAssessmentsReceiverId,
        ]);
    }

    public function self_penilaian(){
        $currentPeriod = date("d-m-Y");
        $pastPeriodArr = array();

        for ($x = 1; $x <= 3; $x++) {
            array_push($pastPeriodArr, date('d-m-Y', strtotime($currentPeriod. "- {$x} months")));
        }

        $myId = ApiHelper::GetApiWithCookie('users/myId');

        $myId = ApiHelper::GetApiWithCookie('users/myId');
        $assessmentOnePeriodAgo = ApiHelper::GetApiWithCookie("assessments/total/{$pastPeriodArr[0]}/{$myId->json('data')}");
        $assessmentTwoPeriodAgo = ApiHelper::GetApiWithCookie("assessments/total/{$pastPeriodArr[1]}/{$myId->json('data')}");
        $assessmentThreePeriodAgo = ApiHelper::GetApiWithCookie("assessments/total/{$pastPeriodArr[2]}/{$myId->json('data')}");

        $assessmentMerged[] = $assessmentOnePeriodAgo->json("data")[0];
        $assessmentMerged[] = $assessmentTwoPeriodAgo->json("data")[0];
        $assessmentMerged[] = $assessmentThreePeriodAgo->json("data")[0];

        return view('employee/self_penilaian', [
            'assessmentMerged' => $assessmentMerged,
        ]);
    }

    public function history(){
        $currentPeriod = date("d-m-Y");
        $pastPeriodArr = array();

        for ($x = 1; $x <= 3; $x++) {
            array_push($pastPeriodArr, date('d-m-Y', strtotime($currentPeriod. "- {$x} months")));
        }

        $myId = ApiHelper::GetApiWithCookie('users/myId');
        $assessmentsOnePeriodAgo = ApiHelper::GetApiWithCookie("assessments/period/{$pastPeriodArr[0]}/{$myId->json('data')}");
        $assessmentsTwoPeriodAgo = ApiHelper::GetApiWithCookie("assessments/period/{$pastPeriodArr[1]}/{$myId->json('data')}");
        $assessmentsThreePeriodAgo = ApiHelper::GetApiWithCookie("assessments/period/{$pastPeriodArr[2]}/{$myId->json('data')}");

        $assessmentsMerged[] = $assessmentsOnePeriodAgo->json("data");
        $assessmentsMerged[] = $assessmentsTwoPeriodAgo->json("data");
        $assessmentsMerged[] = $assessmentsThreePeriodAgo->json("data");

        return view('employee/history', [
            'assessmentsMerged' => $assessmentsMerged,
        ]);
    }

    public function profil() {
        $myId = ApiHelper::GetApiWithCookie('users/myId');
        $response = ApiHelper::GetApiWithCookie("users/{$myId->json('data')}");

        return view('employee/profil', [
            'profileData' => $response->json("data")[0]
        ]);
    }

    public function penilaian(){
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view('employee/penilaian', [
            'criteria' => $criteria->json("data"),
        ]);
    }

    public function simpanPenilaian(Request $request) {
        $receiverId = request('userId');

        foreach ($request->except('_token') as $key => $value) {
            $response = ApiHelper::PostApiWithCookie("assessments/{$receiverId}", [
                'point'=>$value,
                'criterionId'=>$key,
            ]);
        }

        return redirect()->route('employee_dashboard');
    }

    public function getCurrentAssessment(Request $request) {
        $period = date("d-m-Y");
        $receiverId = request('userId');
        $assessments = ApiHelper::GetApiWithCookie("assessments/employee-check/{$period}");
        $assessmentsFiltered = array_values(
            array_map(
                fn ($a) => $a["assessments"],
                array_filter($assessments->json("data")["finishedAssessment"], fn ($item) => $item['receiverId'] == $receiverId )
            )
        );
        $criteria = ApiHelper::GetApiWithCookie('criteria');
        return view('employee/update_penilaian', [
            'criteria' => $criteria->json("data"),
            'assessments' => $assessmentsFiltered[0],
        ]);
    }

    public function updateAssessment(Request $request) {
        $receiverId = request('userId');
        $period = date("d-m-Y");
        foreach ($request->except('_token') as $key => $value) {
            $response = ApiHelper::PutApiWithCookie("assessments/{$receiverId}", [
                'point'=>$value,
                'criterionId'=>$key,
                'period'=>$period,
            ]);
        }

        return redirect()->route('employee_dashboard');
    }

    public function updateProfile(Request $request) {

        $email = $request->email;
        $name = $request->name;
        $myId = ApiHelper::GetApiWithCookie('users/myId');

        $response = ApiHelper::PutApiWithCookie("users/{$myId->json('data')}", [
            'email' => $email,
            'name' => $name,
        ]);

        return redirect()->route('profil');
    }

    public function changePassword(Request $request) {

        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;

        $response = ApiHelper::PostApiWithCookie("auth/change-password", [
            'newPass' => $newPassword,
            'oldPass' => $oldPassword,
        ]);

        if (!$response->successful()) {
            session()->flash('msg', 'Gagal mengganti password!');
            return redirect()->back();
        };

        return redirect()->route('login');
    }
}
