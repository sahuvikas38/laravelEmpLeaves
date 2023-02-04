<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usermodel;
use App\Leavestatus;
use App\Register;
use App\User;
use DateTime;

class Operations extends Controller
{
    public function leavesTaken(Request $result){
        // dd(Session('id' ));
        $data = new Leavestatus();
        $data->userId = Session('id');
        $data->fromDate = $result->fromdate;
        $data->toDate = $result->todate;


        $datetime1 = new DateTime($result->fromdate);
        $datetime2 = new DateTime( $result->todate);
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');

        $data->totalDays = $days+1;
        $data->leaveType = $result->leavetype;
        $data->comment = $result->comment;
        $data->status = 'Pending';
        $data->save();

        return redirect('dashboard');
    }

    public function deleteLeaves($id){
        $data = Leavestatus::find($id);
        $data->delete();

        return redirect('dashboard');
    }
}
