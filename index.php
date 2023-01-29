<?php
$connection = mysqli_connect('localhost', 'root', '', 'data-base-bank');
$query = 'SELECT * FROM users';
$query_connection = mysqli_query($connection, $query);
if (!$query_connection) {
  echo "ERROR";
}
if (isset($_POST['btn-next'])) {
  $user_name = mysqli_real_escape_string($connection, $_POST['user_name']);
  $user_lastname = mysqli_real_escape_string($connection, $_POST['user_lastname']);
  $email = mysqli_real_escape_string($connection, $_POST['email']);

  if (!$user_name || !$user_lastname || !$email) {
    header('Location: index.php');
    exit();
  } else {
    $email_twince = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $email_twince_connection = mysqli_query($connection, $email_twince);
    if (mysqli_num_rows($email_twince_connection) > 0) {
      header('Location: index.php');
      exit();
    } else {
      $insert_user = "INSERT INTO `users`(`user_name`, `user_lastname`, `email`) VALUES ('$user_name','$user_lastname','$email')";
      $insert_user_connection = mysqli_query($connection, $insert_user);
      if (!$insert_user_connection) {
        echo "ERROR";
      }
    }
  }
}

?>


<!DOCTYPE html>
<html lang="ua">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="shortcut icon" type="image/png" href="img/logo.png" />

  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:300,400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <title>Просто Банк | Коли Банк Максимально Зрозумілий</title>

  <script defer src="solo.js"></script>
</head>

