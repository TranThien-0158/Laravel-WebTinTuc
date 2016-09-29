@extends('layout.index')
@section('content')
<div class="container">

	<!-- slider -->
	@include('layout.slide')
    <!-- end slide -->

    <div class="space20"></div>


    <div class="row main-left">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">            
            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
            		<h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
            	</div>

            	<div class="panel-body">
            		<!-- item -->
            		@foreach($theloai as $item_theloai)
            		@if(count($item_theloai->loaitin)>0)
				    <div class="row-item row">
	                	<h3>
	                		<a href="category.html">{{ $item_theloai->name }}</a> | 	
	                		@foreach($item_theloai->loaitin as $item_loaitin)
	                		<small><a href="{{url('loaitin/'.$item_loaitin->id.'/'.$item_loaitin->alias.'.html')}}"><i>{{ $item_loaitin->name }}</i></a>/</small>
	                		@endforeach
	                	</h3>
	                	<?php
	                		$data = $item_theloai->tintuc->where('highlight',1)->sortByDesc('created_at')->take(5);
	                		$tin1 = $data->shift();

	                	?>
	                	<div class="col-md-8 border-right">
	                		<div class="col-md-5">
		                        <a href="{{ url('tintuc/'.$tin1['id'].'/'.$tin1['alias'].'.html') }}">
		                            <img class="img-responsive" src="{{ url('upload/tintuc/'.$tin1['image']) }}" alt="">
		                        </a>
		                    </div>

		                    <div class="col-md-7">
		                        <h3>{{ $tin1['title'] }}</h3>
		                        <p>{!! $tin1['summary'] !!}</p>
		                        <a class="btn btn-primary" href="{{ url('tintuc/'.$tin1['id'].'/'.$tin1['alias'].'.html') }}">View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
							</div>

	                	</div>
	                    

						<div class="col-md-4">
							@foreach($data->all() as $item_tintuc)
							<a href="{{ url('tintuc/'.$item_tintuc->id.'/'.$item_tintuc->alias.'.html') }}">
								<h4>
									<span class="glyphicon glyphicon-list-alt"></span>
									{{ $item_tintuc->title }}
								</h4>
							</a>
							@endforeach
						</div>
						
						<div class="break"></div>
	                </div>
	                @endif
	                @endforeach
	                <!-- end item -->
				</div>
            </div>
    	</div>
    </div>
    <!-- /.row -->
</div>
@endsection