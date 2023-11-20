window.document.addEventListener("DOMContentLoaded", () => {
    const togglerButton = document.querySelector(".toggler-button");
    const sidebar = document.querySelector(".sidebar");

    togglerButton.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
    });
});
