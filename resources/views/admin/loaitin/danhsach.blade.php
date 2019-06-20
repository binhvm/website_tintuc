@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Loại tin
                            <small>Danh sách</small>
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
                                <th>Thể loại</th>
                                <th>Loại tin</th>
                                <th>Tên không dấu</th>
                                <th>Hành động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($loaitin as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{$lt->id}}</td>
                                <td>{{$lt->theloai->Ten}}</td>
                                <td>{{$lt->Ten}}</td>
                                <td>{{$lt->TenKhongDau}}</td>
                                <td>
                                    <a href="admin/loaitin/sua/{{$lt->id}}"><input type="button" class="btn btn-warning" id="btn_comment" value="Sửa"></a>
                                </td>
                                <td>
                                    <a href="admin/loaitin/xoa/{{$lt->id}}"><input type="button" class="btn btn-danger" id="btn_comment" value="Xóa"></a>
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