@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Category: <select name="category_id">
                        <?php foreach ($categories as $r) : ?>
                            <option <?php if ($product->category_id == $r->id) echo "selected" ?> value="<?= $r->id ?>"><?= $r->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    Mã Sản Phẩm: <input type="text" name="id" class="form-control" value="<?= $product->id ?>">

                </div>
                <div class="form-group">
                    Tên Sản Phẩm: <input type="text" name="name" class="form-control" value="<?= $product->name ?>">
                    @if(isset($_GET['nameerr']))
                    <span class="text-danger">{{$_GET['nameerr']}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <img src="{{BASE_URL . $product->main_image}}" class="img-thumbnail">
                        </div>
                    </div>
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="main_image" class="form-control">
                    @if(isset($_GET['main_imageerr']))
                    <span class="text-danger">{{$_GET['main_imageerr']}}</span>
                    @endif
                </div>
                <div class="form-group">
                    Giá Sản Phẩm: <input type="number" name="price" class="form-control" value="<?= $product->price ?>">
                    @if(isset($_GET['priceerr']))
                    <span class="text-danger">{{$_GET['priceerr']}}</span>
                    @endif
                </div>
                <div class="form-group">
                    Giảm Giá: <input type="number" name="promotion" class="form-control" value="<?= $product->promotion ?>">
                    @if(isset($_GET['promotionerr']))
                    <span class="text-danger">{{$_GET['promotionerr']}}</span>
                    @endif
                </div>
                <div class="form-group">
                    Chi tiết Sản Phẩm: <input type="textarea" name="detail" class="form-control" value="<?= $product->detail ?>">
                    @if(isset($_GET['detailerr']))
                    <span class="text-danger">{{$_GET['detailerr']}}</span>
                    @endif
                </div>


                <div class="form-group">
                    <button class="btn btn-sm btn-primary" type="submit">Sửa sản phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection