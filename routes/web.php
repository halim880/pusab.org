<?php
use App\Http\Controllers\AdvisorSignupController;
use App\Http\Controllers\Backend\AdvisorController;
use App\Http\Controllers\MemberRegistrationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SayorPostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

/*
|--------------------------------------------------------------------------
| Page's Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/admin.php';
require __DIR__.'/scholarship.php';

/*
|--------------------------------------------------------------------------
| Page's Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'welcome']);

Route::prefix('pages/')->group(function(){
    Route::get('home', [PageController::class, 'home']);
    Route::get('about', [PageController::class, 'about']);
    Route::get('contact', [PageController::class, 'contact']);
    Route::get('members', [PageController::class, 'members']);
    Route::get('advisors', [AdvisorController::class, 'index']);
    Route::get('activities', [PageController::class, 'activities']);
    Route::get('notice', [PageController::class, 'notice']);
    Route::get('publications', [PageController::class, 'publications']);
    Route::get('scholarship_exam', [PageController::class, 'scholarship_exam']);
});

// Route::get('scholarship/applications', [ApplicationController::class, 'index']);
// Route::get('scholarship/applications/{application}', [ApplicationController::class, 'show']);
// Route::get('scholarship/application/confirm/{application}', [ApplicationController::class, 'confirm']);

Route::post('member/register', [MemberRegistrationController::class, 'register']);
Route::post('advisor/register', [AdvisorSignupController::class, 'signup']);

/*
|--------------------------------------------------------------------------
| SayorPost Routes 
|--------------------------------------------------------------------------
*/
Route::post('sayor-post/store', [SayorPostController::class, 'store']);
Route::get('sayor-post/create', [SayorPostController::class, 'create']);
Route::get('sayor-post/show/{post}', [SayorPostController::class, 'show']);



