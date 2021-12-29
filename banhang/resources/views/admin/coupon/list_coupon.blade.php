@extends('admin_layout')
@section('admin_content')

<div class="col-lg-12" style="background:rgba(171, 119, 157, 0)">
  <section class="panel" style="background:rgba(171, 119, 157, 0)">
    <header class="panel-heading" style="background:rgba(171, 119, 157, 0)">
    </header>
  </section>
</div>
<br><br><br> 
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <p style="font-size: 20px; color: #a32b2b"><b>Mã giảm giá</b></p>
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
      <table class="table table-striped b-t b-light" style="font-size: 20px">
        <thead>
          <tr>
           

            <th>Tên mã giảm giá</th>
            <th>Mã giảm giá</th>
            <th>Số lượng</th>
            <th>Phương thức giảm</th>
            <th>Số phần trăm/tiền giảm</th>
          
            
           
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
          
            <td>{{ $cou->coupon_name }}</td>
            <td>{{ $cou->coupon_code }}</td>
            <td>{{ $cou->coupon_time }}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                Giảm theo phần trăm
                <?php
                 }else{
                ?>  
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>
             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
                {{$cou->coupon_number}}%
                <?php
                 }else{
                ?>  
                {{number_format($cou->coupon_number,0,',','.').' '.'đ'}}
                <?php
               }
              ?>
            </span></td>
           
            <td>
             
              <a onclick="return confirm('Bạn có chắc chắn xóa không?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="" style="font-size: 30px">
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
             {!!$coupon->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>

  <div class="col-lg-12" style="background:rgba(171, 119, 157, 0)">
    <section class="panel" style="background:rgba(171, 119, 157, 0)">
      <header class="panel-heading" style="background:rgba(171, 119, 157, 0)">
      </header>
    </section>
  </div>

@endsection