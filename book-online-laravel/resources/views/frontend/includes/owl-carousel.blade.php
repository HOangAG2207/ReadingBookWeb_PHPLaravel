<div class="owl-carousel container">
    @for($i=1;$i<=10;$i++)
    <div class="item d-flex justify-content-center align-items-center rounded" style="position:relative;">
        <img id="frame" src="{{ asset('assets/images/no_image.jpg') }}" class="rounded card-img-bottom object-fit-cover" width="180px" height="250px">
        <div class="content bg-secondary w-100 text-white text-center" style="position:absolute; bottom:0;opacity:0.9">
            <div class="top-title px-1">
                <a href="" class="book_title">{{$i}}</a>
            </div>
            <div class="book_content d-flex justify-content-evenly align-items-center mb-1">
                <a href="" class="fw-bold">Chương 1</a>
                <small class="chapter-time"><i class="fa-regular fa-clock"></i> 12 giờ trước</small>
            </div>
        </div>
    </div>
    @endfor
</div>

<script type="text/javascript">
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        center: false,
        dots: false,
        loop: true,
        margin: 10,
        mouseDrag: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 2000,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            300: {
                items: 2,
            },
            480: {
                items: 2,
            },
            768: {
                items: 3,
            },
            900: {
                items:4,
            },
            1000: {
                items: 5,
            },
            1050: {
                items: 5,
            },
            1100: {
                items: 5,
            },
            1200: {
                items: 6,
            },
        }
    });
    // $(document).ready(function(e) {
    //     e.preventDefault();
    //     owl.trigger('play.owl.autoplay', [5000])
    // });
</script>