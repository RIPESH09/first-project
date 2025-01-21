<?php
// Start the session before any output


// Include necessary files
include('../includes/conncet.php'); // Corrected spelling
include('../functions/common_functions.php');
session_start();
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
    <link rel="stylesheet" href="../assets/css/styles.css" />

    <title>user profile</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
          crossorigin="anonymous">

          <!-- css -->


          <style>
          .edit_image{
         width: 150px;
         height: 150px;
         object-fit: contain;





          }
             

          </style>
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
        <a href="../index.php" class="nav__logo">
          <img class="nav__logo-img" src="../assets/img/logo.png" alt="website logo" />
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
                <img src="../assets/img/icon-cart.svg" alt="Cart" />
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
                        <a class='nav__link' href='users_area/user_login.php'>Login</a>
                      </li>";
            } else {
                echo "<li class='nav__item'>
                        <a class='nav__link' href='Logout.php'>Logout</a>
                      </li>";
            }
            ?>
          </ul>
        </div>
      

 
      

      

<!--=============== MAIN ===============-->
<main class="main">
  <!--=============== BREADCRUMB ===============-->
  <section class="breadcrumb">
    <ul class="breadcrumb__list flex container">
      <li><a href="index.html" class="breadcrumb__link">Home</a></li>
      <li><span class="breadcrumb__link">></span></li>
      <li><span class="breadcrumb__link">Account</span></li>
    </ul>
  </section>

  <!--=============== MAIN CONTENT AREA ===============-->
  <div class="row">
    <!-- Left Sidebar -->
    <div class="col-md-2 p-0">
      <ul class="navbar-nav bg-green text-center" style="height:40vh" >
        <li class="nav__item">
          <a href="#" class="nav__link"><h4>Your profile</h4></a>
        </li>
        <?php
    $username = $_SESSION['username'];
    $user_image = "SELECT * FROM `user_table` WHERE username = '$username'";
    $result_image = mysqli_query($conn, $user_image);
    $row_image = mysqli_fetch_array($result_image);
    $user_image = $row_image['user_image'];

    echo "<li class='nav__item'>
            <img src='./user_images/$user_image' alt=''>
          </li>";
?>


        
        <li class="nav__item">
          <a href="profile.php" class="nav__link">PendingOrders</a>
        </li>
        <li class="nav__item">
          <a href="profile.php?edit_account" class="nav__link">Edit account</a>
        </li>
        <li class="nav__item">
          <a href="profile.php?my_orders" class="nav__link">My Orders</a>
        </li>
        <li class="nav__item">
          <a href="profile.php?delete_account" class="nav__link">DeleteAccount</a>
        </li>
        <li class="nav__item">
          <a href="logout.php" class="nav__link">Logout</a>
        </li>

        
        <!-- Add more navigation items here if needed -->
        <!-- <li class="nav__item">
          <a href="#" class="nav__link"><h4>Settings</h4></a>
        </li> -->
      </ul>
    </div>

    <!-- Right Content Area -->
    <div class="col-md-10 text-center">
     
        <?php    get_user_order_details();
        
         if(isset($_GET['edit_account'])){
            include('edit_account.php');
         }
         if(isset($_GET['my_orders'])){
          include('user_orders.php');
         }
         if(isset($_GET['delete_account'])){
          include('delete_account.php');
       }
      
        
        
        
        ?>
      </div>
    </div>
  </div>
</main>


      




    <!--=============== FOOTER ===============-->
    <footer class="footer container">
      <div class="footer__container grid">
        <div class="footer__content">
          <a href="index.php" class="footer__logo">
            <img src="../assets/img/logo.svg" alt="" class="footer__logo-img" />
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
                  src="../assets/img/icon-facebook.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="../assets/img/icon-twitter.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="../assets/img/icon-instagram.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="../assets/img/icon-pinterest.svg"
                  alt=""
                  class="footer__social-icon"
                />
              </a>
              <a href="#">
                <img
                  src="../assets/img/icon-youtube.svg"
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
    <script src="../assets/js/main.js"></script>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



  </body>
</html>
