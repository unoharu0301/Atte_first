<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rest;
use App\Models\Work;

class RestController extends Controller
{
    public function rest(){
        $rests = Rest::all();
        $works = Work::all();
        return view('attendance', ['rests' => $rests], ['works' => $works]);
    }

    public function rest_end(){
        $rests = Rest::all();
        $works = Work::all();
        return view('attendance', ['rests' => $rests], ['works' => $works]);
    }
}
