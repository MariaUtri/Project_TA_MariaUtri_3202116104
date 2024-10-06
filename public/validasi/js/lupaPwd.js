document.getElementById("lupaPwd").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form submission

  var emailInput = document.getElementById("email");
  var emailError = document.getElementById("emailError");
  var emailValue = emailInput.value.trim();
  var isValid = validateEmail(emailValue);

  if (isValid) {
    emailInput.classList.remove("error");
    emailError.textContent = "";
    this.submit(); // Submit the form if the email is valid
  } else {
    emailInput.classList.add("error");
    emailError.innerHTML = '<i class="fas fa-exclamation-circle"></i> Email tidak valid';
  }
});
function validateEmail(email) {
  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}
