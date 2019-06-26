@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
                            <small>Thêm</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        
                        @if(session('notification'))
                            <div class="alert alert-success">{{session('notification')}}</div>
                        @endif

                        <form action="admin/user/add" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên người dùng</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập tên người dùng" value="{{old('name')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Vui lòng nhập tên email" value="{{old('email')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input class="form-control" type="password" name="password" placeholder="Vui lòng nhập mật khẩu" required/>
                            </div>
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input class="form-control" type="password" name="repassword" placeholder="Vui lòng nhập xác nhận mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <label>Quyền: </label>
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" value="0" checked>Thành viên
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="quyen" value="1">Cộng tác viên
                                </label>
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="admin/user/list" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection