@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.layout.block.errors')
                <form action="" method="POST">
                <input type=hidden name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="txtUsername" placeholder="Nhập username" value="{{ $user->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="txtEmail"  placeholder="Nhập Email" value="{{ $user->email }}" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="txtMatKhau" placeholder="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="txtNhapLaiMatKhau" placeholder="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label>Quyền</label>
                        <label class="radio-inline">
                            <input 
                            @if($user->level == 0)
                                {{"checked"}}
                            @endif
                            name="Quyen" value="0" checked="" type="radio">Member
                        </label>
                        <label class="radio-inline">
                            <input 
                            @if($user->level == 1)
                                {{"checked"}}
                            @endif
                            name="Quyen" value="1" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input 
                            @if($user->level == 2)
                                {{"checked"}}
                            @endif
                            name="Quyen" value="2" type="radio">SuperAdmin
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection