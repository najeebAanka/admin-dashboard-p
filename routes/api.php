<?php

// header ("Access-Control-Allow-Origin: *");
header ("Access-Control-Allow-Methods: *");
header ("Access-Control-Allow-Headers: *");

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/form/submit', [\App\Http\Controllers\API\SupportController::class, 'send']);

Route::get('v1/pricing', [\App\Http\Controllers\API\PricingPackagesController::class, 'index']);
Route::get('v1/porfolio-categories', [\App\Http\Controllers\API\PortfolioCategoriesController::class, 'index']);
Route::get('v1/faq', [\App\Http\Controllers\API\FAQController::class, 'index']);

Route::get('v1/portfolio', [\App\Http\Controllers\API\WorkController::class, 'index']);
Route::get('v1/portfolio/only8', [\App\Http\Controllers\API\WorkController::class, 'only8']);
Route::get('v1/portfolio/types', [\App\Http\Controllers\API\WorkController::class, 'types']);
Route::get('v1/portfolio/types/{type}', [\App\Http\Controllers\API\WorkController::class, 'getByType']);
Route::get('v1/services', [\App\Http\Controllers\API\ServicesController::class, 'index']);
Route::get('v1/stats', [\App\Http\Controllers\API\StaticticsController::class, 'index']);
Route::get('v1/testimonials', [\App\Http\Controllers\API\TestimonialsController::class, 'index']);
Route::get('v1/portfolio/single/{id}', [\App\Http\Controllers\API\WorkController::class, 'single']);
Route::get('v1/services/single/{id}', [\App\Http\Controllers\API\ServicesController::class, 'single']);
Route::get('v1/pages/{code}', [\App\Http\Controllers\API\ParagraphsController::class, 'index']);
Route::get('v1/logos', [\App\Http\Controllers\API\LogoController::class, 'index']);
Route::get('v1/employees', [\App\Http\Controllers\API\EmployeeController::class, 'index']);
Route::post('v1/analyse-request/store', [\App\Http\Controllers\API\AnalyseRequestController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
