@extends('backend.layouts.admin')

@section('title','Quản lý Sách')

@section('admin_content')
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 mx-5">
        <ol class="breadcrumb">
            <li class="breadcrumb-item h2">
                <p id="text-color" class="text-decoration-none badge rounded-pill bg-light border border-3">THỂ LOẠI</p>
            </li>
            <li class="breadcrumb-item h2 active" aria-current="page">Danh sách</li>
        </ol>
    </nav>
    <div class="card mx-2">
        <div class="card-header">
            <a href="{{ route('genre.create') }}" class="btn btn-primary btn-sm fw-bold float-end"><i class="fa-solid fa-circle-plus me-2"></i>Thêm mới</a>
        </div>
        <!-- <select id="" class="test-select2">
            <option value="">All</option>
            <option value="1">Show</option>
            <option value="0">Hide</option>
        </select> -->
        <div class="row row-cols-sm-1 row-cols-md-2 row-cols-lg-2 mt-3 px-3">
            <div class="form-group">
                <form class="input-group w-auto my-auto rounded" style="border: solid 2px darkcyan;background: darkcyan;">
                    <span class="input-group-text border-0" style="background: white;"><i class="fas fa-search" style="color:darkcyan;"></i>
                    </span>
                    <input autocomplete="on" id="searchBox" type="text" class="form-control border-0" placeholder="Nhập từ khóa để tìm kiếm..." />
                </form>
            </div>
            <div class="form-group mt-3 mt-md-0 mt-lg-0">
                <div class="input-group">
                    <label class="input-group-text text-white fw-bold" for="status" style="border: solid 2px darkcyan; background:darkcyan;">Trạng thái</label>
                    <select class="form-control text-center" name="status" id="status-filter" style="border: solid 2px darkcyan;">
                        <option value="">Tat ca</option>
                        <option value="1">HIỂN THỊ</option>
                        <option value="0">ẨN</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive table-content">
            <table class="table table-bordered table-hover table-sm " id="data-table">
                <thead>
                    <tr class="text-center align-middle text-uppercase table-warning">
                        <th width="5%">#</th>
                        <th width="25%">Tên loại</th>
                        <th width="10%">Trạng<br>thái</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be rendered here dynamically using AJAX -->

                    <!-- data-row -->

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- style -->
<style>
    .btn-delete:hover {
        border: 2px solid #dc3545;
        /* background-color: #dc3545; */
    }

    .btn-edit:hover {
        border: 2px solid #0d6efd;
        /* background-color: #dc3545; */
    }
</style>

<!-- scripts -->
<script type="text/javascript">
    function toggleLoadingSpinner(show) {
        if (show) {
            $('.loading-row').show();
        } else {
            $('.loading-row').hide();
        }
    }
    // Start page
    $(document).ready(function(e) {
        // e.preventDefault();
        // set up csrf-token ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.test-select2').select2();
        // Initial data fetch (optional)
        fetchData('', '');
        // Get table data
        function fetchData(searchTerm, status) {
            var loadingRow = '<tr class="loading-row">' +
                '<td colspan="5" style="text-align:center;">' +
                '<div class="spinner-border text-primary" role="status" style="opacity:0.8;">' +
                '<span class="sr-only">Loading...</span>' +
                '</div>' +
                '</td>' +
                '</tr>';
            $('#data-table tbody').html(loadingRow);
            $.ajax({
                url: '{{ route("testu.getdata") }}', // Assuming this is the route for fetching data
                method: 'GET',
                data: {
                    searchTerm: searchTerm,
                    status: status,
                },
                success: function(response) {

                    var tbody = $('#data-table tbody');
                    tbody.empty();
                    tbody.html(response.html);
                },
                complete: function() {
                    // Hide loading spinner after data is loaded
                    $('.loading-row').remove();
                }
            });
        }
        // Event listener for search input
        $('#searchBox').on('keyup', function() {
            var searchTerm = $(this).val();
            var status = $('#status-filter').val();
            fetchData(searchTerm, status);
        });
        // Event listener for status filter
        $('#status-filter').on('change', function() {
            var searchTerm = $('#searchBox').val();
            var status = $(this).val();
            fetchData(searchTerm, status);
        });

        $('#data-table').on('click', '.delete-item', function() {
        var id = $(this).data('id');
        if (confirm('Are you sure you want to delete this item?')) {
            $.ajax({
                url: '/testu/' + id,
                type: 'DELETE',
                success: function(response) {
                    $('#testu-item'+id).remove(); // Refresh the table after successful delete
                    alert(response.message);
                }
            });
        }
    });
    });
</script>
@endsection