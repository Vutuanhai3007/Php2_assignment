@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<form  method="post" enctype="multipart/form-data">
<div>
        Role: <select name="category_id" >
            <?php foreach($categories as $r ):?>
                <option <?php if($product->category_id == $r->id) echo "selected" ?> value="<?= $r->id ?>"><?= $r->name?></option>
            <?php endforeach?>
        </select>
    </div>
    <div>
        Mã Sản Phẩm: <input type="text" name="id" value="<?= $product->id ?>">
    </div>
    <div>
        Tên Sản Phẩm: <input type="text" name="name" value="<?= $product->name ?>">
    </div>
    <div>
        Ảnh sản phẩm: <input type="file" name="main_image" value="<?= $product->main_image ?>">
    </div>
    <div>
        Giá Sản Phẩm: <input type="number" name="price" value="<?= $product->price ?>">
    </div>
    <div>
        Giảm Giá: <input type="number" name="promotion" value="<?= $product->promotion ?>">
    </div>
    <div>
        Chi tiết Sản Phẩm: <input type="text" name="detail" value="<?= $product->detail ?>">
    </div>
    
   
    <div>
        <button type="submit">Sửa sản phẩm</button>
    </div>
</form>
@endsection
