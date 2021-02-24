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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// routes to classes
Route::get('classes', function () {
    return view('classes.classes');
});
//routes to terms
Route::get('term/addterm','TermController@create');
Route::get('term/addterm','TermController@index');
Route::post('term/addterm','TermController@store');
// Route::get('/classes', 'ClassController@index')->name('classes');
//Route for years
Route::get('years','YearController@index');
Route::post('years','YearContoller@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/index', function () {
    return view('index');
});

Route::get('/submitproperty', function () {
    return view('submitproperty');
});

Route::get('/rentals', function () {
    return view('rentals');
});

Route::get('/admin',function() {
    return view('admin.dashboard');
});

Route::get('/profile',function() {
    return view('admin.profile');
});

Route::get('/dashboard', function(){
    return view('admin.dashboard');
});
