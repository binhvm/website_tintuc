@extends('layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-6" style="padding-bottom:120px">
                        
                        {{-- Hiển thị lỗi--}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        {{-- Hiển thị thông báo --}}
                        @if(session('notification'))
                            <div class="alert alert-success">{{session('notification')}}</div>
                        @endif
						
                        <h1 class="page-header">Người dùng
                            <small>Thông tin tài khoản</small>
                        </h1>
                        <form action="account/{{$user->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" disabled="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword">
                                <label>Thay đổi mật khẩu</label>
                                <input class="form-control password" type="password" name="password" placeholder="Vui lòng nhập mật khẩu" disabled required />
                            </div>
                            <div class="form-group">
                                <label>Xác nhận thay đổi mật khẩu</label>
                                <input class="form-control password" type="password" name="repassword" placeholder="Vui lòng nhập xác nhận mật khẩu" disabled required />
                            </div>
                            <div class="form-group">
                                <label>Quyền: </label>
                                @if(Auth::user()->quyen == 2)
                                	{{"Quản trị viên"}}
                                @elseif(Auth::user()->quyen == 1)
                                	{{"Cộng tác viên"}}
                                @else
                                    {{"Thành viên"}}
                                @endif
                            </div>
                            <button type="submit" class="btn btn-warning">Thay đổi</button>
                            <a href="homepage" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                    <div class="col-lg-3">
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
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