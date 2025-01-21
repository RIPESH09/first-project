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
        
    <link rel="stylesheet"
     href="https://unpkg.com/swiper/swiper-bundle.min.css"
     />


    <link rel="stylesheet"
     href="https://unpkg.com/swiper/swiper-bundle.min.css"
      />


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
    <link rel="stylesheet" href="assets/css/styles.css" />

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

      

      




<!-- calling cart function -->
<?php

cart();


?>


    <!--=============== MAIN ===============-->
    <main class="main">
      <!--=============== HOME ===============-->
      <section class="home section--lg">
        <div class="home__container container grid">
          <div class="home__content">
            <span class="home__subtitle">Hot Promotions</span>
            <h1 class="home__title">
              Fashion Trending <span>Great Collection</span>
            </h1>
            <p class="home__description">
              Save more with coupons & up tp 20% off
            </p>
            <a href="shop.php" class="btn">Shop Now</a>
          </div>
          <img src="assets/img/home-img.png" class="home__img" alt="hats" />
        </div>
      </section>

<!--=============== CATEGORIES ===============-->
<section class="categories container section">
  <h3 class="section__title"><span>Popular</span> Categories</h3>
  <div class="categories__container swiper">
    <div class="swiper-wrapper">

      <?php
      getcategories();
      ?>

    </div>

    <div class="swiper-button-prev">
      <i class="fi fi-rs-angle-left"></i>
    </div>
    <div class="swiper-button-next">
      <i class="fi fi-rs-angle-right"></i>
    </div>
  </div>
</section>



<!--=============== BRANDS SECTION ===============-->
<section class="brands container section">
  <h3 class="section__title"><span>Popular</span> Brands</h3>

  <!-- News Ticker container -->
  <div class="brands__ticker-wrapper">
    <div class="brands__ticker">

      <?php
         getbrands()
      ?>

    </div>
  </div>
</section>

<!-- Add some CSS for the ticker -->
<style>
  .brands__ticker-wrapper {
    overflow: hidden;
    position: relative;
    width: 100%;
    background-color: #f4f4f4;
    padding: 10px 0;
  }

  .brands__ticker {
    display: flex;
    animation: ticker 20s linear infinite;
  }

  .brand__ticker-item {
    margin-right: 40px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
    white-space: nowrap; /* Prevents line breaks in brand names */
  }

  /* The keyframes will adjust the scrolling speed and distance */
  @keyframes ticker {
    0% {
      transform: translateX(100%);
    }
    100% {
      transform: translateX(-100%);
    }
  }

  /* Fix: Duplicate the ticker content for seamless scrolling */
  .brands__ticker {
    animation: ticker 20s linear infinite;
    display: flex;
  }

  /* Duplicate content in the ticker for a smooth loop */
  .brands__ticker::before {
    content: attr(data-content);
    display: inline-block;
    white-space: nowrap;
  }

  /* Ensures seamless scrolling by immediately duplicating the ticker content */
  .brands__ticker-wrapper {
    display: flex;
    justify-content: flex-start;
  }
</style>



<!--=============== PRODUCTS ===============-->


<!--=============== PRODUCTS ===============-->
<!--=============== PRODUCTS ===============-->
<section class="products container section">
  <div class="tab__btns">
    <span class="tab__btn active-tab" data-target="#featured">Featured</span>
 
  </div>

  <div class="tab__items">
    <!-- Featured Tab -->
    <div class="tab__item active-tab" id="featured">
      <div class="products__container grid">
        <?php
       
           
          getproducts();
        ?>
      </div>
    </div>
  </div>  
