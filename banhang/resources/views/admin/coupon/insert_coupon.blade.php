@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12" style="background:rgba(171, 119, 157, 0)">
    <section class="panel" style="background:rgba(171, 119, 157, 0)">
        <header class="panel-heading" style="background:rgba(171, 119, 157, 0)">
         </header>
                    
</section>
</div>

<div class="row"> 
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                           <p style="font-size: 20px; color: #a32b2b"><b>Thêm mã giảm giá</b></p>
                        </header>
                        <center>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?></center>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá*</label>
                                    <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền ít nhất 1 ký tự">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mã giảm giá*</label>
                                    <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền ít nhất 1 ký tự">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã*</label>
                                      <input type="text" name="coupon_time" class="form-control" id="exampleInputEmail1" data-validation="number" data-validation-error-msg="Điền số lượng mã">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phương thức giảm</label>
                                     <select name="coupon_condition" class="form-control input-m m-bot15" style="font-size: 17px">
                                            <option value="0" style="font-size: 17px">----Chọn-----</option>
                                            <option value="1" style="font-size: 17px">Giảm theo phần trăm</option>
                                            <option value="2" style="font-size: 17px">Giảm theo tiền</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Số phần trăm/tiền giảm*</label>
                                     <input type="text" name="coupon_number" class="form-control" id="exampleInputEmail1" data-validation="number" data-validation-error-msg="Điền số phần trăm/tiền giảm ">
                                </div>
                               
                               
                                <button type="submit" name="add_coupon" class="btn btn-info" style="font-size: 18px; margin:auto; display:block;">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-12" style="background:rgba(171, 119, 157, 0)">
                <section class="panel" style="background:rgba(171, 119, 157, 0)">
                    <header class="panel-heading" style="background:rgba(171, 119, 157, 0)">
                    </header>
                    
                </section>

            </div>
@endsection