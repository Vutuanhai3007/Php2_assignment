@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<script src="https://cdn.tiny.cloud/1/zilqf95sxrikn5zj5x3eqkq89l0b8xla70tkncnzl2bb56pt/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
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
                        @if(isset($_GET['nameerr']))
                        <span class="text-danger">{{$_GET['nameerr']}}</span>
                        @endif
                     
                    </div>
                    <div class="form-group">
                        <label for="">Image </label>
                        <input type="file" name="main_image"  class="form-control">
                         @if(isset($_GET['main_imageerr']))
                        <span class="text-danger">{{$_GET['main_imageerr']}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control">
                        @if(isset($_GET['priceerr']))
                        <span class="text-danger">{{$_GET['priceerr']}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Promotion</label>
                        <input type="number" name="promotion" class="form-control">
                        @if(isset($_GET['promotionerr']))
                        <span class="text-danger">{{$_GET['promotionerr']}}</span>
                        @endif
                    </div>
                    <div>
                        <label for="">Detail </label>
                        <textarea id="mytextarea" name="detail"></textarea>
                        @if(isset($_GET['detailerr']))
                        <span class="text-danger">{{$_GET['detailerr']}}</span>
                        @endif
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
