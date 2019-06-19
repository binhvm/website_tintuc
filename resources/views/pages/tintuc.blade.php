@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

                <!-- Preview Image -->
                <img class="img-responsive img-rounded" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Ngày đăng: {{$tintuc->created_at}}</p>
                <p><span class="glyphicon glyphicon-time"></span> Chỉnh sửa lúc: {{$tintuc->updated_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!! $tintuc->NoiDung!!}
                </p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::check())
                <div class="well">
                    <h5>Viết bình luận...<span class="glyphicon glyphicon-pencil"></span></h5>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"> Gửi</button>
                    </form>
                </div>
                <hr>
                @endif

                <!-- Posted Comments -->

                <!-- Comment -->
                @foreach($tintuc->comment as $cm)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h5>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tlq)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}">
                                    <img class="img-responsive img-rounded" src="upload/tintuc/{{$tlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}"><b>{{$tlq->TieuDe}}</b></a>
                            </div>
                            <p style="padding: 10px">{{$tlq->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinnoibat as $tnb)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}">
                                    <img class="img-responsive img-rounded" src="upload/tintuc/{{$tnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}"><b>{{$tnb->TieuDe}}</b></a>
                            </div>
                            <p style="padding: 10px">{{$tnb->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection