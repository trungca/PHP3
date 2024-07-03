<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SinhVienController;
//Base url : http://127.0.0.1:8000

Route::get('test', function(){
    echo '123';
});
Route::get('/', function(){
    echo 'trang chu';
});

Route::get('list-products', [ProductController::class, 'showProduct']);

//truyền dữ liệu từ route sang controller
//slug
//http://127.0.0.1:8000/get-products/3/iphone
Route::get('get-products/{id}/{name?}', [ProductController::class, 'getProduct']);

//params
//http://127.0.0.1:8000/update-products/?id=3&name=iphone
Route::get('update-products', [ProductController::class, 'updateProduct']);

//http://127.0.0.1:8000/thongtinsv
Route::get('thongtinsv', [SinhVienController::class, 'showSv']);

Route::get('queryBuilder', [ProductController::class, 'queryBuilder']);