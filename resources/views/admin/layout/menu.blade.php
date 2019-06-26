            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a><i class="fa fa-dashboard fa-fw"></i> Menu</a>
                        </li>
                        @if(Auth::user()->quyen == 2)
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Người dùng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/user/list"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/user/add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Slide<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/slide/list"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/slide/add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/categories/list"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/categories/add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Loại tin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/types/list"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/types/add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-newspaper-o"></i> Tin tức<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="admin/news/list"><i class="fa fa-list-ol" aria-hidden="true"></i> Danh sách</a>
                                </li>
                                <li>
                                    <a href="admin/news/add"><i class="fa fa-plus-square" aria-hidden="true"></i> Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->