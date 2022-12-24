<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComponetTestController;
use App\Http\Controllers\LifeCycleTestController;
use App\Http\Controllers\User\ItemController;

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
    return view('user.welcome');
});

Route::middleware('auth:users')->group(function(){
        Route::get('/', [ItemController::class, 'index'])->name('items.index');
        Route::get('show/{item}', [ItemController::class, 'show'])->name('items.show');
    });

Route::get('/component-test1', [ComponetTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponetTestController::class, 'showComponent2']);
Route::get('/servicecontainertest', [LifeCycleTestController::class, 'showServiceContainerTest']);
Route::get('/serviceprovidertest', [LifeCycleTestController::class, 'showServiceProviderTest']);


require __DIR__.'/auth.php';
