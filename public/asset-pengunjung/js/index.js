// Kategori Display
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c === "all") {
    // Tampilkan semua elemen
    for (i = 0; i < x.length; i++) {
      x[i].classList.add("show");
    }
  } else {
    // Saring elemen sesuai kategori
    for (i = 0; i < x.length; i++) {
      x[i].classList.remove("show");
      if (x[i].className.indexOf(c) > -1) x[i].classList.add("show");
    }
  }
}

var btnContainer = document.querySelector(".select-category");
var btns = btnContainer.getElementsByClassName("btn");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    // Remove 'active' class from all buttons
    for (var j = 0; j < btns.length; j++) {
      btns[j].classList.remove("active");
    }
    // Add 'active' class to the clicked button
    this.classList.add("active");
    // Call filter function based on the clicked button
    filterSelection(this.getAttribute("data-category"));
  });
}

// Show all products initially
filterSelection("all");

// dokumentasi
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}

function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
