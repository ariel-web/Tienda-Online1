<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;


Route::prefix('/admin')->group(function (){
    Route::GET('/', [DashboardController::class, 'getDashboard']);
    Route::GET('/users', [UserController::class, 'getUsers']);
    Route::GET('/user/{id}/remove',[UserController::class,'getUsersDelete']);

    //***** MODULO PRODUCTOS ****/
    Route::GET('/products',[ProductController::class, 'getHome']);
    Route::GET('/product/add',[ProductController::class,'getProductAdd']);
    Route::POST('/product/add',[ProductController::class,'postProductAdd']);
    Route::GET('/product/{id}/edit',[ProductController::class,'getProductEdit']);
    Route::POST('/product/{id}/edit',[ProductController::class,'postProductEdit']);
    Route::GET('/product/{id}/remove',[ProductController::class,'getProductDelete']);
            
    //*****  CATEGORIAS *******/
    Route::GET('/categories/{module}',[CategoriesController::class, 'getHome']);
    Route::POST('/category/add',[CategoriesController::class,'postCategoryAdd']);  
    Route::GET('/category/{id}/edit',[CategoriesController::class,'getCategoryEdit']);
    Route::POST('/category/{id}/edit',[CategoriesController::class,'postCategoryEdit']);
    Route::GET('/category/{id}/remove',[CategoriesController::class,'getProductDelete']);


    //****** CONTACTO CON EL DESARROLLADOR *************/
    Route::GET('contact',[ContactController::class, 'getHome']);
    // Route::GET('/','DashboardController@getDashboard');    
    
    //**********  IMAGENES PARA EL SLIDER DEL SISTEMA ***********/
    Route::GET('/slider',[SliderController::class,'getSlider']);
    Route::POST('/slider/add',[SliderController::class,'postSliderAdd']);
});

//use Illuminate\Support\Facades\Route;
