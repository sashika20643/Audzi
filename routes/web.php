<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AudioController;

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
    if (Route::has('login')){
        return view('home');
    }
    else{
    return view('index');}
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        $playlist=App\Models\playlist::where('user_id',Auth::user()->id)->get();

         return view('home')->with('playlists',$playlist);
    })->name('dashboard');
    Route::get('/player', function () {
        return view('player');
    })->name('player');
    Route::get('dashboard/plist/create', function () {
        return view('CreatePlaylist');
    });
    Route::get('dashboard/audio/upload', function () {
        return view('Uploadsongs');
    });
    Route::get('dashboard/plist/addsongs', function () {
        $songs=App\Models\song::all();
        return view('Addsongs')->with('songs',$songs);
    });

    Route::post('/playlist/create',[PlaylistController::class, 'create']);
    Route::post('controller/audio/upload',[AudioController::class, 'upload']);
    Route::post('controller/audio/list',[AudioController::class, 'getlist']);



});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
