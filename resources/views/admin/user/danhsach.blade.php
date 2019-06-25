@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Người dùng
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
                                <th>STT</th>
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $u)
                            <tr class="odd gradeX" align="center">
                                <td>{{$u->id}}</td>
                                <td>{{$u->name}}</td>
                                <td>{{$u->email}}</td>
                                <td>
                                    @if($u->quyen == 0)
                                        {{"Thành viên"}}
                                    @elseif($u->quyen == 1)
                                        {{"Cộng tác viên"}}
                                    @else
                                        {{"Quản trị viên"}}
                                    @endif
                                </td>
                                <td>
                                    @if($u->status == 1)
                                        {{"Hoạt động"}}
                                    @else
                                        {{"Vô hiệu"}}
                                    @endif
                                </td>
                                <td>
                                    <a href="admin/user/sua/{{$u->id}}"><input type="button" class="btn btn-warning" id="btn_comment" value="Sửa"></a>
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