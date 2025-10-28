@extends('layout.app')
@section('title', 'Product List')
@section('content')
    <div class="mb-4">
        <form method="GET" action="{{ route('products.index') }}" class="row g-2 align-items-center">
            <div class="col-md-2">
                <select name="category" class="form-select select2">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                    placeholder="Cari produk...">
            </div>
        </form>
    </div>

    <div class="row" id="product-container">
        @forelse ($product as $item)
            <div class="col-md-2 mb-2">
                <div class="card shadow-sm h-100 position-relative overflow-hidden">
                    <div class="position-relative">
                        <a href="{{ route('products.show', $item->id) }}" class="d-block position-relative">
                            @if ($item->image)
                                <img data-src="{{ asset('storage/' . $item->image) }}" class="card-img-top lazyload"
                                    loading="lazy" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img data-src="{{ asset('assets/img/no-image.png') }}" class="card-img-top lazyload"
                                    loading="lazy" alt="No Image" style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="overlay d-flex align-items-center justify-content-center">
                                <span class="text-white font-weight-bold">Lihat Detail</span>
                            </div>

                            <a href="{{ route('products.edit', $item->id) }}"
                                class="btn btn-sm btn-warning position-absolute top-0 end-0 m-2 edit-btn"
                                title="Edit Produk">
                                <i class="fas fa-edit"></i>
                            </a>
                        </a>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center font-weight-bold">{{ $item->name }}</h5>
                        <p class="card-text text-center mb-1 text-muted">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        @if ($item->category)
                            <p class="text-center small text-secondary mb-2">
                                {{ $item->category->name }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted mt-3">
                Tidak ada produk yang ditemukan.
            </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $product->links('pagination::bootstrap-4') }}
    </div>
@endsection
@push('styles')
    <style>
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .overlay {
            opacity: 1;
        }

        .edit-btn {
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }

        .card:hover .edit-btn {
            opacity: 1;
        }
    </style>
@endpush
@push('scripts')
    <script>
        $(document).ready(function() {
            function loadProducts() {
                let search = $('input[name="search"]').val();
                let category = $('select[name="category"]').val();

                $.ajax({
                    url: "{{ route('products.filter') }}",
                    method: "GET",
                    data: {
                        search: search,
                        category: category
                    },
                    success: function(res) {
                        let html = '';

                        if (res.length > 0) {
                            res.forEach(function(item) {
                                html += `
                                <div class="col-md-2 mb-3">
                                    <div class="card shadow-sm h-100 position-relative overflow-hidden">
                                        <div class="position-relative">
                                            <a href="/products/${item.id}" class="d-block position-relative">
                                                <img src="${item.image ? '/storage/' + item.image : '/assets/img/no-image.png'}"
                                                    class="card-img-top" loading="lazy" style="height:200px;object-fit:cover;">
                                                <div class="overlay d-flex align-items-center justify-content-center">
                                                    <span class="text-white font-weight-bold">Lihat Detail</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title text-center font-weight-bold">${item.name}</h5>
                                            <p class="card-text text-center mb-1 text-muted">
                                                Rp ${parseInt(item.price).toLocaleString('id-ID')}
                                            </p>
                                            ${item.category ? `<p class="text-center small text-secondary mb-2">${item.category.name}</p>` : ''}
                                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                                <a href="/products/${item.id}/edit" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <form action="/products/${item.id}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                            });
                        } else {
                            html = `
                            <div class="col-12 text-center text-muted mt-3">
                                Tidak ada produk yang ditemukan.
                            </div>`;
                        }

                        $('#product-container').html(html);
                    }
                });
            }

            $('input[name="search"]').on('keyup', function() {
                loadProducts();
            });

            $('select[name="category"]').on('change', function() {
                loadProducts();
            });
        });
    </script>
@endpush
