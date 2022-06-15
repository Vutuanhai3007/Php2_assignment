@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        Họ và Tên: <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
    </div>
    <div class="form-group">
        email: <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
    </div>
    <div class="form-group">
        Phone number: <input type="text" name="phone_number" class="form-control" value="<?= $user->phone_number ?>">
    </div>
    <div class="form-group">
                    <div class="row">
                        <div class="col-6 offset-3">
                            <img src="{{BASE_URL . $user->avatar}}" class="img-thumbnail">
                        </div>
                    </div>
                    <label for="">Ảnh sản phẩm</label>
                    <input type="file" name="avatar" class="form-control">
                    @if(isset($_GET['avatarerr']))
                    <span class="text-danger">{{$_GET['avatarerr']}}</span>
                    @endif
                </div>
    <div class="form-group">
        Role: <select name="role_id" >
            <?php foreach($roles as $r ):?>
                <option <?php if($user->role_id == $r->id) echo "selected" ?> value="<?= $r->id ?>"><?= $r->name?></option>
            <?php endforeach?>
        </select>
            </div>
    <div>
        <button class="btn btn-sm btn-primary" type="submit">Sửa tài khoản</button>
    </div>
</form>
@endsection