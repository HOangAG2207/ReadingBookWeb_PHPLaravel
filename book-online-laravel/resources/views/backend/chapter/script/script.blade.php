<script type="text/javascript">
    // Start page
    $(document).ready(function(e) {
        // e.preventDefault();
        start();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });
    function start() {
        //  delete item
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let deleteId = $(this).data('id');
            let number = $(this).data('number');
            let name = $(this).data('name');
            let book = $(this).data('book');
            if (confirm('Bạn có chắc muốn xóa Chương ' + number + ' ' + name + ' thuộc Sách '+book+ ' không?')) {
                $.ajax({
                    url: "{{ route('chapter.delete') }}",
                    method: 'POST',
                    data: {
                        id: deleteId
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $.get(location.href, function(data) {
                                var tableContent = $(data).find('#div-table').html();
                                $('#div-table').html(tableContent);
                            });
                            toastr.success('Đã xóa Chương ' + number + ' ' + name + ' thuộc Sách '+book, 'Thành công!!!');
                        }
                    }
                });
            }
        });
        //  change status
        $(document).on('click', '.change-status', function(e) {
            e.preventDefault();
            let Id = $(this).data('id');
            let name = $(this).data('name');
            $.ajax({
                url: "{{ route('chapter.changeStatus') }}",
                method: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $.get(location.href, function(data) {
                            var tableContent = $(data).find('#div-table').html();
                            $('#div-table').html(tableContent);
                        });
                        toastr.success('Đã thay đổi trạng thái', 'Thành công!!!');
                    }
                }
            });
        });
    }
</script>