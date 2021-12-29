@extends('admin_layout')
@section('admin_content') 
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           <p style="font-size: 20px; color: #a32b2b"><b>Thêm User</b></p>
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
                                <form role="form" action="{{URL::to('store-users')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên users*</label>
                                    <input type="text" name="admin_name" class="form-control" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền tên"  id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email*</label>
                                    <input type="email" name="admin_email" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Điền email"  id="exampleInputEmail1" placeholder="Slug">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại*</label>
                                    <input type="text" name="admin_phone" class="form-control" data-validation-error-msg="Điền SDT" id="exampleInputEmail1" placeholder="Slug">
                                </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu*</label>
                                    <input type="text" name="admin_password" class="form-control" data-validation-error-msg="Điền mật khẩu"  id="exampleInputEmail1" placeholder="Slug">
                                </div>
                             
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection