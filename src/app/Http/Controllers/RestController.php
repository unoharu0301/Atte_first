<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rest;
use App\Models\Work;
use App\Models\User;
use Carbon\Carbon;

class RestController extends Controller
{
    public function rest(Request $request){
        // 休憩開始アクション
        $user = Auth::user();

        $oldrest = Rest::where('user_id', $user->id)->latest()->first();
        $oldDay2 = '';
        
        if($oldrest){
            $oldTimerest = new Carbon($oldrest->rest_start_time);
            $oldDay2 = $oldTimerest->startOfDay();
        }
        $today = Carbon::today();

        if(($oldDay2 == $today) && (empty($oldrest->rest_end_time))){
            return redirect()->back()->with('message', '出勤打刻済み');
        }

        if($oldrest){
            $oldTimerest_end = new Carbon($oldrest->rest_end_time);
            $oldDay2 = $oldTimerest_end->startOfDay();
        }

        if(($oldDay2 == $today)){
            return redirect()->back()->with('message', '退勤打刻済み');
        }

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $resttimes = Rest::create([
            'user_name' => $user->name,
            'user_id' => $user->id,
            'restpart' => "1",
            'rest' => Carbon::now(),
            'rest_start_time' => Carbon::now(),
        ]);
        $restitems = Rest::where('user_id', \Auth::user()->id)->get();

        return view('attendance', ['restitems' => $restitems], ['resttimes' => $resttimes]);
    
    }

    public function rest_end(Request $request){
        $user = Auth::user();
        $today = Carbon::today();

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $restenditems = Rest::where('user_id', \Auth::user()->id)->first();

        $resttimes = Rest::create([
            'user_name' => $user->name,
            'user_id' => $user->id,
            'restpart' => "0",
            'stamp' => Carbon::now(),
            'rest_start_time' => $restenditems->rest_start_time,
            'rest_end_time' => Carbon::now(),
        ]);
        
        return view('home', ['resttimes' => $resttimes]);
    }
}
