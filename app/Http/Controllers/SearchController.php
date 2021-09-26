<?php

namespace App\Http\Controllers;

use App\Models\Sound;
use App\Models\Reader;
use App\Models\Remembrance;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Http\Controllers\Controller;
use App\Helpers\CollectionHelper;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (!($request->search_term == '')) {

            $readers = Reader::where('name_ar', 'LIKE', "%{$request->search_term}%")->orWhere('name_en', 'LIKE', "%{$request->search_term}%")->get();
            $surahs = Sound::WhereHas('surah', function ($query) use ($request) {
                $query->where('name_ar', 'like', "%{$request->search_term}%")->orWhere('name_en', 'like', "%{$request->search_term}%");
            })->get();
            $duas = Sound::WhereHas('dua', function ($query) use ($request) {
                $query->where('name_ar', 'like', "%{$request->search_term}%")->orWhere('name_en', 'like', "%{$request->search_term}%");
            })->get();
            $rememberances = Sound::WhereHas('remembrance', function ($query) use ($request) {
                $query->where('name_ar', 'like', "%{$request->search_term}%")->orWhere('name_en', 'like', "%{$request->search_term}%");
            })->get();

            foreach ($readers as $reader) {
                $reader->type = 'reader';
            }
            foreach ($surahs as $surah) {
                $surah->type = 'sound';
            }
            foreach ($duas as $dua) {
                $dua->type = 'sound';
            }
            foreach ($rememberances as $remembrance) {
                $remembrance->type = 'reader';
            }

            $searchResult = collect($readers)
                ->merge($surahs)
                ->merge($duas)
                ->merge($rememberances);

            return CollectionHelper::paginate($searchResult);
            // if ($searchResult) {
            //     return CollectionHelper::paginate($searchResult, 10);
            // }
            // $resultArr = [];
            // if ($searchResult) {
            //     if (count($searchResult) == 1) {
            //         $resultArr[] = CollectionHelper::paginate($searchResult, 10);
            //         return $resultArr;
            //     } else {
            //         return CollectionHelper::paginate($searchResult, 10);
            //     }
            // }
        } else { //not returning anything put i want to return empty array paginated
            $temp = [];
            return CollectionHelper::paginate($temp);

        }

    }

}
