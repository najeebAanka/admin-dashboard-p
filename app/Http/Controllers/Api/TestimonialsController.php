<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = request()->header('Accept-Language', 'ar');
        if (!in_array($lang, ["en", "ar"])) {
            $lang = "ar";
        }

        $list = [];
        $row = Testimonial::get();
        for ($i = 0; $i < sizeof($row); $i++) {
            $row[$i]->icon = asset('storage/'.$row[$i]->icon);
            $row[$i]->comment = $row[$i]->text;
        }

        return $this->formResponse("Data is retrived", $row, 200);
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
        //
    }
}
