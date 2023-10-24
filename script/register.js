function validateEmail() {
  const email = document.getElementById("email").value;
  const emailError = document.getElementById("emailError");
  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

  if (!email.match(emailPattern)) {
    emailError.textContent = "Invalid email address.";
  } else {
    emailError.textContent = "";
  }
}

function validatePassword() {
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const passwordError = document.getElementById("passwordError");

  if (password !== confirmPassword) {
    passwordError.textContent = "Passwords do not match.";
  } else {
    passwordError.textContent = "";
  }
}

function validateForm() {
  const module = document.getElementById("module").value;
  const moduleError = document.getElementById("moduleError");

  if (module === "Module code") {
    moduleError.textContent = "Please select a module.";
    return false;
  } else {
    moduleError.textContent = "";
  }

  return true; // Form is valid
}
