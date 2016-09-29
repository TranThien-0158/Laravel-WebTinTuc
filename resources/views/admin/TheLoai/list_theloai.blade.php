@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>danh sách</small>
                </h1>
                 @include('admin.layout.block.messages')
            </div>
           
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt=0 ?>
                    @foreach($theloai as $item)
                    <?php $stt=$stt+1?>
                    <tr class="odd gradeX" align="center">
                        <td>{{ $stt }}</td>
                        <td>{{ $item->name }}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a onclick="return CheckDelete('Bạn có chắc chắn xóa không ?')" href="{{ URL::route('admin.theloai.getDelete',$item->id) }}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{ URL::route('admin.theloai.getEdit',$item->id) }}">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection