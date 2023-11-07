@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mx-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item h2">
                <p id="text-color" class="text-decoration-none badge rounded-pill bg-light border border-3">SÁCH</p>
            </li>
            <li class="breadcrumb-item h2 active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <div class="card mx-2">
        <div class="card-header">
            <a href="{{ route('book.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%"></th>
                        <th width="5%">#</th>
                        <th width="20%">Tên sách</th>
                        <th width="20%">Thể loại</th>
                        <!-- <th width="40%" class=" d-none d-lg-table-cell d-md-table-cell">Tóm tắt</th> -->
                        <th width="5%">Trạng<br>thái</th>
                        <th width="10%">Ngày<br>tạo</th>
                        <th width="10%">Ngày<br>cập nhật</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data_book as $value => $book)
                    <!-- parent row -->
                    <tr class="align-middle parent-row" id="book-item{{$book->id}}">
                        <td class="text-center"><button class="toggle-btn btn bg-none border-0 cursor-pointer p-0 m-0" style="font-size: 20px;"></button></td> <!-- Plus button -->
                        <td class="text-center">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img id="" src="{{ $book->book_image==null ? 
                                        asset('assets/images/no_image.jpg') 
                                        : asset('storage/uploads/Sach/'.$book->book_image) }}" class="gallery-item rounded card-img-bottom object-fit-cover border border-2 border-info" style="height: 60px; width:50px;" />
                                </div>
                                <div class="col-md-8">
                                    <a class="card-title text-decoration-none text-primary fw-bold">{{ $book->book_name }}</a>
                                    <p class="card-text text-secondary d-none d-lg-block">#{{ $book->book_slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">
                            @if($book->genre)
                            <h5 class="badge bg-secondary rounded-pill">{{ $book->genre->genre_name }}</h5>
                            @endif
                        </td>
                        <!-- <td class="px-3 d-none d-lg-table-cell d-md-table-cell">
                            <div>
                                <p id="book_description" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                    {{ $book->book_description }}
                                </p>
                            </div>
                        </td> -->
                        <td class="text-center">
                            <a href="{{ route('book.changeStatus',[$book->id]) }}" class="btn btn-sm fw-bold btn-{{$book->book_status==1?'success':'danger'}}" style="width:80px;height:30px;">
                                @if($book->book_status==1)
                                <i class="fa-solid fa-circle-check me-1"></i>
                                @else
                                <i class="fa-solid fa-circle-xmark me-1"></i>
                                @endif
                                {{$book->book_status==1?'HIỆN':'ẨN'}}
                            </a>
                        </td>
                        <td class="text-center">
                            @if($book->created_at!=null)
                            <small>{{ $book->created_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $book->created_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            @if($book->updated_at!=null)
                            <small>{{ $book->updated_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $book->updated_at->diffForHumans() }})</small>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('book.edit',['book'=> $book->id]) }}" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('book.destroy',['book'=> $book->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Xóa sách này sẽ xóa các chương thuộc sách\nBạn có chắc muốn xóa Sách {{ $book->book_name }} không?')" class="btn btn-delete rounded-circle"><i class="fa-solid fa-trash-can text-danger"></i></button>
                            </form>
                        </td>
                    </tr>
                    <!-- child row -->
                    <tr class="child-row align-middle">
                        <td class="text-center fw-bold table-primary">Số<br>chương:</td>
                        <td class="text-center fw-bold text-danger" colspan="2">
                            <div style="background-color: #FFFFFF;">
                                <h5>{{$book->chapter->count()}}</h5>
                            </div>
                        </td>
                        <td class="text-center fw-bold table-primary" colspan="1">Tóm tắt:</td>
                        <td class="px-3" colspan="5">
                            <div style="background-color: #FFFFFF;">
                                {!! $book->book_description !=null ? $book->book_description : 'Đang cập nhật...'!!}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="9" class="text-center" style="color: darkcyan;"><h5>Danh sách rỗng</h5></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('backend.book.modal.modal-img')
<!-- style -->
<style>

    /* button delete */
    .btn-delete:hover {
        border: 2px solid #dc3545;
        /* background-color: #dc3545; */
    }

    /* button edit */
    .btn-edit:hover {
        border: 2px solid #0d6efd;
        /* background-color: #dc3545; */
    }
</style>
<!-- scripts -->
<script type="text/javascript">
    // Start page
    $(document).ready(function() {
        // e.preventDefault();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //open-close child row in table
        $('.toggle-btn').html('<i class="fa-solid fa-circle-chevron-right"></i>');
        $('.child-row').addClass('d-none');
        $('.toggle-btn').click(function() {
            var childRow = $(this).closest('.parent-row').next('.child-row');
            if (childRow.is(':visible')) {
                $(this).html('<i class="fa-solid fa-circle-chevron-right"></i>'); // Change button content to plus
                childRow.fadeOut(); // Add fade-out animation
                childRow.addClass('d-none');
            } else {
                $(this).html('<i class="fa-solid fa-circle-chevron-down text-primary"></i>'); // Change button content to minus
                childRow.fadeIn();
                childRow.removeClass('d-none'); // Add fade-in animation
            }
        });
    });

    
</script>
<script src="{{asset('assets/js/backend/zoom_image_model.js')}}"></script>
@endsection