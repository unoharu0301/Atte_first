<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent;
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
        $workresults = Work::where('user_id', \Auth::user()->id)->latest()->take(1)->get();
        $workresults->where('workpart', 0)->first();
        
        $restresults = Rest::where('user_id', \Auth::user()->id)->latest()->take(1)->get();
        $restresults->where('restpart', 0)->first();

        $rest_start = Rest::where('user_id', \Auth::user()->id)->latest()->take(1)->value('rest_start_time');
        return view('attendance', ['workresults' => $workresults], ['restresults' => $restresults], ['rest_start' => $rest_start]);
    }
}

