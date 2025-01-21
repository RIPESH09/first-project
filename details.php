<!-- connect file -->


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
          <li><span class="breadcrumb__link">Fashion</span></li>
          <li><span class="breadcrumb__link"></span>></li>
          <li><span class="breadcrumb__link">Henley Shirt</span></li>
        </ul>
      </section>

      <!--=============== DETAILS ===============-->
      <section class="details section--lg">
        <div class="details__container container grid">
          <div class="details__group">
            <img
              src="./assets/img/product-8-1.jpg"
              alt=""
              class="details__img"
            />
            <div class="details__small-images grid">
              <img
                src="./assets/img/product-8-2.jpg"
                alt=""
                class="details__small-img"
              />
              <img
                src="./assets/img/product-8-1.jpg"
                alt=""
                class="details__small-img"
              />
              <img
                src="./assets/img/product-8-2.jpg"
                alt=""
                class="details__small-img"
              />
            </div>
          </div>
          <div class="details__group">
            <h3 class="details__title">Henley Shirt</h3>
            <p class="details__brand">Brand: <span>adidas</span></p>
            <div class="details__price flex">
              <span class="new__price">$116</span>
              <span class="old__price">$200.00</span>
              <span class="save__price">25% Off</span>
            </div>
            <p class="short__description">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Voluptate, fuga. Quo blanditiis recusandae facere nobis cum optio,
              inventore aperiam placeat, quis maxime nam officiis illum? Optio
              et nisi eius, inventore impedit ratione sunt, cumque, eligendi
              asperiores iste porro non error?
            </p>
            <ul class="products__list">
              <li class="list__item flex">
                <i class="fi-rs-crown"></i> 1 Year Al Jazeera Brand Warranty
              </li>
              <li class="list__item flex">
                <i class="fi-rs-refresh"></i> 30 Days Return Policy
              </li>
              <li class="list__item flex">
                <i class="fi-rs-credit-card"></i> Cash on Delivery available
              </li>
            </ul>
            <div class="details__color flex">
              <span class="details__color-title">Color</span>
              <ul class="color__list">
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(37, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(353, 100%, 65%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(49, 100%, 60%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(304, 100%, 78%)"
                  ></a>
                </li>
                <li>
                  <a
                    href="#"
                    class="color__link"
                    style="background-color: hsl(126, 61%, 52%)"
                  ></a>
                </li>
              </ul>
            </div>
            <div class="details__size flex">
              <span class="details__size-title">Size</span>
              <ul class="size__list">
                <li>
                  <a href="#" class="size__link size-active">M</a>
                </li>
                <li>
                  <a href="#" class="size__link">L</a>
                </li>
                <li>
                  <a href="#" class="size__link">XL</a>
                </li>
                <li>
                  <a href="#" class="size__link">XXL</a>
                </li>
              </ul>
            </div>
            <div class="details__action">
              <input type="number" class="quantity" value="3" />
              <a href="#" class="btn btn--sm">Add To Card</a>
              <a href="#" class="details__action-btn">
                <i class="fi fi-rs-heart"></i>
              </a>
            </div>
            <ul class="details__meta">
              <li class="meta__list flex"><span>SKU:</span>FWM15VKT</li>
              <li class="meta__list flex">
                <span>Tags:</span>Clothes, Women, Dress
              </li>
              <li class="meta__list flex">
                <span>Availability:</span>8 Items in Stock
              </li>
            </ul>
          </div>
        </div>
      </section>

      <!--=============== DETAILS TAB ===============-->
      <section class="details__tab container">
        <div class="detail__tabs">
          <span class="detail__tab active-tab" data-target="#info">
            Additional Info
          </span>
          <span class="detail__tab" data-target="#reviews">Reviews(3)</span>
        </div>
        <div class="details__tabs-content">
          <div class="details__tab-content active-tab" content id="info">
            <table class="info__table">
              <tr>
                <th>Stand Up</th>
                <td>35" L x 24"W x 37-45"H(front to back wheel)</td>
              </tr>
              <tr>
                <th>Folded (w/o wheels)</th>
                <td>32.5"L x 18.5"W x 16.5"H</td>
              </tr>
              <tr>
                <th>Folded (w/o wheels)</th>
                <td>32.5"L x 24"W x 18.5"H</td>
              </tr>
              <tr>
                <th>Door Pass THrough</th>
                <td>24</td>
              </tr>
              <tr>
                <th>Frame</th>
                <td>Aluminum</td>
              </tr>
              <tr>
                <th>Weight (w/o wheels)</th>
                <td>20 LBS</td>
              </tr>
              <tr>
                <th>Weight Capacity</th>
                <td>60 LBS</td>
              </tr>
              <tr>
                <th>Width</th>
                <td>24</td>
              </tr>
              <tr>
                <th>Handle Height (ground to handle)</th>
                <td>37-45</td>
              </tr>
              <tr>
                <th>Wheels</th>
                <td>12" air / wide track slick tread</td>
              </tr>
              <tr>
                <th>Seat back height</th>
                <td>21.5</td>
              </tr>
              <tr>
                <th>Head Room(inside canopy)</th>
                <td>25"</td>
              </tr>
              <tr>
                <th>Color</th>
                <td>Black, Blue, Red, White</td>
              </tr>
              <tr>
                <th>Size</th>
                <td>M, S</td>
              </tr>
            </table>
          </div>
          <div class="details__tab-content" content id="reviews">
            <div class="reviews__container grid">
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-1.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Jacky Chan</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Thank you, very fast shipping from Poland only 3days.
                  </p>
                  <span class="review__date">December 4, 2022 at 3:12 pm</span>
                </div>
              </div>
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-2.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Meriem Js</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Great low price and works well
                  </p>
                  <span class="review__date">August 23, 2022 at 19:45 pm</span>
                </div>
              </div>
              <div class="review__single">
                <div>
                  <img
                    src="./assets/img/avatar-3.jpg"
                    alt=""
                    class="review__img"
                  />
                  <h4 class="review__title">Moh Benz</h4>
                </div>
                <div class="review__data">
                  <div class="review__rating">
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                    <i class="fi fi-rs-star"></i>
                  </div>
                  <p class="review__description">
                    Authentic and beautiful, Love these ways more than ever
                    expected, They are great earphones.
                  </p>
                  <span class="review__date">March 2, 2021 at 10:01 am</span>
                </div>
              </div>
            </div>
            <div class="review__form">
              <h4 class="review__form-title">Add a review</h4>
              <div class="rate__product">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <form action="" class="form grid">
                <textarea
                  class="form__input textarea"
                  placeholder="Write Comment"
                ></textarea>
                <div class="form__group grid">
                  <input type="text" placeholder="Name" class="form__input">
                  <input type="email" placeholder="Email" class="form__input">
                </div>
                <div class="form__btn">
                  <button class="btn">Submit Review</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>

      <!--=============== PRODUCTS ===============-->
      <section class="products container section--lg">
        <h3 class="section__title"><span>Related</span> Products</h3>
        <div class="products__container grid">
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-1-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-1-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-pink">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-2-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-2-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-green">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-3-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-3-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-orange">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
          <div class="product__item">
            <div class="product__banner">
              <a href="details.html" class="product__images">
                <img
                  src="assets/img/product-4-1.jpg"
                  alt=""
                  class="product__img default"
                />
                <img
                  src="assets/img/product-4-2.jpg"
                  alt=""
                  class="product__img hover"
                />
              </a>
              <div class="product__actions">
                <a href="#" class="action__btn" aria-label="Quick View">
                  <i class="fi fi-rs-eye"></i>
                </a>
                <a
                  href="#"
                  class="action__btn"
                  aria-label="Add to Wishlist"
                >
                  <i class="fi fi-rs-heart"></i>
                </a>
                <a href="#" class="action__btn" aria-label="Compare">
                  <i class="fi fi-rs-shuffle"></i>
                </a>
              </div>
              <div class="product__badge light-blue">Hot</div>
            </div>
            <div class="product__content">
              <span class="product__category">Clothing</span>
              <a href="details.html">
                <h3 class="product__title">Colorful Pattern Shirts</h3>
              </a>
              <div class="product__rating">
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
                <i class="fi fi-rs-star"></i>
              </div>
              <div class="product__price flex">
                <span class="new__price">$238.85</span>
                <span class="old__price">$245.8</span>
              </div>
              <a
                href="#"
                class="action__btn cart__btn"
                aria-label="Add To Cart"
              >
                <i class="fi fi-rs-shopping-bag-add"></i>
              </a>
            </div>
          </div>
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
