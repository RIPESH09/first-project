<!-- connect file -->


<?php
session_start();
include('includes/conncet.php');
include('functions/common_functions.php');

?>

\





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link
      rel="stylesheet"
      href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css"
    />

    <!--=============== SWIPER CSS ===============-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./assets/css/styles.css" />

    <title>Ecommerce Website</title>
  </head>
  <body>
    <!--=============== HEADER ===============-->
    <header class="header">
      <div class="header__top">
        <div class="header__container container">
          <div class="header__contact">
            <span>(+01) - 2345 - 6789</span>
            <span>Our location</span>
          </div>
          <p class="header__alert-news">
            Super Values Deals - Save more coupons
          </p>
        </div>
      </div>

      <!-- Main Navigation Bar -->
      <nav class="nav container">
        <a href="index.php" class="nav__logo">
          <img class="nav__logo-img" src="assets/img/logo.png" alt="website logo" />
        </a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="index.php" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="shop.php" class="nav__link active-link">Shop</a>
            </li>
            <li class="nav__item">
              <a href="./users_area/profile.php" class="nav__link">Profile</a>
            </li>
            <li class="nav__item">
              <a href="compare.php" class="nav__link">Compare</a>
            </li>
            <li class="nav__item">
              <a href="cart.php" class="header__action-btn" title="Cart">
                <img src="assets/img/icon-cart.svg" alt="Cart" />
                <span class="count">
                  <?php cart_item(); ?>
                </span>
              </a>
            </li>
            <li class="nav__item">
              <span class="header__price">
                Total Price: <?php total_cart_price(); ?>
              </span>
            </li>
            
            <!-- Welcome and Login/Logout -->
            <?php
            if (!isset($_SESSION['username'])) {
                echo "<li class='nav__item'>
                        <a class='nav__link' href='#'>Welcome Guest</a>
                      </li>";
            } else {
                echo "<li class='nav__item'>
                        <a class='nav__link' href='#'>Welcome " . htmlspecialchars($_SESSION['username']) . "</a>
                      </li>";
            }

            if (!isset($_SESSION['username'])) {
                echo "<li class='nav__item'>
                        <a class='nav__link' href='./users_area/user_login.php'>Login</a>
                      </li>";
            } else {
                echo "<li class='nav__item'>
                        <a class='nav__link' href='./users_area/logout.php'>Logout</a>
                      </li>";
            }
            ?>
          </ul>
        </div>
      

    <!-- Search Form and User Actions -->
    <div class="header__actions">
      <form class="d-flex header__search" action="" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
      <a href="wishlist.html" class="header__action-btn" title="Wishlist">
        <img src="assets/img/icon-heart.svg" alt="Wishlist" />
        <span class="count">3</span>
      </a>
    </div>
  </nav>
</header>

      

      



    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== BREADCRUMB ===============-->
      <section class="breadcrumb">
        <ul class="breadcrumb__list flex container">
          <li><a href="index.html" class="breadcrumb__link">Home</a></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Shop</span></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Wishlist</span></li>
        </ul>
      </section>

      <!--=============== WISHLIST ===============-->
      <section class="wishlist section--lg container">
        <div class="table__container">
          <table class="table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock Status</th>
                <th>Action</th>
                <th>Rename</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <img
                    src="./assets//img/product-1-2.jpg"
                    alt=""
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">
                    J.Crew Mercantile Women's Short-Sleeve
                  </h3>
                  <p class="table__description">
                    Lorem ipsum dolor sit amet consectetur.
                  </p>
                </td>
                <td>
                  <span class="table__price">$110</span>
                </td>
                <td><span class="table__stock">In Stock</span></td>
                <td><a href="#" class="btn btn--sm">Add to Cart</a></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
              </tr>
              <tr>
                <td>
                  <img
                    src="./assets//img/product-7-1.jpg"
                    alt=""
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">Amazon Essentials Women's Tank</h3>
                  <p class="table__description">
                    Lorem ipsum dolor sit amet consectetur.
                  </p>
                </td>
                <td>
                  <span class="table__price">$110</span>
                </td>
                <td><span class="table__stock">In Stock</span></td>
                <td><a href="#" class="btn btn--sm">Add to Cart</a></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
              </tr>
              <tr>
                <td>
                  <img
                    src="./assets//img/product-2-1.jpg"
                    alt=""
                    class="table__img"
                  />
                </td>
                <td>
                  <h3 class="table__title">
                    Amazon Brand - Daily Ritual Women's Jersey
                  </h3>
                  <p class="table__description">
                    Lorem ipsum dolor sit amet consectetur.
                  </p>
                </td>
                <td>
                  <span class="table__price">$110</span>
                </td>
                <td><span class="table__stock">In Stock</span></td>
                <td><a href="#" class="btn btn--sm">Add to Cart</a></td>
                <td><i class="fi fi-rs-trash table__trash"></i></td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>

      <!--=============== NEWSLETTER ===============-->
      <section class="newsletter section">
        <div class="newsletter__container container grid">
          <h3 class="newsletter__title flex">
            <img
              src="./assets/img/icon-email.svg"
              alt=""
              class="newsletter__icon"
            />
            Sign in to Newsletter
          </h3>
          <p class="newsletter__description">
            ...and receive $25 coupon for first shopping.
          </p>
          <form action="" class="newsletter__form">
            <input
              type="text"
              placeholder="Enter Your Email"
              class="newsletter__input"
            />
            <button type="submit" class="newsletter__btn">Subscribe</button>
          </form>
        </div>
      </section>
    </main>

    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.html" class="footer__logo">
            <img src="./assets/img/logo.svg" alt="" class="footer__logo-img" />
          </a>
          <h4 class="footer__subtitle">Contact</h4>
          <p class="footer__description">
            <span>Address:</span> 13 Tlemcen Road, Street 32, Beb-Wahren
          </p>
          <p class="footer__description">
            <span>Phone:</span> +01 2222 365 /(+91) 01 2345 6789
          </p>
          <p class="footer__description">
            <span>Hours:</span> 10:00 - 18:00, Mon - Sat
          </p>
          <div class="footer__social">
            <h4 class="footer__subtitle">Follow Me</h4>
            <div class="footer__links flex">
              <a href="#">
                <img
                  src="./assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="./assets/img/icon-youtube.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
            </div>
          </div>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Address</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">About Us</a></li>
            <li><a href="#" class="footer__link">Delivery Information</a></li>
            <li><a href="#" class="footer__link">Privacy Policy</a></li>
            <li><a href="#" class="footer__link">Terms & Conditions</a></li>
            <li><a href="#" class="footer__link">Contact Us</a></li>
            <li><a href="#" class="footer__link">Support Center</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">My Account</h3>
          <ul class="footer__links">
            <li><a href="#" class="footer__link">Sign In</a></li>
            <li><a href="#" class="footer__link">View Cart</a></li>
            <li><a href="#" class="footer__link">My Wishlist</a></li>
            <li><a href="#" class="footer__link">Track My Order</a></li>
            <li><a href="#" class="footer__link">Help</a></li>
            <li><a href="#" class="footer__link">Order</a></li>
          </ul>
        </div>
        <div class="footer__content">
          <h3 class="footer__title">Secured Payed Gateways</h3>
          <img
            src="./assets/img/payment-method.png"
            alt=""
            class="payment__img"
          />
        </div>
      </div>
      <div class="footer__bottom">
        <p class="copyright">&copy; 2024 Evara. All right reserved</p>
        <span class="designer">Designer by Crypticalcoder</span>
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
