<ul class="nav nav-tabs justify-content-center mt-3 shadow-sm" id="myTab" role="tablist">
    <li class="nav-item w-50" role="presentation">
        <button class="nav-link active fw-bold w-100" id="day-tab" data-bs-toggle="tab" data-bs-target="#day" type="button" role="tab" aria-controls="day" aria-selected="true">Top Ngày</button>
    </li>
    <li class="nav-item w-50" role="presentation">
        <button class="nav-link fw-bold w-100" id="month-tab" data-bs-toggle="tab" data-bs-target="#month" type="button" role="tab" aria-controls="month" aria-selected="false">Top Tháng</button>
    </li>
</ul>
<div class="card border-0">
    <div class="tab-content bg-white" id="myTabContent">
        <!-- Top Ngày -->
        <div class="card-body tab-pane fade show active" id="day" role="tabpanel" aria-labelledby="day-tab">
            <?php
            $text_color = array('danger', 'warning', 'primary');
            ?>
            @for($i=1;$i<=5;$i++) <div class="d-flex align-items-center justify-content-center my-3">
                <div class="me-2 rounded-circle p-1">
                    <a class="circle text-decoration-none fw-bold text-{{$i<=3?$text_color[$i-1]:'secondary'}}" style="font-size:18px;">
                        @if($i<10) 0{{$i}} @else {{$i}} @endif 
                    </a>
                </div>
                <div class="me-2">
                    <img id="" src="{{asset('assets/images/no_image.jpg')}}" class="shadow-sm rounded card-img-bottom object-fit-cover" style="height: 60px; width:50px;" />
                </div>
                <div class="content">
                    <div class="top-title text-start"><a class="" style="color: darkcyan;">Truyen hay nhat vũ trụ này nè nè dđnè nè nè nè nè</a></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-secondary fw-bold">Chap 2000</small>
                        <small class="text-secondary "><i class="fa-solid fa-eye"></i> 1.235K</small>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <!-- Top ngày -->
    <!-- Top Tháng -->
    <div class="card-body tab-pane fade" id="month" role="tabpanel" aria-labelledby="month-tab">
        @php
        $text_color = array('danger', 'warning', 'primary');
        @endphp
        @for($i=1;$i<=5;$i++) <div class="d-flex align-items-center justify-content-center my-3">
            <div class="me-2 rounded-circle p-1">
                <a class="circle text-decoration-none fw-bold text-{{$i<=3?$text_color[$i-1]:'secondary'}}" style="font-size:18px;">
                    @if($i<10) 0{{$i}} @else {{$i}} @endif 
                </a>
            </div>
            <div class="me-2">
                <img id="" src="{{asset('assets/images/no_image.jpg')}}" class="shadow-sm rounded card-img-bottom object-fit-cover" style="height: 60px; width:50px;" />
            </div>
            <div class="content">
                <div class="top-title text-start"><a class="" style="color: darkcyan;">Truyen hay nhat vũ trụ này nè nè dđnè nè nè nè nè</a></div>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-secondary fw-bold">Chap 1000</small>
                    <small class="text-secondary "><i class="fa-solid fa-eye"></i> 1200</small>
                </div>
            </div>
    </div>
    @endfor
</div>
<!-- Top Tháng -->
</div>
<!-- Top Tuần -->
<!-- <div class="card-body">
                    <?php
                    $text_color = array('danger', 'warning', 'primary');
                    ?>
                    @for($i=1;$i<=10;$i++) 
                    <div class="d-flex align-items-center justify-content-center my-3">
                        <div class="me-2 rounded-circle p-1">
                            <a class="circle text-decoration-none fw-bold text-{{$i<=3?$text_color[$i-1]:'secondary'}}" style="font-size:18px;">
                                @if($i<10) 0{{$i}} @else {{$i}} @endif </a>
                        </div>
                        <div class="me-2">
                            <img id="" src="{{asset('assets/images/no_image.jpg')}}" class="shadow-sm rounded card-img-bottom object-fit-cover" style="height: 60px; width:50px;" />
                        </div>
                        <div class="content">
                            <div class="top-title text-start"><a class="" style="color: darkcyan;">Truyen hay nhat vũ trụ này nè nè dđnè nè nè nè nè</a></div>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-secondary fw-bold">Chap 1000</small>
                                <small class="text-secondary "><i class="fa-solid fa-eye"></i> 1200</small>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div> -->
<!-- Top tuần -->
</div>