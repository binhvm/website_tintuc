@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
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

                        <form action="admin/loaitin/them" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Thể lọai</label>
                                <select class="form-control" name="TheLoai" required="">
                                    <option value="0">Vui lòng chọn thể loại</option>
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <input class="form-control" name="Ten" placeholder="Vui lòng nhập tên loại tin" value="{{old('Ten')}}" required="" />
                            </div>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="admin/loaitin/danhsach" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection