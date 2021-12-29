@extends('admin_layout')
@section('admin_content')
<div class="row"><br>
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                           <p style="font-size: 20px; color: #a32b2b"><b>Thêm Danh mục</b></p>
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
                                <form role="form" action="{{URL::to('/save-category-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục*</label>
                                    <input type="text"  class="form-control"  onkeyup="ChangeToSlug();" name="category_product_name"  id="slug" placeholder="danh mục" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền tên danh mục">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="6" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="category_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div> -->
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái*</label>
                                      <select name="category_product_status" class="form-control input-m m-bot15">
                                           <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"></label>
                                    <input type="hidden" name="slug_category_product" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                               
                                <button type="submit" name="add_category_product" class="btn btn-info" style="font-size: 18px; margin:auto; display:block;">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-1"></div>
@endsection