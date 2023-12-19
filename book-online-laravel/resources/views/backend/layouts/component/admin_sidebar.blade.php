<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: darkcyan;">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading text-light">QUẢN LÝ CHUNG</div>
                <a id="text-color" class="nav-link {{Request::routeIs('admin.dashboard')?'active':''}} fw-bold" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    THỐNG KÊ
                </a>
                <div class="sb-sidenav-menu-heading text-light">CÀI ĐẶT</div>
                <!-- menu book_genre (the loai sach) -->
                <a id="text-color" class="nav-link {{Request::routeIs('admin.personal')||Request::routeIs('admin.changePassword')?'collapse active':'collapsed'}} fw-bold" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAdmin" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    Tài khoản
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::routeIs('admin.personal')||Request::routeIs('admin.changePassword')?'show':''}}" id="collapseAdmin" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::routeIs('admin.personal')?'active':''}}" href="{{ route('admin.personal') }}">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-address-card"></i></div>
                            Thông tin cá nhân
                        </a>
                        <a class="nav-link {{Request::routeIs('admin.changePassword')?'active':''}}" href="{{ route('admin.changePassword') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-unlock-keyhole"></i></div>
                            Đổi mật khẩu
                        </a>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading text-light">QUẢN LÝ SÁCH</div>
                <!-- menu book_genre (the loai sach) -->
                <a id="text-color" class="nav-link {{Request::routeIs('genre.index')||Request::routeIs('genre.create')?'collapse active':'collapsed'}} fw-bold" href="#" data-bs-toggle="collapse" data-bs-target="#collapseGenre" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    THỂ LOẠI
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::routeIs('genre.index')||Request::routeIs('genre.create')?'show':''}}" id="collapseGenre" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::routeIs('genre.index')?'active':''}}" href="{{ route('genre.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list text-success"></i></div>
                            Xem Danh sách
                        </a>
                        <a class="nav-link {{Request::routeIs('genre.create')?'active':''}}" href="{{ route('genre.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus text-primary"></i></div>
                            Thêm mới
                        </a>
                    </nav>
                </div>
                <!-- menu book-->
                <a id="text-color" class="nav-link {{Request::routeIs('book.index')||Request::routeIs('book.create')?'collapse active':'collapsed'}} fw-bold" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBook" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    SÁCH
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::routeIs('book.index')||Request::routeIs('book.create')?'show':''}}" id="collapseBook" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::routeIs('book.index')?'active':''}}" href="{{ route('book.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list text-success"></i></div>
                            Xem Danh sách
                        </a>
                        <a class="nav-link {{Request::routeIs('book.create')?'active':''}}" href="{{ route('book.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus text-primary"></i></div>
                            Thêm mới
                        </a>
                    </nav>
                </div>
                <!-- menu book_chapter -->
                <a id="text-color" class="nav-link {{Request::routeIs('chapter.index')||Request::routeIs('chapter.create')?'collapse active':'collapsed'}} fw-bold" href="#" data-bs-toggle="collapse" data-bs-target="#collapseChapter" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tag"></i></div>
                    CHAPTER
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{Request::routeIs('chapter.index')||Request::routeIs('chapter.create')?'show':''}}" id="collapseChapter" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{Request::routeIs('chapter.index')?'active':''}}" href="{{ route('chapter.index') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-clipboard-list text-success"></i></div>
                            Xem Danh sách
                        </a>
                        <a class="nav-link {{Request::routeIs('chapter.create')?'active':''}}" href="{{ route('chapter.create') }}">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-circle-plus text-primary"></i></div>
                            Thêm mới
                        </a>
                    </nav>
                </div>
                <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a> -->
            </div>
        </div>
        <!-- <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div> -->
    </nav>
</div>