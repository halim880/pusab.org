<?php

use App\Http\Controllers\CenterController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\Scholarship\AdmitCardController;
use App\Http\Controllers\Scholarship\AdmitCardDownloadController;
use App\Http\Controllers\Scholarship\ApplicantController;
use App\Http\Controllers\Scholarship\ApplicationStoreController;
use App\Http\Controllers\Scholarship\ExamController;
use App\Http\Controllers\Scholarship\SchoolController;
use App\Http\Middleware\MyMiddleware\isAdmin;
use App\Models\AdmitCard;
use App\Models\Applicant;
use App\Models\Center;
use App\Models\Exam;
use App\Models\Result;
use App\Models\School;
use Illuminate\Support\Facades\Route;

Route::post('application/submit', [ApplicationStoreController::class, 'storeApplication']);
Route::get('application/form/{examId}', [ApplicationStoreController::class, 'createApplication']);
Route::get('application/download/{applicant}', [ApplicationStoreController::class, 'downloadApplication']);
Route::post('admitCard/show', [AdmitCardDownloadController::class, 'showAdmitCard']);
Route::get('admitcard/download/form', [AdmitCardDownloadController::class, 'createAdmitCardForm']);
Route::get('admitCard/download/{applicant}', [AdmitCardDownloadController::class, "downloadAdmitCard"]);



Route::middleware(isAdmin::class)->group(function (){
    Route::resource(Result::BASE_URL, ResultController::class);
    Route::resource(Applicant::BASE_URL, ApplicantController::class);
    Route::resource(Exam::BASE_URL, ExamController::class);
    Route::resource(School::BASE_URL, SchoolController::class);
    Route::resource(Center::BASE_URL, CenterController::class);
    Route::resource(AdmitCard::BASE_URL, AdmitCardController::class);
});
