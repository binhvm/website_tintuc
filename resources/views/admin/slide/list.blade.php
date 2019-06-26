@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
                            <small>Danh sách</small>
                        </h1>
                    </div>

                    @if(session('notification'))
                        <div class="alert alert-success">{{session('notification')}}</div>
                    @endif
                    
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>STT</th>
                                <th>Tên slide</th>
                                <th>Nội dung</th>
                                <th>Hình</th>
                                <th>Liên kết</th>
                                <th>Hành động</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slide as $slide)
                            <tr class="odd gradeX" align="center">
                                <td>{{$slide->id}}</td>
                                <td>{{$slide->Ten}}</td>
                                <td>{{$slide->NoiDung}}</td>
                                <td>
                                    <img class="img-rounded" width="100px" src="upload/slide/{{$slide->Hinh}}">
                                </td>
                                <td>{{$slide->link}}</td>
                                <td>
                                    <a href="admin/slide/edit/{{$slide->id}}"><input type="button" class="btn btn-warning" id="btn_edit" value="Sửa"></a>
                                </td>
                                <td>
                                    <a href="admin/slide/delete/{{$slide->id}}"><input type="button" class="btn btn-danger" id="btn_delete" value="Xóa"></a>
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