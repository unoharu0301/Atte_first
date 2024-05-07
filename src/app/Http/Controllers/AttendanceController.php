<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Work;
use App\Models\User;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function home(){
        return view('home');
    }

    public function stamp(){
        return view('attendance');
        
    }

    public function date(Request $request){
        $workresults = Work::where('user_id', \Auth::user()->id)->get();
        $workresults->where('workpart', 0)->first();
        //$workresults = $workitems->get();
        
        $restresults = Rest::where('user_id', \Auth::user()->id)->get();
        $restresults->where('restpart', 0)->first();

        return view('attendance', ['workresults' => $workresults], ['restresults' => $restresults]);
    }
}

