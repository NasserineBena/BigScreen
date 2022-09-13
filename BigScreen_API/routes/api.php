<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\QuestionTypeController;
use App\Http\Controllers\API\SurveyController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource("questionType", QuestionTypeController::class)->except(['create','edit','delete']);
Route::apiResource("survey", SurveyController::class)->except(['create','edit','delete']);
