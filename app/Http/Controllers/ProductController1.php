<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LDAP\Result;

class ProductController extends Controller
{
    // public protected private default
    public function showProduct(){
        
        $data = [
            [
                'id' => '1',
                'name' => 'iphone',
            ],
            [
                'id' => '2',
                'name' => 'iphoneeeee',  
            ]
        ];
        // return view('list-product')->with([
        //     'listProduct' => $data
        // ]);
        return view('list-product',compact('data'));
    }
    public function getProduct($id,$name=''){
        echo $id,$name;
    }
    public function updateProduct(Request $request){
        echo $request -> id;
        echo $request -> name;
    }
    public function queryBuilder()
    {
        // #1. cach lay toan bo user
        // $result = DB::table('users')->get();
        /*------------------------------------------------------------------------------------*/

        // #2. cach lay user co id=4
        // $result = DB::table('users')->where('id', '=', '4')->first();
        // $result = DB::table('users')->find('4');
        /*------------------------------------------------------------------------------------*/

         // #3. Lấy thuộc tính 'name' của user có id = 16
        // $result = DB::table('users')->where('id', '=','16')->value('name');
        /*------------------------------------------------------------------------------------*/

        // #4. Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi', 'like', 'Ban giám hiệu')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->pluck('id');
        /*------------------------------------------------------------------------------------*/

        // #5. Tìm user có độ tuổi lớn nhất trong công ty 
        // $result = DB::table('users')
        //     ->where('tuoi', DB::table('users')->max('tuoi'))
        //     ->get();
        /*------------------------------------------------------------------------------------*/

        // #6. Tìm user có độ tuổi nho nhất trong công ty
        // $result = DB::table('users')
        //     ->where('tuoi', DB::table('users')->min('tuoi'))
        //     ->get();
        /*------------------------------------------------------------------------------------*/

        #7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user
        // $idPhongBan = DB::table('phongban')
        //     ->where('ten_donvi', 'like', 'Ban giám hiệu')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idPhongBan)
        //     ->count();
        /*------------------------------------------------------------------------------------*/

        // #8. Lấy danh sách tuổi các user 
        // $result = DB::table('users')->distinct()->pluck('tuoi');
        /*------------------------------------------------------------------------------------*/

        // # 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table('users')
        //     ->where('name', 'like', '%Khải')
        //     ->orWhere('name', 'like', '%Khanh')
        //     ->get();
        /*------------------------------------------------------------------------------------*/

        // #10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idBanDaoTao = DB::table('phongban')
        //     ->where('ten_donvi', 'like', 'Ban đào tạo')
        //     ->value('id');
        // $result = DB::table('users')
        //     ->where('phongban_id', $idBanDaoTao)
        //     ->select('id', 'name', 'email')
        //     ->get();
        /*------------------------------------------------------------------------------------*/

        // #11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table('users')
        //     ->where('tuoi', '>=', '30')
        //     ->orderBy('tuoi', 'asc')
        //     ->select('name', 'tuoi')
        //     ->get();
        /*------------------------------------------------------------------------------------*/

        // #12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table('users')
        //     ->orderBy('tuoi', 'DESC')
        //     ->offset(5)->limit(10)
        //     ->select('name', 'tuoi')
        //     ->get();
        // dd($result);
        /*------------------------------------------------------------------------------------*/

        #13. Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Trần Việt Annnn123',
        //     'email' => 'antvph31177@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '30',
        //     'tuoi' => '23',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now()
        // ];
        // $idNewUser = DB::table('users')->insertGetId($data);
        // $result = DB::table('users')->find($idNewUser);
        /*------------------------------------------------------------------------------------*/

        #14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo'
        $phongban = DB::table('phongban')
            ->where('ten_donvi', 'like', 'Ban đào tạo')
            ->value('id');

        # Cập nhật tên của các user thuộc phòng ban "Ban đào tạo"
        $users = DB::table('users')
            ->where('phongban_id', $phongban)
            ->get();

        // foreach ($users as $user) {
        //     DB::table('users')
        //         ->where('id', $user->id)
        //         ->update(['name' => $user->name . ' PDT']);
        // }

        //update lại tên cũ
        foreach ($users as $user) {
            $newName = str_replace(' PDT', '', $user->name);
            DB::table('users')
                ->where('id', $user->id)
                ->update(['name' => $newName]);
        }
        
        /*------------------------------------------------------------------------------------*/

        #15. Xóa user nghỉ quá 15 ngày
        // $result = DB::table('users')
        //     ->where('id', '=', '2480')
        //     ->delete();


        // dd($users);
    }
}
