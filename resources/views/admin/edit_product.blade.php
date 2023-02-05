@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            CAP NHAT SAN PHAM
                        </header>
                        <?php 
                            use Illuminate\Support\Facades\Session;
                            $thongbao = Session::get('messeage');
                            if($thongbao){?>
                            <div class="thongbao" style="width: 50%; height: 40px; background-color:limegreen
                            ; display: flex;align-items: center">
                                <p style="padding-left: 8px; color:wheat"><?php echo $thongbao;
                                Session::put('messeage', null);
                                ?><a href="{{URL::to('admin/danh-sach-san-pham')}}">Tro ve danh muc san pham

                                </a></p>
                            </div>
                           <?php }
                        ?>
                        <div class="panel-body">
                            <div class="position-center">
                            @foreach($edit_sp as $key => $update)
                                <form role="form" action="{{URL::to('admin/danh-sach-san-pham/updatesp/'.$update->id_sanpham);}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ten san pham:</label>
                                    
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" value="{{$update->tensanpham}}"> <br>
                                    <label for="exampleInputEmail1">Mo ta ngan:</label> <br>
                                    <textarea name="motangan" class="form-control" cols="80" rows="2">
                                        {{$update->motangan}}
                                    </textarea>
                                    <br>
                                    <label for="exampleInputEmail1" name='dongia'>Don gia (VND)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="dongia" value="<?php echo $update->gia; ?>"> <br>
                                    <label for="exampleInputEmail1">Danh muc san pham:</label>
                                    <select class="form-control input-sm m-bot15" name="danhmuc">
                                        @foreach($danhmuc as $key => $danhmuc)
                                            <option value="{{$danhmuc->id_prod}}">{{$danhmuc->tensp}}</option>
                                        @endforeach
                                </select>
                                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" placeholder="Nhap ten san pham"> -->
                                </div>
                                <?php

                                        // use Illuminate\Support\Facades\Session;

                                        // $messege = Session::get('messege');
                                        // if($messege){
                                        //     echo $messege;
                                        //     Session::put('messege', null);
                                        // }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hinh anh <i style="color: red; font-size: 14px">(khong duoc phep sua)</i></label> <br>
                                    <img style="width: 10%;" src="{{asset('public/uploads/'.$update->hinhanh)}}">
                                    <!-- <label for="exampleInputFile">File input</label>
                                    <input type="file" name="img" value="" id="exampleInputFile"> -->
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>
                               @endforeach             
                        </div>
                    </section>

            </div>

        </div>
@endsection