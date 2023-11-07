<div id="navbar" class="navbar-2">
    <nav class="nav navbar navbar-expand-lg navbar-dark" style="background: darkcyan;">
        <!-- Container wrapper -->
        <div class="container">
            <li class="nav-link mx-3">
                <a class="navbar-brand floar-start" href="{{route('home')}}">
                    <i class="fa-solid fa-house-chimney-window"></i>
                </a>
            </li>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
                <!-- Left links -->
                <ul class="navbar-nav mb-2 mb-lg-0 px-5">
                    <!-- Navbar dropdown -->
                    <li class="nav-item dropdown position-static fw-bold">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-list"></i> Thể loại
                        </a>
                        <!-- Dropdown menu -->
                        <div class="dropdown-menu w-100 mt-0" aria-labelledby="navbarDropdown"
                            style="border-top-left-radius: 0; border-top-right-radius: 0; border:5px solid darkcyan">
                            <div class="container">
                                <h5><span class="badge"style="background: darkcyan;">DANH SÁCH THỂ LOẠI</span></h5>
                                <div class="row my-4">
                                    @if($genre->count()!=0)
                                    @foreach($genre as $value => $genre)
                                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                        <div class="list-group list-group-flush">
                                            <a href="{{route('home.genre',[$genre->genre_slug])}}" class="list-group-item list-group-item-action border-bottom border-2 title">{{$genre->genre_name}}</a>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item fw-bold">
                        <a class="nav-link text-white" href="#"><i class="fa-solid fa-list"></i> Mới cập nhật</a>
                    </li>
                </ul>
                <!-- Left links -->
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>
</div>