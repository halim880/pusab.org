<?php

use App\Http\Controllers\Api\AdvisorApiController;
use App\Http\Controllers\Api\ApiMemberController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\ApiExamController;
use App\Http\Controllers\ApplicantApiController;
use App\Http\Controllers\Api\SchoolApiController;
use App\Models\Advisor;
use App\Models\Applicant;
use App\Models\Exam;
use App\Models\Member;
use App\Models\School;
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

Route::resource(Member::BASE_URL, ApiMemberController::class);
Route::resource(Advisor::BASE_URL, AdvisorApiController::class);
Route::resource(School::BASE_URL, SchoolApiController::class);
Route::resource(Applicant::BASE_URL, ApplicantApiController::class);
Route::resource(Exam::BASE_URL, ApiExamController::class);

Route::resource('backend/roles', RoleController::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