<body>
  <header class="header">
    <nav class="nav">
      <img src="img/logo.png" alt="Лого Просто Банк" class="nav__logo" id="logo" developer="Hvozd Severyn"
        data-version-number="2.0" />
      <div class="nav__text">Просто Банк</div>
      <ul class="nav__links">
        <li class="nav__item">
          <a class="nav__link" href="#section--1">Послуги</a>
        </li>
        <li class="nav__item">
          <a class="nav__link" href="#section--2">Операції</a>
        </li>
        <li class="nav__item">
          <a class="nav__link" href="#section--3">Відгуки</a>
        </li>
        <li class="nav__item">
          <a class="nav__link nav__link--btn btn--show-modal-window" href="#">Відкрити рахунок</a>
        </li>
      </ul>
    </nav>

    <div class="header__title">
      <h1>
        Коли
        <span class="highlight">банк</span>
        максимально<br />
        <span class="highlight">зрозумілий</span>
      </h1>
      <h4>Більш простий банківський досвід для спрощення життя.</h4>
      <button class="btn--text btn--scroll-to">
        Дізнатись більше &DownArrow;
      </button>
      <img src="img/bank.png" class="header__img" alt="Зображення Просто Банк" />
    </div>
  </header>

  <section class="section" id="section--1">
    <div class="section__title">
      <h2 class="section__description">Послуги</h2>
      <h3 class="section__header">Все необхідне в сучасному банку.</h3>
    </div>

    <div class="services">
      <img src="img/stock-exchange-lazy.jpg" data-src="img/stock-exchange.jpg" alt="Числа на екрані"
        class="services__img lazy-img" />
      <div class="services__feature">
        <div class="services__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-monitor"></use>
          </svg>
        </div>
        <h5 class="services__header">100% цифровий банк</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>

      <div class="services__feature">
        <div class="services__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-trending-up"></use>
          </svg>
        </div>
        <h5 class="services__header">Спостерігай за збільшенням твоїх грошей</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>
      <img src="img/business-lazy.jpg" data-src="img/business.jpg" alt="Тренд на графику"
        class="services__img lazy-img" />

      <img src="img/payment-lazy.jpg" data-src="img/payment.jpg" alt="Кредитна карта" class="services__img lazy-img" />
      <div class="services__feature">
        <div class="services__icon">
          <svg>
            <use xlink:href="img/icons.svg#icon-credit-card"></use>
          </svg>
        </div>
        <h5 class="services__header">Безплатна дебютова карта включена</h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>
    </div>
  </section>

  <section class="section" id="section--2">
    <div class="section__title">
      <h2 class="section__description">Операції</h2>
      <h3 class="section__header">Все максимально просто, но не простіше.</h3>
    </div>

    <div class="operations">
      <div class="operations__tab-container">
        <button class="btn operations__tab operations__tab--1 operations__tab--active" data-tab="1">
          <span>🚀</span>
          Миттєві переводи
        </button>
        <button class="btn operations__tab operations__tab--2" data-tab="2">
          <span>🚀</span>
          Миттєві Займи
        </button>
        <button class="btn operations__tab operations__tab--3" data-tab="3">
          <span>🚀</span>
          Миттєве Закриття
        </button>
      </div>
      <div class="operations__content operations__content--1 operations__content--active">
        <div class="operations__icon operations__icon--1">
          <svg>
            <use xlink:href="img/icons.svg#icon-upload"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          Миттєво переводьте гроші кому завгодно!
        </h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>

      <div class="operations__content operations__content--2">
        <div class="operations__icon operations__icon--2">
          <svg>
            <use xlink:href="img/icons.svg#icon-home"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          Купіть дім або реалізуйте свої мрії в реальність за допомогою
          миттєвий кредитів.
        </h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>
      <div class="operations__content operations__content--3">
        <div class="operations__icon operations__icon--3">
          <svg>
            <use xlink:href="img/icons.svg#icon-user-x"></use>
          </svg>
        </div>
        <h5 class="operations__header">
          Ваша облікова сторінка більше не потрібна? Без проблем! Миттєво закрийте
          її.
        </h5>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
          feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
          at eros. Donec vitae odio non mauris convallis congue. Quisque id
          rhoncus elit. Nam accumsan facilisis felis.
        </p>
      </div>
    </div>
  </section>

  <section class="section" id="section--3">
    <div class="section__title section__title--reviews">
      <h2 class="section__description">Все ще не впевнені?</h2>
      <h3 class="section__header">
        Миліони користувачів вже спрощують собі життя.
      </h3>
    </div>

    <div class="slider">
      <div class="slide slide--1">
        <div class="review">
          <h5 class="review__header">Найкраще фінансове рішення!</h5>
          <blockquote class="review__text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
            feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
            at eros. Donec vitae odio non mauris convallis congue. Quisque id
            rhoncus elit. Nam accumsan facilisis felis.
          </blockquote>
          <address class="review__author">
            <img src="img/user-1.png" alt="Фото користувача" class="review__photo" />
            <h6 class="review__name">Олександра Мищенко</h6>
            <p class="review__location">Київ, Україна</p>
          </address>
        </div>
      </div>

      <div class="slide slide--2">
        <div class="review">
          <h5 class="review__header">
            Останній крок, щоб повністю контролювати свої фінанси
          </h5>
          <blockquote class="review__text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
            feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
            at eros. Donec vitae odio non mauris convallis congue. Quisque id
            rhoncus elit. Nam accumsan facilisis felis.
          </blockquote>
          <address class="review__author">
            <img src="img/user-2.png" alt="Фото користувача" class="review__photo" />
            <h6 class="review__name">Рей Уілліс</h6>
            <p class="review__location">Нью-Йорк, USA</p>
          </address>
        </div>
      </div>

      <div class="slide slide--3">
        <div class="review">
          <h5 class="review__header">
            Нарешті вільний від високих відсотків на кредит в іншому банку
          </h5>
          <blockquote class="review__text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla et
            feugiat orci. Integer ut mauris nec sapien viverra condimentum sed
            at eros. Donec vitae odio non mauris convallis congue. Quisque id
            rhoncus elit. Nam accumsan facilisis felis.
          </blockquote>
          <address class="review__author">
            <img src="img/user-3.png" alt="Фото користувача" class="review__photo" />
            <h6 class="review__name">Гліб Михайлов</h6>
            <p class="review__location">Москва, Россія</p>
          </address>
        </div>
      </div>
      <button class="slider__btn slider__btn--left">&larr;</button>
      <button class="slider__btn slider__btn--right">&rarr;</button>
      <div class="dots dots__dot"></div>
    </div>
  </section>

  <section class="section section--sign-up">
    <div class="section__title">
      <h3 class="section__header">
        Зараз найкращий час стати клієнтом нашого банку!
      </h3>
    </div>
    <button class="btn btn--show-modal-window">Відкрийте рахунок сьогодні!</button>
  </section>

  <footer class="footer">
    <ul class="footer__nav">
      <li class="footer__item">
        <a class="footer__link" href="#">Про Нас</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Оцінки</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Правила Використання</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Політика Конфіденціальності</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Кар'єра</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Блог</a>
      </li>
      <li class="footer__item">
        <a class="footer__link" href="#">Зв'яжіться З Нами</a>
      </li>
    </ul>
    <img src="img/logo.png" alt="Логотип банка" class="footer__logo" />
    <p class="footer__copyright">
      НЕ ВТРАЧАЙ ЧАС І БУДУЙ СВОЄ МАЙБУТНЄ ЗАРАЗ
    </p>
    <p class="footer__copyright">
      &copy;
      <a class="footer__link masters-of-code-link" target="_blank" href="https://www.instagram.com/severun_gvozd/">Hvozd
        Severyn</a>.
    </p>
  </footer>

  <div class="modal-window hidden">
    <button class="btn--close-modal-window">&times;</button>
    <h2 class="modal__header">
      Відкрий банківський рахунок <br />
      за <span class="highlight">5 хвилин</span>
    </h2>
    <form class="modal__form">
      <label>Ім'я</label>
      <input type="text" name="user_name" />
      <label>Прізвище</label>
      <input type="text" name="user_lastname" />
      <label>Email</label>
      <input type="email" name="email" />
      <button class="btn btn-next">Дальше &rarr;</button>
    </form>
  </div>
  <div class="overlay hidden"></div>
</body>

</html>