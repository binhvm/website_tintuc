            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	Danh sách
                    </li>
					@foreach($categories as $category)
                    @if(count($category->loaitin) > 0)
                    <li href="#" class="list-group-item menu1">
                    	{{$category->Ten}}
                    </li>
                    <ul>
                    	@foreach($category->loaitin as $lt)
	                		<li class="list-group-item">
	                			<a href="types/{{$lt->id}}/{{$lt->TenKhongDau}}">{{$lt->Ten}}</a>
	                		</li>
                		@endforeach
                    </ul>
                    @endif
                    @endforeach
                </ul>
            </div>