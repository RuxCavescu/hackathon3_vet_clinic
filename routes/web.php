<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\OwnerController;

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


//visits Routes:

Route::get('/animals/{id}/detail/view-visits', [VisitController::class, 'show']);
Route::post('/animals/{id}/detail/view-visit', [VisitController::class, 'create']);
Route::get('/animals/{id}/detail/edit-visit/{visit_id}', [VisitController::class, 'edit']);
Route::put('/animals/{id}/detail/view-visits/{visit_id}', [VisitController::class, 'update']);

Route::delete('/animals/{id}/detail/detele-visit/{visit_id}', [VisitController::class, 'destroy']);

// Adding ANIMALS

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

// Adding OWNERS

Route::get("/owners/search", [
  OwnerController::class, "search"
])->name("owners.search");

Route::get("/owners", [
  OwnerController::class, "show"
])->name("owners.show");

Route::get("/owners/{id}", [
  OwnerController::class, "detail"
])->whereNumber("id")->name("owners.detail");

Route::get("/owners/create", [
  OwnerController::class, "create"
])->name("owners.create");

Route::get("/owners/{id}/edit", [
  OwnerController::class, "edit"
])->name("owners.edit");

Route::post("/owners", [
  OwnerController::class, "store"
])->name("owners.store");

Route::patch("/owners/{id}", [
  OwnerController::class, "update"
])->name("owners.update");

Route::delete("/owners/{id}", [
  OwnerController::class, "destroy"
])->name("owners.destroy");
