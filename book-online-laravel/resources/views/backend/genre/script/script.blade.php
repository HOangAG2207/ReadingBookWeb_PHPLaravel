<!-- scripts -->
<script type="text/javascript">
    // Start page
    $(document).ready(function(e) {
        // e.preventDefault();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //  delete item
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let deleteId = $(this).data('id');
            let name = $(this).data('name');
            if (confirm('Bạn có chắc muốn xóa Thể loại ' + name + ' không?')) {
                $.ajax({
                    url: "{{ route('genre.delete') }}",
                    method: 'POST',
                    data: {
                        id: deleteId
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $.get(location.href, function(data) {
                                var tableContent = $(data).find('#table').html();
                                $('#table').html(tableContent);
                            });
                            toastr.success('Đã xóa Thể loại ' + name, 'Thành công!!!');
                        }
                    }
                });
            }
        });
        //  change status
        $(document).on('click', '.change-status', function(e) {
            e.preventDefault();
            let deleteId = $(this).data('id');
            let name = $(this).data('name');
            $.ajax({
                url: "{{ route('genre.changeStatus') }}",
                method: 'POST',
                data: {
                    id: deleteId
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $.get(location.href, function(data) {
                            var tableContent = $(data).find('#table').html();
                            $('#table').html(tableContent);
                        });
                        toastr.success('Đã thay đổi trạng thái', 'Thành công!!!');
                    }
                }
            });
        });
    });
</script>