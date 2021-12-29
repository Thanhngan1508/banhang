@extends('layout')
@section('content')

<section id="cart_items">
        <div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Home</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div>
 

			<div class="shopper-informations">
				<div class="row">
					<h1 style="color: green; margin-left: 300px; margin-top: -50px">Thanh toán</h1><br>
					<div class="col-sm-12 clearfix">
						<div class="bill-to" style="margin-left: 80px">
							<p style="margin-left: 60px">Vui lòng nhập thông tin giao hàng</p>
							<div class="form-two">
								<form method="POST">
									@csrf
									<input type="email" name="shipping_email" class="shipping_email" placeholder="Email">
									<input type="text" name="shipping_name" class="shipping_name" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền tên" placeholder="Họ và tên*">
									<input type="text" name="shipping_address" class="shipping_address" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền địa chỉ" placeholder="Địa chỉ*">
									<input type="text" name="shipping_phone" class="shipping_phone" data-validation="length" data-validation-length="min1" data-validation-error-msg="Vui lòng điền số điện thoại" placeholder="Số điện thoại*">
									<textarea name="shipping_notes" class="shipping_notes" placeholder=" Ghi chú" rows="5"></textarea>
									
									@if(Session::get('fee'))
										<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
									@else 
										<input type="hidden" name="order_fee" class="order_fee" value="10000">
									@endif

									@if(Session::get('coupon'))
										@foreach(Session::get('coupon') as $key => $cou)
											<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
										@endforeach
									@else 
										<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif
									
									
									<div class="">
										 <div class="form-group">
		                                    <label for="exampleInputPassword1" style="font-size: 17px">Chọn hình thức thanh toán</label>
		                                      <select name="payment_select"  class="form-control input-m m-bot15 payment_select" style="font-size: 17px">
		                                            <option value="0">Chuyển khoản</option>
		                                            <option value="1">Tiền mặt</option> 
		                                    </select>
		                                </div>
									</div>
									<input type="button" value="Xác nhận thanh toán" name="send_order" class="btn btn-primary btn-sm send_order" style="font-size: 20px; background-color: #3575a5;  margin-bottom: 60px">
								</form></div></div></div>




								
								<h2 style="color: green; margin-left: -300px"><center>
								Xem lại đơn hàng </center></h2> <br>

								<!-- <form>
                                    @csrf 
                             
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                      <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                    
                                            <option value="">--Chọn tỉnh thành phố--</option>
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                      <select name="province" id="province" class="form-control input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>
                                           
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                      <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>   
                                    </select>
                                </div>
                               
                               
                              	<input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">


                                </form> -->

							</div>
							
						</div>
					</div>
					<div class="col-sm-12 clearfix">
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
										<td class="description">Tên sản phẩm</td>
										<td class="price">Giá </td>
										<td class="quantity">Số lượng</td>
										<td class="total">Thành tiền</td>
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
											<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
										</td>
										<td class="cart_description">
											<h4><a href=""></a></h4>
											<p>{{$cart['product_name']}}</p>
										</td>
										<td class="cart_price">
											<p>{{number_format($cart['product_price'],0,',','.')}}đ</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
											
											<p> {{ $cart['product_qty'] }}  </p>
												
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">
												{{number_format($subtotal,0,',','.')}}đ
												
											</p>
										</td>
										<!-- <td class="cart_delete">
											<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
										</td> -->
									</tr>
									
									@endforeach
									<tr>
										
										<td></td><td></td><td></td>
						<td>
							<div class="total_area" style="margin-top: 70px; margin-left: -230px; margin-right: -90px; font-size: 15px" >
									<ul>
										<li>Tổng tiền <span>{{number_format($total,0,',','.')}}VND</span></li>
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
															echo '<p><li>Tổng giảm <span>'.number_format($total_coupon,0,',','.').'VND</span></li></p>';
															@endphp
														</p>
														<p><li>Tổng thanh toán <span>{{number_format($total-$total_coupon +10000 ,0,',','.')}} VND</span> </li></p> 

													@else
														Mã giảm giá <span>{{number_format($cou['coupon_number'],0,',','.')}} VND
															</span>
															<p><span>
																@php
																$total_coupon = $total - $cou['coupon_number'];
																@endphp
															</span></p>
															<p><li>Tổng thanh toán <span> {{number_format($total_coupon +10000 ,0,',','.')}} VND </span></li></p>
													@endif		
												@endforeach
										</li>
										@endif
										</ul>
									</td>
									</tr>
									
									@endif
								</tbody>
							</form>
						</table>

						</div>
					</div>
									
				</div>
			</div>
		

			
			
		</div>
	</section> <!--/#cart_items-->


@endsection