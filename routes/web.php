<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
	PostController,
	HomeController,
	CategoryController,
	TagsController,
	UsersController,
	ProfilesController,
	SettingController,
	FrontController
};

Route::get('/test', function () {
	return App\Models\Profile::find(1)->user;
});

Route::get('/', [FrontController::class, 'index'])->name('homeblog');
Route::get('/post/{slug}', [FrontController::class, 'singlePost'])->name('post.single');
Route::get('/category/{id}', [FrontController::class, 'category'])->name('category.single');
Route::get('/tag/{id}', [FrontController::class, 'tag'])->name('tag.single');
Route::get('/results', function(){
	$posts = \App\Models\Post::where('title', 'like', '%' . request('search') . '%')->get();

	return view('results')->with('posts', $posts)
	->with('title', 'Search results : ' . request('search'))
	->with('settings', \App\Models\Setting::first())
	->with('categories', \App\Models\Category::take(5)->get())
	->with('search', request('search'));
});
Route::get('/post/user/{id}', [FrontController::class, 'postBy'])->name('post.by');
Route::get('/allpost', [FrontController::class, 'allpost'])->name('allpost');
Route::get('/downloadpdf/{slug}', [FrontController::class, 'pdf'])->name('downloadpdf');


// Route::get('/post/all', [FrontController::class, 'allpost'])->name('allpost');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
	Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
	Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
	Route::get('/post/delete{id}', [PostController::class, 'destroy'])->name('post.delete');
	Route::get('/posts', [PostController::class, 'index'])->name('posts');
	Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
	Route::get('/posts/kill/{id}', [PostController::class, 'kill'])->name('post.kill');
	Route::get('/posts/restore/{id}', [PostController::class, 'restore'])->name('post.restore');
	Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
	Route::post('/post/update/{id}', [PostController::class, 'update'])->name('post.update');
	Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
	Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
	Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
	Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
	Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
	Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
	Route::get('/tags', [TagsController::class, 'index'])->name('tags');
	Route::get('/tag/create', [TagsController::class, 'create'])->name('tag.create');
	Route::post('/tag/store', [TagsController::class, 'store'])->name('tag.store');
	Route::get('/tag/edit/{id}', [TagsController::class, 'edit'])->name('tag.edit');
	Route::post('/tag/update/{id}', [TagsController::class, 'update'])->name('tag.update');
	Route::get('/tag/delete/{id}', [TagsController::class, 'destroy'])->name('tag.delete');
	Route::get('/users', [UsersController::class, 'index'])->name('users');
	Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
	Route::post('/user/store', [UsersController::class, 'store'])->name('user.store');
	Route::get('/user/admin/{id}', [UsersController::class, 'admin'])->name('user.admin');
	Route::get('/user/not-admin/{id}', [UsersController::class, 'not_admin'])->name('user.not.admin');
	Route::get('/user/profile', [ProfilesController::class, 'index'])->name('user.profile');
	Route::post('/user/profile/update', [ProfilesController::class, 'update'])->name('user.profile.update');
	Route::get('/user/changepass', [ProfilesController::class, 'changepassword'])->name('user.changepassword');
	Route::post('/user/updatepass', [ProfilesController::class, 'updatepass'])->name('user.updatepass');
	Route::get('/user/delete/{id}', [UsersController::class, 'destroy'])->name('user.delete');
	Route::get('/settings', [SettingController::class, 'index'])->name('settings');
	Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');
});
