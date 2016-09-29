@extends('layout.index')
@section('content')
<div class="container">
    <div class="row">
        @include('layout.menu')

        <div class="col-md-9 ">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#337AB7; color:white;">
                    <h4><b>{{ $loaitin->name }}</b></h4>
                </div>
                @foreach($tintuc as $item_tintuc)
                <div class="row-item row">
                    <div class="col-md-3">

                        <a href="{{ url('tintuc/'.$item_tintuc->id.'/'.$item_tintuc->alias.'.html') }}">
                            <br>
                            <img width="200px" height="200px" class="img-responsive" src="{{ url('upload/tintuc/'.$item_tintuc->image) }}" alt="">
                        </a>
                    </div>

                    <div class="col-md-9">
                        <h3>{{ $item_tintuc->title }}</h3>
                        <p>{{ $item_tintuc->summary }}</p>
                        <a class="btn btn-primary" href="{{ url('tintuc/'.$item_tintuc->id.'/'.$item_tintuc->alias.'.html') }}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                    <div class="break"></div>
                </div>
                @endforeach

                {{-- <!-- Pagination -->
                <div class="row text-center">
                    <div class="col-lg-12">
                        <ul class="pagination">
                            <li>
                                <a href="#">&laquo;</a>
                            </li>
                            <li class="active">
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li>
                                <a href="#">&raquo;</a>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <!-- /.row -->
                {{-- PHÂN TRANG --}}
                <div style="text-align:center">
                    {{ $tintuc->links() }}
                </div>
            </div>
        </div> 

    </div>

</div>
@endsection