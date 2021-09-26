<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\MorphMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Sound extends Resource
{
    public static $displayInNavigation = false;
    
    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return __('Sounds');
    }

    /**
     * Get the displayable singular label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return __('Sound');
    }
    
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Sound::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make(__("Reader"), "reader", Reader::class)->nullable(),
            File::make(__('Sound_clip'), 'sound_clip'),
            Text::make(__('Category_ar'), 'category_ar'),
            Text::make(__('Category_en'), 'category_en'),
            Text::make(__('Duration'), 'duration')->nullable()->hideWhenCreating()->hideWhenUpdating(),
            Boolean::make(__('Download Availability'), 'download'),
            // BelongsTo::make(__('Surah'), 'surah', Surah::class)->nullable()->hideFromDetail(function () {
            //     return $this->surah === null;
            // }),
            // BelongsTo::make('Dua')->nullable()->hideFromDetail(function () {
            //     return $this->Dua === null;
            // }),
            // BelongsTo::make('Remembrance')->nullable()->hideFromDetail(function () {
            //     return $this->Remembrance === null;
            // }),
            MorphMany::make(__('Notification'), 'notification', Notification::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
    
}
