<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class ParagraphsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        $lang  =request()->header('Accept-Language' ,'ar');
          if(!in_array($lang, ["en" ,"ar"])){
            $lang = "ar";
        }
        $data = new \stdClass();
        if($code == 'about'){

         if($lang == "en"){

         $data->header = "Let Us Take You There!";
         $data->title = "Make Your Package";
         $data->subtititle = "We can help you find your Digital Marketing Edge to Let the World Know That You Have Arrived";
         $data->paragraphs = [];
         $p = new \stdClass();
         $p->title  = "Our Maxim";
         $p->content = "Combining the power of established practices like Market research and Market Dynamics Study with SEO tools, we can create highly effective, precise, and target-specific campaigns. With the power of research, data and market analysis, and the use of unique and safe methods to distinguish our customers from the rest of their competitors we bring you results.";
          $data->paragraphs[]=$p;

            $p = new \stdClass();
         $p->title  = "The Brains Behind";
         $p->content = "Combining the power of established practices like Market research and Market Dynamics Study with SEO tools, we can create highly effective, precise, and target-specific campaigns. With the power of research, data and market analysis, and the use of unique and safe methods to distinguish our customers from the rest of their competitors we bring you results.";
          $data->paragraphs[]=$p;


            $p = new \stdClass();
         $p->title  = "Our Vision";
         $p->content = "Combining the power of established practices like Market research and Market Dynamics Study with SEO tools, we can create highly effective, precise, and target-specific campaigns. With the power of research, data and market analysis, and the use of unique and safe methods to distinguish our customers from the rest of their competitors we bring you results.";
          $data->paragraphs[]=$p;

         }else{

              $data->header = "جولة ";
         $data->title = "قم بصناعة مشروعك المستقبلي معنا";
         $data->subtititle = "احصل على السرعة و الحماية و الدعم و الأداء الأقصى مع منتجاتنا الالكترونية باسعار منافسة";
         $data->paragraphs = [];
         $p = new \stdClass();
         $p->title  = "السرعة";


            $p->content = "   نتطلع للغد بطموح كبير , مع نمو السوق البرمجي في كل انحاء العالم بشكل عام"
                    . " و في دبي بشكل خاص , قمنا و بقوة بوضع بصمتنا المميزة في عالم البرمجيات من خلال باقة من المشاريع المتنوعة"
                    . " التي تضم كافة الخدمات في مختلف قطاعات العمل"


    ;    $data->paragraphs[]=$p;

            $p = new \stdClass();
         $p->title  = "الجمالية";
          $p->content = "   نتطلع للغد بطموح كبير , مع نمو السوق البرمجي في كل انحاء العالم بشكل عام و في دبي بشكل خاص , قمنا و بقوة بوضع بصمتنا المميزة في عالم البرمجيات من خلال باقة من المشاريع المتنوعة التي تضم كافة الخدمات في مختلف قطاعات العمل"
        ; $data->paragraphs[]=$p;


            $p = new \stdClass();
         $p->title  = "الأداء";
          $p->content = "   نتطلع للغد بطموح كبير , مع نمو السوق البرمجي في كل انحاء العالم بشكل عام و في دبي بشكل خاص , قمنا و بقوة بوضع بصمتنا المميزة في عالم البرمجيات من خلال باقة من المشاريع المتنوعة التي تضم كافة الخدمات في مختلف قطاعات العمل"
        ;  $data->paragraphs[]=$p;


         }




        }
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
