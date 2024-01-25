<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use TCG\Voyager\Voyager;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = request()->header('Accept-Language' ,'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }
        $data = \App\Models\Service::select([
            'id', 'name_' . $lang . ' as name', 'description_' . $lang . ' as description',
            'title_' . $lang . '_1 as title_1',
            'description_' . $lang . '_1 as description_1',
            'title_' . $lang . '_2 as title_2',
            'description_' . $lang . '_2 as description_2',
            'title_' . $lang . '_3 as title_3',
            'description_' . $lang . '_3 as description_3',
            'title_' . $lang . '_4 as title_4',
            'description_' . $lang . '_4 as description_4',
            'title_' . $lang . '_5 as title_5',
            'description_' . $lang . '_5 as description_5',
            'category_' . $lang . ' as category',
            'slug',
            'image',
            'icon'])->
        take(50)->get();
        foreach ($data as $d) {
            $v = new Voyager();
            $d->image = $v->image($d->image);
            $d->icon = $v->image($d->icon);
        }
        return $this->formResponse("Data is retrived", $data, 200);
    }


    public function single($id)
    {
        //
        $lang = request()->header('Accept-Language' ,'en');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }
        $data = \App\Models\Service::
        select(['id', 'name_' . $lang . ' as name',
            'description_' . $lang . ' as description',
            'title_' . $lang . '_1 as title_1',
            'description_' . $lang . '_1 as description_1',
            'title_' . $lang . '_2 as title_2',
            'description_' . $lang . '_2 as description_2',
            'title_' . $lang . '_3 as title_3',
            'description_' . $lang . '_3 as description_3',
            'title_' . $lang . '_4 as title_4',
            'description_' . $lang . '_4 as description_4',
            'title_' . $lang . '_5 as title_5',
            'description_' . $lang . '_5 as description_5',
            'category_' . $lang . ' as category',
            'slug',
            'image',
            'icon'])->find($id);

        $v = new Voyager();
        $data->icon = $v->image($data->icon);
        $data->image = $v->image($data->image);
        $data->name = $data['name_' . $lang];
        $data->long_description = $data['long_description_' . $lang];
//        $data->category = $lang == "en" ? "General" : "غير محدد";
        $data->related_services = \App\Models\Service::select(['id', 'name_' . $lang . ' as name',
            'description_' . $lang . ' as description',
            'title_' . $lang . '_1 as title_1',
            'description_' . $lang . '_1 as description_1',
            'title_' . $lang . '_2 as title_2',
            'description_' . $lang . '_2 as description_2',
            'title_' . $lang . '_3 as title_3',
            'description_' . $lang . '_3 as description_3',
            'title_' . $lang . '_4 as title_4',
            'description_' . $lang . '_4 as description_4',
            'title_' . $lang . '_5 as title_5',
            'description_' . $lang . '_5 as description_5',
            'category_' . $lang . ' as category',
            'slug',
            'image',
            'icon'])->take(4)->get();

        $v = new Voyager();
        foreach ($data->related_services as $d) {
            $d->icon = $v->image($d->icon);
            $d->image = $v->image($d->image);
        }

        $data->related_work = \App\Models\Work::select(['id', 'url', 'name_' . $lang . ' as name','description_' . $lang . ' as description', 'image_ios', 'image_android','video_link','booster', 'url_android', 'url_ios', 'icon', 'category_id','show_type', 'video_url as youtube_link'])
            ->orderBy('position','asc')->take(8)->get();
        foreach ($data->related_work as $d) {
            $d->icon = $v->image($d->icon);
            $d->image_ios = $v->image($d->image_ios);
            $d->image_android = $v->image($d->image_android);
            $d->booster = $v->image($d->booster);
            $d->video_link = parent::getFileURL($d->video_link);
        }


        unset($data->name_en);
        unset($data->name_ar);
        unset($data->description_en);
        unset($data->description_ar);
        unset($data->long_description_en);
        unset($data->long_description_ar);

        unset($data->title_en_1);
        unset($data->title_ar_1);
        unset($data->description_en_1);
        unset($data->description_ar_1);

        unset($data->title_en_2);
        unset($data->title_ar_2);
        unset($data->description_en_2);
        unset($data->description_ar_2);

        unset($data->title_en_3);
        unset($data->title_ar_3);
        unset($data->description_en_3);
        unset($data->description_ar_3);

        unset($data->title_en_4);
        unset($data->title_ar_4);
        unset($data->description_en_4);
        unset($data->description_ar_4);

        unset($data->title_en_5);
        unset($data->title_ar_5);
        unset($data->description_en_5);
        unset($data->description_ar_5);

        return $this->formResponse("Data is retrived", $data, 200);
    }


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
        //
    }
}
