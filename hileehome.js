
  let slideIndex = 1;
  let slideInterval;

  showSlide(slideIndex);
  autoSlide();

  function autoSlide() {
    slideInterval = setInterval(() => {
      changeSlide(1);
    }, 4000);
  }

  function changeSlide(n) {
    clearInterval(slideInterval);
    showSlide(slideIndex += n);
    autoSlide();
  }

  function currentSlide(n) {
    clearInterval(slideInterval);
    showSlide(slideIndex = n);
    autoSlide();
  }

  function showSlide(n) {
    let slides = document.querySelectorAll(".slide");
    let dots = document.querySelectorAll(".dot");

    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    slides.forEach((slide, i) => {
      slide.style.display = "none";
      dots[i].classList.remove("active");
    });

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add("active");
  }
