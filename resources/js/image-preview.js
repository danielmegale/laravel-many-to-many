const placeholder = '';
const imageField = document.getElementById('image');
const previewField = document.getElementById('image-preview');

let blobUrl = null;

imageField.addEventListener('change', () => {
    if (imageField.files && imageField.files[0]) {
        const file = imageField.files[0];

        blobUrl = URL.createObjectURL(file);
        previewField.src = blobUrl;
    } else {
        previewField.src = placeholder;
    }
});
