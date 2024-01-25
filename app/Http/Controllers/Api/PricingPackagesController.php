<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class PricingPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang  =request()->header('Accept-Language' ,'ar');
          if(!in_array($lang, ["en" ,"ar"])){
            $lang = "ar";
        }
        
        $data = PricingPackage::select(['id' ,'name_'.$lang.' as name','subtitle_'.$lang.' as subtitle'])->get();
        foreach ($data as $d){
            $d->services = \App\Models\PackageService::join('package_services_links' ,'package_services_links.service_id' ,'package_services.id')
                             ->select(['package_services.name_'.$lang.' as name'])
                    ->where('package_services_links.pricing_package_id' ,$d->id)->get();
        }
        return $this->formResponse("Data is retrived", $data, 200);;
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
