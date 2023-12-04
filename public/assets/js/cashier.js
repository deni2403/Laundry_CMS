    window.document.addEventListener("DOMContentLoaded", () => {
    let memberSelect = document.getElementById("member_id");
    let customerNameInput = document.getElementById("customerName");

    memberSelect.addEventListener("change", function () {
        let selectedMember = memberSelect.value;

        if (selectedMember !== "") {
            let selectedOption =
                memberSelect.options[memberSelect.selectedIndex];
            let selectedMemberText = selectedOption.textContent;

            let parts = selectedMemberText.split(" - ");

            customerNameInput.value = parts[0];
            customerNameInput.readOnly = true;
        } else {
            customerNameInput.value = "";
            customerNameInput.readOnly = false;
        }


    });
});
