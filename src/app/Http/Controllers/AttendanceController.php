<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Models\Work;

class AttendanceController extends Controller
{
    public function home(){
        return view('home');
    }

    public function stamp(){
        return view('attendance');
        
    }

    public function date(){
        $rests = Rest::all();
        $works = Work::all();
        return view('attendance', ['rests' => $rests], ['works' => $works]);
    }
}

