document.getElementById("resetForm").addEventListener("submit", function (event) {
  event.preventDefault();

  var pwdInput = document.getElementById("password");
  var pwdError = document.getElementById("pwdError");
  var pwdValue = pwdInput.value.trim();
  var pwdCInput = document.getElementById("password_confirm");
  var pwdCError = document.getElementById("pwdcError");
  var pwdCValue = pwdCInput.value.trim();

  var hasError = false;

  if (pwdValue === "") {
    pwdInput.classList.add("error");
    pwdError.innerHTML = '<i class="fas fa-exclamation-circle"></i> Password tidak boleh kosong!';
    hasError = true;
  } else if (pwdValue.length < 6) {
    pwdInput.classList.add("error");
    pwdError.innerHTML = '<i class="fas fa-exclamation-circle"></i> Password harus terdiri dari minimal 6 karakter!';
    hasError = true;
  } else {
    pwdInput.classList.remove("error");
    pwdError.innerHTML = "";
  }

  if (pwdCValue === "") {
    pwdCInput.classList.add("error");
    pwdCError.innerHTML = '<i class="fas fa-exclamation-circle"></i> Konfirmasi password tidak boleh kosong!';
    hasError = true;
  } else if (pwdValue !== pwdCValue) {
    pwdCInput.classList.add("error");
    pwdCError.innerHTML = '<i class="fas fa-exclamation-circle"></i> Password dan konfirmasi password tidak cocok!';
    hasError = true;
  } else {
    pwdCInput.classList.remove("error");
    pwdCError.innerHTML = "";
  }

  if (!hasError) {
    this.submit();
  }
});
