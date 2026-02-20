<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
Route::post('login', 'Auth\LoginController@login')->name('auth.login');
Route::post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
Route::post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('user_actions', 'UserActionsController');
    Route::resource('projects', 'ProjectsController');
    Route::post('projects_mass_destroy', ['uses' => 'ProjectsController@massDestroy', 'as' => 'projects.mass_destroy']);
    Route::resource('work_types', 'WorkTypesController');
    Route::post('work_types_mass_destroy', ['uses' => 'WorkTypesController@massDestroy', 'as' => 'work_types.mass_destroy']);
    Route::resource('time_entries', 'TimeEntriesController');
    Route::post('time_entries_mass_destroy', ['uses' => 'TimeEntriesController@massDestroy', 'as' => 'time_entries.mass_destroy']);
    // Route::resource('manage_users', 'ManageUsersController'); // Removed as controller missing
    Route::resource('reports', 'ReportsController');
});
