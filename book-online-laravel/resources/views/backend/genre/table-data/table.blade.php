@forelse($data_genre as $value => $genre)
<tr class="align-middle" id="genre-item{{$genre->id}}">
    <td class="text-center">
        {{ $value + $data_genre->firstItem() }}
    </td>
    <td class="px-3 text-center">
        <a class="card-title text-decoration-none text-primary fw-bold">{{ $genre->genre_name }}</a>
        <p class="card-text text-secondary d-none d-lg-block">#{{ $genre->genre_slug }}</p>
    </td>
    <td class="px-3 d-none d-lg-table-cell d-md-table-cell">
        <div>
            <p id="genre_description" style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;">
                {{ $genre->genre_description }}
            </p>
        </div>
    </td>
    <td class="text-center">
        <a class="btn btn-sm fw-bold btn-{{$genre->genre_status==1?'success':'danger'}} change-status" style="width:80px;height:30px;" data-id="{{$genre->id}}" data-name="{{$genre->genre_name}}">
            @if($genre->genre_status==1)
            <i class="fa-solid fa-circle-check me-1"></i>
            @else
            <i class="fa-solid fa-circle-xmark me-1"></i>
            @endif
            {{$genre->genre_status==1?'HIỆN':'ẨN'}}
        </a>
    </td>
    <td class="text-center">
        @if($genre->created_at!='')
        <small>{{ $genre->created_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $genre->created_at->diffForHumans() }})</small>
        @endif
    </td>
    <td class="text-center">
        @if($genre->updated_at!='')
        <small>{{ $genre->updated_at->format('H:i:s d/m/Y') }}</small><br><small class="text-info fw-bold">({{ $genre->updated_at->diffForHumans() }})</small>
        @endif
    </td>
    <td class="text-center">
        <a href="{{ route('genre.edit',['genre'=> $genre->id]) }}" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
    </td>
    <td class="text-center">
        <a class="btn rounded-circle btn-delete" data-id="{{$genre->id}}" data-name="{{$genre->genre_name}}">
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
        {!!$data_genre->appends($_GET)->links('backend.layouts.pagination.admin-pagination')!!}
    </td>
</tr>