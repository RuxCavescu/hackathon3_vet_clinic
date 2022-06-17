<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitController;

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
