<?php

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
//frontend route
Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('frontend.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::prefix('backend/tag')->name('backend.tag.')->group(function(){



// tag
Route:: get('/trash',[\App\Http\Controllers\backend\TagController::class,'trash'])->name('trash');
Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\TagController::class,'restore'])->name('restore');
Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\TagController::class,'permanentDelete'])->name('force_delete');
Route::get('/create',[\App\Http\Controllers\Backend\TagController::class,'create'])->name('create');
Route:: post('',[\App\Http\Controllers\Backend\TagController::class,'store'])->name('store');
Route::get('',[\App\Http\Controllers\Backend\TagController::class,'index'])->name('index');
Route:: get('/{id}',[\App\Http\Controllers\backend\TagController::class,'show'])->name('show');
Route:: delete('/{id}',[\App\Http\Controllers\backend\TagController::class,'destroy'])->name('destroy');
//route to edit data
Route:: get('/{id}/edit',[\App\Http\Controllers\backend\TagController::class,'edit'])->name('edit');
//route to update data
Route:: put('/{id}',[\App\Http\Controllers\backend\TagController::class,'update'])->name('update');
});
Route::post('category/get_subcategory',[\App\Http\Controllers\backend\CategoryController::class,'getSubcategory'])->name('backend.category.get_subcategory');

Route::prefix('backend/category')->name('backend.category.')->group(function(){
// Category
Route:: get('/trash',[\App\Http\Controllers\backend\CategoryController::class,'trash'])->name('trash');
Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\CategoryController::class,'restore'])->name('restore');
Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\CategoryController::class,'permanentDelete'])->name('force_delete');
Route::get('/create',[\App\Http\Controllers\Backend\CategoryController::class,'create'])->name('create');
Route:: post('',[\App\Http\Controllers\Backend\CategoryController::class,'store'])->name('store');
Route::get('',[\App\Http\Controllers\Backend\CategoryController::class,'index'])->name('index');
Route:: get('/{id}',[\App\Http\Controllers\backend\CategoryController::class,'show'])->name('show');
Route:: delete('/{id}',[\App\Http\Controllers\backend\CategoryController::class,'destroy'])->name('destroy');
//route to edit data
Route:: get('/{id}/edit',[\App\Http\Controllers\backend\CategoryController::class,'edit'])->name('edit');
//route to update data
Route:: put('/{id}',[\App\Http\Controllers\backend\CategoryController::class,'update'])->name('update');
});
Route::prefix('backend/brand')->name('backend.brand.')->group(function(){

//brand
Route:: get('/trash',[\App\Http\Controllers\backend\BrandController::class,'trash'])->name('trash');
Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\BrandController::class,'restore'])->name('restore');
Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\BrandController::class,'permanentDelete'])->name('force_delete');

Route::get('/create',[\App\Http\Controllers\Backend\BrandController::class,'create'])->name('create');
Route:: post('',[\App\Http\Controllers\Backend\BrandController::class,'store'])->name('store');
Route::get('',[\App\Http\Controllers\Backend\BrandController::class,'index'])->name('index');
Route:: get('/{id}',[\App\Http\Controllers\backend\BrandController::class,'show'])->name('show');
Route:: delete('/{id}',[\App\Http\Controllers\backend\BrandController::class,'destroy'])->name('destroy');
//route to edit data
Route:: get('/{id}/edit',[\App\Http\Controllers\backend\BrandController::class,'edit'])->name('edit');
//route to update data
Route:: put('/{id}',[\App\Http\Controllers\backend\BrandController::class,'update'])->name('update');
});


//Sub Category

Route::prefix('backend/subcategory')->name('backend.subcategory.')->group(function(){
    Route:: get('/trash',[\App\Http\Controllers\backend\SubcategoryController::class,'trash'])->name('trash');
    Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\SubcategoryController::class,'restore'])->name('restore');
    Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'permanentDelete'])->name('force_delete');
    Route::get('/create',[\App\Http\Controllers\Backend\SubcategoryController::class,'create'])->name('create');
    Route:: post('',[\App\Http\Controllers\Backend\SubcategoryController::class,'store'])->name('store');
    Route::get('',[\App\Http\Controllers\Backend\SubcategoryController::class,'index'])->name('index');
    Route:: get('/{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'show'])->name('show');
    Route:: delete('/{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'destroy'])->name('destroy');
    //route to edit data
    Route:: get('/{id}/edit',[\App\Http\Controllers\backend\SubcategoryController::class,'edit'])->name('edit');
    //route to update data
    Route:: put('ag/{id}',[\App\Http\Controllers\backend\SubcategoryController::class,'update'])->name('update');
    });


//options
Route::prefix('backend/option')->name('backend.option.')->group(function(){
Route:: get('/trash',[\App\Http\Controllers\backend\OptionController::class,'trash'])->name('trash');
Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\OptionController::class,'restore'])->name('restore');
Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\OptionController::class,'permanentDelete'])->name('force_delete');
Route::get('/create',[\App\Http\Controllers\Backend\OptionController::class,'create'])->name('create');
Route:: post('',[\App\Http\Controllers\Backend\OptionController::class,'store'])->name('store');
Route::get('',[\App\Http\Controllers\Backend\OptionController::class,'index'])->name('index');
Route:: get('/{id}',[\App\Http\Controllers\backend\OptionController::class,'show'])->name('show');
Route:: delete('/{id}',[\App\Http\Controllers\backend\OptionController::class,'destroy'])->name('destroy');
//route to edit data
Route:: get('/{id}/edit',[\App\Http\Controllers\backend\OptionController::class,'edit'])->name('edit');
//route to update data
Route:: put('/{id}',[\App\Http\Controllers\backend\OptionController::class,'update'])->name('update');
});

Route::prefix('backend/product')->name('backend.product.')->group(function(){ 
    //brand
    Route:: get('/trash',[\App\Http\Controllers\backend\ProductController::class,'trash'])->name('trash');
    Route:: post('/restore/{id} ',[\App\Http\Controllers\backend\ProductController::class,'restore'])->name('restore');
    Route:: delete ('/force_delete/{id}',[\App\Http\Controllers\backend\ProductController::class,'permanentDelete'])->name('force_delete'); 
    Route::get('/create',[\App\Http\Controllers\Backend\ProductController::class,'create'])->name('create');
    Route:: post('',[\App\Http\Controllers\Backend\ProductController::class,'store'])->name('store');
    Route::get('',[\App\Http\Controllers\Backend\ProductController::class,'index'])->name('index');
    Route:: get('/{id}',[\App\Http\Controllers\backend\ProductController::class,'show'])->name('show');
    Route:: delete('/{id}',[\App\Http\Controllers\backend\ProductController::class,'destroy'])->name('destroy');
    //route to edit data
    Route:: get('/{id}/edit',[\App\Http\Controllers\backend\ProductController::class,'edit'])->name('edit');
    //route to update data
    Route:: put('/{id}',[\App\Http\Controllers\backend\ProductController::class,'update'])->name('update');
    });
