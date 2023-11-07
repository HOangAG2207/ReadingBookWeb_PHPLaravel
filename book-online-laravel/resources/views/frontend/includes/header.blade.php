<!-- header -->
<div class="p-3 text-center bg-white navbar-1">
    <div class="container">
        <div class="row">
            <!-- Left elements -->
            <div class="col-lg-3 col-md-12 col-12 mb-lg-0 mb-3 d-flex justify-content-center justify-content-md-start align-items-center">
                <a href="{{route('home')}}" class="ms-md-2">
                    <img src="{{asset('assets\images\logos\logo-bookonline.png')}}" height="30px" />
                </a>
            </div>
            <!-- Left elements -->

            <!-- cent elements -->
            <div class="col-lg-6 col-md-10 col-8 align-middle">
                <form class="input-group w-auto my-auto rounded" style="border: solid 2px darkcyan;background: darkcyan;">
                    <input autocomplete="on" type="search" class="form-control border-0" placeholder="Nhập từ khóa để tìm kiếm sách..." />
                    <span class="input-group-text border-0 rounded" style="background: darkcyan;"><i class="fas fa-search text-white"></i>
                    </span>
                </form>
            </div>
            <!-- cent elements -->

            <!-- Right elements -->
            <div class="col-lg-3 col-md-2 col-4 d-flex justify-content-end">
                <ul class="navbar-nav d-flex align-items-center flex-row">
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="{{ route('login') }}">Đăng nhập</a>
                    </li>
                    @endif
                    <li class="nav-item d-none d-lg-block"><a class="mx-1 text-secondary fw-bold">|</a></li>
                    @if (Route::has('register'))
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link text-primary fw-bold " href="{{ route('register') }}">Đăng ký</a>
                    </li>
                    @endif
                    @else
                    <!-- Avatar -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center py-1" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle me-2" height="30" alt="" loading="lazy" />
                            <i class="fa-solid fa-caret-down" style="color: darkcyan;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="min-width: 19rem;">
                            <li>
                                <div class="px-3 pt-3 d-flex">
                                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img (31).jpg" class="rounded-circle me-3" height="40" alt="" loading="lazy" />
                                    <div>
                                        <h6 class="mb-0 fw-bold">{{ Auth::user()->name }}</h6>
                                        <p class="mb-2 text-secondary">{{ Auth::user()->email }}</p>
                                        <a class="mb-0 text-primary" href=""><i class="fa-solid fa-address-book me-1"></i>Thông tin cá nhân</a>
                                    </div>
                                </div>
                                <hr class="mb-1">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}" target="_blank">
                                    <i class="fa-solid fa-unlock me-2"></i>
                                    <span>Trang quản lý</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-unlock me-2"></i>
                                    <span>Đổi mật khẩu</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-brands fa-gratipay me-2" style="color:rgb(220, 29, 68)"></i>
                                    <span>Sách yêu thích</span>
                                </a>
                            </li>
                            <hr class="my-2">
                            <li class="mb-1">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
            <!-- Right elements -->
        </div>
    </div>
</div>
<!-- header -->