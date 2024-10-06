const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    title: "Sukses!",
    text: flashData,
    icon: "success",
  });
}

const gagal = $(".error").data("flashdata");
if (gagal) {
  Swal.fire({
    title: "Gagal!",
    text: gagal,
    icon: "error",
  });
}

const login = $(".login").data("flashdata");
if (login) {
  Swal.fire({
    title: "Berhasil Login",
    text: login,
    icon: "success",
  });
}

const tolak = $(".tolak").data("flashdata");
if (tolak) {
  Swal.fire({
    title: "Akses Ditolak!",
    text: gagal,
    icon: "error",
  });
}
