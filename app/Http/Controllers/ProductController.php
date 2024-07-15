<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function listProduct(){
        $data = DB::table('product1')
        ->join('category', 'product1.category_id','=', 'category.id')
        ->select('product1.id','product1.name', 'product1.price', 'product1.view', 'category.name_cate','category.id as idCate',)
        ->orderBy('product1.view', 'desc')
        ->get();
        return view('products/list-products')->with([
            'product1' => $data
        ]);
    }

    public function addProduct(){
        $category = DB::table('category')->select('id','name_cate')->get();
        return view('products/add-products')->with(['category' => $category]);
    }

    public function addPostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'category_id' => $req->category,
            'create_at'  => Carbon::now(),
            'update_at'  => Carbon::now(),
        ];
        DB::table('product1')->insert($data);
        return redirect()->route('products.listProduct');
    }
    public function deleteProduct($idPro){
        DB::table('product1')->where('id',$idPro)->delete();
        return redirect()->route('products.listProduct');
    }

    public function updateProduct($idPro){
        $category = DB::table('category')->select('id','name_cate')->get();
        $product1 = DB::table('product1')->where('id',$idPro)->first();
        return view('products/update-products')->with([
            'category' => $category,
            'product1' => $product1
        ]);
    }

    public function updatePostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'category_id' => $req->category,
            'update_at'  => Carbon::now(),
        ];

        DB::table('product1')->where('id', $req->idPro)->update($data);
        return redirect()->route('products.listProduct');
    }
    public function test(){
        return view('admin.products.list-product');
    }
}
