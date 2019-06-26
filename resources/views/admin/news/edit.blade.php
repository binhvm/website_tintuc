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
                        
                        @if(session('notification'))
                            <div class="alert alert-success">{{session('notification')}}</div>
                        @endif

                        <form action="admin/news/edit/{{$news->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể lọai</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($categories as $category)
                                        <option 
                                        @if($news->loaitin->theloai->id == $category->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$category->id}}">{{$category->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="LoaiTin" id="LoaiTin">
                                    @foreach($types as $type)
                                        <option
                                        @if($news->loaitin->id == $type->id)
                                            {{"selected"}}
                                        @endif 
                                        value="{{$type->id}}">{{$type->Ten}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="TieuDe" value="{{$news->TieuDe}}" required />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input class="form-control" name="TomTat" value="{{$news->TomTat}}" required />
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control ckeditor" name="NoiDung">
                                    {{$news->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label><br>
                                <img class="img-rounded" width="300px" src="upload/tintuc/{{$news->Hinh}}">
                                <input class="form-control" type="file" name="Hinh"/>
                            </div>
                            <label>Nổi bật: </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="1"
                                @if($news->NoiBat == 1)
                                    {{"checked"}}
                                @endif
                                >Có
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="NoiBat" value="0"
                                @if($news->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                >Không
                            </label>
                            <br>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="admin/news/list" class="btn btn-dark" role="button">Hủy</a>
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
                            @foreach($news->comment as $cm)
                            <tr class="odd gradeX" align="center">
                                <td>{{$cm->id}}</td>
                                <td>{{$cm->user->name}}</td>
                                <td>{{$cm->NoiDung}}</td>
                                <td>{{$cm->created_at}}</td>
                                <td>
                                    <a href="admin/comment/xoa/{{$cm->id}}/{{$news->id}}"><input type="button" class="btn btn-danger" id="btn_comment" value="Xóa"></a>
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