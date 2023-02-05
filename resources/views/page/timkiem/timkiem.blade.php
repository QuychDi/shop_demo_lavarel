@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php 
						use Illuminate\Support\Facades\Session;
                                $messeg = Session::get('thongbao');
                                if($messeg){ ?>
                                    <h3 style="color: red"><?php echo $messeg; ?></h3>
                                  <?php  Session::put('thongbao', null);
                                }

						?>
						@foreach($timkiem as $key => $sp)
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('public/uploads/'.$sp->hinhanh)}}" alt=""/>
											<h2><?php echo number_format($sp->gia).' VND'; ?></h2>
											<p>{{ $sp->tensanpham }}</p>
											<a href="{{URL::to('chi-tiet-san-pham/'.$sp->id_sanpham)}}"  class="btn btn-default add-to-cart"></i>Xem Chi Tiet</a>
										</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach	
					</div>
@endsection