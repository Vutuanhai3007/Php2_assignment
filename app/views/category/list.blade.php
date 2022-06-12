@extends('layouts.main')
@section('content')

<form action="" method="get">
    <input type="text" name="keyword" value="{{$keyword}}">
    <button type="submit">Tìm kiếm</button>
</form>
<table border="1" class="table table-striped">
    <thead>
    <th>ID</th>
    <th>Danh mục sản phẩm</th>
    <th>
            <a  href="tao-dm" class='btn btn-success'>Thêm danh mục</a>
        </th>
    </thead>
    <tbody>
        @foreach($categories as $u)
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>
                    <a class='btn btn-warning' href="sua-dm/{{ $u->id }}">Sửa</a>
                    <a class='btn btn-danger' href="xoa-dm/{{ $u->id }}">Xóa</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection