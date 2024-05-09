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

        $today = Carbon::today();

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
        $restitems = Rest::where('user_id', \Auth::user()->id)->latest()->get();

        return view('home', ['restitems' => $restitems], ['resttimes' => $resttimes]);
    
    }

    public function rest_end(Request $request){
        $user = Auth::user();
        $today = Carbon::today();

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $restenditems = Rest::where('user_id', \Auth::user()->id)->latest()->first();

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
