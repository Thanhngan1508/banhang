@extends('admin_layout')
@section('admin_content')
<div class="row"><br>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                           <p style="font-size: 20px; color: #a32b2b"><b>Thêm sản phẩm</b></p>
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
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm*</label>
                                    <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền ít nhất 1 ký tự" name="product_name" class="form-control " id="slug" placeholder="Tên danh mục" onkeyup="ChangeToSlug();"> 
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng*</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Điền số lượng" name="product_quantity" class="form-control" id="exampleInputEmail1" placeholder="Điền số lượng">
                                </div>
                                
                                     <div class="form-group">
                                    <label for="exampleInputEmail1">Giá*</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Điền số tiền" name="product_price" class="form-control" id="" placeholder="Tên danh mục">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh*</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả*</label>
                                    <textarea style="resize: none"  rows="8" class="form-control" name="product_desc" id="ckeditor1" placeholder="Mô tả sản phẩm"></textarea>
                                </div>
                                 <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="product_content"  id="id4" placeholder="Nội dung sản phẩm"></textarea>
                                </div> -->
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục*</label>
                                      <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu*</label>
                                      <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                            
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái*</label>
                                      <select name="product_status" class="form-control input-sm m-bot15">
                                         <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"></label>
                                    <input type="hidden" name="product_slug" class="form-control " id="convert_slug" placeholder="Tên danh mục">
                                </div>
                               
                                <button type="submit" name="add_product" class="btn btn-info" style="font-size: 18px; margin:auto; display:block;">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-1"></div>
@endsection