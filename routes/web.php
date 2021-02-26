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

Route::get('/login', App\Http\Livewire\Account\Login::class)->name('login')->middleware('guest');

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', App\Http\Livewire\Account\Dashboard::class)->name('dashboard');
    Route::get('/developers', App\Http\Livewire\Developer\DeveloperList::class)->name('developer-list');
    Route::get('/projects', App\Http\Livewire\Project\ProjectList::class)->name('project-list');
    Route::get('/project-details/{project}', App\Http\Livewire\Project\ProjectView::class)->name('project-view');
    Route::get('/properties', App\Http\Livewire\Property\PropertyList::class)->name('property-list');
    Route::get('/tenants', App\Http\Livewire\Tenant\TenantList::class)->name('tenant-list');
    Route::get('/team', App\Http\Livewire\Member\MemberList::class)->name('team-list');
});

Route::get('artisan/{command}',function($command){
    \Illuminate\Support\Facades\Artisan::call($command);
    dd($command . ' : ' . 'done');
});
