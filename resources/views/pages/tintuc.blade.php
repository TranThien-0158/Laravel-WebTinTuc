@extends('layout.index')
@section('content')
<div class="container">
    <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-9">

            <!-- Blog Post -->

            <!-- Title -->
            <h1>{{ $tintuc->title }}</h1>

            <!-- Author -->
            <p class="lead">
                by <a href="#">CryMagic</a>
            </p>

            <!-- Preview Image -->
            <img class="img-responsive" src="{{ url('upload/tintuc/'.$tintuc->image) }}" alt="">

            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on: {{ $tintuc->created_at }}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">
                {!! $tintuc->content !!}
            </p>

            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            @if(isset($nguoidung))
            <div class="well">
                <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                <form role="form" action="{{ url('comment/'.$tintuc->id) }}" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="form-group">
                        <textarea class="form-control" name="txtNoiDung" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi</button>
                </form>
            </div>

            <hr>
            @endif

            <!-- Posted Comments -->

            <!-- Comment -->
            @foreach($comment as $item_comment)
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                                                {{-- Tên người dùng comment --}}
                    <h4 class="media-heading">{{ $item_comment->user->name }}
                        {{-- Ngày đăng comment --}}
                        <small>{{ $item_comment->created_at }}</small>
                    
                    </h4>
                    {{-- Nội dung comment --}}
                    {{ $item_comment->content }}
                </div>
            </div>
            @endforeach

        </div>

        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-3">

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin liên quan</b></div>
                <div class="panel-body">

                    <!-- item -->
                    @foreach($tinlienquan as $item_tinlienquan)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'.$item_tinlienquan->id.'/'.$item_tinlienquan->alias.'.html') }}">
                                <img class="img-responsive" src="{{ url('upload/tintuc/'.$item_tinlienquan->image) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$item_tinlienquan->id.'/'.$item_tinlienquan->alias.'.html') }}"><b>{{$item_tinlienquan->title}}</b></a>
                        </div>
                        <p>{!! $item_tinlienquan->summary !!}</p>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- end item -->
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b>Tin nổi bật</b></div>
                <div class="panel-body">

                    <!-- item -->
                    @foreach($tinnoibat as $item_tinnoibat)
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="{{ url('tintuc/'.$item_tinnoibat->id.'/'.$item_tinnoibat->alias.'.html') }}">
                                <img class="img-responsive" src="{{ url('upload/tintuc/'.$item_tinnoibat->image) }}" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="{{ url('tintuc/'.$item_tinnoibat->id.'/'.$item_tinnoibat->alias.'.html') }}"><b>{{ $item_tinnoibat->title }}</b></a>
                        </div>
                        <p>{!! $item_tinnoibat->summary !!}</p>
                        <div class="break"></div>
                    </div>
                    @endforeach
                    <!-- end item -->
                </div>
            </div>
            
        </div>

    </div>
    <!-- /.row -->
</div>
@endsection