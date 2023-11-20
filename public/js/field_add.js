document.addEventListener("DOMContentLoaded", function () {
    const maxFieldsAddInput1 = 5; // Maximum number of fields allowed for addInput1
    const maxFieldsAddInput2 = 8; // Maximum number of fields allowed for addInput2
    let currentFieldCountAddInput1 = 1; // Initialize with one field for addInput1
    let currentFieldCountAddInput2 = 1; // Initialize with one field for addInput2

    document.getElementById("addInput1").addEventListener("click", function () {
        if (currentFieldCountAddInput1 < maxFieldsAddInput1) {
            const newRow = document
                .querySelector(".second-form")
                .cloneNode(true);
            document
                .querySelector(".second-form")
                .parentNode.appendChild(newRow);
            currentFieldCountAddInput1++;
        } else {
            alert(
                "You've reached the maximum number of fields for addInput1 (3)."
            );
        }
    });

    document.getElementById("addInput2").addEventListener("click", function () {
        if (currentFieldCountAddInput2 < maxFieldsAddInput2) {
            const newRow = document
                .querySelector(".third-form")
                .cloneNode(true);
            document
                .querySelector(".third-form")
                .parentNode.appendChild(newRow);
            currentFieldCountAddInput2++;
        } else {
            alert(
                "You've reached the maximum number of fields for addInput2 (2)."
            );
        }
    });

    // Remove an input field when the "Remove" button is clicked
    document.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-button")) {
            if (e.target.closest(".second-form")) {
                e.target.closest(".second-form").remove();
                currentFieldCountAddInput1--;
            } else if (e.target.closest(".third-form")) {
                e.target.closest(".third-form").remove();
                currentFieldCountAddInput2--;
            }
        }
    });
});
