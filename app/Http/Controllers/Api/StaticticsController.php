<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class StaticticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $stats = [];
        $lang  =request()->header('Accept-Language' ,'ar');
          if(!in_array($lang, ["en" ,"ar"])){
            $lang = "ar";
        }
        
        
        $object = new \stdClass();
        $object->name =   $lang=="en" ? "Completed projects": "مشاريع مكتملة";
        $object->icon = asset('storage/icons/file.png');
        $object->value = 876;
        $stats[]=$object;
        //-----------------------
           $object = new \stdClass();
        $object->name =   $lang=="en" ? "Satisfied Client": "عميل راضي";
        $object->icon = asset('storage/icons/people.png');
        $object->value = "+876";
        $stats[]=$object;
        //-----------------------
           $object = new \stdClass();
        $object->name =   $lang=="en" ? "Accomplishment certificate": "شهادة تقدير";
        $object->icon = asset('storage/icons/trophy.png');
        $object->value = 19;
        $stats[]=$object;
        //-----------------------
           $object = new \stdClass();
        $object->name =   $lang=="en" ? "Support feedback": "تقييم الدعم";
        $object->icon = asset('storage/icons/customer-service2.png');
        $object->value = "100%";
        $stats[]=$object;
        //-----------------------
     
       
       
        return $this->formResponse("Data is retrived",  $stats, 200);
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
