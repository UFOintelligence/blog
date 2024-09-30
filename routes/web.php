<?php
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\WelcomeController;
use App\Models\Post;
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

Route::get('/', WelcomeController::class)->name('home');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/', function () {

//         $posts = Post::all();
//         return view('welcome', compact('posts'));
//     })->name('Home');
// });

Route::get('/posts/{post}/image', [PostController::class, 'image'])->name('posts.image');




