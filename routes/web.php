<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Request;
use App\Http\Controllers\FirstController;
//use Illuminate\Support\Facades\View;
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

Route::get('/about', function () {
    return view('about');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::post('/store/contract', [FirstController::class, 'contract'])->name('store.contract');

Route::post('/about/about', [FirstController::class, 'aboutabout'])->name('about.about');

Route::get('/address',function(Request $request){
 $logfile=file(storage_path().'/logs/about.log');
 $collection=[];
 foreach($logfile  as $line_number=>$line){
    $collection[]=array('line'=>$line_number, 'content'=>htmlspecialchars($line));
 }

 dd($collection);
//return redirect()->to('/');
    //return view('address');
});

Route::get('/contract', function () {
    return view('contract');
});

Route::post('/contract/contract',[FirstController::class, 'storeContract'])->name('contract.contract');

Route::get('/class', [App\Http\Controllers\admin\classController::class, 'index'])->name('class.index');






