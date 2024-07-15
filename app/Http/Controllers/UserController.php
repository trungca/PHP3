<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function listUsers(){
        $data = DB::table('users')
        ->join('phongban', 'users.phongban_id', '=', 'phongban.id')
        ->select('users.name','users.email','phongban.ten_donvi','users.id','phongban.id as idPhongBan')
        ->get();
        return view('users/list-users')->with([
            'listUsers' => $data
        ]);
    }
    public function addUsers(){
        $phongBan = DB::table('phongban')->select('id','ten_donvi')->get();
        return view('users/add-users')->with(['phongban' => $phongBan]);
    }
    public function addPostUsers(Request $req){
        $data=[
            'name' => $req->name,
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),

        ];
        DB::table('users')->insert($data);

        return redirect()->route('users.listUsers');
    }
    public function deleteUsers($idUser){
        DB::table('users')->where('id', $idUser)->delete();
        return redirect()->route('users.listUsers');
    }
    public function updateUsers($idUser){
        $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
        $user= DB::table('users')->where('id', $idUser)->first();//first lay ban ghi dau tien
        return view('users/update-users')->with(
            ['user' => $user,
            'phongban' => $phongban
            ]
        );
    } 
    public function updatePostUsers(Request $req){
        $data=[
            'name' => $req->name,
            'email' => $req->email,
            'phongban_id' => $req->phongban,
            'tuoi' => $req->tuoi,
            'songaynghi' => $req->ngaynghi,
            'updated_at'  => Carbon::now(),

        ];
        DB::table('users')->where('id', $req->idUser)->update($data);
        return redirect()->route('users.listUsers');
    }
}
