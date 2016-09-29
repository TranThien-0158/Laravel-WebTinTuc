@extends('layout.index')
@section('content')
<div class="container">

	<!-- slider -->
	<div class="row carousel-holder">
		<div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
			  	<div class="panel-heading">Đăng nhập</div>
			  	
			  	<div class="panel-body">
			    	<form role="form" action="{{ url('login') }}" method="POST">
			    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div>
			    			<label>Email</label>
						  	<input type="email" class="form-control" placeholder="Email" name="email" 
						  	>
						</div>
						<br>	
						<div>
			    			<label>Mật khẩu</label>
						  	<input type="password" class="form-control" placeholder="Password" name="password">
						</div>
						<br>
						<button type="submit" class="btn btn-success">Đăng nhập
						</button>
						<div>
							<hr>	
							@include('admin.layout.block.errors')
							@include('admin.layout.block.messages')
						</div>
			    	</form>
			  	</div>
			</div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <!-- end slide -->
</div>
@endsection