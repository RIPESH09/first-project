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

    <style>
      .cart_img {
        width: 110px;
        height: 110px;
      }

      .quantity-box {
        width: 60px;
        padding: 8px;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: #fff;
        box-sizing: border-box;
      }

      .quantity-box:focus {
        border-color: #17a2b8;
        outline: none;
        box-shadow: 0 0 5px rgba(23, 162, 184, 0.5);
      }

      .button-group {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .btn {
        padding: 8px 15px;
        border: none;
        background-color: #088179;
        color: white;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .btn i {
        margin-right: 5px;
      }

      .btn:hover {
        background-color: #065e51;
      }

      .flex {
        display: flex;
        align-items: center;
      }
    </style>

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
      <section class="cart section--lg container">
        <div class="table__container">
          <table class="table">
            <form action="" method="post">
              <?php
                $get_ip_add = getIPAddress();
                $total = 0;
                $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                $result = mysqli_query($conn, $cart_query);
                
                $result_count = mysqli_num_rows($result);
                if ($result_count > 0) {
                  echo '<thead>
                          <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Per Piece</th>
                            <th>Remove</th>
                            <th>Operations</th>
                          </tr>
                        </thead>
                        <tbody>';

                  while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
                    $result_products = mysqli_query($conn, $select_products);

                    while ($row_product = mysqli_fetch_array($result_products)) {
                      $product_price = $row_product['product_price'];
                      $product_image1 = $row_product['product_image1'];
                      $product_title = $row_product['product_title'];
                      $total += $product_price;
                      echo "<tr>
                              <td>$product_title</td>
                              <td><img src='admin_area/product_images/$product_image1' class='cart_img' /></td>
                              <td><input type='text' name='qty' value='1' class='quantity-box' /></td>
                              <td>\$$product_price/-</td>
                              <td><input type='checkbox' name='removeitem[]' value='$product_id' /></td>
                              <td>
                                <input type='submit' value='Update Cart' class='btn' name='update_cart' />
                                <input type='submit' value='Remove Cart' class='btn' name='remove_cart' />
                              </td>
                            </tr>";
                    }
                  }

                  if (isset($_POST['update_cart'])) {
                    $quantities = $_POST['qty'];
                    $update_cart = "UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                    mysqli_query($conn, $update_cart);
                    $total *= $quantities;
                  }

                  function remove_cart_item() {
                    global $conn;
                    if (isset($_POST['remove_cart'])) {
                      foreach ($_POST['removeitem'] as $remove_id) {
                        $delete_query = "DELETE FROM `cart_details` WHERE product_id='$remove_id'";
                        mysqli_query($conn, $delete_query);
                        echo "<script>window.open('cart.php', '_self');</script>";
                      }
                    }
                  }

                  remove_cart_item();
                } else {
                  echo "<div class='empty-cart'>
                          <p style='font-size: 24px; font-weight: bold; text-align: center; margin-bottom: 20px;'>No items in the cart.</p>
                          <a href='shop.php' style='padding: 5px 10px; font-size: 14px; color: #fff; background-color: #065E51; text-decoration: none; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center;'>Continue Shopping</a>
                        </div>";
              }
              
              
              ?>
            </form>
          </table>
        </div>
        <div class="cart__total">

    <?php



  ?>
            <h3 class="section__title">Cart Totals</h3>
            <table class="cart__total-table">
                <tr>
                  <td><span class="cart__total-title">Total items</span></td>
                  <td><span class="cart__total-price"><?php echo cart_item(); ?> items</span></td>
                </tr>
                
                <tr>
                  <td><span class="cart__total-title">Total price</span></td>
                  <td><span class="cart__total-price">$<?php echo $total; ?></span></td>
                </tr>
            </table>
            <a href="./users_area/checkout.php" class="btn flex btn--md">
              <i class="fi fi-rs-box-alt"></i> Proceed To Checkout
            </a>
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
