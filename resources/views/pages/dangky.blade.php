@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
					@if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                	@if(session('thongbao'))
                        <div class="alert alert-danger">{{session('thongbao')}}</div>
                    @endif
                <div class="panel panel-default">
				  	<div class="panel-heading "><b>Đăng ký</b></div>
				  	<div class="panel-body">
				    	<form action="dangky" method="POST">
				    		@csrf
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="Vui lòng nhập địa chỉ email" name="name" value="{{old('name')}}" required>
							</div>
							<br>
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
							<div>
				    			<label>Xác nhận mật khẩu</label>
							  	<input type="password" class="form-control" placeholder="Vui lòng nhập xác nhận mật khẩu" name="repassword" required>
							</div>
							<br>
							<button type="submit" class="btn btn-success">Đăng ký</button>
							<a href="trangchu" class="btn btn-dark" role="button">Hủy</a>
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