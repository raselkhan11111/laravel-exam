<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });







//http verbs: get, post, put/patch, delete

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__ . '/auth.php';


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });
Route::middleware('auth')->group(function () {


    Route::get('/home', function () {
        return view('home');
    });


    Route::prefix('admin')->group(function () {

        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/categories-trash', [CategoryController::class, 'trash'])->name('trash');
            Route::get('/{id}/restore', [CategoryController::class, 'restore'])->name('restore');
            Route::delete('/{id}/delete', [CategoryController::class, 'delete'])->name('delete');

            Route::get('/pdf', [CategoryController::class, 'downloadPdf'])->name('pdf');
        });
        Route::resource('categories', CategoryController::class);
        Route::prefix('students')->name('students.')->group(function () {
            Route::get('/', [StudentController::class, 'index'])->name('index');
            Route::get('/create', [StudentController::class, 'create'])->name('create');
            Route::post('/', [StudentController::class, 'store'])->name('store');

            Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
            Route::put('/{id}', [StudentController::class, 'update'])->name('update');

            Route::get('/{id}', [StudentController::class, 'show'])->name('show');


            Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
        });


        Route::prefix('Courses')->name('Courses.')->group(function () {
            // Route::get('/', [CourseController::class, 'index'])->name('index');
            // Route::get('/create', [CourseController::class, 'create'])->name('create');
            Route::get('/course-trash', [CourseController::class, 'trash'])->name('trash');
            // Route::post('/', [CourseController::class, 'store'])->name('store');

            // Route::get('/{id}/edit', [CourseController::class, 'edit'])->name('edit');
            // Route::put('/{id}', [CourseController::class, 'update'])->name('update');
            // Route::put('/', [CourseController::class, 'update'])->name('update');

            // Route::get('/{id}', [CourseController::class, 'show'])->name('show');


            // Route::delete('/{id}', [CourseController::class, 'destroy'])->name('destroy');
            Route::patch('/course-trash/{id}/restore', [CourseController::class, 'restore'])->name('restore');
            Route::delete('/course-trash/{id}/delete', [CourseController::class, 'delete'])->name('delete');
            Route::get('/pdf', [CourseController::class, 'downloadPdf'])->name('pdf');
            Route::get('/export', [CourseController::class, 'exportXl'])->name('export');
        });
        Route::resource('Courses', CourseController::class);


        Route::prefix('Products')->name('Products.')->group(function () {



            Route::get('/product-trash', [ProductController::class, 'trash'])->name('trash');
            Route::patch('/product-trash/{id}/restore', [ProductController::class, 'restore'])->name('restore');
            Route::delete('/product-trash/{id}/delete', [ProductController::class, 'delete'])->name('delete');

            Route::get('/pdf', [ProductController::class, 'downloadPdf'])->name('pdf');
            Route::get('/export', [ProductController::class, 'exportXl'])->name('export');
            // Route::get('/', [ProductController::class, 'index'])->name('index');
            // Route::get('/create', [ProductController::class, 'create'])->name('create');
            // Route::post('/', [ProductController::class, 'store'])->name('store');

            // Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            // // Route::put('/{id}', [ProductController::class, 'update'])->name('update');
            // Route::put('/{id}', [ProductController::class, 'update'])->name('update');

            // Route::get('/{id}', [ProductController::class, 'show'])->name('show');


            // Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
        });
        Route::resource('Products', ProductController::class);

        Route::prefix('Brands')->name('Brands.')->group(function () {



            Route::get('/Brands-trash', [BrandController::class, 'trash'])->name('trash');
            Route::patch('/Brands-trash/{id}/restore', [BrandController::class, 'restore'])->name('restore');
            Route::delete('/Brands-trash/{id}/delete', [BrandController::class, 'delete'])->name('delete');

            Route::get('/pdf', [BrandController::class, 'downloadPdf'])->name('pdf');
            Route::get('/export', [BrandController::class, 'exportXl'])->name('export');
        });
        Route::resource('Brands', BrandController::class);


        Route::prefix('Colors')->name('Colors.')->group(function () {



            Route::get('/Colors-trash', [ColorController::class, 'trash'])->name('trash');
            Route::patch('/Colors-trash/{id}/restore', [ColorController::class, 'restore'])->name('restore');
            Route::delete('/Colors-trash/{id}/delete', [ColorController::class, 'delete'])->name('delete');

            Route::get('/pdf', [ColorController::class, 'downloadPdf'])->name('pdf');
            Route::get('/export', [ColorController::class, 'exportXl'])->name('export');
        });
        Route::resource('Colors', ColorController::class);


        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/{user}', [UserController::class, 'show'])->name('show');
            Route::get('/{user}/change-role', [UserController::class, 'changeRole'])->name('change_role');
            Route::patch('/{user}/change-role', [UserController::class, 'updateRole'])->name('update_role');
        });
    });
});


// Route::get('/home', function () {
//     return view('home');
// });

// Route::prefix('admin')->group(function () {

//     Route::prefix('users')->name('users.')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('index');

//         // Route::get('/{id}', function ($userId) {
//         //     dd('showing---->' . $userId);
//         // })->name('show');

//         Route::get('/{id}', [UserController::class, 'show'])->name('show');
//     });
// });





// Route::get('/profile', function () {
//     return view('users.profile');
// });

// Route::get('/home', function () {
//     return view('home');
// });

// Route::redirect('/here', '/users');

Route::fallback(function () {
    dd('Tomar chaoa puron korte parbona.....');
});
