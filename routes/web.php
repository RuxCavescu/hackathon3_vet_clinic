<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

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

"FOR KATYA"
Route::get("/animals", [
  AnimalController::class, "show"
])->name("animals.show");


Route::get("/animals/create", [
  AnimalController::class, "create"
])->name("animals.create");

Route::get("/animals/{id}/edit", [
  AnimalController::class, "edit"
])->name("animals.edit");

Route::post("/animals", [
  AnimalController::class, "store"
])->name("animals.store");

Route::patch("/animals/{id}", [
  AnimalController::class, "update"
])->name("animals.update");

Route::delete("/animals/{id}", [
  AnimalController::class, "destroy"
])->name("animals.destroy");
