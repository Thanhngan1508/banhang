@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
       <p style="font-size: 20px; color: #a32b2b"><b>Slider</b></p>
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                 
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
                    <center>
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?></center>
      <table class="table table-striped b-t b-light" style="font-size:20px;">
        <thead>
          <tr>
            <th style="width:30px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th >Tên slider</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_slide as $key => $slide)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $slide->slider_name }}</td>
            <td><img src="public/uploads/slider/{{ $slide->slider_image }}" height="120" width="500"></td>
            <td>{{ $slide->slider_desc }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($slide->slider_status==1){
                ?>
                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}">Hiển thị</a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}">Ẩn</a>
                <?php
               }
              ?>
            </span></td>
            <td>
             
              <a onclick="return confirm('Bạn chắc chắn xóa không?')" href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>

            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
              {!!$all_slide->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection