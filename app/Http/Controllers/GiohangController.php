<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\AssignOp\Concat;
use PhpParser\Node\Expr\Cast\String_;

class GiohangController extends Controller
{
    //
    public function them_giohang(Request $request){
        $data = array();
        $data['soluong'] = $request->soluong;
        $data['id'] = $request->id;
        $data['ma_sp'] = 'masp';
        $tensp = DB::table('tbl_sanpham')->select('tensanpham')->where('id_sanpham',$data['id'])->get();
        $sp = DB::table('giohang')->get();
        DB::insert('insert into giohang (TENSP,DONGIA, SOLUONG) values (?, ?, ?)', [$tensp, '22.000','2']);
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        return view('page.giohang.giohang')->with('giohang', $sp)->with('danhmuc', $danhmucsanpham);
        // // request->id;
        // return $data['ma_sp'];
    }

    // Chi tiet gio hang
    public function giohang(){
        $sp = DB::table('giohang')->get();
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        return view('page.giohang.giohang')->with('giohang', $sp)->with('danhmuc', $danhmucsanpham);
    }

    // Khach hang xoa san pham trong gio hang
    public function delete_spGH($id){
        DB:: delete( 'delete from giohang where id = ?' ,[$id ]);
        return Redirect::to('gio-hang');
    }
}
