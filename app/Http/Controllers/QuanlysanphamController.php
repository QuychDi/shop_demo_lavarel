<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
                use Illuminate\Http\Request;
                use Illuminate\Support\Facades\DB;
                use Illuminate\Support\Facades\Redirect;
                use Illuminate\Support\Facades\Session;

class QuanlysanphamController extends Controller
{
    //

    public function AuthLogin(){
        $admin_id = Session::get('id_admin');
        if($admin_id){
            return Redirect::to('admin.dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function showthemsanpham(){
        $this->AuthLogin();
        $ds = DB::table('tbl_product')->get();
        $manager_sp = view('admin.them_sanpham')->with('list_sp', $ds);
        return view('admin_layout')->with('admin.them_sanpham', $manager_sp);
    }
    
    public function danhsach_sp(){
        $this->AuthLogin();
       
    }

    public function add_sanpham(Request $request){
        // this->validate($request, [
        //     'img' => 'riquired'
        // ] ,[]);
        $this->AuthLogin();
        if($request->hasFile('img')){
                $file = $request->file('img');
                $name_file = $file->getClientOriginalName('img');
                $extension = $file->getClientOriginalExtension('img');
                // dd($name_file);
                // $data = array();
                // $data['tensan'] = $request->tensp;
                // $data['file']= $file;
                // $data['name_file'] = $name_file;
                // dd($data);
                if(strcasecmp($extension,'jpg') === 0 ||  strcasecmp($extension, 'png') === 0 ||  strcasecmp($extension, 'jepg') === 0 ){
                   $file->move('public/uploads/', $name_file);
                   $data = array();
                   $data['tensanpham']= $request->tensp;
                   $data['id_danhmuc']= $request->danhmuc;
                   $data['motangan'] = $request->motangan;
                   $data['gia'] = $request->dongia;
                   $data['hinhanh'] = $name_file;
                   DB::table('tbl_sanpham')->insert($data);
                   Session::put('messege','Them thanh cong');
                   return redirect()->route('/');
                }else{
                    Session::put('messege','file anh khong hop le');
                    return redirect()->route('/');
                }
        }else{
            // echo 'loi';
           Session::put('messege', 'Vui long chon file');
           return redirect()->route('/');
        }
    }
    public function list_sp(){
        $this->AuthLogin();
        $all_listproduct = DB::table('tbl_product')->get();
        $ds = DB::table('tbl_sanpham')
        ->join('tbl_product', 'tbl_product.id_prod','=','tbl_sanpham.id_danhmuc')->get();
        $manager_sp = view('admin.danhsach_sp')->with('list_sp', $ds)->with('danhmucsp', $all_listproduct);
        return view('admin_layout')->with('admin.danhsach_sp', $manager_sp);
    }

    public function delete_sanpham($id){
        $this->AuthLogin();
        // return $id;
        DB::delete('delete from tbl_sanpham where id_sanpham =?', [$id]);
        return redirect()->route('danh-sach-san-pham');
        
    }
// sua san pham
    public function edit_sp($id){
        $this->AuthLogin();
        $danhmucsp = DB::table('tbl_product')->orderBy('id_prod', 'desc')->get();
        $edit_sanpham = DB::table('tbl_sanpham')->where('id_sanpham', $id)->get();
        $quanlysp = view('admin.edit_product')->with('edit_sp',$edit_sanpham)->with('danhmuc', $danhmucsp);
        return view('admin_layout')->with('admin.edit_product', $quanlysp);
    }
//
public function post_editsp(Request $request, $id){
    $this->AuthLogin();
    $data =array(); 
    $data['tensanpham'] = $request->tensp;
    $data['id_danhmuc'] = $request->danhmuc;
    $data['motangan'] = $request->motangan;
    $data['gia'] = $request->dongia;
    if( isset($data['tensanpham']) && isset($data['motangan']) && isset($data['gia'])){
        DB::table('tbl_sanpham')
        ->where('id_sanpham', $id)
        ->update($data);
        Session::put('messeage', 'Cập nhật thành công');
        return Redirect::to('admin/danh-sach-san-pham/edit/'.$id);
    }else{
        Session::put('messeage', 'Cập nhật khong thành công');
        return Redirect::to('admin/danh-sach-san-pham/edit/'.$id);
    }
} // End Admin Quan Ly San Pham

// Xem chi tiet san pham
    public function chitietsp($id){
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        $ds_spdanhmuc = DB::table('tbl_sanpham')
        ->join('tbl_product', 'tbl_product.id_prod','=','tbl_sanpham.id_danhmuc')
        ->where('tbl_product.status', '0')
        ->where('tbl_sanpham.id_sanpham', $id) 
        ->get();
        return view('page.sanpham.chitietsp')->with('danhmuc',$danhmucsanpham)->with('chitiet_sp', $ds_spdanhmuc);
        // return Redirect::to('page.sanpham.chitietsp');
        // return Redirect::to('page.sanpham.chitietsp');
    }

  
}   