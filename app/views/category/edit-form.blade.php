@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<form  method="post" enctype="multipart/form-data">
    <div>
        Tên Sản Phẩm: <input type="text" name="name" value="<?= $category->name ?>">
    </div>
        </select>
    </div>
    <div>
        <button type="submit">Sửa danh mục</button>
    </div>
</form>
@endsection
