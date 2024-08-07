<?php

use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AdTypeAnnouncementsController;
use App\Http\Controllers\Api\AdTypeController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\AppSectionArticlesController;
use App\Http\Controllers\Api\AppSectionController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\AreaEmployeesController;
use App\Http\Controllers\Api\AreaProcessesController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ChargeController;
use App\Http\Controllers\Api\ChargeEmployeesController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CompanyEmployeesController;
use App\Http\Controllers\Api\CurrencyController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\EmployeeUsersController;
use App\Http\Controllers\Api\EmployeeWorkGroupsController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\OtherAppController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\PhraseCategoryController;
use App\Http\Controllers\Api\PhraseCategoryPhrasesController;
use App\Http\Controllers\Api\PhraseController;
use App\Http\Controllers\Api\ProcessAreasController;
use App\Http\Controllers\Api\ProcessController;
use App\Http\Controllers\Api\ProcessFileStatusController;
use App\Http\Controllers\Api\ProcessFileStatusProcessFilesController;
use App\Http\Controllers\Api\ProcessProcessFilesController;
use App\Http\Controllers\Api\ProcessTypeController;
use App\Http\Controllers\Api\ProcessTypeProcessesController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SettingsController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WorkGroupController;
use App\Http\Controllers\Api\WorkGroupEmployeesController;
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

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('charges', ChargeController::class);

        // Charge Employees
        Route::get('/charges/{charge}/employees', [
            ChargeEmployeesController::class,
            'index',
        ])->name('charges.employees.index');
        Route::post('/charges/{charge}/employees', [
            ChargeEmployeesController::class,
            'store',
        ])->name('charges.employees.store');

        Route::apiResource('companies', CompanyController::class);

        // Company Employees
        Route::get('/companies/{company}/employees', [
            CompanyEmployeesController::class,
            'index',
        ])->name('companies.employees.index');
        Route::post('/companies/{company}/employees', [
            CompanyEmployeesController::class,
            'store',
        ])->name('companies.employees.store');

        Route::apiResource('work-groups', WorkGroupController::class);

        // WorkGroup Employees
        Route::get('/work-groups/{workGroup}/employees', [
            WorkGroupEmployeesController::class,
            'index',
        ])->name('work-groups.employees.index');
        Route::post('/work-groups/{workGroup}/employees/{employee}', [
            WorkGroupEmployeesController::class,
            'store',
        ])->name('work-groups.employees.store');
        Route::delete('/work-groups/{workGroup}/employees/{employee}', [
            WorkGroupEmployeesController::class,
            'destroy',
        ])->name('work-groups.employees.destroy');

        Route::apiResource('all-settings', SettingsController::class);

        Route::apiResource('areas', AreaController::class);

        // Area Employees
        Route::get('/areas/{area}/employees', [
            AreaEmployeesController::class,
            'index',
        ])->name('areas.employees.index');
        Route::post('/areas/{area}/employees', [
            AreaEmployeesController::class,
            'store',
        ])->name('areas.employees.store');

        // Area Processes
        Route::get('/areas/{area}/processes', [
            AreaProcessesController::class,
            'index',
        ])->name('areas.processes.index');
        Route::post('/areas/{area}/processes/{process}', [
            AreaProcessesController::class,
            'store',
        ])->name('areas.processes.store');
        Route::delete('/areas/{area}/processes/{process}', [
            AreaProcessesController::class,
            'destroy',
        ])->name('areas.processes.destroy');

        Route::apiResource('processes', ProcessController::class);

        // Process Process Files
        Route::get('/processes/{process}/process-files', [
            ProcessProcessFilesController::class,
            'index',
        ])->name('processes.process-files.index');
        Route::post('/processes/{process}/process-files', [
            ProcessProcessFilesController::class,
            'store',
        ])->name('processes.process-files.store');

        // Process Areas
        Route::get('/processes/{process}/areas', [
            ProcessAreasController::class,
            'index',
        ])->name('processes.areas.index');
        Route::post('/processes/{process}/areas/{area}', [
            ProcessAreasController::class,
            'store',
        ])->name('processes.areas.store');
        Route::delete('/processes/{process}/areas/{area}', [
            ProcessAreasController::class,
            'destroy',
        ])->name('processes.areas.destroy');

        Route::apiResource(
            'process-file-statuses',
            ProcessFileStatusController::class
        );

        // ProcessFileStatus Process Files
        Route::get('/process-file-statuses/{processFileStatus}/process-files', [
            ProcessFileStatusProcessFilesController::class,
            'index',
        ])->name('process-file-statuses.process-files.index');
        Route::post(
            '/process-file-statuses/{processFileStatus}/process-files',
            [ProcessFileStatusProcessFilesController::class, 'store']
        )->name('process-file-statuses.process-files.store');

        Route::apiResource('process-types', ProcessTypeController::class);

        // ProcessType Processes
        Route::get('/process-types/{processType}/processes', [
            ProcessTypeProcessesController::class,
            'index',
        ])->name('process-types.processes.index');
        Route::post('/process-types/{processType}/processes', [
            ProcessTypeProcessesController::class,
            'store',
        ])->name('process-types.processes.store');

        Route::apiResource('employees', EmployeeController::class);

        // Employee Users
        Route::get('/employees/{employee}/users', [
            EmployeeUsersController::class,
            'index',
        ])->name('employees.users.index');
        Route::post('/employees/{employee}/users', [
            EmployeeUsersController::class,
            'store',
        ])->name('employees.users.store');

        // Employee Work Groups
        Route::get('/employees/{employee}/work-groups', [
            EmployeeWorkGroupsController::class,
            'index',
        ])->name('employees.work-groups.index');
        Route::post('/employees/{employee}/work-groups/{workGroup}', [
            EmployeeWorkGroupsController::class,
            'store',
        ])->name('employees.work-groups.store');
        Route::delete('/employees/{employee}/work-groups/{workGroup}', [
            EmployeeWorkGroupsController::class,
            'destroy',
        ])->name('employees.work-groups.destroy');

        Route::apiResource('events', EventController::class);

        Route::apiResource('ad-types', AdTypeController::class);

        // AdType Announcements
        Route::get('/ad-types/{adType}/announcements', [
            AdTypeAnnouncementsController::class,
            'index',
        ])->name('ad-types.announcements.index');
        Route::post('/ad-types/{adType}/announcements', [
            AdTypeAnnouncementsController::class,
            'store',
        ])->name('ad-types.announcements.store');

        Route::apiResource('announcements', AnnouncementController::class);

        Route::apiResource('app-sections', AppSectionController::class);

        // AppSection Articles
        Route::get('/app-sections/{appSection}/articles', [
            AppSectionArticlesController::class,
            'index',
        ])->name('app-sections.articles.index');
        Route::post('/app-sections/{appSection}/articles', [
            AppSectionArticlesController::class,
            'store',
        ])->name('app-sections.articles.store');

        Route::apiResource('articles', ArticleController::class);

        Route::apiResource('other-apps', OtherAppController::class);

        Route::apiResource(
            'phrase-categories',
            PhraseCategoryController::class
        );

        // PhraseCategory Phrases
        Route::get('/phrase-categories/{phraseCategory}/phrases', [
            PhraseCategoryPhrasesController::class,
            'index',
        ])->name('phrase-categories.phrases.index');
        Route::post('/phrase-categories/{phraseCategory}/phrases', [
            PhraseCategoryPhrasesController::class,
            'store',
        ])->name('phrase-categories.phrases.store');

        Route::apiResource('phrases', PhraseController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('addresses', AddressController::class);

        Route::apiResource('currencies', CurrencyController::class);
    });
