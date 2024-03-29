@extends('layout.index')

@section('content')
    <!-- Page Content -->
    <div class="container">

        @if(session('notification'))
            <div class="alert alert-danger">{{session('notification')}}</div>
        @endif
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$news->TieuDe}}</h1>

                <!-- Preview Image -->
                <img class="img-responsive img-rounded" src="upload/tintuc/{{$news->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Ngày đăng: {{$news->created_at}}</p>
                <p><span class="glyphicon glyphicon-time"></span> Chỉnh sửa lúc: {{$news->updated_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                	{!! $news->NoiDung!!}
                </p>
                
                <hr>
                {{-- Like button --}}
                @if(Auth::check())
                    <form role="form" method="POST" id="form_like">
                        @csrf
                        <?php
                            $filter = $news->Like->filter(function($value, $key) {
                                return $value->idUser == Auth::user()->id;
                            })->count();
                        ?>
                        <input type="hidden" name="idUser" id="idUser" value="{{Auth::user()->id}}">
                        <input type="hidden" name="idTinTuc" id="idTinTuc" value="{{$news->id}}">
                        <input type="submit" id="btn_like"
                        @if($filter)
                            class="btn btn-danger" value="Không thích">
                        @else
                            class="btn btn-primary" value="Thích">
                        @endif
                    </form>
                @endif
                <p id="count-like" data-value="{{$countLike}}">Lượt thích: {{$countLike}}</p>
                <hr>

                <!-- Comments Form -->
                @if(Auth::check())
                <div class="well">
                    <h5>Viết bình luận... <span class="glyphicon glyphicon-pencil"></span></h5>
                    <form role="form" method="POST" id="form_comment">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="NoiDung" id="NoiDung"></textarea>
                            <input type="hidden" name="idTinTuc" id="idTinTuc" value="{{$news->id}}">
                            <input type="hidden" name="idUser" id="idUser" value="{{Auth::user()->id}}">
                            <input type="hidden" name="User" id="User" value="{{Auth::user()->name}}">
                        </div>
                        <input type="submit" class="btn btn-primary" id="btn_comment" value="Gửi"> 
                    </form>
                </div>
                <hr>
                @endif

                <!-- Comment -->
                <div id="data-comment">
                    @foreach($news->comment as $cm)
                        @if($cm->user->status == 1)
                            <div class="media">
                                <div class="media-body list-comment">
                                    <h5 class="media-heading">{{$cm->user->name}}: {{$cm->NoiDung}}<br>
                                        <small>{{$cm->created_at}}</small>
                                    </h5>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
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
                                <a href="news/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}">
                                    <img class="img-responsive img-rounded" src="upload/tintuc/{{$tlq->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="news/{{$tlq->id}}/{{$tlq->TieuDeKhongDau}}"><b>{{$tlq->TieuDe}}</b></a>
                            </div>
                            <p style="padding: 10px">{{$tlq->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                    </div>
                </div>
                
                {{-- Hot news --}}
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($hotnews as $tnb)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="news/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}">
                                    <img class="img-responsive img-rounded" src="upload/tintuc/{{$tnb->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="news/{{$tnb->id}}/{{$tnb->TieuDeKhongDau}}"><b>{{$tnb->TieuDe}}</b></a>
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

{{-- Ajax comment --}}
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Ajax comment
        $(document).ready(function() {
            $('#form_comment').on('submit',function(event){
                
                //Bỏ qua submit
                event.preventDefault();
                
                //Lấy toàn bộ value cho vào biến form_data
                var form_data = $(this).serialize();
                
                //Kỹ thuật ajax
                $.ajax({
                    url: "comment",
                    method: "POST",
                    data: form_data,
                    dataType:"JSON",

                    //Nhận kết quả trả về từ Controller
                    success:function(data){
                        $("#data-comment").append(
                            '<div class="media">'+
                                '<div class="media-body list-comment">'+
                                    '<h5 class="media-heading">'+data.name+": "+data.comment.NoiDung+'</h5>'+
                                    '<small>'+data.comment.created_at+
                                    '</small>'+
                                '</div>'+
                            '</div>'
                        );

                        //Reset form sau khi comment
                        $('#form_comment')[0].reset();
                    }
                });
            });
        });

        //Ajax button like
        $(document).ready(function() {
            $('#form_like').on('submit',function(event){
                
                //Bỏ qua submit
                event.preventDefault();
                
                //Lấy toàn bộ value cho vào biến form_data
                var form_data = $(this).serialize();
                
                //Kỹ thuật ajax
                $.ajax({
                    url: "like",
                    method: "POST",
                    data: form_data,
                    dataType:"JSON",

                    //Nhận kết quả trả về từ Controller
                    success:function(data){
                        console.log(data);
                        var data_value = $("#count-like").attr("data-value")
                        console.log(data_value)
                        if (data['status'] == 1) {
                            $("#btn_like").replaceWith('<input type="submit" id="btn_like" class="btn btn-danger" value="Không thích">');
                            var likes = parseInt(data_value) + 1;
                            $("#count-like").replaceWith('<p id="count-like" data-value="'+likes+'">Lượt thích: '+likes+'</p>');

                        }else{
                            $("#btn_like").replaceWith('<input type="submit" id="btn_like" class="btn btn-primary" value="Thích">');
                            var likes=parseInt(data_value) - 1;
                            $("#count-like").replaceWith('<p id="count-like" data-value="'+likes+'">Lượt thích: '+likes+'</p>');
                        }
                    }
                });
            });
        });
    </script>
@endsection