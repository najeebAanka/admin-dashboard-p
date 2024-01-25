<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PricingPackage;
use Illuminate\Http\Request;

class SupportController extends Controller
{


    public function send(Request $request)
    {
        //

          $input = $request->all();
        $validator = \Illuminate\Support\Facades\Validator::make(
            $input,
            [

                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
                'phone' => 'required',
            ]
        );


        if ($validator->fails()) {
          return
            $this->formResponse("Validation error", $this->failedValidation($validator), 400);
        }


        $body = new \stdClass();
        $body->name = $input['name'];
           $body->e = $input['e'];
              $body->message = $input['message'];
              $body->phone = $input['phone'];



\Mail::to('ahmad@test.org')

->send(new \App\Mail\ContactMail(  $body ));


return   $this->formResponse("Email sent", null, 200);


    }

}
