<?php

namespace App\Widgets;

use App\Helpers\StaticsData;
use App\Models\Activity;
use App\Models\Event;
use App\Models\Role;
use App\Models\User;
use App\Models\Work;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class WorkDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        $count = Work::count();
        $string = 'Works';
        $string2 = 'Works';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-group',
            'title' => "{$count} {$string}",
            'text' => 'You have ' . "{$count} {$string2}" . ' in the Database, Click below to show All',
            'button' => [
                'text' => 'Show All ' . $string2,
                'link' => route('voyager.works.index'),
            ],
            'image' => asset('widgets/works.webp'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        $data = Work::first();
        return Auth::user()->can('browse', $data);
    }
}
