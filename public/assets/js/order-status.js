window.document.addEventListener("DOMContentLoaded", () => {
    let serviceSelect = document.getElementById("service");
    let status = document.getElementById("status");

    serviceSelect.addEventListener("change", function () {
        let selectedService = serviceSelect.value;

        if (selectedService == 5 || selectedService == 6) {
            status.value = "Sudah dicuci";

        } else {
            status.value = "Dalam antrian";
        }
    });
});
