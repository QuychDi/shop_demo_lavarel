@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      DANH SACH SAN PHAM
    </div>
    <!-- ?php 
                                use Illuminate\Support\Facades\Session;
                                $messeg = Session::get('messeg');
                                if($messeg){
                                    echo $messeg;
                                    Session::put('messeg', null);
                                }
                               
                            ?> -->
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <!-- <option value="1">Delete selected</option>-->
          @foreach($danhmucsp as $key => $danhmuc)
            <option value="{{$danhmuc->id_prod}}">{{$danhmuc->tensp}}</option>
          @endforeach
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Ten san pham</th>
            <th style="width: 20%">Hinh anh</th>
            <th>Don Gia</th>
            <th>Danh muc</th>
            <th>Hanh dong</th>
          
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($list_sp as $key => $list)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$list->tensanpham}}</td>
            <td><img width="40%" src="{{asset('public/uploads/'.$list->hinhanh)}}"></td>
            <td><?php echo number_format($list->gia).'VND'; ?></td>
            <td>{{$list->tensp}}</td>
            <td>
            <a href="{{URL::to('admin/danh-sach-san-pham/delete/'.$list->id_sanpham)}}">Xoa</a> |
            <a href="{{URL::to('admin/danh-sach-san-pham/edit/'.$list->id_sanpham)}}">Sua</a>
            </td>
            <td>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection