@extends('layout.index')

@section('content')

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            @include('layout.menu')

            <?php
            function doimau($str, $key)
            {
                return str_replace($key, "<span style= 'color: red;'>$key</span>", $str);
            }
            ?>

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm: {{$key}}</b></h4>
                    </div>
					
					@foreach($data as $tt)
	                    <div class="row-item row">
	                        <div class="col-md-3">

	                            <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}">
	                                <br>
	                                <img width="200px" height="200px" class="img-responsive img-rounded" src="upload/tintuc/{{$tt->Hinh}}" alt="">
	                            </a>
	                        </div>

	                        <div class="col-md-9">
	                            <h3>{!! doimau($tt->TieuDe, $key) !!}</h3>
	                            <p>{!! doimau($tt->TomTat, $key)!!}</p>
	                            <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
	                        </div>
	                        <div class="break"></div>
	                    </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{$data->appends(['search' => Request::get('search')])->links()}}
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div> 
        </div>
    </div>
    <!-- end Page Content -->

@endsection