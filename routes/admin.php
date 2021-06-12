<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Backend\AdvisorController;
use App\Http\Controllers\Backend\MemberRoleController;
use App\Http\Controllers\Scholarship\AdmitCardController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\Scholarship\ExamController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Scholarship\CreateAdmitCardController;
use App\Http\Controllers\Scholarship\ExamApplicationController;
use App\Http\Controllers\Scholarship\SchoolController;
use App\Http\Middleware\MyMiddleware\isAdmin;
use App\Models\Activity;
use App\Models\AdmitCard;
use App\Models\Advisor;
use App\Models\Applicant;
use App\Models\Center;
use App\Models\Exam;
use App\Models\Member;
use App\Models\School;
use Illuminate\Support\Facades\Route;

Route::middleware(isAdmin::class)->group(function(){
/*
|--------------------------------------------------------------------------
| Scholarship's Routes
|--------------------------------------------------------------------------
*/
    
    
/*
|--------------------------------------------------------------------------
| Backend Page's Routes
|--------------------------------------------------------------------------
*/
    Route::prefix('backend/')->group(function(){
        Route::get('dashboard', [BackendController::class, 'dashboard']);
        Route::get('members', [BackendController::class, 'members']);
        Route::get('advisors', [BackendController::class, 'advisors']);
        Route::get('notice', [BackendController::class, 'notice']);
        Route::get('settings', [BackendController::class, 'settings']);
        Route::get('publications', [BackendController::class, 'publications']);

        Route::resource('roles', RoleController::class);

        Route::get('notifications', [NotificationController::class, 'notifications']);
        Route::get('member/request/{member}', [MemberController::class, 'memberRequest']);
        Route::get('member/approve/{member}', [MemberController::class, 'approve'])->name('members.approve');
    });

    Route::get('roles/assign/{member}', [MemberRoleController::class, 'assignRole']);
    Route::get('roles/revoke/{member}', [MemberRoleController::class, 'revokeRole']);

/*
|--------------------------------------------------------------------------
| Mmeber's Routes
|--------------------------------------------------------------------------
*/
    Route::resource(Member::BASE_URL, MemberController::class);
    Route::resource(Advisor::BASE_URL, AdvisorController::class);
    Route::resource(Activity::BASE_URL, ActivityController::class);
/*
|--------------------------------------------------------------------------
| Exams's Routes
|--------------------------------------------------------------------------
*/
    Route::get(Applicant::BASE_URL.'/{applicant}/admitCard/create', [CreateAdmitCardController::class, "CreateAdmitCard"]);

    Route::get('exam/{exam}/application/close', [ExamApplicationController::class, 'closeApplication']);
    Route::get('exam/{exam}/application/start', [ExamApplicationController::class, 'startApplication']);
    Route::get('exam/{exam}/application/publish', [ExamApplicationController::class, 'publishAdmitCard']);
    Route::get('exam/{exam}/applicants', [ExamApplicationController::class, 'viewApplicants']);
});