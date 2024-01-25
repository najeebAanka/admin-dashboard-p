<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Logo;
use App\Models\PricingPackage;
use Illuminate\Http\Request;
use TCG\Voyager\Voyager;

class EmployeeController extends Controller
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
        $data = Employee::select(['id', 'name', 'position', 'is_manager', 'phone', 'email', 'image'])->orderBy('sorting', 'asc')->get();
        $v = new Voyager();
        foreach ($data as $d) {
            $d->image = $v->image($d->image);
        }

        $emps = [];
        foreach ($data as $key => $d) {
            if ($key > 0) {
                array_push($emps, $d);
            }
        }
        return $this->formResponse("Data is retrived", [
            'manager' => $data[0],
            'employees' => $emps
        ], 200);
    }


}
