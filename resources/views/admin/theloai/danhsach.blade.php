@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
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
                                <th> STT</th>
                                <th> Tên</th>
                                <th> Tên không dấu</th>
                                <th>Hành động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{$tl->id}}</td>
                                <td>{{$tl->Ten}}</td>
                                <td>{{$tl->TenKhongDau}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/theloai/xoa/{{$tl->id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/theloai/sua/{{$tl->id}}"> Sửa</a></td>
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