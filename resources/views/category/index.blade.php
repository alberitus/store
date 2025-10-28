@extends('layout.app')
@section('title', 'Category List')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a>Category List</a>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Category</h6>
            <div class="d-flex gap-2 ml-auto">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAddCategory">
                    <i class="fa fa-plus"></i> Add Category
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="data"></div>
        </div>
    </div>
    @include('category.modal-add')
@endsection
@push('scripts')
    <script>
        let loadData = () => {
            $('#data').html(
                '<div class="text-center py-5"><i class="fas fa-spinner fa-spin fa-3x text-secondary"></i><p class="mt-3">Loading data...</p></div>'
            );
            $.ajax({
                type: 'GET',
                url: '{{ route('categories.table') }}',
                global: false,
                success: function(sdata) {
                    $('#data').html(sdata);

                    let dataTable = $('#dataTable').DataTable({
                        destroy: true,
                        serverSide: false,
                        deferRender: true,
                        processing: false,
                        pageLength: 10,
                        responsive: true,
                        columnDefs: [{
                            orderable: false,
                            targets: 0
                        }, ],
                        drawCallback: function() {
                            var api = this.api();
                            var startIndex = api.page.info().start;
                            api.column(0, {
                                    page: 'current'
                                })
                                .nodes()
                                .each(function(cell, i) {
                                    cell.innerHTML = startIndex + i + 1;
                                });

                            attachEventListeners();
                        }
                    });

                    $('#dataTable tbody').on('click', 'tr', function() {
                        if ($(this).hasClass('selected')) {
                            $(this).removeClass('selected');
                        } else {
                            barangTable.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                    });
                },
                error: function() {
                    $('#data').html(
                        '<div class="alert alert-danger">Gagal memuat data. Silakan refresh halaman.</div>'
                    );
                    alert('Server Error');
                }
            });
        };

        $(document).ready(function() {
            loadData();
        });
    </script>
@endpush
