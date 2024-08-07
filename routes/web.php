<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdTypeController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AppSectionController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Site\EmployeeController as SiteEmployees;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\OtherAppController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PhraseCategoryController;
use App\Http\Controllers\PhraseController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\ProcessFileStatusController;
use App\Http\Controllers\ProcessTypeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkGroupController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/history', [HomeController::class, 'history'])->name('home.history');

Route::prefix('/')
    ->middleware('auth')
    ->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('charges', ChargeController::class);
        Route::resource('companies', CompanyController::class);
        Route::resource('work-groups', WorkGroupController::class);
        Route::get('all-settings', [SettingsController::class, 'index'])->name(
            'all-settings.index'
        );
        Route::post('all-settings', [SettingsController::class, 'store'])->name(
            'all-settings.store'
        );
        Route::get('all-settings/create', [
            SettingsController::class,
            'create',
        ])->name('all-settings.create');
        Route::get('all-settings/{settings}', [
            SettingsController::class,
            'show',
        ])->name('all-settings.show');
        Route::get('all-settings/{settings}/edit', [
            SettingsController::class,
            'edit',
        ])->name('all-settings.edit');
        Route::put('all-settings/{settings}', [
            SettingsController::class,
            'update',
        ])->name('all-settings.update');
        Route::delete('all-settings/{settings}', [
            SettingsController::class,
            'destroy',
        ])->name('all-settings.destroy');

        Route::resource('areas', AreaController::class);
        Route::resource('processes', ProcessController::class);
        Route::resource(
            'process-file-statuses',
            ProcessFileStatusController::class
        );
        Route::resource('process-types', ProcessTypeController::class);
        Route::resource('employees', EmployeeController::class);
        Route::resource('events', EventController::class);
        Route::resource('ad-types', AdTypeController::class);
        Route::resource('announcements', AnnouncementController::class);
        Route::resource('app-sections', AppSectionController::class);
        Route::resource('articles', ArticleController::class);
        Route::resource('other-apps', OtherAppController::class);
        Route::resource('phrase-categories', PhraseCategoryController::class);
        Route::resource('phrases', PhraseController::class);
        Route::resource('users', UserController::class);
        Route::resource('addresses', AddressController::class);
        Route::resource('currencies', CurrencyController::class);


    Route::get('employees-list', [SiteEmployees::class, 'index'])->name('employee.list');
    });



Route::prefix('admin')
->middleware('auth')
->group(function () {
    Route::get('/home', [AdminHomeController::class, 'index'])->name('admin.home');
});
