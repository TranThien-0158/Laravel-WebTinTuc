@extends('layout.index')
@section('content')
<div class="container">
	<!-- slider -->
	<div class="row carousel-holder">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
			  	<div class="panel-heading">Thông tin tài khoản</div>
			  	
			  	<div class="panel-body">
			    	<form action="{{ url('nguoidung') }}" method="POST">
			    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
						@if(isset($nguoidung))
			    		<div>
			    			<label>Họ tên</label>
						  	<input type="text" class="form-control" placeholder="Username" name="name" value=" {{$nguoidung->name}} " aria-describedby="basic-addon1">
						</div>
						<br>
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" name="email" value="{{ $nguoidung->email }}" aria-describedby="basic-addon1"
						  	disabled
						  	>
						</div>
						<br>	
						<div>
			    			<label>Mật khẩu hiện tại</label>
						  	<input type="password" class="form-control" name="password" value="" placeholder="">
						</div>
						<br>
						<div>
			    			<label>Mật khẩu mới</label>
						  	<input type="password" class="form-control" name="repassword" aria-describedby="basic-addon1">
						</div>
						@endif
						<br>
						<button type="submit" class="btn btn-default">Sửa</button>
						
						<div class="col-lg-12">
							<br>
							@include('admin.layout.block.messages')
							@include('admin.layout.block.errors')
						</div>
			    	</form>
			  	</div>
			  	
			</div>
        </div>
        <div class="col-md-2">
        </div>
    </div>
    <!-- end slide -->
</div>
@endsection