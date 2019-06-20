@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>Xóa</small>
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

                        <form action="admin/loaitin/xoa/{{$loaitin->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="TheLoai" >
                                    @foreach($theloai as $tl)
                                        <option
                                        @if($loaitin->idTheLoai == $tl->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên loại tin</label>
                                <input class="form-control" readonly value="{{$loaitin->Ten}}" />
                            </div>
                            <button type="submit" class="btn btn-danger">Xóa</button>
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