@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Basic Forms
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{ route('add_san_pham'); }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ten san pham:</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" placeholder="Nhap ten san pham"> <br>
                                    <label for="exampleInputEmail1">Mo ta ngan:</label> <br>
                                    <textarea style="resize: none" name="motangan" class="form-control" rows="2" id="ckeditor1"></textarea>
                                    <br>
                                    <label for="exampleInputEmail1" name='dongia'>Don gia</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="dongia" placeholder="Nhap ten san pham"> <br>
                                    <label for="exampleInputEmail1">Danh muc san pham:</label>
                                    <select class="form-control input-sm m-bot15" name="danhmuc">
                                    @foreach($list_sp as $key => $list_sp)
                                    <option value="<?php echo $list_sp->id_prod; ?>">{{$list_sp->tensp}}</option>
                                    @endforeach
                                </select>
                                    <!-- <input type="text" class="form-control" id="exampleInputEmail1" name="tensp" placeholder="Nhap ten san pham"> -->
                                </div>
                                <?php

                                        use Illuminate\Support\Facades\Session;

                                        $messege = Session::get('messege');
                                        if($messege){
                                            echo $messege;
                                            Session::put('messege', null);
                                        }
                                ?>
                                <div class="form-group">
                                
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" name="img" value="" id="exampleInputFile">
                                </div>
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

        </div>
@endsection