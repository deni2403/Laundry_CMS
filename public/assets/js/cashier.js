    window.document.addEventListener("DOMContentLoaded", () => {
    var memberSelect = document.getElementById("member_id");
    var customerNameInput = document.getElementById("customerName");

    memberSelect.addEventListener("change", function () {
        var selectedMember = memberSelect.value;

        if (selectedMember !== "") {
            var selectedOption =
                memberSelect.options[memberSelect.selectedIndex];
            var selectedMemberText = selectedOption.textContent;

            var parts = selectedMemberText.split(" - ");

            customerNameInput.value = parts[0];
            customerNameInput.readOnly = true;
        } else {
            customerNameInput.value = "";
            customerNameInput.readOnly = false;
        }


    });
});
