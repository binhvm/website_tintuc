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
                      
                    @if(session('notification'))
                        <div class="alert alert-danger">{{session('notification')}}</div>
                    @endif
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th> STT</th>
                                <th> Tên</th>
                                <th> Tên không dấu</th>
                                <th> Hành động</th>
                                <th> Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr class="odd gradeX" align="center">
                                <td>{{$category->id}}</td>
                                <td>{{$category->Ten}}</td>
                                <td>{{$category->TenKhongDau}}</td>
                                <td>
                                    <a href="admin/categories/edit/{{$category->id}}"><input type="button" class="btn btn-warning" id="btn_comment" value="Sửa"></a>
                                </td>
                                <td>
                                    <a href="admin/categories/delete/{{$category->id}}"><input type="button" class="btn btn-danger" id="btn_comment" value="Xóa"></a>
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