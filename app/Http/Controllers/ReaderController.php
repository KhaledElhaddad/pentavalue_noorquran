<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Models\Sound;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index(Request $request)
    {
        return Reader::has('sound')->paginate(10000);
    }

    public function show(Request $request, Reader $reader)
    {
        return $reader;
    }

    public function readerWithSurahs(Request $request)
    {
        $reader_id = $request->reader;

        // $reader_quran = Sound::with(['surah', 'reader'])
        //     ->where('reader_id', $reader_id)
        //     ->whereNotNull('surah_id')
        //     ->paginate(
        //         $request->has('pagination') ? $request->pagination : 10
        //     );

        $reader_quran = Sound::with(['reader'])
            ->where('reader_id', $reader_id)
//            ->whereNotNull('surah_id')
            ->paginate(10000);

        return $reader_quran;
    }


}
