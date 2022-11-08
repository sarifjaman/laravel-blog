<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Models\Post;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Home 
Route::get('/', [FrontEndController::class, 'home'])->name('website');


//category
Route::get('/category/{slug}', [FrontEndController::class, 'category'])->name('website.category');

//Tag
Route::get('/tag/{slug}', [FrontEndController::class, 'tag'])->name('website.tag');

//about
Route::get('/about', [FrontEndController::class, 'about'])->name('website.about');

//post
Route::get('/post/{slug}', [FrontEndController::class, 'post'])->name('website.post');

//Contact
Route::get('/contact', [FrontEndController::class, 'contact'])->name('website.contact');
Route::post('/contact', [FrontEndController::class, 'send_message'])->name('website.contact');



//admin panel Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    //Dashboard
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard.index');
    // });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //category
    Route::resource('category', CategoryController::class);

    //Tag
    Route::resource('tag', TagController::class);

    //Post
    Route::resource('post', PostController::class);

    //User
    Route::resource('user', UserController::class);

    //profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile', [UserController::class, 'profile_update'])->name('user.profile.update');

    //Settings
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

    //Message
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
});

// Route::get('/tests', function () {
//     $posts = Post::all();
//     $id = 76;

//     foreach ($posts as $post) {
//         $post->image = "https://i.picsum.photos/id/" . $id . "/600/400.jpg";
//         $post->save();
//         $id++;
//     }
//     return $posts;
// });
