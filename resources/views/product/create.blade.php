@extends('layout.app')
@section('title', 'Add Product')
@section('content')
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
                                    <input type="number" step="0.01" name="price" class="form-control"
                                        placeholder="Price" value="{{ old('price') }}" required>
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
                        <div class="form-group form-check mt-3">
                            <input type="checkbox" name="is_featured" class="form-check-input" id="featuredCheck"
                                {{ old('is_featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featuredCheck">Tampilkan sebagai produk unggulan</label>
                        </div>
                    </div>
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
                                <p id="dropHint" class="mb-1 font-weight-bold text-gray-700">Drag and drop your image here
                                </p>
                                <small class="text-muted">or click to browse. (jpg, png, max 2 MB)</small>
                            </div>
                            <div class="mt-3" id="previewContainer" style="display:none;">
                                <div class="d-flex align-items-start">
                                    <img id="previewImage" src="" alt="Preview" class="img-thumbnail"
                                        style="max-height:150px;">
                                    <div class="ml-3">
                                        <p id="previewName" class="mb-1 small text-truncate" style="max-width:200px;"></p>
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

            {{-- ================== SUBMIT BUTTON ================== --}}
            <div class="col-12 text-right">
                <button type="submit" class="btn btn-success px-4">
                    <i class="fa fa-save"></i> Simpan Produk
                </button>
            </div>
        </div>
    </form>

    @include('product.image-preview')
@endsection
