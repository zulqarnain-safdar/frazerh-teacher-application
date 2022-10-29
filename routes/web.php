<?php

use App\Http\Middleware\Step2;
use App\Http\Middleware\CheckSteps;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\AdminSubscriptionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdController;

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
    return view('frontend.home.index');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes
Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::post('/remove-users', [UserController::class, 'destroy'])->name('users.remove');
    Route::get('/change-account', [UserController::class, 'change_account'])->name('change-account');
    Route::get('/change-account-to-free-paid', [UserController::class, 'change_account_to_free_paid'])->name('change-account-to-free-paid');
    Route::get('export-excel-csv-file', [UserController::class, 'exportExcelCSV']);

    Route::get('/all-subscriptions', [AdminSubscriptionController::class, 'all_subscriptions'])->name('all-subscriptions');
    Route::get('/cancel-subscription/{id}', [AdminSubscriptionController::class, 'cancel_subscription'])->name('cancel-subscription');

    Route::get('/ads', [AdController::class, 'index']);
    Route::post('/save-free-profile-ads', [AdController::class, 'save_free_profile_ads']);
    Route::post('/save-search-page-profile-ads', [AdController::class, 'save_search_page_profile_ads']);

});
// end admin routes

//Basic Step Routes
Route::view('/create-teacher', 'frontend.teacher.create-teacher');
Route::post('/save-teacher', [TeacherController::class,'save_teacher_info'])->name('teacher.save_teacher_info');

//Password related Routes
Route::view('/set-password', 'frontend.password.set-password')->middleware('Step1');
Route::post('/save-password', [TeacherController::class,'save_password'])->name('teacher.save_password');
Route::post('/reset-password', [TeacherController::class,'reset_password'])->name('teacher.reset_password');
Route::post('/check-booking-password', [TeacherController::class,'check_booking_password'])->name('check_booking_password');

//Packages Routes
Route::post('/save-package', [TeacherController::class,'save_package'])->name('save_pakage');
Route::post('/add-package', [TeacherController::class,'add_pakage'])->name('add_pakage');
Route::post('/delete-package', [TeacherController::class,'delete_package'])->name('delete_package');
Route::post('/packages-list', [TeacherController::class,'get_all_packages_list'])->name('get_all_packages_list');

//Password Step Routes
Route::view('/teacher-profile', 'frontend.teacher.teacher-profile')->middleware('Step2');
Route::get('/edit-teacher-profile', [TeacherController::class,'edit_teacher_profile']);
Route::post('/update-teacher-profile', [TeacherController::class,'update_profile'])->name('update_teacher_profile');
Route::post('/save-teacher-profile', [TeacherController::class,'save_teacher_profile'])->name('save_teacher_profile');

//choose website routes
Route::view('/choose-website', 'frontend.teacher.choose-website')->middleware('Step3');
Route::post('/save-profifle-link', [TeacherController::class,'save_profile_link'])->name('save_profile_link');

//Plan Routes
Route::view('/pricing', 'frontend.teacher.pricing')->middleware('Step4');
Route::get('/get-basic-plan', [TeacherController::class,'get_basic_plan']);
Route::post('/get-premium-plan', [TeacherController::class,'get_premium_plan'])->name('get_premium_plan');

Route::group(['middleware' => ['auth']], function() {
//Dashboard Routes
Route::view('/premium-dashboard', 'frontend.dashboard.premium-dashboard');
Route::view('/free-dashboard', 'frontend.dashboard.free-dashboard');
});

//Subscription Routes
Route::get('/subscription-form', [SubscriptionController::class,'index']);
Route::post('/subscripton-create', [SubscriptionController::class,'create_subscription'])->name('subscription.create');

//Review Routes
Route::post('/review-store', [TeacherController::class,'review_store'])->name('review.store');
Route::get('/approve/review/{id}', [TeacherController::class,'approve_review']);
Route::get('/decline/review/{id}', [TeacherController::class,'decline_review']);

//find teacher reltated routes
Route::get('/find-teacher', [TeacherController::class,'find_teacher']);
Route::post('/get_teachers_profiles', [TeacherController::class,'get_teachers_profiles'])->name('get_teachers_profiles');


Route::view('/reset-password', 'frontend.password.reset-password');
Route::view('/reviews', 'frontend.review.reviews');
Route::get('/{profile_name}', [TeacherController::class,'get_teacher_profile']);
Route::post('/search-teacher-by-username', [TeacherController::class, 'search_teacher_by_username']);




