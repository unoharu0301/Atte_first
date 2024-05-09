<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Work;
use App\Models\User;
use Carbon\Carbon;


class WorkController extends Controller
{
    public function stamp(Request $request){
        //　出勤アクション
        $user = Auth::user();

        $oldstamp = Work::where('user_id', $user->id)->latest()->first();
        $oldDay = '';

        $today = Carbon::today();
        

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $worktimes = Work::create([
            'user_name' => $user->name,
            'user_id' => $user->id,
            'workpart' => "1",
            'stamp' => Carbon::now(),
            'work_start_time' => Carbon::now(),
        ]);
        

        return view('home', ['worktimes' => $worktimes]);

    }

    public function stamp_end(Request $request){
        //退勤アクション
        $user = Auth::user();
        $stamp_end = Work::where('user_id', $user->id)->latest()->first();
        $rest_end = Rest::where('user_id', $user->id)->latest()->first();

        
        $today = Carbon::today();

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $workenditems = Work::where('user_id', \Auth::user()->id)->latest()->first();

        $worktimes = Work::create([
            'user_name' => $user->name,
            'user_id' => $user->id,
            'workpart' => "0",
            'stamp' => Carbon::now(),
            'work_start_time' => $workenditems->work_start_time,
            'work_end_time' => Carbon::now(),
        ]);

        return view('home', ['worktimes' => $worktimes]);
    }
}
