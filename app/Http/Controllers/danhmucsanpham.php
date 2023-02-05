<?php

namespace App\Http\Controllers;

use App\Models\danhmuc;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class danhmucsanpham extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('id_admin');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function add_product(){
        $this->AuthLogin();
        return view('admin.add_danhmuc');
    }
    public function list_product(){
        $this->AuthLogin();
        $all_listproduct = danhmuc::orderBy('id_prod','DESC')->get();
        // $all_listproduct = DB::table('tbl_product')->get();
        $manager_listproduct = view('admin.list_danhmuc')->with('list_prod', $all_listproduct);
        return view('admin_layout')->with('admin.list_danhmuc', $manager_listproduct);
    }

    public function save_product(Request $request){
        $this->AuthLogin();
        // $data = array();
        // $date = date('Y-m-d');
        // $data['tensp'] = $request->name_product;
        // $data['mota_sp'] = $request->descript_danhmuc;
        // $data['status'] = $request->status;
        // $data[$date] = $request->created_at	;
        // DB::table('tbl_product')->insert($data);
        $data = $request->all();
        $danhmuc = new danhmuc();
        $danhmuc->tensp = $data['name_product'];
        $danhmuc->mota_sp = $data['descript_danhmuc'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
        Session::put('messeg', 'THem danh muc thanh cong');
        return Redirect::to('admin/add-product');

    } 

    public function unactive_prod($id){
        $this->AuthLogin();
        $data = DB::table('tbl_product')
        ->Where('id_prod', $id)
        ->update(['status' => 1]);
    return Redirect::to('admin/list-product');
    }

    public function active_prod($id){
        $this->AuthLogin();
         $data = DB::table('tbl_product')
            ->Where('id_prod', $id)
            ->update(['status' => 0]);
        return Redirect::to('admin/list-product');
    }

    public function xem_chi_tiet($id){
        $this->AuthLogin();
        return view('admin.xemchitiet');
}
    public function update_danhmuc($id){
        $this->AuthLogin();
        // $data = DB::table('tbl_product')->where('id_prod', $id)->get();
        // $danhmuc = new danhmuc();
        $editdanhmuc = danhmuc::find($id);
        $quanlydanhmuc = view('admin.edit_danhmuc')->with('update_danhmuc',$editdanhmuc);
        return view('admin_layout')->with('admin.edit_danhmuc', $quanlydanhmuc);
    }

    public function delete_danhmuc($id){
        $this->AuthLogin();
        $danhmuc = danhmuc::find($id);
        $danhmuc->delete();
        // DB::table('tbl_product')
        // ->where('id_prod', $id)->delete();
        return Redirect::to('admin/list-product');
    }

    public function edit_postdanhmuc(Request $request, $id){
        $this->AuthLogin();
        $data = $request->all();
        // $data = array();
        // $data['tensp'] = $request->name_product;
        // $data['mota_sp'] = $request->descript_danhmuc;
        // $data['status'] = $request->status;
        // DB::table('tbl_product')
        // ->where('id_prod', $id)
        // ->update($data);
        $danhmuc = danhmuc::find($id);
        $danhmuc->tensp = $data['name_product'];
        $danhmuc->mota_sp = $data['descript_danhmuc'];
        $danhmuc->status = $data['status'];
        $danhmuc->save();
        Session::put('messeg', 'Update thanh cong');
        return Redirect::to('admin/list-product');
    }
}