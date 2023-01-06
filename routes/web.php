<?php

use Illuminate\Support\Facades\Request;
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
    return Inertia::render('Users/Index',[
        'users'=>\App\Models\User::query()
            ->when(Request::input('search'), function ($query,$search){
                $query->where('name',"like","%{$search}%");
            })
            ->orderBy("id",'desc')
            ->paginate(10)
            ->withQueryString()
            ->through(fn($users)=>[
            'id'=>$users->id,
            'name'=>$users->name,
        ]),
        'filters'=>Request::only(['search'])
        /*'users'=>\App\Models\User::paginate(10)->map(fn($users)=>[
            'id'=>$users->id,
            'name'=>$users->name,
        ])*/
    ]);
});
Route::post('/users', function () {
    $inputs=Request::validate([
       "name"=>"required",
       "email"=>["required","email"],
       "password"=>"required",
    ]);
   /* \App\Models\User::create([
       'name'=>Request::input('name'),
       'email'=>Request::input('email'),
       'password'=>\Illuminate\Support\Facades\Hash::make(Request::input('password')),
    ]);*/
    \App\Models\User::create($inputs);
    return redirect('/users');
});
Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});
Route::get('/settings', function () {
    return Inertia::render('Settings');
});
Route::post('/logout', function () {
    dd( request('name'));
});
Route::get("test",[\App\Http\Controllers\TestController::class,'test']);
