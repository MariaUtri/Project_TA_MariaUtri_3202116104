document.getElementById("tambahproduk").addEventListener("submit", function (event) {
  event.preventDefault(); // Prevent form submission

  var namaInput = document.getElementById("nama_produk");
  var namaError = document.getElementById("namaError");
  var namaValue = namaInput.value.trim();
  //   var pwdInput = document.getElementById("password");
  //   var pwdError = document.getElementById("pwdError");
  //   var pwdValue = pwdInput.value.trim();

  if (namaValue === "") {
    namaInput.classList.add("error");
    namaError.innerHTML = '<i class="bi bi-exclamation-circle"></i>Nama tidak boleh kosong!';
  } else if (namaValue !== "") {
    namaInput.classList.remove("error");
    namaError.innerHTML = "";
  }

  //   if (pwdValue === "") {
  //     pwdInput.classList.add("error");
  //     pwdError.innerHTML = '<i class="bi bi-exclamation-circle"></i> Password tidak boleh kosong!';
  //   } else if (pwdValue !== "") {
  //     pwdInput.classList.remove("error");
  //     pwdError.innerHTML = "";
  //   }

  //   if (usernameValue !== "" && pwdValue !== "") {
  //     this.submit();
  //   }
});
