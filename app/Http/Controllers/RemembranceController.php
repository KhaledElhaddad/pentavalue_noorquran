<?php

namespace App\Http\Controllers;

use App\Models\Remembrance;
use App\Models\Sound;
use Illuminate\Http\Request;

class RemembranceController extends Controller
{
    public function index (Request $request) {
//        return Remembrance::paginate($request->has('pagination') ? $request->pagination : 10 );
        return Sound::whereNotNull('remembrance_id')->paginate(10000);
    }

}
