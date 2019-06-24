@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
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

                        <form action="admin/tintuc/them" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể lọai</label>
                                <select class="form-control" name="idTheLoai" id="idTheLoai" required>
                                    <option>Vui lòng chọn thể loại</option>
                                    @foreach($theloai as $tl)
                                        <option value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="idLoaiTin" id="idLoaiTin" required>
                                    <option>Vui lòng chọn loại tin</option>
                                    @foreach($loaitin as $lt)
                                        <option value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" placeholder="Vui lòng nhập tiêu đề" value="{{old('TieuDe')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input class="form-control" name="TomTat" placeholder="Vui lòng nhập tóm tắt" value="{{old('TomTat')}}" required />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung" value="{{old('NoiDung')}}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input class="form-control" type="file" name="Hinh"/>
                            </div>
                            <label>Nổi bật: </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="1">Có
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="0" checked="">Không
                            </label>
                            <br>
                            <button type="submit" class="btn btn-success">Thêm</button>
                            <a href="admin/tintuc/danhsach" class="btn btn-dark" role="button">Hủy</a>
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
        $(document).ready(function(){
            $("#TheLoai").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/loaitin/"+idTheLoai, function(data){
                    $("#LoaiTin").html(data);
                });
            });
        });
    </script>
@endsection