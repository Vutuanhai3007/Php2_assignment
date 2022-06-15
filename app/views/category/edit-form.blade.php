@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        Tên Sản Phẩm: <input type="text" name="name" value="<?= $category->name ?>">
        @if(isset($_GET['nameerr']))
        <span class="text-danger">{{$_GET['nameerr']}}</span>
        @endif
    </div>
    </select>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-primary" type="submit">Sửa danh mục</button>
    </div>
</form>
@endsection