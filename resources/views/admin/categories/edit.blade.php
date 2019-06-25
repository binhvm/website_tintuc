@extends('admin.layout.index')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Sửa</small>
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
                        <form action="admin/categories/edit/{{$categories->id}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tên thể loại:</label>
                                <input class="form-control" name="Ten" placeholder="Vui lòng nhập tên thể loại" required="" value="{{$categories->Ten}}" />
                            </div>
                            <button type="submit" class="btn btn-warning">Sửa</button>
                            <a href="admin/categories/list" class="btn btn-dark" role="button">Hủy</a>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection