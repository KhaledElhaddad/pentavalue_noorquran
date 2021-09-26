<?php


namespace App\Helpers;


use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class CollectionHelper
{
    // public static function paginate(Collection $results, $pageSize)
    // {
    //     $page = Paginator::resolveCurrentPage('page');

    //     $total = $results->count();

    //     return self::paginator($results->forPage($page, $pageSize), $total, $pageSize, $page, [
    //         'path' => Paginator::resolveCurrentPath(),
    //         'pageName' => 'page',
    //     ]);

    // }

    // /**
    //  * Create a new length-aware paginator instance.
    //  *
    //  * @param  \Illuminate\Support\Collection  $items
    //  * @param  int  $total
    //  * @param  int  $perPage
    //  * @param  int  $currentPage
    //  * @param  array  $options
    //  * @return \Illuminate\Pagination\LengthAwarePaginator
    //  */
    // protected static function paginator($items, $total, $perPage, $currentPage, $options)
    // {
    //     return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
    //         'items', 'total', 'perPage', 'currentPage', 'options'
    //     ));
    // }
    
    public static function paginate($items, $perPage = 10000, $page = null, $options = [])
    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        $lap = new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

        return [
            'current_page' => $lap->currentPage(),
            'data' => $lap ->values(),
            'first_page_url' => $lap ->url(1),
            'from' => $lap->firstItem(),
            'last_page' => $lap->lastPage(),
            'last_page_url' => $lap->url($lap->lastPage()),
            'next_page_url' => $lap->nextPageUrl(),
            'per_page' => $lap->perPage(),
            'prev_page_url' => $lap->previousPageUrl(),
            'to' => $lap->lastItem(),
            'total' => $lap->total(),
        ];
    }
    
}
