window.document.addEventListener("DOMContentLoaded", () => {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    
    image.addEventListener('change', () => {
        imgPreview.style.display = 'block';

        const file = image.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = () => {
                imgPreview.src = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
});
