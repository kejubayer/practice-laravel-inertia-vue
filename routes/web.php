<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});
Route::get('/users', function () {
//    sleep(2);
    return Inertia::render('Users',[
        'users'=>\App\Models\User::orderBy("id",'desc')->paginate(10)->through(fn($users)=>[
            'id'=>$users->id,
            'name'=>$users->name,
        ])
        /*'users'=>\App\Models\User::paginate(10)->map(fn($users)=>[
            'id'=>$users->id,
            'name'=>$users->name,
        ])*/
    ]);
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd( request('name'));
});
