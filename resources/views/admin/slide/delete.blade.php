@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Sửa</small>
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

                        <form action="admin/slide/delete/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Tên slide</label>
                                <input class="form-control" name="Ten" value="{{$slide->Ten}}" readonly />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <input class="form-control" name="NoiDung" value="{{$slide->NoiDung}}" readonly />
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <br>
                                <img width="300px" class="img-rounded" src="upload/slide/{{$slide->Hinh}}">
                            </div>
                            <div class="form-group">
                                <label>Liên kết</label>
                                <input class="form-control" name="link" value="{{$slide->link}}" readonly>
                            </div>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="admin/slide/lít" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection