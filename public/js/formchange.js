document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("multistep-form");
    const steps = document.querySelectorAll(".form-step");
    const prevButton = document.getElementById("prev-step");
    const nextButton = document.getElementById("next-step");
    const submitButton = document.getElementById("submit-form");
    let currentStep = 1;
    $("#addInput1").hide();
    $("#addInput2").hide();

    // Function to show the current step and hide other steps
    function showStep(stepNumber) {
        steps.forEach((step) => {
            step.style.display = "none";
        });
        steps[stepNumber - 1].style.display = "block";

        // Hide or show previous and next buttons based on the current step
        if (stepNumber === 1) {
            prevButton.style.display = "none"; // Hide "Previous" on the first page
            nextButton.style.display = "block"; // Show "Next" on other pages
            submitButton.style.display = "none"; // Hide "Create Doctor" on other pages
        } else if (stepNumber === steps.length) {
            prevButton.style.display = "block"; // Show "Previous" on other pages
            nextButton.style.display = "none"; // Hide "Next" on the last page
            submitButton.style.display = "block"; // Show "Create Doctor" on the last page
        } else {
            prevButton.style.display = "block"; // Show "Previous" on other pages
            nextButton.style.display = "block"; // Show "Next" on other pages
            submitButton.style.display = "none"; // Hide "Create Doctor" on other pages
        }

        // Listen for changes in the data step
        if (stepNumber === 2) {
            $("#addInput1").show();
        } else {
            $("#addInput1").hide();
        }

        if (stepNumber === 3) {
            $("#addInput2").show();
        } else {
            $("#addInput2").hide();
        }
    }

    // Function to validate the current step's inputs
    function validateStep(stepNumber) {
        const step = steps[stepNumber - 1];
        const inputFields = step.querySelectorAll(
            "input[required], select[required], textarea[required]"
        );

        let isValid = true;

        for (const inputField of inputFields) {
            if (!inputField.validity.valid) {
                isValid = false;
                inputField.reportValidity(); // Display the browser's default validation message.
            }
        }

        return isValid;
    }
    // Next button click
    nextButton.addEventListener("click", function () {
        if (currentStep < steps.length) {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        }
    });

    // Previous button click
    prevButton.addEventListener("click", function () {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Submit button click
    submitButton.addEventListener("click", function () {
        form.submit();
    });

    // Initial step
    showStep(currentStep);
});
