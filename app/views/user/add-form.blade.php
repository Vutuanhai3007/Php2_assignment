@extends('layouts.main')
@section('title', "Tạo mới tài khoản")
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tạo mới tài khoản</h3>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Password </label>
                        <input type="password" name="password"  class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Avatar </label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Phone number </label>
                        <input type="text" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Role</label>
                        <select name="role_id" class="form-control" >
                            <?php foreach($roles as $r ):?>
                                <option value="<?= $r->id ?>"><?= $r->name?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-sm btn-primary">Tạo tài khoản</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection