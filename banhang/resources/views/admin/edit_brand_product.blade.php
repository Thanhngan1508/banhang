@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           <p style="font-size: 20px; color: #a32b2b"><b>Cập nhật thương hiệu</b></p>
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
                            @foreach($edit_brand_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$edit_value->brand_name}}"  onkeyup="ChangeToSlug();" name="brand_product_name" class="form-control" id="slug" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="brand_product_desc" id="exampleInputPassword1" >{{$edit_value->brand_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Trạng thái</label>
                                      <select name="brand_product_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1"></label>
                                    <input type="hidden" value="{{$edit_value->brand_slug}}" name="brand_product_slug" class="form-control" id="convert_slug" >
                                </div>

                                <button type="submit" name="update_brand_product" class="btn btn-info" style="font-size: 18px; margin:auto; display:block;">Cập nhật</button>
                                </form>
                            </div>
                            @endforeach 
                             
                         
                           
                        </div>
                    </section>

            </div>
@endsection