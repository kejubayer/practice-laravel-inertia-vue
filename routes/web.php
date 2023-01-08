<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/login',[\App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::post('/login',[\App\Http\Controllers\LoginController::class,'doLogin']);
Route::post('/logout', [\App\Http\Controllers\LoginController::class,'logout'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return Inertia::render('Home');
    });
    Route::get('/users', function () {
//    sleep(2);
        return Inertia::render('Users/Index', [
            'users' => \App\Models\User::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', "like", "%{$search}%");
                })
                ->orderBy("id", 'desc')
                ->paginate(10)
                ->withQueryString()
                ->through(fn($users) => [
                    'id' => $users->id,
                    'name' => $users->name,
                    'can'=>[
                        'edit'=>Auth::user()->can('edit',$users)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can'=>[
                'createUser'=>Auth::user()->can('create',User::class)
            ]
            /*'users'=>\App\Models\User::paginate(10)->map(fn($users)=>[
                'id'=>$users->id,
                'name'=>$users->name,
            ])*/
        ]);
    });
    Route::post('/users', function () {
        $inputs = Request::validate([
            "name" => "required",
            "email" => ["required", "email", "unique:users,email"],
            "password" => "required",
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
    })->can('create','App\models\User');
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
    Route::get("test", [\App\Http\Controllers\TestController::class, 'test']);
});
