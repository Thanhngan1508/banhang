@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <p style="font-size: 20px; color: #a32b2b"><b>Liệt kê đơn hàng</b></p>
    </div>
    <div class="row w3-res-tb">
     
     
    
    </div>
    <div class="table-responsive">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
           
            <th style="font-size: 20px">STT</th>
            <th style="font-size: 20px">Mã đơn hàng</th>
            <th style="font-size: 20px">Ngày đặt hàng</th>
            <th style="font-size: 20px">Tình trạng đơn hàng</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i = 0;
          @endphp
          @foreach($order as $key => $ord)
            @php 
            $i++;
            @endphp
          <tr>
            <td style="font-size: 20px"><i>{{$i}}</i></label></td>
            <td style="font-size: 20px">{{ $ord->order_code }}</td>
            <td style="font-size: 20px">{{ $ord->created_at }}</td>
            <td style="font-size: 20px">@if($ord->order_status==1)
                    Đơn hàng mới
                @else 
                    Đã xử lý
                @endif
            </td>
           
           
            <td style="font-size: 20px">
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-cloud text-success text-active"></i></a>

              <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
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
            {!!$order->links()!!}
          </ul>
        </div>
      </div>
    </footer>
   
  </div>
</div>
@endsection