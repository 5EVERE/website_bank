"use strict";
///////////////////////////////////////////////////////////////////////
// Плавний прокрут
document
  .querySelector(".btn--scroll-to")
  .addEventListener("click", function (e) {
    e.preventDefault();
    document
      .querySelector("#section--1")
      .scrollIntoView({ behavior: "smooth" });
  });

const navLinks = document.querySelector(".nav__links");
navLinks.addEventListener("click", function (e) {
  e.preventDefault();
  if (e.target.classList.contains("nav__link")) {
    if (!e.target.classList.contains("nav__link--btn")) {
      const href = e.target.getAttribute("href");
      document.querySelector(href).scrollIntoView({ behavior: "smooth" });
    }
  }
});
///////////////////////////////////////////////////////////////////////
// Добавляєм і видаляєм модальне вікно.
const modalWindow = document.querySelector(".modal-window");
const overlay = document.querySelector(".overlay");
const btnModalWindow = document.querySelectorAll(".btn--show-modal-window");
const btnCloseModalWindow = document.querySelector(".btn--close-modal-window");
const addHidden = function () {
  modalWindow.classList.add("hidden");
  overlay.classList.add("hidden");
};
const removeHidden = function () {
  modalWindow.classList.remove("hidden");
  overlay.classList.remove("hidden");
};
btnModalWindow.forEach((btn) => {
  btn.addEventListener("click", function () {
    removeHidden();
  });
});
btnCloseModalWindow.addEventListener("click", function () {
  addHidden();
});
overlay.addEventListener("click", function () {
  addHidden();
});
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modalWindow.classList.contains("hidden")) {
    addHidden();
  }
});
///////////////////////////////////////////////////////////////////////
// Затемнення букв при наведенні
const navLink = document.querySelectorAll(".nav__link");
const navColor = function (e, opacity) {
  if (e.target.classList.contains("nav__link")) {
    navLink.forEach((elem) => {
      if (elem !== e.target) {
        elem.style.opacity = opacity;
      }
    });
    document.querySelector(".nav__logo").style.opacity = opacity;
    document.querySelector(".nav__text").style.opacity = opacity;
  }
};
navLinks.addEventListener("mouseover", function (e) {
  navColor(e, 0.3);
});
navLinks.addEventListener("mouseout", function (e) {
  navColor(e, 1);
});
///////////////////////////////////////////////////////////////////////
// Різні блоки при кнопках
const operationContainer = document.querySelector(".operations__tab-container");
const operationsBtn = document.querySelectorAll(".operations__tab");
operationContainer.addEventListener("click", function (e) {
  if (e.target.classList.contains("operations__tab")) {
    operationsBtn.forEach((btn) => {
      if (btn !== e.target) btn.classList.remove("operations__tab--active");
      e.target.classList.add("operations__tab--active");
    });
    document.querySelectorAll(".operations__content").forEach((elem) => {
      elem.classList.remove("operations__content--active");
    });
    document
      .querySelector(`.operations__content--${e.target.dataset.tab}`)
      .classList.add("operations__content--active");
  }
});
///////////////////////////////////////////////////////////////////////
// Слайдер
const slider = document.querySelector(".slider");
const slide = document.querySelectorAll(".slide");
const btnRight = document.querySelector(".slider__btn--right");
const btnLeft = document.querySelector(".slider__btn--left");
let currentSlide = 0;
const slideLength = slide.length - 1;
const slideElement = function (current) {
  slide.forEach((s, i) => {
    s.style.transform = `translateX(${(i - current) * 100}%)`;
  });
};
slideElement(0);
const slideRight = function () {
  if (currentSlide === slideLength) {
    currentSlide = 0;
  } else {
    currentSlide++;
  }
  slideElement(currentSlide);
};
const slideLeft = function () {
  if (currentSlide === 0) {
    currentSlide = slideLength;
  } else {
    currentSlide--;
  }
  slideElement(currentSlide);
};
btnRight.addEventListener("click", function () {
  slideRight();
});
btnLeft.addEventListener("click", function () {
  slideLeft();
});
document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowRight") {
    slideRight();
  }
});
document.addEventListener("keydown", (e) => {
  if (e.key === "ArrowLeft") {
    slideLeft();
  }
});
///////////////////////////////////////////////////////////////////////
// Появлення частин сайту
const sectionObserver = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.remove("section--hidden");
        observer.unobserve(entry.target);
      }
    });
  },
  {
    root: null,
    threshold: 0.1,
  }
);
document.querySelectorAll(".section").forEach((section) => {
  section.classList.add("section--hidden");
  sectionObserver.observe(section);
});
///////////////////////////////////////////////////////////////////////
// Lazy Loading
const lazyPictures = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.src = entry.target.dataset.src;
        entry.target.classList.remove("lazy-img");
        observer.unobserve(entry.target);
      }
    });
  },
  { root: null, threshold: 0.3 }
);
document.querySelectorAll(".services__img").forEach((img) => {
  lazyPictures.observe(img);
});
///////////////////////////////////////////////////////////////////////
