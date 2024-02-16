<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
 oup. Make something great!
|
*/

//Item's Routes

//Index
Route::get('/', [ItemsController::class, "index"])-> name("items.index");

//Create
Route::get('/items/create', [ItemsController::class, "create"])-> name("items.create");

//Store 
Route::post('items/store', [ItemsController::class, "store"])-> name("items.store");    

//Edit
Route::get('/items({item}/edit', [ItemsController::class, "edit"])-> name("items.edit");

//Update
Route::put('items/{item}/uptdate', [ItemsController::class, "update"])-> name("items.update");    

//Show to delete 
Route::get('/items({item}/show', [ItemsController::class, "show"])-> name("items.show");

//Destroy 
Route::delete('items/{item}/destroy', [ItemsController::class, "destroy"])-> name("items.destroy");    

