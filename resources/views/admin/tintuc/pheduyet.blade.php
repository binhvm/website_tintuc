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

                    @if(session('thongbao'))
                        <div class="alert alert-danger">{{session('thongbao')}}</div>
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
                            @foreach($tintuc as $tt)
                            @if($tt->PheDuyet == 0)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$tt->id}}</td>
                                    <td>
                                        <img width="50px" height="50px" class="img-rounded" src="upload/tintuc/{{$tt->Hinh}}"><br>
                                        {{$tt->TieuDe}}</td>
                                    <td>{{$tt->TomTat}}</td>
                                    <td>{{$tt->loaitin->theloai->Ten}}</td>
                                    <td>{{$tt->loaitin->Ten}}</td>
                                    <td>{{$tt->NoiBat}}</td>
                                    <td class="center"><a href="admin/tintuc/pheduyet/{{$tt->id}}"><input type="button" class="btn btn-success" value="Phê duyệt"></a></td>
                                    <td class="center"><a href="admin/tintuc/xoa/{{$tt->id}}"><input type="button" class="btn btn-danger" value="Xóa"></a></td>
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