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
    <td class="text-center">
        <a class="btn btn-sm fw-bold btn-{{$book->book_status==1?'success':'danger'}} change-status" style="width:80px;height:30px;" data-id="{{$book->id}}" data-name="{{$book->book_name}}">
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
        <a class="btn rounded-circle btn-delete" data-id="{{$book->id}}" data-name="{{$book->book_name}}">
            <i class="fa-solid fa-trash-can text-danger"></i>
        </a>
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
<tr class="align-middle">
    <td class="text-center" colspan="9">
        Không có dữ liệu
    </td>
</tr>
@endforelse
<tr>
    <td colspan="9" class="pt-3">
        {!!$data_book->appends($_GET)->links('backend.layouts.pagination.admin-pagination')!!}
    </td>
</tr>