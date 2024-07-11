<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\CategoriesPropertiesController;
use App\Http\Controllers\admin\RecipesController;
use App\Http\Controllers\admin\TipsController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\FeedbacksController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\CommentsController;
use App\Http\Controllers\admin\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\user\UserCommentsController;
use App\Http\Controllers\user\UserFavoritesController;
use App\Http\Controllers\user\UserFeedbackController;
use App\Http\Controllers\user\UserRecipesController;
use App\Http\Controllers\user\UserTipsController;
use App\Http\Controllers\user\UserNewsController;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

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

//index
Route::get('/', [HomeController::class, 'index'])->name('index');



// recipes 
Route::prefix('recipes')->group(function() {
    // recipes index
    Route::get('/', [UserRecipesController::class, 'index'])->name('recipes');
    // recipes detail
    Route::get('/detail/{id}', [UserRecipesController::class, 'detail'])->name('recipes.detail');
    //like
    Route::middleware(['auth', 'permission2'])->post('/like/{id}', [UserRecipesController::class, 'addToFavorite'])->name('recipes.like');
    // search
    Route::post('/search', [UserRecipesController::class, 'search'])->name('recipes.search');
});



// comment
Route::middleware('auth')->post('/comment/{id}', [UserCommentsController::class, 'store'])->name('user.comments');
Route::middleware('auth')->get('/comment/delete/{id_comment}/{id_recipe}/{id_user}', [UserCommentsController::class, 'destroy'])->name('user.comments.destroy');


// feedback
Route::middleware(['auth', 'permission2'])->prefix('feedback')->group(function () {
    Route::get('/', [UserFeedbackController::class, 'index'])->name('user.feedback');
    Route::post('/store', [UserFeedbackController::class, 'store'])->name('user.feedback.store');
});



// tips
Route::prefix('tips')->group(function () {
    // tips index
    Route::get('/', [UserTipsController::class, 'index'])->name('tips');
    // tips detail
    Route::get('/detail/{id}', [UserTipsController::class, 'detail'])->name('tips.detail');
    // search
    Route::post('/search', [UserTipsController::class, 'search'])->name('tips.search');
});



// news
Route::prefix('news')->group(function () {
    // news index
    Route::get('/', [UserNewsController::class, 'index'])->name('news');
    // news detail
    Route::get('/detail/{id}', [UserNewsController::class, 'detail'])->name('news.detail');
    // search
    Route::post('/search', [UserNewsController::class, 'search'])->name('news.search');
});



//favorites
Route::middleware(['auth', 'permission2'])->prefix('favorites')->group(function () {
    // news index
    Route::get('/', [UserFavoritesController::class, 'index'])->name('favorites');
    // search
    Route::post('/search', [UserFavoritesController::class, 'search'])->name('favorites.search');
});


