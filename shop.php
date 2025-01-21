<?php
session_start();
include('includes/conncet.php');
include('functions/common_functions.php');

?>








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
        </ul>
      </section>



      <!-- calling cart function -->
 <?php

cart();

?>


<?php


 cart_item();

?>


      


 <!--=============== PRODUCTS ===============-->
<section class="products container section">
  <div class="tab__btns">
    <span class="tab__btn active-tab" data-target="#featured">All Products</span>
  
  </div>

  <div class="tab__items">
    <!-- Featured Tab -->
    <div class="tab__item active-tab" id="featured">
      <div class="products__container grid">
        <?php
        include('./includes/conncet.php'); // Include the connect.php file for database connection

        $query = "SELECT * FROM `products`   order by rand()";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1']; // Image name or path from DB
            $product_price = $row['product_price']; // Price
            // You can get product category or brand here as needed

            // Assuming the images are located in a publicly accessible folder like 'images' or 'product_images'
            $image_path = 'admin_area/product_images/' . $product_image1; // Correct relative path

            echo "
            <div class='product__item'>
              <div class='product__banner'>
                <!-- Image source is set to the path from the database -->
                <img src='$image_path' alt='$product_title'>
                <div class='product__actions'>
                  <a href='#' class='action__btn' aria-label='Quick View'>
                    <i class='fi fi-rs-eye'></i>
                  </a>
                  <a href='#' class='action__btn' aria-label='Add to Wishlist'>
                    <i class='fi fi-rs-heart'></i>
                  </a>
                  <a href='#' class='action__btn' aria-label='Compare'>
                    <i class='fi fi-rs-shuffle'></i>
                  </a>
                </div>
                <div class='product__badge light-pink'>Hot</div>
              </div>
              <div class='product__content'>
                <a href='products.php?id=$product_id'>
                  <h3 class='product__title'>$product_title</h3>
                </a>
                <div class='product__rating'>
                  <i class='fi fi-rs-star'></i>
                  <i class='fi fi-rs-star'></i>
                  <i class='fi fi-rs-star'></i>
                  <i class='fi fi-rs-star'></i>
                  <i class='fi fi-rs-star'></i>
                </div>
                <div class='product__price flex'>
                  <span class='new__price'>$$product_price</span>
                </div>
                <a href='#' class='action__btn cart__btn' aria-label='Add To Cart'>
                  <i class='fi fi-rs-shopping-bag-add'></i>
                </a>
              </div>
            </div>";
          }
        } else {
          echo "<p>No products found.</p>";
        }
        ?>
      </div>
    </div>
  </div>  
</section>


















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
        <p class="copyright">&copy; 2024 Ripesh All right reserved</p>
        
      </div>
    </footer>

    <!--=============== SWIPER JS ===============-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!--=============== MAIN JS ===============-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
