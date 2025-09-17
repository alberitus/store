@extends('layout.app')
@section('title', 'Product')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Product</h6>
            <div class="d-flex gap-2 ml-auto">
                <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-plus"></i> Add Product
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>CATEGORIES</th>
                            <th>TOTAL PRODUCTS</th>
                            <th>TOTAL EARNING</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="center-table wd-5">
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-cogs"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="" data-toggle="modal"
                                                data-target="#modalEdit{{ $item->id }}">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', encrypt($item->id)) }}"
                                                method="POST" class="delete-form d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="dropdown-item btn-delete text-danger"
                                                    data-id="{{ $item->id }}">
                                                    <i class="fas fa-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