Route::middleware(['auth', 'verified','permission'])->prefix('admin')->group(function () {
    
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //categories

        //index
        Route::get('/dashboard/categories',[CategoriesController::class, 'index'])->name('admin.categories.index');
        //create
        Route::get('/dashboard/categories/create',[CategoriesController::class, 'create'])->name('admin.categories.create');
        //store
        Route::post('/dashboard/categories/create',[CategoriesController::class, 'store'])->name('admin.categories.store');
        //edit
        Route::get('/dashboard/categories/edit/{id}',[CategoriesController::class, 'edit'])->name('admin.categories.edit');
        //update
        Route::post('/dashboard/categories/update/{id}',[CategoriesController::class, 'update'])->name('admin.categories.update');
        //destroy
        Route::get('/dashboard/categories/destroy/{id}',[CategoriesController::class, 'destroy'])->name('admin.categories.destroy');

    //categories properties    
    
        //index
        Route::get('/dashboard/categories_properties',[CategoriesPropertiesController::class, 'index'])->name('admin.categories_properties.index');
        //create
        Route::get('/dashboard/categories_properties/create',[CategoriesPropertiesController::class, 'create'])->name('admin.categories_properties.create');
        //store
        Route::post('/dashboard/categories_properties/create',[CategoriesPropertiesController::class, 'store'])->name('admin.categories_properties.store');
        //edit
        Route::get('/dashboard/categories_properties/edit/{id}',[CategoriesPropertiesController::class, 'edit'])->name('admin.categories_properties.edit');
        //update
        Route::post('/dashboard/categories_properties/update/{id}',[CategoriesPropertiesController::class, 'update'])->name('admin.categories_properties.update');
        //destroy
        Route::get('/dashboard/categories_properties/destroy/{id}',[CategoriesPropertiesController::class, 'destroy'])->name('admin.categories_properties.destroy');

    //recipes

        //index
        Route::get('/dashboard/recipes',[RecipesController::class, 'index'])->name('admin.recipes.index');
        //show
        Route::get('/dashboard/recipes/show',[RecipesController::class, 'show'])->name('admin.recipes.show');
        //create
        Route::get('/dashboard/recipes/create', [RecipesController::class, 'create'])->name('admin.recipes.create');
        //store
        Route::post('/dashboard/recipes/store', [RecipesController::class, 'store'])->name('admin.recipes.store');
        //edit
        Route::get('/dashboard/recipes/edit/{id}', [RecipesController::class, 'edit'])->name('admin.recipes.edit');
        //update
        Route::post('/dashboard/recipes/update/{id}',[RecipesController::class, 'update'])->name('admin.recipes.update');
        //destroy
        Route::get('/dashboard/recipes/destroy/{id}', [RecipesController::class, 'destroy'])->name('admin.recipes.destroy');

    //tips

        //index
        Route::get('/dashboard/tips',[TipsController::class, 'index'])->name('admin.tips.index');
        //create
        Route::get('/dashboard/tips/create', [TipsController::class, 'create'])->name('admin.tips.create');
        //store
        Route::post('/dashboard/tips/create', [TipsController::class, 'store'])->name('admin.tips.store');
        //edit
        Route::get('/dashboard/tips/edit/{id}', [TipsController::class, 'edit'])->name('admin.tips.edit');
        //update
        Route::post('/dashboard/tips/update/{id}',[TipsController::class, 'update'])->name('admin.tips.update');
        //destroy
        Route::get('/dashboard/tips/destroy/{id}', [TipsController::class, 'destroy'])->name('admin.tips.destroy');

    //news

        //index
        Route::get('/dashboard/news',[NewsController::class, 'index'])->name('admin.news.index');
        //show
        //create
        Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('admin.news.create');
        //store
        Route::post('/dashboard/news/store', [NewsController::class, 'store'])->name('admin.news.store');
        //edit
        Route::get('/dashboard/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
        //update
        Route::post('/dashboard/news/update/{id}',[NewsController::class, 'update'])->name('admin.news.update');
        //destroy
        Route::get('/dashboard/dnews/destroy/{id}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    //comment

        //index
        Route::get('/dashboard/comments',[CommentsController::class, 'index'])->name('admin.comments.index');
        //destroy
        Route::get('/dashboard/comments/destroy/{id}',[CommentsController::class, 'destroy'])->name('admin.comments.destroy');

    //user

        //index
        Route::get('/dashboard/users',[UserController::class, 'index'])->name('admin.users.index');
        //destroy
        Route::get('/dashboard/user/destroy/{id}',[UserController::class, 'destroy'])->name('admin.users.destroy');

    //favorite

        //index
        Route::get('/dashboard/favorite',[FavoriteController::class, 'index'])->name('admin.favorite.index');
        //destroy
        Route::get('/dashboard/favorite/destroy/{id}',[FavoriteController::class, 'destroy'])->name('admin.favorite.destroy');

    //feedback

        //index
        Route::get('/dashboard/feedbacks',[FeedbacksController::class, 'index'])->name('admin.feedback.index');
        //destroy
        // Route::get('/dashboard/feedbacks/destroy/{id}',[FeedbacksController::class, 'destroy'])->name('admin.feedbacks.destroy');    

    // coming soon
    Route::get('/dashboard/coming',function(){ return view('admin.page.comming_soon'); })->name('comming_soon_admin');

});



// profile
Route::middleware(['auth', 'permission2'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
