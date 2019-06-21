@extends('layout.index')

@section('content')
    <!-- Page Content -->
<div class="container">

	@if(session('thongbao'))
		<div class="alert alert-danger">{{session('thongbao')}}</div>
	@endif
	
	@include('layout.slide')

        <div class="space20"></div>
        <div class="row main-left">
			@include('layout.menu')

            <div class="col-md-9">
	            <div class="panel panel-default">            
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức Nổi Bật</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($theloai as $tl)
	            			@if(count($tl->loaitin) > 0)
		            		<!-- item -->
						    <div class="row-item row">
			                	<h3>
			                		{{$tl->Ten}} | 	
			                		@foreach($tl->loaitin as $lt)
			                			@if(count($lt->tintuc) > 0)
			                				<small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}"><i>{{$lt->Ten}}</i></a> |</small>
			                			@endif
			                		@endforeach
			                	</h3>
			                	<?php
			                		$data = $tl->tintuc->where('NoiBat', 1)->sortByDesc('create_at')->take(5);
			                		$tin1 = $data->shift();
			                	?>
			                	<div class="col-md-8 border-right">
			                		<div class="col-md-5">
				                        <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
				                            <img class="img-responsive img-rounded" width="200px" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
				                        </a>
				                    </div>

				                    <div class="col-md-7">
				                        <h3>{{$tin1['TieuDe']}}</h3>
				                        <p>{{$tin1['TomTat']}}</p>
				                        <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
									</div>
			                	</div>
			                    
								<div class="col-md-4">
									@foreach($data->all() as $dt)
									<a href="tintuc/{{$dt['id']}}/{{$dt['TieuDeKhongDau']}}">
										<h4>
											<span class="glyphicon glyphicon-list-alt"></span>
											{{$dt['TieuDe']}}
										</h4>
									</a>
									@endforeach
								</div>
								
								<div class="break"></div>
			                </div>
			                <!-- end item -->
			                @endif
		                @endforeach
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection