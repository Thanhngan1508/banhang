@extends('admin_layout')
@section('admin_content')
<br><br><div class="row">
    <div class="col-lg-1"></div>
            <div class="col-lg-10">
                    <section class="panel">
                        <header class="panel-heading">
                            <p style="font-size: 20px; color: #a32b2b"><b>Thêm Slider</b></p>
                        </header>
                        <center>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?></center>
                        <div class="panel-body" style="font-size: 21px"> 

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slider*</label>
                                    <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Slider" data-validation="length" data-validation-length="min1" data-validation-error-msg="Điền ít nhất 1 ký tự">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh*</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slide">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slider</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="slider_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_slider" class="btn btn-info" style="font-size: 18px; margin:auto; display:block;">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
            <div class="col-lg-1"></div>
@endsection