window.document.addEventListener("DOMContentLoaded", () => {
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
        
    title.addEventListener('change', async () => {
        const response = await fetch('/admin/events/checkSlug?title=' + title.value)
        const data = await response.json();
        slug.value = data.slug;
    });

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
});
