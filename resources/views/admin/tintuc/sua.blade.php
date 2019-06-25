@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Sửa</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:60px">
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

                        <form action="admin/tintuc/sua/{{$tintuc->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể lọai</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($theloai as $tl)
                                        <option 
                                        @if($tintuc->loaitin->theloai->id == $tl->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$tl->id}}">{{$tl->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($loaitin as $lt)
                                        <option
                                        @if($tintuc->loaitin->id == $lt->id)
                                            {{"selected"}}
                                        @endif 
                                        value="{{$lt->id}}">{{$lt->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" value="{{$tintuc->TieuDe}}" required />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input class="form-control" name="TomTat" value="{{$tintuc->TomTat}}" required />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung">
                                    {{$tintuc->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label><br>
                                <img class="img-rounded" width="300px" src="upload/tintuc/{{$tintuc->Hinh}}">
                                <input class="form-control" type="file" name="Hinh"/>
                            </div>
                            <label>Nổi bật: </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="1"
                                @if($tintuc->NoiBat == 1)
                                    {{"checked"}}
                                @endif
                                >Có
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="0"
                                @if($tintuc->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                >Không
                            </label>
                            <br>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="admin/tintuc/danhsach" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->

                {{-- Comment list --}}
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Bình luận
                            <small>Danh sách</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tintuc->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td>
                                    <a href="admin/comment/xoa/{{$cm->id}}/{{$tintuc->id}}"><input type="button" class="btn btn-danger" id="btn_comment" value="Xóa"></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
            $("#Category").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/types/"+idTheLoai, function(data){
                    $("#Type").html(data);
                });
            });
        });
    </script>
@endsection