<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SinhVienController;
use App\Http\Controllers\UserController;


//Base url : http://127.0.0.1:8000

Route::get('test', function(){
    echo '123';
});
Route::get('/', function(){
    echo 'trang chu';
});

// Route::get('list-products', [ProductController::class, 'showProduct']);

// //truyền dữ liệu từ route sang controller
// //slug
// //http://127.0.0.1:8000/get-products/3/iphone
// Route::get('get-products/{id}/{name?}', [ProductController::class, 'getProduct']);

// //params
// //http://127.0.0.1:8000/update-products/?id=3&name=iphone
// Route::get('update-products', [ProductController::class, 'updateProduct']);

// //http://127.0.0.1:8000/thongtinsv
// Route::get('thongtinsv', [SinhVienController::class, 'showSv']);

// Route::get('queryBuilder', [ProductController::class, 'queryBuilder']);

//CRUD
//http://127.0.0.1:8000/users/list-users
//http://127.0.0.1:8000/users/add-users
//http://127.0.0.1:8000/users/update-users
//http://127.0.0.1:8000/users/delete-users

Route::group(['prefix'=>'users','as'=>'users.'], function(){
    Route::get('list-users',[UserController::class ,'listUsers'])->name('listUsers');

    Route::get('add-users',[UserController::class ,'addUsers'])->name('addUsers');
    Route::post('add-users',[UserController::class ,'addPostUsers'])->name('addPostUsers');

    Route::get('update-users/{idUser}',[UserController::class ,'updateUsers'])->name('updateUsers');
    Route::post('update-users',[UserController::class ,'updatePostUsers'])->name('updatePostUsers');

    Route::get('delete-users/[{idUser}]',[UserController::class ,'deleteUsers'])->name('deleteUsers');
});
// http://127.0.0.1:8000/products/list-products
Route::group(['prefix'=>'products','as'=>'products.'], function(){
    Route::get('list-products',[ProductController::class,'listProduct'])->name('listProduct');

    Route::get('add-products',[ProductController::class,'addProduct'])->name('addProduct');
    Route::post('add-post-products',[ProductController::class,'addPostProduct'])->name('addPostProduct');

    Route::get('delete-products/{idPro}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

    Route::get('update-products/{idPro}',[ProductController::class,'updateProduct'])->name('updateProduct');
    Route::post('update-post-products',[ProductController::class,'updatePostProduct'])->name('updatePostProduct');

});

Route::get('test',function(){
    return view('admin.products.list-products');
});

