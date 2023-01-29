"use strict";

const modalWindow = document.querySelector(".modal-window");
const overlay = document.querySelector(".overlay");
const btnCloseModalWindow = document.querySelector(".btn--close-modal-window");
const btnsOpenModalWindow = document.querySelectorAll(
  ".btn--show-modal-window"
);

const openModalWindow = function (e) {
  e.preventDefault();
  modalWindow.classList.remove("hidden");
  overlay.classList.remove("hidden");
};

const closeModalWindow = function () {
  modalWindow.classList.add("hidden");
  overlay.classList.add("hidden");
};

btnsOpenModalWindow.forEach((button) =>
  button.addEventListener("click", openModalWindow)
);

btnCloseModalWindow.addEventListener("click", closeModalWindow);
overlay.addEventListener("click", closeModalWindow);

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape" && !modalWindow.classList.contains("hidden")) {
    closeModalWindow();
  }
});

////////////////////// Добавити

// const message = document.createElement("div");
// message.classList.add("cookie--message");
// message.innerHTML = '<button class="btn btn--close-cookie">Тиць</button>';
// const header = document.querySelector("header");
// header.prepend(message);
// message.style.marginTop = "10px";

// document
//   .querySelector(".btn--close-cookie")
//   .addEventListener("click", function () {
//     message.remove();
//   });

////////////////////// рандом колір

// function getRandomIntInclusive(min, max) {
//   min = Math.ceil(min);
//   max = Math.floor(max);
//   return Math.floor(Math.random() * (max - min + 1)) + min;
// }

// const randomColor = () => `rgb(${getRandomIntInclusive(0, 255)},
// ${getRandomIntInclusive(0, 255)},
// ${getRandomIntInclusive(0, 255)})`;

// document.querySelector(".nav__link").addEventListener("click", function (e) {
//   this.style.backgroundColor = randomColor();
//   e.stopPropagation();
// });

// document.querySelector(".nav__links").addEventListener("click", function () {
//   this.style.backgroundColor = randomColor();
// });

// document.querySelector(".nav").addEventListener("click", function () {
//   this.style.backgroundColor = randomColor();
// });

// document.querySelector(".header").addEventListener("click", function () {
//   this.style.backgroundColor = randomColor();
// });

// document.querySelector("body").addEventListener("click", function () {
//   this.style.backgroundColor = randomColor();
// });

// ////////////////////// Прокрут

const btnScrollTo = document.querySelector(".btn--scroll-to");
const section1 = document.getElementById("section--1");

btnScrollTo.addEventListener("click", function (e) {
  section1.scrollIntoView({ behavior: "smooth" });
});

document.querySelector(".nav__links").addEventListener("click", function (e) {
  e.preventDefault();
  if (e.target.classList.contains("nav__link")) {
    const href = e.target.getAttribute("href");
    document.querySelector(href).scrollIntoView({ behavior: "smooth" });
  }
});

///////////////////////// появлення і видалення

const operationTabContainer = document.querySelector(
  ".operations__tab-container"
);
const operationTab = document.querySelectorAll(".operations__tab");
const operationContent = document.querySelectorAll(".operations__content");

operationTabContainer.addEventListener("click", function (e) {
  e.preventDefault();
  const containerBtn = e.target.closest(".operations__tab");
  if (!containerBtn) return;
  operationTab.forEach((btn) =>
    btn.classList.remove("operations__tab--active")
  );
  e.target.classList.add("operations__tab--active");

  operationContent.forEach((cont) =>
    cont.classList.remove("operations__content--active")
  );
  document
    .querySelector(`.operations__content--${containerBtn.dataset.tab}`)
    .classList.add("operations__content--active");
});

///////////////////////// Затемнення

const nav = document.querySelector(".nav");

const navBlack = function (e, opacity) {
  if (e.target.classList.contains("nav__link")) {
    const linkOver = e.target;
    const siblinks = linkOver
      .closest(".nav__links")
      .querySelectorAll(".nav__link");
    const logo = linkOver.closest(".nav").querySelector("img");
    const textNav = linkOver.closest(".nav").querySelector(".nav__text");
    siblinks.forEach((el) => {
      if (el != linkOver) {
        el.style.opacity = opacity;
      }
    });
    logo.style.opacity = opacity;
    textNav.style.opacity = opacity;
  }
};

nav.addEventListener("mouseover", function (e) {
  navBlack(e, 0.4);
});

nav.addEventListener("mouseout", function (e) {
  navBlack(e, 1);
});

///////////////////////// появлення частин сайту
const allSections = document.querySelectorAll("section");
const appearSection = function (entries, observer) {
  const entry = entries[0];
  if (entry.isIntersecting) {
    entry.target.classList.remove("section--hidden");
  }
};
const sectionObserver = new IntersectionObserver(appearSection, {
  root: null,
  threshold: 0.1,
});
allSections.forEach(function (section) {
  sectionObserver.observe(section);
  section.classList.add("section--hidden");
});

///////////////////////// lazy loading

const lazyLoad = document.querySelectorAll("img[data-src]");

const loadCallBack = function (entries, observer) {
  console.log(entries);
  const entry = entries[0];
  if (!entry.isIntersecting) return;
  entry.target.src = entry.target.dataset.src;
  entry.target.addEventListener("load", function () {
    entry.target.classList.remove("lazy-img");
  });
  observer.unobserve(entry.target);
};
const lazyObserver = new IntersectionObserver(loadCallBack, {
  root: null,
  threshold: 0.3,
});
lazyLoad.forEach((image) => lazyObserver.observe(image));

///////////////////////// skider

const btnRight = document.querySelector(".slider__btn--right");
const btnLeft = document.querySelector(".slider__btn--left");
const slideFoto = document.querySelectorAll(".slide");
const sliderFoto = document.querySelector(".slider");
const dotCont = document.querySelector(".dots");
const currentLengthSlides = slideFoto.length;
let currentSlide = 0;
const slides = document.querySelector(".slides");

const slideTransform = function () {
  slides.style.transform = `translateX(${currentSlide * -100}%)`;
};

const nextSlide = function () {
  if (currentSlide == slides.children.length - 1) return;
  currentSlide++;
  slideTransform();
};

const prevSlide = function () {
  if (currentSlide == 0) return;
  currentSlide--;
  slideTransform();
};

// const previosSlide = function () {
//   if (currentSlide === 0) {
//     currentSlide = currentLengthSlides - 1;
//   } else {
//     currentSlide--;
//   }
//   slideFoto.forEach(
//     (slide, index) =>
//       (slide.style.transform = `translateX(${(index - currentSlide) * 100}%)`)
//   );
//   currentDot(currentSlide);
// };

btnRight.addEventListener("click", nextSlide);

btnLeft.addEventListener("click", prevSlide);

document.addEventListener("keydown", function (e) {
  if (e.key === "ArrowRight") nextSlide();
  else if (e.key === "ArrowLeft") prevSlide();
});

// dotCont.addEventListener("click", function (e) {
//   if (e.target.classList.contains("dots__dot")) {
//     const slidee = e.target.dataset.slide;
//     slideFoto.forEach(
//       (slide, index) =>
//         (slide.style.transform = `translateX(${(index - slidee) * 100}%)`)
//     );
//     currentDot(slidee);
//   }
// });

/////////////////////////
document.addEventListener("DOMContentLoaded", function (e) {
  console.log(e);
});
window.onload = function (e) {
  console.log(e);
};
window.BeforeUnloadEvent = function (e) {
  e.preventDefault();
  console.log(e);
  e.returnValue = "";
};
