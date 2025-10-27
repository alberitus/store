@extends('layout.app')
@section('title', 'Product')
@section('content')
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

        a:hover .overlay {
            opacity: 1;
        }
    </style>

    <div class="row">
        @foreach ($product as $item)
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
                        </a>
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center font-weight-bold">{{ $item->name }}</h5>
                        <p class="card-text text-center mb-1 text-muted">
                            Rp {{ number_format($item->price, 0, ',', '.') }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <a href="{{ route('products.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('products.destroy', encrypt($item->id)) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
