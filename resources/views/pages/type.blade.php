@extends('layout.index')

@section('content')

    <!-- Page Content -->
    <div class="container">
        @if(session('thongbao'))
            <div class="alert alert-danger">{{session('thongbao')}}</div>
        @endif
        <div class="row">
            @include('layout.menu')

            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>{{$types->Ten}}</b></h4>
                    </div>
					
					@foreach($news as $new)
                    @if($new->PheDuyet == 1)
	                    <div class="row-item row">
	                        <div class="col-md-3">

	                            <a href="news/{{$new->id}}/{{$new->TieuDeKhongDau}}">
	                                <br>
	                                <img width="200px" height="200px" class="img-responsive img-rounded" src="upload/tintuc/{{$new->Hinh}}" alt="">
	                            </a>
	                        </div>

	                        <div class="col-md-9">
	                            <h3>{{$new->TieuDe}}</h3>
	                            <p>{{$new->TomTat}}</p>
	                            <a class="btn btn-primary" href="news/{{$new->id}}/{{$new->TieuDeKhongDau}}">Xem chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
	                        </div>
	                        <div class="break"></div>
	                    </div>
                    @endif
                    @endforeach

                    <!-- Pagination -->
                    <div class="row text-center">
                        <div class="col-lg-12">
                            {{$news->links()}}
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
    <!-- end Page Content -->

@endsection