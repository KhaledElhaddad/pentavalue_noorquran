<?php

namespace App\Http\Controllers;


use App\Models\Dua;
use App\Models\Sound;
use Illuminate\Http\Request;

class DuaController extends Controller
{
    public function index (Request $request) {
//        return Dua::paginate($request->has('pagination') ? $request->pagination : 10 );
        return Sound::whereNotNull('dua_id')->paginate(10000);

    }
}
