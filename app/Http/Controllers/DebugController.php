<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DebugController extends Controller
{
    public function debug(){
        $data = DB::table('media')->get();
        return $data;
    }
}
