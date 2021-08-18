<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [RecipeController::class, 'index'])->name('recipes.index');
Route::get('/recipes/{recipe:slug}', [RecipeController::class, 'show'])->name('recipes.show');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
    Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])->name('comments.store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/recipes/create', [RecipeController::class, 'create'])->name('admin.posts.create');
    Route::post('/admin/recipes', [RecipeController::class, 'store'])->name('admin.posts.store');
});


/*
Route::get('/categories/{category:slug}', function (Category $category) {
    return view('recipes.index', [
        'recipes' => $category->recipes,
        'currentCategory' => $category,
        'categories' => Category::all(),
        'difficulties' => Difficulty::all(),
    ]);
});

Route::get('/difficulties/{difficulty:slug}', function (Difficulty $difficulty) {
    return view('recipes.index', [
        'recipes' => $difficulty->recipes,
        'categories' => Category::all(),
        'currentDifficulty' => $difficulty,
        'difficulties' => Difficulty::all()
    ]);
});
*/