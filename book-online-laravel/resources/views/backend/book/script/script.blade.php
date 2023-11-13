<!-- scripts -->
<script type="text/javascript">
    // Start page
    $(document).ready(function() {
        // e.preventDefault();
        start();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //open-close child row in table
        toggle_show();
    });

    function toggle_show() {
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
    }

    function start() {
        //  delete item
        $(document).on('click', '.btn-delete', function(e) {
            e.preventDefault();
            let deleteId = $(this).data('id');
            let name = $(this).data('name');
            if (confirm('Bạn có chắc muốn xóa sách ' + name + ' không?')) {
                $.ajax({
                    url: "{{ route('book.delete') }}",
                    method: 'POST',
                    data: {
                        id: deleteId
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $.get(location.href, function(data) {
                                var tableContent = $(data).find('#div-table').html();
                                $('#div-table').html(tableContent);
                                toggle_show();
                            });
                            toastr.success('Đã xóa sách ' + name, 'Thành công!!!');
                        }
                    }
                });
            }
        });
        //  change status
        $(document).on('click', '.change-status', function(e) {
            e.preventDefault();
            $('.toggle-btn').html('<i class="fa-solid fa-circle-chevron-right"></i>');
            $('.child-row').addClass('d-none');
            let Id = $(this).data('id');
            let name = $(this).data('name');
            $.ajax({
                url: "{{ route('book.changeStatus') }}",
                method: 'POST',
                data: {
                    id: Id
                },
                success: function(response) {
                    if (response.status == 'success') {
                        $.get(location.href, function(data) {
                            var tableContent = $(data).find('#div-table').html();
                            $('#div-table').html(tableContent);
                            //open-close child row in table
                            toggle_show();
                        });

                        toastr.success('Đã thay đổi trạng thái', 'Thành công!!!');
                    }
                }
            });
        });
    }
</script>