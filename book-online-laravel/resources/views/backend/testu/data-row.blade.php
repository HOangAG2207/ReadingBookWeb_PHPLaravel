@if($data->count()==0)
<tr class="align-middle">
    <td class="text-center" colspan="5">
        Không có dữ liệu
    </td>
</tr>
@endif
@foreach($data as $item)
<tr class="align-middle" id="testu-item{{$item->id}}">
    <td class="text-center">
        {{ $loop->iteration }}
    </td>
    <td class="px-3 text-center">
        <a class="card-title text-decoration-none text-primary fw-bold">{{ $item->name }}</a>
    </td>
    <td class="text-center">
        <a class="btn btn-sm fw-bold btn-{{$item->status==1?'success':'danger'}}" data-id="{{ $item->id }}" style="width:80px;height:30px;">
            @if($item->status==1)
            <i class="fa-solid fa-circle-check me-1"></i>
            @else
            <i class="fa-solid fa-circle-xmark me-1"></i>
            @endif
            {{$item->status==1?'HIỆN':'ẨN'}}
        </a>
    </td>
    <td class="text-center">
        <a href="" class="btn btn-edit rounded-circle"><i class="fa-solid fa-pen-to-square text-primary"></i></a>
    </td>
    <td class="text-center">

            <button class="btn btn-delete rounded-circle delete-item" data-id="{{ $item->id }}"><i class="fa-solid fa-trash-can text-danger"></i></button>

    </td>
</tr>

@endforeach