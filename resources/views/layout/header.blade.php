
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homepage">Tin tức 24/7</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="contact">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="contact">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search" action="search" method="get">
			        <div class="form-group">
			          <input type="text" name='search' class="form-control" placeholder="Tìm kiếm" required="">
			        </div>
			        <button type="submit" class="btn btn-secondary">Tìm</button>
			    </form>

			    <ul class="nav navbar-nav pull-right">
                        @if(Auth::check())
                            <li>
                                <a href="account/{{Auth::user()->id}}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a>
                            </li>
                            @if(Auth::user()->quyen == 1)
                                <li>
                                    <a href="admin/news/add"><span class="glyphicon glyphicon-th"></span> Đăng bài</a>
                                </li>
                            @elseif(Auth::user()->quyen == 2)
                                <li>
                                    <a href="admin/user/list"><span class="glyphicon glyphicon-th"></span> Quản trị website</a>
                                </li>
                            @endif
                            <li>
                                <a href="logout"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a>
                            </li>
                        @else
                            <li>
                            	<a href="login"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a>
                            </li>
                            <li>
                            	<a href="register"><span class="glyphicon glyphicon-plus"></span> Đăng ký</a>
                            </li>
                        @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>