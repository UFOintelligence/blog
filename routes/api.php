<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Tags;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/tags', function(Request $request){
$term = $request->term ?? '';

$tags = Tags::select('id', 'name as text')->where('name', 'LIKE', '%' .$term . '%')->limit(10)->get();

return $tags;


})->name('api.tags.index');
