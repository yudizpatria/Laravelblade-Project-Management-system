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
    return redirect(route('login'));
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    // Directure Routes
    Route::group(['prefix' => 'directure', 'namespace' => 'Directure', 'middleware' => ['role:directure']], function () {

        Route::get('dashboard', 'DashboardController@index')->name('directure.dashboard');
        Route::resource('data_client', 'ManageClientsController');
        Route::resource('data_employee', 'ManageEmployeesController');
        Route::resource('data_project', 'ManageProjectController');
        Route::prefix('data_project')
            ->group(function () {
                Route::resource('category', 'ManageProjectCategoryController');
            });
        Route::resource('data_task', 'ManageTaskController');
    });

    // Employee Routes
    Route::group(['prefix' => 'employee', 'namespace' => 'Employee', 'middleware' => ['role:employee']], function () {
        Route::get('dashboard', 'EmployeeDashboardController@index')->name('employee.dashboard');
        Route::resource('project', 'EmployeeManageProjectController');
        Route::resource('task', 'EmployeeManageTaskController');
    });


    // Client Routes
    Route::group(['prefix' => 'client', 'namespace' => 'Client', 'middleware' => ['role:client']], function () {
        Route::get('dashboard', 'ClientDashboardController@index')->name('client.dashboard');
        Route::resource('project_list', 'ClientManageProjectController');
    });
});
