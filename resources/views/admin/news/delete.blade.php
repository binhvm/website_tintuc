@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
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
                        
                        @if(session('notification'))
                            <div class="alert alert-success">{{session('notification')}}</div>
                        @endif

                        <form action="admin/news/delete/{{$news->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Thể lọai</label>
                                <select class="form-control" name="TheLoai" id="TheLoai">
                                    @foreach($categories as $caregory)
                                        <option 
                                        @if($news->loaitin->theloai->id == $caregory->id)
                                            {{"selected"}}
                                        @endif
                                        value="{{$caregory->id}}">{{$caregory->Ten}}</option>
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
                                <input class="form-control" readonly="" value="{{$news->TieuDe}}"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <input class="form-control" readonly="" value="{{$news->TomTat}}"/>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="demo" class="form-control" readonly="">
                                    {{$news->NoiDung}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label><br>
                                <img class="img-rounded" width="300px" src="upload/tintuc/{{$news->Hinh}}">
                            </div>
                            <label>Nổi bật: </label>
                            @if($news->NoiBat == 0)
                            {{"Không"}}
                            @else
                            {{"Có"}}
                            @endif
                             {{-- <input type="radio" name="NoiBat" value="0"
                                @if($news->NoiBat == 0)
                                    {{"checked"}}
                                @endif
                                >Không --}}
                            <br>
                            <button type="submit" class="btn btn-danger">Xóa</button>
                            <a href="admin/news/list" class="btn btn-dark" role="button">Hủy</a>
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
            $("#Category").change(function(){
                var idTheLoai = $(this).val();
                $.get("admin/ajax/types/"+idTheLoai, function(data){
                    $("#Type").html(data);
                });
            });
        });
    </script>
@endsection