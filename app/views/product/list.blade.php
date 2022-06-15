@extends('layouts.main')
@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" name="keyword" value="{{$keyword}}">
                            <span class="input-group-append">
                              <button type="submit" class="btn btn-info btn-flat">Tìm kiếm tại đây!!!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="car-body">
            <table class="table table-hover" border="1">
                <thead>
                <th>ID</th>
                    <th>Category</th>
                    <th>Tên sản phẩm</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Promotion</th>
                    <th>Detail</th>
                    <th>
                        <a href="tao-sp" class="btn btn-primary">Thêm sản phẩm</a>
                    </th>
                </thead>
                <tbody>
                    
                    @foreach($products as $u)
                   
                        <tr>
                            <td>{{$u->id}}</td>
                            <td>{{$u->category_id}}</td>
                            <td>{{$u->name}}</td>
                            <td>
                                <img src="{{ BASE_URL . $u->main_image}}" width="70">
                            </td>
                            <td>{{ $u->price }}</td>
                            <td>{{ $u->promotion }}</td>
                            <td>{!! $u->detail !!}</td>
                            <td>
                                <a class="btn btn-danger" href="sua-sp/{{ $u->id }}">Sửa</a>
                                <a class="btn btn-success" href="xoa-sp/{{ $u->id }}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    $(document).ready(function(){
        $('.btn-remove').click(function(){
            alert(1);
        });
    });
</script>
@endsection