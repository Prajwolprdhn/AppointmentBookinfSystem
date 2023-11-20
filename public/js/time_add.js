document.addEventListener("DOMContentLoaded", function () {
    const maxFieldsTime = 5; // Maximum number of fields allowed for addInput1
    let currentFieldCountTime = 1; // Initialize with one field for addInput1

    document.getElementById("addTime").addEventListener("click", function () {
        if (currentFieldCountTime < maxFieldsTime) {
            const newRow = document.querySelector(".time-form").cloneNode(true);
            document.querySelector(".time-form").parentNode.appendChild(newRow);
            currentFieldCountTime++;
        } else {
            alert(
                "You've reached the maximum number of fields for addInput1 (3)."
            );
        }
    });
});
