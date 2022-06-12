@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới Sản phẩm</h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control" >
                            <?php foreach($categories as $r ):?>
                                <option value="<?= $r->id ?>"><?= $r->name?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="name"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Image </label>
                        <input type="file" name="main_image"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Promotion</label>
                        <input type="number" name="promotion" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Detail </label>
                        <input type="text" name="detail" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Tạo sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection