@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        
                        {{-- Hiển thị lỗi--}}
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        {{-- Hiển thị thông báo --}}
                        @if(session('thongbao'))
                            <div class="alert alert-success">{{session('thongbao')}}</div>
                        @endif

                        <form action="admin/user/sua/{{$user->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" value="{{$user->email}}" readonly />
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
                                @if($user->quyen != 2)
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" value="0" 
                                    @if($user->quyen == 0) {{"checked"}}
                                    @endif
                                    >Thành viên
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" value="1"
                                    @if($user->quyen == 1) {{"checked"}}
                                    @endif
                                    >Cộng tác viên
                                </label>
                                @endif
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" value="2"
                                    @if($user->quyen == 2) {{"checked"}}
                                    @endif
                                    >Quản trị
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái: </label>
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="1" 
                                    @if($user->status == 1) {{"checked"}}
                                    @endif
                                    >Hoạt động
                                </label>
                                @if($user->quyen != 2)
                                <label class="radio-inline">
                                    <input type="radio" name="status" value="0"
                                    @if($user->status == 0) {{"checked"}}
                                    @endif
                                    >Vô hiệu tài khoản
                                </label>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="admin/user/danhsach" class="btn btn-dark" role="button">Hủy</a>
                        <form>
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