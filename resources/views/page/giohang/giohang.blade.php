@extends('layout')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">ID</td>
							<!-- <td class="description">Hinh Anh</td> -->
							<td class="price">San Pham</td>
							<td class="quantity">Don Gia</td>
							<td class="total">So Luong</td>
                            <td class="total">THANH TIEN</td>
                            <td class="total">Hanh Dong</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($giohang as $key => $ttgiohang)
						<tr>
							<td>{{$ttgiohang->ID*1987}}</td>
							<td>{{$ttgiohang->TENSP}}</td>
							<td>{{$ttgiohang->DONGIA}}</td>
							<td>{{$ttgiohang->SOLUONG}}</td>
							<td>{{$ttgiohang->DONGIA*$ttgiohang->SOLUONG}}</td>
							<td><a href="{{URL::to('delete-sp/'.$ttgiohang->ID)}}">Xoa</a> | Sua</td>
							
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endsection