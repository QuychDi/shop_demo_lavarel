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
                                <form role="form" action="{{URL::to('admin/save-product')}}" method="POST">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ten danh muc</label>
                                    <input type="text" class="form-control" name="name_product" id="exampleInputEmail1"  placeholder="Nhap ten danh muc" value="">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mo ta danh muc</label></label>
                                    <textarea style="resize: none" rows="5" name="descript_danhmuc" class="form-control" id="exampleInputPassword1" placeholder="Mo ta danh muc">
                                    </textarea>
                                    <!-- <input type="password" placeholder="Password"> -->
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hien thi</label></label>
                                <select class="form-control input-sm m-bot15" name="status">
                                    <option values="0">An</option>
                                    <option values="1">Hien Thi</option>
                                </select>
                                </div>
                                <button type="submit" class="btn btn-info">THEM DANH MUC</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection