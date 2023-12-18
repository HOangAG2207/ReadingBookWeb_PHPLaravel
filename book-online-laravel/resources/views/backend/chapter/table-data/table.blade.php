@forelse($data_chapter as $value => $chapter)
<tr class="align-middle" id="chapter-item{{$chapter->id}}">
    <td class="text-center">
        {{ $loop->iteration }}
    </td>
    <td class="px-3 text-start">
        <a class="card-title text-decoration-none text-primary fw-bold"><span class="font-monospace text-dark"> Chương {{ $chapter->chapter_number }}</span><br>{{ $chapter->chapter_name }}</a>
        <p class="card-text text-secondary d-none d-lg-block">#{{ $chapter->chapter_slug }}</p>
    </td>
    <td class="text-center">
        @if($chapter->book)
        <h5 class="badge bg-secondary rounded-pill">{{ $chapter->book->book_name }}</h5>
        @endif
    </td>
    <!-- <td class="px-3 d-none d-lg-table-cell d-md-table-cell">
                            <div style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                                <p id="chapter_content">
                                    {!! $chapter->chapter_content !!}
                                </p>
                            </div>
                        </td> -->
    <td class="text-center">
        <a class="btn btn-sm fw-bold btn-{{$chapter->chapter_status==1?'success':'danger'}} change-status" style="width:80px;height:30px;" data-id="{{$chapter->id}}" data-name="{{$chapter->chapter_name}}">
            @if($chapter->chapter_status==1)
            <i class="fa-solid fa-circle-check me-1"></i>
            @else
            <i class="fa-solid fa-circle-xmark me-1"></i>
            @endif
            {{$chapter->chapter_status==1?'HIỆN':'ẨN'}}
        </a>
    </td>
    <td class="text-center">
        @if($chapter->created_at!=null)
        <small>{{ $chapter->created_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $chapter->created_at->diffForHumans() }})</small>
        @endif
    </td>
    <td class="text-center">
        @if($chapter->updated_at!=null)
        <small>{{ $chapter->updated_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $chapter->updated_at->diffForHumans() }})</small>
        @endif
    </td>
    <td class="text-center">
        <a href="{{ route('chapter.edit',['chapter'=> $chapter->id]) }}" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
    </td>
    <td class="text-center">
        <a class="btn rounded-circle btn-delete" data-id="{{$chapter->id}}" data-number="{{$chapter->chapter_number}}" data-name="{{$chapter->chapter_name}}" data-book="{{ $chapter->book->book_name }}">
            <i class="fa-solid fa-trash-can text-danger"></i>
        </a>
    </td>
</tr>
@empty
<tr class="align-middle">
    <td class="text-center" colspan="8">
        Không có dữ liệu
    </td>
</tr>
@endforelse
<tr>
    <td colspan="8" class="pt-3">
        {!!$data_chapter->appends($_GET)->links('backend.layouts.pagination.admin-pagination')!!}
    </td>
</tr>