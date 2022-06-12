@extends('layouts.main')
@section('content')
    <h2>Xin chào, {{$x}}</h2>
    <p>Giới tính: @if($gender == 1) Nam @else Nữ @endif</p>
    <p>Đây là nội dung trang chủ</p>
@endsection
    