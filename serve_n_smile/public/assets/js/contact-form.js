function validateForm() {
    let isValid = true;

    // Validate Name
    const fullName = document.getElementById('full_name').value.trim();
    if (fullName === "") {
        document.getElementById('nameError').innerText = "Name field is required";
        isValid = false;
    } else {
        document.getElementById('nameError').innerText = "";
    }

    // Validate Email
    const email = document.getElementById('email').value.trim();
    if (email === "") {
        document.getElementById('emailError').innerText = "Email field is required";
        isValid = false;
    } else {
        document.getElementById('emailError').innerText = "";
    }

    // Validate Phone
    const phoneNo = document.getElementById('phone_no').value.trim();
    const phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phoneNo)) {
        document.getElementById('phoneError').innerText = "Phone number must be exactly 10 digits and only numeric";
        isValid = false;
    } else {
        document.getElementById('phoneError').innerText = "";
    }

    // Validate Service Selection
    const service = document.getElementById('service').value;
    if (service === "Services") {
        document.getElementById('serviceError').innerText = "Please select a service";
        isValid = false;
    } else {
        document.getElementById('serviceError').innerText = "";
    }

    // Validate Message
    const message = document.getElementById('form-message').value.trim();
    if (message === "") {
        document.getElementById('messageError').innerText = "Message field is required";
        isValid = false;
    } else {
        document.getElementById('messageError').innerText = "";
    }

    return isValid;
}

// Restrict phone number field to numeric input only
document.getElementById('phone_no').addEventListener('input', function (e) {
    this.value = this.value.replace(/[^0-9]/g, '');
});