</section>























      <!--=============== PRODUCTS ===============-->



      
      <section class="products container section">
        <div class="tab__btns">
          <span class="tab__btn active-tab" data-target="#featured"
            >Featured</span
          >
          <span class="tab__btn" data-target="#popular">Popular</span>
          <span class="tab__btn" data-target="#new-added">New Added</span>
        </div>

        <div class="tab__items">
          <div class="tab__item active-tab" content id="featured">
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.html" class="product__images">
                    <img
                      src="assets/img/product-5-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-5-2.jpg"
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
                  <div class="product__badge light-blue">-30%</div>
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
                      src="assets/img/product-6-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-6-2.jpg"
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
                  <div class="product__badge light-blue">-22%</div>
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
                      src="assets/img/product-7-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-7-2.jpg"
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
                  <div class="product__badge light-green">-22%</div>
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
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
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
          </div>
          <div class="tab__item" content id="popular">
            <div class="products__container grid">
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.html" class="product__images">
                    <img
                      src="assets/img/product-9-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-9-2.jpg"
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
                      src="assets/img/product-10-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-10-2.jpg"
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.html" class="product__images">
                    <img
                      src="assets/img/product-5-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-5-2.jpg"
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
                  <div class="product__badge light-blue">-30%</div>
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
                      src="assets/img/product-11-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-11-2.jpg"
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
                  <div class="product__badge light-blue">-22%</div>
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
                      src="assets/img/product-7-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-7-2.jpg"
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
                  <div class="product__badge light-green">-22%</div>
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
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
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
          </div>
          <div class="tab__item" content id="new-added">
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
                      src="assets/img/product-12-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-12-2.jpg"
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
                      src="assets/img/product-13-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-13-2.jpg"
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
              <div class="product__item">
                <div class="product__banner">
                  <a href="details.html" class="product__images">
                    <img
                      src="assets/img/product-10-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-10-2.jpg"
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
                  <div class="product__badge light-blue">-30%</div>
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
                      src="assets/img/product-6-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-6-2.jpg"
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
                  <div class="product__badge light-blue">-22%</div>
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
                      src="assets/img/product-9-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-9-2.jpg"
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
                  <div class="product__badge light-green">-22%</div>
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
                      src="assets/img/product-8-1.jpg"
                      alt=""
                      class="product__img default"
                    />
                    <img
                      src="assets/img/product-8-2.jpg"
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
          </div>
        </div>
      </section>

      <!--=============== DEALS ===============-->
      <section class="deals section">
        <div class="deals__container container grid">
          <div class="deals__item">
            <div class="deals__group">
              <h3 class="deals__brand">Deals of the Day</h3>
              <span class="deals__category">Limited quantities</span>
            </div>
            <h4 class="deals__title">Summer Collection New Modern Design</h4>
            <div class="deals__price flex">
              <span class="new__price">$139.00</span>
              <span class="old__price">$160.99</span>
            </div>
            <div class="deals__group">
              <p class="deals__countdown-text">Hurry Up! Offer Ends In:</p>
              <div class="countdown">
                <div class="countdown__amount">
                  <p class="countdown__period">02</p>
                  <span class="unit">Days</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">22</p>
                  <span class="unit">Hours</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">57</p>
                  <span class="unit">Mins</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">28</p>
                  <span class="unit">Sec</span>
                </div>
              </div>
            </div>
            <div class="deals__btn">
              <a href="details.html" class="btn btn--md">Shop Now</a>
            </div>
          </div>
          <div class="deals__item">
            <div class="deals__group">
              <h3 class="deals__brand">Women Clothing</h3>
              <span class="deals__category">Shirts & Bag</span>
            </div>
            <h4 class="deals__title">Try Something new on vacation</h4>
            <div class="deals__price flex">
              <span class="new__price">$178.00</span>
              <span class="old__price">$256.99</span>
            </div>
            <div class="deals__group">
              <p class="deals__countdown-text">Hurry Up! Offer Ends In:</p>
              <div class="countdown">
                <div class="countdown__amount">
                  <p class="countdown__period">02</p>
                  <span class="unit">Days</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">22</p>
                  <span class="unit">Hours</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">57</p>
                  <span class="unit">Mins</span>
                </div>
                <div class="countdown__amount">
                  <p class="countdown__period">28</p>
                  <span class="unit">Sec</span>
                </div>
              </div>
            </div>
            <div class="deals__btn">
              <a href="details.html" class="btn btn--md">Shop Now</a>
            </div>
          </div>
        </div>
      </section>

      <!--=============== NEW ARRIVALS ===============-->
      <section class="new__arrivals container section">
        <h3 class="section__title"><span>New</span> Arrivals</h3>
        <div class="new__container swiper">
          <div class="swiper-wrapper">
            <div class="product__item swiper-slide">
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
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
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
            <div class="product__item swiper-slide">
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
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
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
            <div class="product__item swiper-slide">
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
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
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
            <div class="product__item swiper-slide">
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
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
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
            <div class="product__item swiper-slide">
              <div class="product__banner">
                <a href="details.html" class="product__images">
                  <img
                    src="assets/img/product-5-1.jpg"
                    alt=""
                    class="product__img default"
                  />
                  <img
                    src="assets/img/product-5-2.jpg"
                    alt=""
                    class="product__img hover"
                  />
                </a>
                <div class="product__actions">
                  <a href="#" class="action__btn" aria-label="Quick View">
                    <i class="fi fi-rs-eye"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
                    <i class="fi fi-rs-heart"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Compare">
                    <i class="fi fi-rs-shuffle"></i>
                  </a>
                </div>
                <div class="product__badge light-blue">-30%</div>
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
            <div class="product__item swiper-slide">
              <div class="product__banner">
                <a href="details.html" class="product__images">
                  <img
                    src="assets/img/product-6-1.jpg"
                    alt=""
                    class="product__img default"
                  />
                  <img
                    src="assets/img/product-6-2.jpg"
                    alt=""
                    class="product__img hover"
                  />
                </a>
                <div class="product__actions">
                  <a href="#" class="action__btn" aria-label="Quick View">
                    <i class="fi fi-rs-eye"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
                    <i class="fi fi-rs-heart"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Compare">
                    <i class="fi fi-rs-shuffle"></i>
                  </a>
                </div>
                <div class="product__badge light-blue">-22%</div>
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
            <div class="product__item swiper-slide">
              <div class="product__banner">
                <a href="details.html" class="product__images">
                  <img
                    src="assets/img/product-7-1.jpg"
                    alt=""
                    class="product__img default"
                  />
                  <img
                    src="assets/img/product-7-2.jpg"
                    alt=""
                    class="product__img hover"
                  />
                </a>
                <div class="product__actions">
                  <a href="#" class="action__btn" aria-label="Quick View">
                    <i class="fi fi-rs-eye"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Add to Wishlist">
                    <i class="fi fi-rs-heart"></i>
                  </a>
                  <a href="#" class="action__btn" aria-label="Compare">
                    <i class="fi fi-rs-shuffle"></i>
                  </a>
                </div>
                <div class="product__badge light-green">-22%</div>
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

          <div class="swiper-button-prev">
            <i class="fi fi-rs-angle-left"></i>
          </div>
          <div class="swiper-button-next">
            <i class="fi fi-rs-angle-right"></i>
          </div>
        </div>
      </section>

      <!--=============== SHOWCASE ===============-->
      <section class="showcase section">
        <div class="showcase__container container grid">
          <div class="showcase__wrapper">
            <h3 class="section__title">Hot Releases</h3>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-1.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Floral Print Casual Cotton Dress
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-2.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Ruffled Solid Long Sleeve Blouse
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-3.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Multi-Color Print V-neck T-shirt
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
          </div>
          <div class="showcase__wrapper">
            <h3 class="section__title">Deals & Outlet</h3>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-4.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Fish Print Patched T-shirt</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-5.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Fintage Floral Print Dress</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-6.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Multi-Color Stripe Circle T-shirt
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
          </div>
          <div class="showcase__wrapper">
            <h3 class="section__title">Top Selling</h3>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-7.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Geometric Printed Long Sleeve Blouse
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-8.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Print Patchwork Maxi Dress</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-9.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">
                    Daisy Floral Print Straps Jumpsuit
                  </h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
          </div>
          <div class="showcase__wrapper">
            <h3 class="section__title">Trendy</h3>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-7.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Floral Print Casual Cotton</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-8.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Ruffled Solid Long Sleeve</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
            <div class="showcase__item">
              <a href="details.html" class="showcase__img-box">
                <img
                  src="./assets/img/showcase-img-9.jpg"
                  alt=""
                  class="showcase__img"
                />
              </a>
              <div class="showcase__content">
                <a href="details.html">
                  <h4 class="showcase__title">Multi-Color Print V-neck</h4>
                </a>
                <div class="showcase__price flex">
                  <span class="new__price">$238.85</span>
                  <span class="old__price">$245.8</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!--=============== NEWSLETTER ===============-->
      <section class="newsletter section home__newsletter">
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
          <a href="index.php" class="footer__logo">
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


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



  </body>
</html>