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

        if($oldstamp){
            $oldTimestamp = new Carbon($oldstamp->work_start_time);
            $oldDay = $oldTimestamp->startOfDay();
        }
        $today = Carbon::today();

        if(($oldDay == $today) && (empty($oldstamp->work_end_time))){
            return redirect()->back()->with('message', '出勤打刻済み');
        }

        if($oldstamp){
            $oldTimestamp_end = new Carbon($oldstamp->work_end_time);
            $oldDay = $oldTimestamp_end->startOfDay();
        }

        if(($oldDay == $today)){
            return redirect()->back()->with('message', '退勤打刻済み');
        }

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
        //$workitems = Work::where('user_id', \Auth::user()->id)->get();

        return view('home', ['worktimes' => $worktimes]);

    }

    public function stamp_end(Request $request){
        //退勤アクション
        $user = Auth::user();
        $stamp_end = Work::where('user_id', $user->id)->latest()->first();
        $rest_end = Rest::where('user_id', $user->id)->latest()->first();
 
        $now = new Carbon();
        $stamp = new Carbon($stamp_end->stamp);
        $rest = new Carbon($rest_end->rest);
        $rest_end = new Carbon($rest_end->rest_end);

        $workTime = $stamp->diffInMinutes($now);
        $restTime = $rest->diffInMinutes($rest_end);
        $working = $workTime - $restTime;

        /*if($stamp_end) {
            if(empty($stamp_end->work_end_time)) {
                if($stamp_end->rest && !$stamp_end->rest_end) {
                    return redirect()->back()->with('message', '打刻なし');
                } else {
                    $stamp_end->update([
                        'work_end_time' =>Carbon::now(),
                    ]);
                    return redirect()->back()->with('message', '終了しました');
                }
            } else {
                $today = new Carbon();
                $day = $today->day;
                $oldwork_end_time = new Carbon();
                $oldwork_end_timeDay = $oldwork_end_time->day;
                if ($day == $oldwork_end_time) {
                    return redirect()->back()->with('message', '退勤済み');
                } else {
                    return redirect()->back()->with('message', '出勤打刻をしてください');
                }
            }
        } else {
            return redirect()->back()->with('message','出勤打刻なし');
        }*/
        $today = Carbon::today();

        $month = intval($today->month);
        $day = intval($today->day);
        $year = intval($today->year);

        $workenditems = Work::where('user_id', \Auth::user()->id)->first();

        $worktimes = Work::create([
            'user_name' => $user->name,
            'user_id' => $user->id,
            'workpart' => "0",
            'stamp' => Carbon::now(),
            'work_start_time' => $workenditems->work_start_time,
            'work_end_time' => Carbon::now(),
        ]);
        //$workitems = Work::where('user_id', \Auth::user()->id)->get();

        return view('home', ['worktimes' => $worktimes]);
    }
}
