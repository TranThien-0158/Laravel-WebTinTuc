@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Slide
                    <small>Sửa</small>
                </h1>
            </div>

            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.layout.block.errors')
                <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Tên slide</label>
                        <input class="form-control" name="txtTenSlide" placeholder="Nhập tên slide" value="{{ $slide->name }}" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p>
                            <img width="400px" src="{{ url('upload/slide/'.$slide->image) }}"/>
                        </p>
                        <input type="file" name="Hinh">
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="txtNoiDung">{{ $slide->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input class="form-control" name="txtLink" placeholder="Link" value="{{ $slide->link }}" />
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