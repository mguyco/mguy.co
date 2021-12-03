<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Project;
use App\Models\Tag;

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
    $wakatime = Http::acceptJson()->get('https://wakatime.com/share/@icyhotmike/79af2e76-635c-4647-a645-a262085d0e53.json');

    return Inertia::render('App', [
        'projects' => Project::all(),
        'wakadata' => $wakatime['data']
    ]);
})->name('home');


Route::post('/contact', 'ContactFormController@store')
->middleware('throttle:1,1')
    ->name('contact.form');