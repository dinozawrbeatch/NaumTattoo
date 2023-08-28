const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('preview');
const previewDiv = document.getElementById('js_preview');

imageInput.addEventListener('change', e => {
    previewDiv.classList.remove('d-none');
    imagePreview.src = window.URL.createObjectURL(e.target.files[0]);
})

