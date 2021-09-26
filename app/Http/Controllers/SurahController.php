<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use Illuminate\Http\Request;
use App\Helpers\MP3File;

class SurahController extends Controller
{
    public function index (Request $request) {
        $data = Sound::with('reader')->whereNotNull('surah_id')->paginate(10000);

        // $url = 'https://noorquraan.penta-test.com/storage';

        // foreach ($data as $surah) {

        // }

        return $data;
    }
}
