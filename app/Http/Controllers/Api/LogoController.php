<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use TCG\Voyager\Voyager;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = request()->header('Accept-Language', 'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }
        $data = Logo::select(['id', 'title', 'image', 'url'])->get();
        $v = new Voyager();
        foreach ($data as $d) {
            $d->image = $v->image($d->image);
        }
        return $this->formResponse("Data is retrived", $data, 200);
    }


}
