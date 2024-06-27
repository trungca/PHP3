<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhVienController extends Controller
{
    public function showSv(){
        $data = [     
                'hoten' => 'quang trung',
                'tuoi' => '18',
                'diachi' => 'hanoi'
        ];
        return view('thong-tin-sv',compact('data'));
    }
}
