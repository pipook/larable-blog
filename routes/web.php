<?php

use App\Http\Controllers\PostCommentsController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::post('posts/{post:slug}/comments',[PostCommentsController::class, 'store']);

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [
        'posts'=> $category->posts/*,
        'currentCategory'=> $category,
        'categories'=> Category::all()*/
    ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [
        'posts'=> $author->posts
    ]);
});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('newsletter', function(){
    request()->validate(['email'=> ['required', 'email']]);
    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
    ]);
    try{
        $response = $mailchimp->lists->addListMember("c12a52d3c1", [
            "email_address" => request('email'),
            "status" => "subscribed",
        ]);
    }catch(\Exception){
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email'=> 'This email could not be added to our newsletter list.'
        ]);
    }
    return redirect('/')->with('success', 'You are now signed up for our newsletter!');
});
