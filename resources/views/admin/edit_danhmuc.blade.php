@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Basic Forms
                        </header>
                        <?php 
                                use Illuminate\Support\Facades\Session;
                                $messeg = Session::get('messeg');
                                if($messeg){
                                    echo $messeg;
                                    Session::put('messeg', null);
                                }
                               
                            ?>                          
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('admin/update-product/'.$update_danhmuc->id_prod)}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ten danh muc</label>
                                    <input type="text" class="form-control" name="name_product" id="exampleInputEmail1"  placeholder="Nhap ten danh muc" 
                                    value="{{ $update_danhmuc->tensp }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mo ta danh muc</label></label>
                                    <textarea style="resize: none" rows="5" name="descript_danhmuc" class="form-control" id="exampleInputPassword1">
                                        {{ $update_danhmuc->mota_sp }}
                                    </textarea>
                                    <!-- <input type="password" placeholder="Password"> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hien thi</label></label>
                                <select class="form-control input-sm m-bot15" name="status">
                                    <option value="0">An</option>
                                    <option value="1">Hien Thi</option>
                                </select>
                                </div>
                                <button type="submit" class="btn btn-info">CAP NHAT DANH MUC</button>
                            </form>
                            </div>
                            
                        </div>
                    </section>

            </div>
@endsection