<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\AnalyseRequest;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnalyseRequestController extends Controller
{

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'company' => 'required',
            'email' => 'required',
            'website' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->formResponse("Error in Sent Data!", $validator->getMessageBag(), 403);
        }
        
        $ar = new AnalyseRequest();
        $ar->name = $request->get('name');
        $ar->company = $request->get('company');
        $ar->email = $request->get('email');
        $ar->website = $request->get('website');
        $ar->phone = $request->get('phone');
        $ar->save();

        return $this->formResponse("Data Saved!", $ar, 200);
    }


}
