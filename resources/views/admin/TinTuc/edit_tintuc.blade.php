@extends('admin.layout.index')
@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @include('admin.layout.block.errors')
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label>Thể loại</label>
                        <select class="form-control" id="TheLoai">
                            @foreach($theloai as $item)
                            <option 

                            @if($tintuc->loaitin->theloai->id == $item->id)
                                    {{ "selected" }}
                            @endif

                            value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Loại tin</label>
                        <select class="form-control" id="LoaiTin" name="LoaiTin">
                            @foreach($loaitin as $item)
                            <option 
                            
                            @if($tintuc->loaitin->id == $item->id)
                                    {{ "selected" }}
                            @endif

                            value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiêu đề tin tức</label>
                        <input class="form-control" name="txtTieuDe" placeholder="Nhập tiêu đề tin tức" value="{{  $tintuc->title }}" />
                    </div>
                    <div class="form-group">
                        <label>Tóm tắt nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="3" name="txtTomTat">{{ $tintuc->summary }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="demo" class="form-control ckeditor" rows="5" name="txtNoiDung">{{ $tintuc->content }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <p>
                        <img width="400px" src="{{ url('upload/tintuc/'.$tintuc->image) }}"/>
                        </p>
                        <input type="file" name="Hinh">
                    </div>
                    <div class="form-group">
                        <label>Nổi bật</label>
                        <label class="radio-inline">
                            <input
                            @if($tintuc->highlight == 0)
                                {{ "checked" }}
                            @endif
                            name="NoiBat" value="0" checked="" type="radio">Không
                        </label>
                        <label class="radio-inline">
                            <input 

                            @if($tintuc->highlight == 1)
                                {{ "checked" }}
                            @endif

                            name="NoiBat" value="1" type="radio">Có
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <div class="col-lg-12">
            <h1 class="page-header">Comment
                <small>Danh sách</small>
            </h1>
            @include('admin.layout.block.messages')
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Người dùng</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt=0 ?>
                @foreach($tintuc->comment as $item)
                <?php $stt=$stt+1 ?>
                <tr class="odd gradeX" align="center">
                    <td>{{ $stt }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return CheckDelete('Bạn có chắc chắn xóa không ?')" href="{{ URL::route('admin.comment.getDelete',$item->id) }}"> Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.container-fluid -->
</div>

@endsection