@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading"><b>Thông tin tài khoản</b></div>
				  	<div class="panel-body">
				    	<form>
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" name="name" value="{{$user->name}}" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}" aria-describedby="basic-addon1" disabled>
							</div>
							<br>	
							<div>
								<input type="checkbox" name="changePassword" id="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input type="password" class="form-control" disabled name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" disabled name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="submit" class="btn btn-warning">Sửa</button>
							<a href="trangchu" class="btn btn-dark" role="button">Hủy</a>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#changePassword').change(function() {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                }else{
                    $(".password").attr('disabled', '');
                }
            });
        });
    </script>
@endsection