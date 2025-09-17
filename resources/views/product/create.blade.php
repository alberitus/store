@extends('layout.app')
@section('title', 'Add Product')
@section('content')
    <div class="row">
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Product Information</h6>
                    <div class="d-flex gap-2 ml-auto">
                        <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i> Add Product
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Product Titile"
                                    required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control" placeholder="Price" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="stock" class="form-control" placeholder="Stock" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>description</label>
                                <textarea name="description" class="form-control" rows="6" placeholder="Product Description" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Organize</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="form-control select2" name="category_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Product Image</h6>
                </div>
                <div class="card-body">
                    <div class="row">
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
                                    <img id="previewImage" src="{{ $item->image ? asset('storage/' . $item->image) : '' }}"
                                        alt="Preview" class="img-thumbnail" style="max-height:150px;">
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
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('dropArea');
            const imageInput = document.getElementById('imageInput');
            const previewContainer = document.getElementById('previewContainer');
            const previewImage = document.getElementById('previewImage');
            const previewName = document.getElementById('previewName');
            const removeBtn = document.getElementById('removeImageBtn');
            const dropHint = document.getElementById('dropHint');

            const MAX_SIZE = 2 * 1024 * 1024;
            const ALLOWED = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp'];

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(ev => {
                dropArea.addEventListener(ev, preventDefaults, false);
            });

            ['dragenter', 'dragover'].forEach(ev => {
                dropArea.addEventListener(ev, () => dropArea.classList.add('dragover'), false);
            });

            ['dragleave', 'drop'].forEach(ev => {
                dropArea.addEventListener(ev, () => dropArea.classList.remove('dragover'), false);
            });

            dropArea.addEventListener('click', () => imageInput.click());
            dropArea.addEventListener('drop', handleDrop, false);
            imageInput.addEventListener('change', handleFiles, false);
            removeBtn.addEventListener('click', removeImage, false);

            @if ($item->image)
                previewContainer.style.display = 'block';
                previewName.textContent = "{{ basename($item->image) }}";
                dropHint.style.display = 'none';
            @endif

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles({
                    target: {
                        files
                    }
                });
            }

            function handleFiles(e) {
                const files = e.target.files;
                if (!files || files.length === 0) return;
                const file = files[0];

                if (!ALLOWED.includes(file.type)) {
                    alert('Tipe file tidak diijinkan. Gunakan JPG/PNG/WebP.');
                    imageInput.value = '';
                    return;
                }

                if (file.size > MAX_SIZE) {
                    alert('Ukuran file terlalu besar. Maks 2 MB.');
                    imageInput.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(ev) {
                    previewImage.src = ev.target.result;
                    previewContainer.style.display = 'block';
                    previewName.textContent = file.name + ' (' + Math.round(file.size / 1024) + ' KB)';
                    dropHint.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }

            function removeImage() {
                previewImage.src = '';
                previewContainer.style.display = 'none';
                imageInput.value = '';
                dropHint.style.display = 'block';
            }
        });
    </script>
@endsection
