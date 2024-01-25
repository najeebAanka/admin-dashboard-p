<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\Work;
use Illuminate\Http\Request;
use TCG\Voyager\Voyager;

class WorkController extends Controller
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
        $data = \App\Models\Work::select(['id', 'url','name_' . $lang . ' as name',
            'description_' . $lang . ' as description', 'image_ios', 'image_android',
            'url_android','video_link','booster', 'url_ios', 'icon', 'video_url as youtube_link',
            'category_id',
            'show_type'])->orderBy('position', 'asc')->take(50)->get();
        $v = new Voyager();
        foreach ($data as $d) {
            $d->icon = $v->image($d->icon);
            $d->image_ios = $v->image($d->image_ios);
            $d->image_android = $v->image($d->image_android);
            $d->booster = $v->image($d->booster);
            $d->video_link = parent::getFileURL($d->video_link);
        }
        return $this->formResponse("Data is retrived", $data, 200);
    }

    public function types()
    {
        $lang = request()->header('Accept-Language', 'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }
        app()->setLocale($lang);

        $types = [
            ["type" => "web"],
            ["type" => "mobile"],
            ["type" => "logo"],
            ["type" => "system"],
            ["type" => "video"],
            ["type" => "video_montage"],
        ];
        for ($i = 0; $i < sizeof($types); $i++) {
            $types[$i]['name'] = trans('msg.' . $types[$i]['type']);
        }
        return $this->formResponse("Data is retrived", $types, 200);
    }

    public function only8()
    {
        $lang = request()->header('Accept-Language', 'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }

        $v = new Voyager();

        $type = Work::select('show_type')->distinct()->get();
        $works = [];
        for ($i = 0; $i < sizeof($type); $i++) {

            $data = \App\Models\Work::select(['id', 'url','name_' . $lang . ' as name','description_' . $lang . ' as description', 'image_ios','video_link','booster',
                'image_android', 'url_android', 'url_ios', 'icon', 'category_id', 'show_type', 'video_url as youtube_link'])
                ->orderBy('position', 'asc')->where('show_type', $type[$i]->show_type)->take(8)->get();

            foreach ($data as $d) {
                $d->icon = $v->image($d->icon);
                $d->image_ios = $v->image($d->image_ios);
                $d->image_android = $v->image($d->image_android);
                $d->booster = $v->image($d->booster);
                $d->video_link = parent::getFileURL($d->video_link);
            }

            foreach ($data as $d) {
                array_push($works, $d);
            }
        }

        return $this->formResponse("Data is retrived", $works, 200);
    }

    public function getByType($type)
    {
        $lang = request()->header('Accept-Language', 'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }

        $v = new Voyager();

        $data = \App\Models\Work::select(['id', 'url','name_' . $lang . ' as name','description_' . $lang . ' as description', 'image_ios','video_link','booster',
            'image_android', 'url_android', 'url_ios', 'icon', 'category_id', 'show_type', 'video_url as youtube_link'])
            ->orderBy('position', 'asc')->where('show_type', $type)
//            ->paginate(8 * (request()->has('number') ? request()->get('number') : 1));
            ->get();

        foreach ($data as $d) {
            $d->icon = $v->image($d->icon);
            $d->image_ios = $v->image($d->image_ios);
            $d->image_android = $v->image($d->image_android);
            $d->booster = $v->image($d->booster);
            $d->video_link = parent::getFileURL($d->video_link);
        }

        return $this->formResponse("Data is retrived", $data, 200);
    }

    public function single($id)
    {
        $lang = request()->header('Accept-Language', 'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }
        $data = \App\Models\Work::find($id);

        $v = new Voyager();
        $data->icon = $v->image($data->icon);
        $data->name = $data['name_' . $lang];
        $data->description = $data['description_' . $lang];


        unset($data->name_en);
        unset($data->name_ar);
        unset($data->description_en);
        unset($data->description_ar);

        return $this->formResponse("Data is retrived", $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PricingPackage $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPackage $pricingPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\PricingPackage $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingPackage $pricingPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingPackage $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPackage $pricingPackage)
    {
        // destroy -->   -->   -->   -->   -->
    }
}
