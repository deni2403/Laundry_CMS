window.document.addEventListener("DOMContentLoaded", () => {
    const showBtns = document.querySelectorAll(".show-btn");
    const passwordInputs = document.querySelectorAll(".password-input");

    showBtns.forEach((showBtn, index) => {
        showBtn.addEventListener("click", function (event) {
            event.preventDefault();
            togglePasswordVisibility(passwordInputs[index], showBtn);
        });
    });

    function togglePasswordVisibility(passwordInput, showBtn) {
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showBtn.innerHTML =
                '<i class="fa-solid fa-eye-slash" style="color: #545454;"></i>';
        } else {
            passwordInput.type = "password";
            showBtn.innerHTML =
                '<i class="fa-solid fa-eye" style="color: #545454;"></i>';
        }
    }
});
