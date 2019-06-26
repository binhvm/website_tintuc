@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Danh sách chờ phê duyệt</small>
                        </h1>
                    </div>

                    @if(session('notification'))
                        <div class="alert alert-danger">{{session('notification')}}</div>
                    @endif
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Tóm tắt</th>
                                <th>Thể loại</th>
                                <th>Loại tin</th>
                                <th>Nổi bật</th>
                                <th>Hành động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($news as $news)
                            @if($news->PheDuyet == 0)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$news->id}}</td>
                                    <td>
                                        <img width="50px" height="50px" class="img-rounded" src="upload/tintuc/{{$news->Hinh}}"><br>
                                        {{$news->TieuDe}}</td>
                                    <td>{{$news->TomTat}}</td>
                                    <td>{{$news->loaitin->theloai->Ten}}</td>
                                    <td>{{$news->loaitin->Ten}}</td>
                                    <td>{{$news->NoiBat}}</td>
                                    <td class="center"><a href="admin/news/pheduyet/{{$news->id}}"><input type="button" class="btn btn-success" value="Phê duyệt"></a></td>
                                    <td class="center"><a href="admin/news/delete/{{$news->id}}"><input type="button" class="btn btn-danger" value="Xóa"></a></td>
                                </tr>
                            @endif
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