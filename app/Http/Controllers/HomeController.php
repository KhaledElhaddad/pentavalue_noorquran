<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\Reader;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $most_listen_readers = Reader::withCount('listens')->orderBy('listens_count', 'DESC')->take(10)->get();
        $most_listen = Sound::orderBy('listen', 'desc')->take(10)->get();
        $most_liked = Sound::orderBy('like', 'desc')->take(10)->get();
        $random = Sound::inRandomOrder()->take(10)->get();

        $home_section = [
            [
                'title_en' => 'Most Likes',
                'title_ar' => 'الأكثر اعجاب',
                'data' => $most_liked
            ],
            [
                'title_en' => 'Most Listen',
                'title_ar' => 'الأكثر استماع',
                'data' => $most_listen
            ],
            [
                'title_en' => 'Random',
                'title_ar' => 'عشوائي',
                'data' => $random
            ],
        ];

        $home = [
            'listening_readers' => $most_listen_readers,
            'home_section' => $home_section
        ];

        return $home;
    }
}
