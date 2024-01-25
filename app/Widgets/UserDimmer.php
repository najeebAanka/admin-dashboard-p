<?php

namespace App\Widgets;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class UserDimmer extends BaseDimmer
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

        $count = User::where('role_id', '<>', 1)->count();
        $string = 'Users';
        $string2 = 'Users';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon' => 'voyager-group',
            'title' => "{$count} {$string}",
            'text' => 'You have ' . "{$count} {$string2}" . ' in the Database, Click below to show All',
            'button' => [
                'text' => 'Show All ' . $string2,
                'link' => route('voyager.users.index'),
            ],
            'image' => asset('widgets/users.png'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', Voyager::model('User'));
    }
}
