@extends('layout')
@section('content')

	<section id="cart_items">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Giỏ hàng</li>
				</ol>
			</div>
			  @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div> 
                @elseif(session()->has('error'))
                     <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                @endif
			<div class="table-responsive cart_info">

				<form action="{{url('/update-cart')}}" method="POST">
					@csrf
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description"><center>Tên sản phẩm</center></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng cộng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@if(Session::get('cart')==true)
						@php
								$total = 0;
						@endphp
						@foreach(Session::get('cart') as $key => $cart)
							@php
								$subtotal = $cart['product_price']*$cart['product_qty'];
								$total+=$subtotal;
							@endphp

						<tr>
							<td class="cart_product">
								<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" height="100" alt="{{$cart['product_name']}}" />
							</td>
							<td class="cart_description">
								<h4 style="font-size: 15px">{{$cart['product_name']}}</h4>
								<p style="font-size: 13px">Mã ID: {{$cart['product_id']}}</p>
							</td>
							
							<td class="cart_price">
								<p style="font-size: 15px">{{number_format($cart['product_price'],0,',','.')}}đ</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								
									<input class="cart_quantity" type="number" min="1" max="100" style="text-align: center; font-size: 13px" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
								
									
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									{{number_format($subtotal,0,',','.')}}đ
									
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						
						@endforeach
						<tr>
							<td></td>
							<td>
								<div class="total_area" style="margin-top: 30px; margin-left: -120px; " >
									<ul>
									<li>Tổng tiền <span>{{number_format($total,0,',','.')}}đ</span></li>
									<li>VAT <span>{{Cart::tax(0).' '.'VND'}}</span></li>
									<li>Phí vận chuyển <span>10.000đ</span></li>
									@if(Session::get('coupon'))
									<li>
										
											@foreach(Session::get('coupon') as $key => $cou)
												@if($cou['coupon_condition']==1)
													Mã giảm giá <span> {{$cou['coupon_number']}} % </span>
													<p>
														@php 
														$total_coupon = ($total*$cou['coupon_number'])/100;
														echo '<p><li>Tổng giảm <span>'.number_format($total_coupon,0,',','.').'đ </span></li></p>';
														@endphp
													</p>
													<p><li>Tổng thanh toán <span>{{number_format($total+10000-$total_coupon,0,',','.')}}đ </span></li></p>

												@elseif($cou['coupon_condition']==2)
													Mã giảm giá <span>{{number_format($cou['coupon_number'],0,',','.')}}đ</span>
													<p><span>
														@php 
														$total_coupon = $total - $cou['coupon_number'];
										
														@endphp
													</span></p>
													<p><li>Tổng thanh toán <span>  {{number_format($total_coupon+10000,0,',','.')}}đ </span></li></p>
												@endif
											@endforeach
										
										</li>
										@endif 
									</ul>
								</div>
							</td>



							
							<td><input type="submit" value="Cập nhật " name="update_qty" class="check_out btn btn_default btn-sm" style="margin-left: 10px; margin-top: -170px; font-size: 13px" ></td>
						
						<td><a href="{{url('/del-all-product')}}" class="btn btn_default btn-sm check_out" style="margin-left: 0px; margin-top: -170px; font-size: 13px"> Xóa tất cả </a></td>
						<td>
								@if(Session::get('customer_id'))
	                          	<a class="btn btn-default check_out" href="{{url('/checkout')}}" style="margin-left: 0px; margin-top: -170px; font-size: 13px">Thanh toán</a>
	                          	@else 
	                          	<a class="btn btn-default check_out" href="{{url('/dang-nhap')}}" style="margin-left: 0px; margin-top: -170px; font-size: 13px">Thanh toán</a>
								@endif
				        </td>
				        <td></td>
						@else
						<tr>
							<td colspan = "5" style="font-size: 20px; color: green"><center>
								@php
								echo 'Giỏ hàng đang trống. Hãy thêm sản phẩm vào giỏ hàng!';
								@endphp
							</center></td>
						</tr>
						
					</tr>
					@endif
					</form>

					@if(Session::get('cart'))
					<tr>
						<td></td>
						<td>

							<div style="font-size: 15px; margin-left: -50px; margin-top: 15px">
				                <form method="post" action="{{url('/check-coupon')}}">
				                @csrf
				                <input type="text"  class="form_control" name="coupon" placeholder="Nhập mã giảm giá">
				                
				                <input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Áp dụng" href="" style="font-size: 13px; background-color: orange; color: black"></input> 
				                
				                </form>
							</div>

							@if(Session::get('coupon'))
				            	<a href="{{url('/unset-coupon')}}" class="btn btn_default check_out" style="font-size: 13px; margin-left: -50px"> Xóa</a>
				            @endif

						</td>
						<td></td>
						<td></td>
					</tr>
					@endif
				</tbody></table><br><br>
			
	</section> <!--/#cart_items-->



@endsection