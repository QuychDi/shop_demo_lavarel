<?php

namespace App\Http\Controllers;

use App\Models\login;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    // SEN EMAIL
    public function sendEmail(){
        $to_name = 'Cua hang dien tu Quych Di';
        $to_email = 'quychdi113@gmail.com';

        $data = array("name"=>"Mail tu khach hang","body"=>'Chao ban toi la chu tri');

        Mail::send('page.send_mail', $data.function($messeg) use ($to_name, $to_email){
            $messeg->to($to_email)->subject('test thu gui mail');
            $messeg->from($to_email,$to_name);
        });

        return redirect('/')->with('messeg','');
    }
    public function index(){
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        $ds = DB::table('tbl_sanpham')->get();
        // ->join('tbl_product', 'tbl_product.id_prod','=','tbl_sanpham.id_danhmuc')
        // ->where('tbl_product.status', '0') 
        // ->get();
        return view('page/main')->with('danhmuc', $danhmucsanpham)->with('all_sp', $ds);
    }

    // tim kiem san pham
    public function timkiem(Request $request){
       
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        $timkiem = DB::table('tbl_sanpham')->where('tensanpham','like','%'.$request->texttimkiem.'%')->count();
        $kq_timkiem = DB::table('tbl_sanpham')->where('tensanpham','like','%'.$request->texttimkiem.'%')->get();
        // $count = mysql_num_rows($timkiem);
        if($timkiem > 0){
            return view('page.timkiem.timkiem')->with('danhmuc',$danhmucsanpham)->with('timkiem', $kq_timkiem);
        }else{
            Session::put('thongbao','Sản phẩm "'.$request->texttimkiem.'" không tồn tại');
             return view('page.timkiem.timkiem')->with('danhmuc',$danhmucsanpham)->with('timkiem', $kq_timkiem);
            // return Redirect::to('tim-kiem');
            // return view('page.timkiem.timkiem')->with('danhmuc',$danhmucsanpham)->with('timkiem', $kq_timkiem);
        }
        // if($timkiem > 0){
        //     return "ton kh";
        // }else{
        //     return "khong";
        // }
        // Session::put('')
        // return view('page.timkiem.timkiem')->with('danhmuc',$danhmucsanpham)->with('timkiem', $timkiem);
    }

    public function spdanhmuc($id){
        $danhmucsanpham = DB::table('tbl_product')->where('status','0')->orderBy('id_prod','desc')->get();
        $ds_spdanhmuc = DB::table('tbl_sanpham')
        ->join('tbl_product', 'tbl_product.id_prod','=','tbl_sanpham.id_danhmuc')
        ->where('tbl_product.status', '0')
        ->where('tbl_sanpham.id_danhmuc', $id) 
        ->get();
        return view('page.spdanhmuc')->with('danhmuc', $danhmucsanpham)->with('sanpham', $ds_spdanhmuc);
    }
    // SAN PHAM
    public function listItems(){
        $data = login::all();
        return view('page/sanpham', compact('data'));
    }

}