@extends('layout.app')
@section('title', 'Add Product')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                <a>Add Product</a>
            </li>
        </ol>
    </nav>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            {{-- ================== PRODUCT INFORMATION ================== --}}
            <div class="col-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Product Information</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product Title"
                                        value="{{ old('name') }}" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="price_display" id="price_display" class="form-control"
                                        placeholder="Rp 0" required>
                                    <input type="hidden" name="price" id="price" value="{{ old('price') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input type="number" name="stock" class="form-control" placeholder="Stock"
                                        value="{{ old('stock') }}" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="6" placeholder="Product Description" required>{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ================== ORGANIZE SECTION ================== --}}
            <div class="col-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Organize</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control select2" name="category_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Segment</label>
                            <select multiple class="form-control select2" name="segment[]" data-allow-clear="1" required>
                                <option value="">Pilih Segment</option>
                                @foreach ($segment as $item)
                                    <option value="{{ $item->id }}"
                                        {{ collect(old('segment'))->contains($item->id) ? 'selected' : '' }}>
                                        {{ $item->segment }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group form-check mt-3">
                            <input type="hidden" name="is_featured" value="0">

                            <input type="checkbox" name="is_featured" value="1" class="form-check-input"
                                id="featuredCheck" {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featuredCheck">
                                Tampilkan sebagai produk unggulan
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="fa fa-save"></i> Simpan Produk
                    </button>
                </div>
            </div>

            {{-- ================== PRODUCT IMAGE ================== --}}
            <div class="col-8">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-primary">Product Image</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-12 mt-3">
                            <label class="font-weight-bold">Product Image</label>
                            <div id="dropArea"
                                class="border border-secondary rounded d-flex flex-column align-items-center justify-content-center p-4 text-center"
                                style="min-height:180px; cursor:pointer;">
                                <i class="fas fa-cloud-upload-alt fa-2x text-gray-400 mb-2"></i>
                                <p id="dropHint" class="mb-1 font-weight-bold text-gray-700">Drag and drop your image
                                    here
                                </p>
                                <small class="text-muted">or click to browse. (jpg, png, max 2 MB)</small>
                            </div>
                            <div class="mt-3" id="previewContainer" style="display:none;">
                                <div class="d-flex align-items-start">
                                    <img id="previewImage" src="" alt="Preview" class="img-thumbnail"
                                        style="max-height:150px;">
                                    <div class="ml-3">
                                        <p id="previewName" class="mb-1 small text-truncate" style="max-width:200px;">
                                        </p>
                                        <button type="button" class="btn btn-sm btn-outline-danger" id="removeImageBtn">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <input type="file" name="image" id="imageInput" accept="image/*" class="d-none">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('product.image-preview')
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const priceDisplay = document.getElementById('price_display');
            const priceHidden = document.getElementById('price');

            if (priceDisplay.value && !priceDisplay.value.startsWith('Rp')) {
                priceDisplay.value = 'Rp ' + formatRupiah(priceDisplay.value);
            }

            priceDisplay.addEventListener('input', function(e) {
                let value = this.value.replace(/[^\d]/g, '');
                this.value = 'Rp ' + formatRupiah(value);
                priceHidden.value = value;
            });

            priceDisplay.addEventListener('keydown', function(e) {
                const caret = this.selectionStart;
                if (caret <= 3 && (e.key === 'Backspace' || e.key === 'Delete')) {
                    e.preventDefault();
                }
            });

            function formatRupiah(angka) {
                if (!angka) return '0';
                return new Intl.NumberFormat('id-ID').format(angka);
            }
        });
    </script>
@endpush
