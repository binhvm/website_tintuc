@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                        
                        @if(session('thongbao'))
                            <div class="alert alert-success">{{session('thongbao')}}</div>
                        @endif

                        <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slide</label>
                                <input class="form-control" name="Ten" placeholder="Vui lòng nhập tên slide" value="{{old('Ten')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="NoiDung" placeholder="Vui lòng nhập nội dung" value="{{old('NoiDung')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" type="file" name="Hinh"/>
                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input class="form-control" name="link" placeholder="Vui lòng nhập liên kết" value="{{old('link')}}">
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="admin/slide/danhsach" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection