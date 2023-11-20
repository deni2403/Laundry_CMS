window.document.addEventListener("DOMContentLoaded", () => {
    const showBtn = document.querySelector(".show-btn");
    const passwordInput = document.querySelector(".password-input");

    showBtn.addEventListener("click", function (event) {
        event.preventDefault();
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showBtn.innerHTML =
                '<i class="fa-solid fa-eye-slash" style="color: #545454;"></i>';
        } else {
            passwordInput.type = "password";
            showBtn.innerHTML =
                '<i class="fa-solid fa-eye" style="color: #545454;"></i>';
        }
    });
});
