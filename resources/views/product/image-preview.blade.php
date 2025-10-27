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
    
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles({ target: { files } });
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
    