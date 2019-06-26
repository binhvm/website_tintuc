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
                    
                    @if(session('notification'))
                        <div class="alert alert-danger">{{session('notification')}}</div>
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
                            @foreach($users as $user)
                            <tr class="odd gradeX" align="center">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->quyen == 0)
                                        {{"Thành viên"}}
                                    @elseif($user->quyen == 1)
                                        {{"Cộng tác viên"}}
                                    @else
                                        {{"Quản trị viên"}}
                                    @endif
                                </td>
                                <td>
                                    @if($user->status == 1)
                                        {{"Hoạt động"}}
                                    @else
                                        {{"Vô hiệu"}}
                                    @endif
                                </td>
                                <td>
                                    <a href="admin/user/edit/{{$user->id}}"><input type="button" class="btn btn-warning" id="btn_edit" value="Sửa"></a>
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