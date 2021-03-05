<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ParentController;

use App\Models\Etudiant;

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
    return view('home');
});

Route::get('/save', function () {
    $etudiant = Etudiant::where('first_name', 'yahya')->get();
    dd($etudiant);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/etudiants', 'App\Http\Controllers\ParentController@index')->name('parent-etudiant');
Route::get('/etudiants/{id}/absences', 'App\Http\Controllers\ParentController@show_absence')->name('show-absence');
