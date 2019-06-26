@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">

                	@if(session('notification'))
                        <div class="alert alert-danger">{{session('notification')}}</div>
                    @endif

                <div class="panel panel-default">
				  	<div class="panel-heading "><b>Đăng nhập</b></div>
				  	<div class="panel-body">
				    	<form action="login" method="POST">
				    		@csrf
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Vui lòng nhập địa chỉ email" name="email" value="{{old('email')}}" required>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" placeholder="Vui lòng nhập mật khẩu" name="password" required>
							</div>
							<br>
							<button type="submit" class="btn btn-success">Đăng nhập</button>
							<a href="homepage" class="btn btn-dark" role="button">Hủy</a>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

@endsection