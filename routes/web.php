<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('voyager.dashboard');
});

Route::get('/testimonials-maps', function () {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://maps.googleapis.com/maps/api/place/details/json?placeid=ChIJT5K_vtZpXz4RUN4upmASick&key=AIzaSyAV8VEG1RLclapyZ92xOujbsX1lRnIksdc",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);


    $response = json_decode($response);
    if ($response && property_exists($response, 'result') && property_exists($response->result, 'reviews')) {
        foreach ($response->result->reviews as $r) {

            $name = $r->author_name;
            $time = $r->time;
            $created_at = ((new \DateTime())->setTimestamp($time))->format('Y-m-d H:i:s');

            $review = \App\Models\Testimonial::where([
                'name' => $name,
                'created_at' => $created_at,
            ])->first();

            if (!$review) {
                $review = new \App\Models\Testimonial();
            }
            //get image
            $url = $r->profile_photo_url . '?key=AIzaSyAV8VEG1RLclapyZ92xOujbsX1lRnIksdc';
            $img = public_path('storage/testimonials/' . $time . '.png');
            file_put_contents($img, file_get_contents($url));
            $review->icon = 'testimonials/' . $time . '.png';
            $review->text = utf8_decode($r->text);
            $review->rating = $r->rating;
            $review->name = $name;
            //get date
            $review->created_at = $created_at;
            $review->save();
        }
    }
    return redirect()->back();
})->name('testimonials-maps');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
