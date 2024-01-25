<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang  =request()->header('Accept-Language' ,'en');
          if(!in_array($lang, ["en" ,"ar"])){
            $lang = "ar";
        }
        $data = \App\Models\Faq::select('id' ,'q_'.$lang.' as question','a_'.$lang.' as answer')->get();
        return $this->formResponse("Data is retrived", $data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PricingPackage  $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPackage $pricingPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricingPackage  $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingPackage $pricingPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricingPackage  $pricingPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPackage $pricingPackage)
    {
        //
    }
}
