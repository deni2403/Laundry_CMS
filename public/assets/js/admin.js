window.document.addEventListener("DOMContentLoaded", () => {
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
        
    title.addEventListener('change', async () => {
        const response = await fetch('/admin/events/checkSlug?title=' + title.value)
        const data = await response.json();
        slug.value = data.slug;
    });

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
