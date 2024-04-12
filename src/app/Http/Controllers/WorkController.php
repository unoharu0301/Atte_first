<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Models\Work;

class WorkController extends Controller
{
    public function stamp(){
        $rests = Rest::all();
        $works = Work::all();
        return view('attendance', ['rests' => $rests], ['works' => $works]);
    }

    public function stamp_end(){
        $rests = Rest::all();
        $works = Work::all();
        
        return view('attendance', ['rests' => $rests], ['works' => $works]);
    }
}
