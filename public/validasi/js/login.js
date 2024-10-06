// validasi login

document.getElementById("login").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form submission

  var usernameInput = document.getElementById("username");
  var usernameError = document.getElementById("usernameError");
  var usernameValue = usernameInput.value.trim();
  var pwdInput = document.getElementById("password");
  var pwdError = document.getElementById("pwdError");
  var pwdValue = pwdInput.value.trim();

  if (usernameValue === "") {
    usernameInput.classList.add("error");
    usernameError.innerHTML = '<i class="bi bi-exclamation-circle"></i> Username tidak boleh kosong!';
  } else if (usernameValue !== "") {
    usernameInput.classList.remove("error");
    usernameError.innerHTML = "";
  }

  if (pwdValue === "") {
    pwdInput.classList.add("error");
    pwdError.innerHTML = '<i class="bi bi-exclamation-circle"></i> Password tidak boleh kosong!';
  } else if (pwdValue !== "") {
    pwdInput.classList.remove("error");
    pwdError.innerHTML = "";
  }

  if (usernameValue !== "" && pwdValue !== "") {
    this.submit();
  }
});
