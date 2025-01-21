<?php
//including connect file
// include('./includes/conncet.php');
//getting products

function getproducts(){
    global $conn;



    ///condition to check isset  or not


    if(!isset($GET['category'])){
        if(!isset($GET['brand'])){

        


    

    $query = "SELECT * FROM products order by rand() limit 0,9";
        
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
                  <a href='product_details.php?product_id=$product_id' class='action__btn' aria-label='view more'>
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
                <a href='index.php?add_to_cart=$product_id' class='action__btn cart__btn' aria-label='Add To Cart'>
                  <i class='fi fi-rs-shopping-bag-add'></i>
                </a>
              </div>
            </div>";
          }
        } else {
          echo "<p>No products found.</p>";
        }

    }}
}

function get_unique_categories() {
    global $conn;

    // Condition to check if 'category' is set in $_GET
    if (isset($_GET['category'])) {
        $categories_id = intval($_GET['category']); // Sanitize the input

        // Query to fetch products based on category ID
        $query = "SELECT * FROM products WHERE category_id = $categories_id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = htmlspecialchars($row['product_id'], ENT_QUOTES, 'UTF-8');
                $product_title = htmlspecialchars($row['product_title'], ENT_QUOTES, 'UTF-8');
                $product_description = htmlspecialchars($row['product_description'], ENT_QUOTES, 'UTF-8');
                $product_keywords = htmlspecialchars($row['product_keywords'], ENT_QUOTES, 'UTF-8');
                $product_image1 = htmlspecialchars($row['product_image1'], ENT_QUOTES, 'UTF-8'); // Image name or path
                $product_price = htmlspecialchars($row['product_price'], ENT_QUOTES, 'UTF-8');
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
                    
                    <div class='product__price flex'>
                      <span class='new__price'>$$product_price</span>
                    </div>
                 <a href='index.php?add_to_cart=$product_id' class='action__btn cart__btn' aria-label='Add To Cart'>
                      <i class='fi fi-rs-shopping-bag-add'></i>
                    </a>
                  </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
    }
}


    


//displaying brands 

function getbrands(){
    global $conn;

// Fetch brands from the database
$select_brands = "SELECT * FROM `brands`";
$result_brands = mysqli_query($conn, $select_brands);

if ($result_brands && mysqli_num_rows($result_brands) > 0) {
    // Loop through each brand
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = htmlspecialchars($row_data['brand_title'], ENT_QUOTES, 'UTF-8');
        
        // Generate brand ticker item
        echo '<div class="brand__ticker-item">' . $brand_title . '</div>';
    }
} else {
    echo '<p class="no-brands">No brands available at the moment.</p>';
}




}



function getcategories() {
    global $conn;

    $select_categories = "SELECT * FROM `categories`";
    $result_categories = mysqli_query($conn, $select_categories);

    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $categories_id = $row_data['category_id'];
        $category_image = $row_data['category_image']; // Relative path already stored
        $category_title = $row_data['category_title'];

        // Display the category
        echo '<a href="index.php?category=' . $categories_id . '" class="category__item swiper-slide">';
        // echo '  <img src="' . $category_image . '" alt="' . $category_title . '" class="category__img" />';
        echo '  <h3 class="category__title">' . $category_title . '</h3>';
        echo '</a>';
    }
}







function search_product(){
    global $conn;

    // Check if 'search_data' is set in the GET request
    if (isset($_GET['search_data']) && !empty($_GET['search_data'])) {
        $search_data_value = mysqli_real_escape_string($conn, $_GET['search_data']); // Secure input data

        // SQL query to search for products
        $search_query = "SELECT * FROM `products` WHERE `product_keywords` LIKE '%$search_data_value%'";

        // Execute the query
        $result = mysqli_query($conn, $search_query);

        // Check if any products match the search query
        if (mysqli_num_rows($result) > 0) {
            // Loop through the result set and display each product
            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keywords = $row['product_keywords'];
                $product_image1 = $row['product_image1']; // Image name or path from DB
                $product_price = $row['product_price']; // Price
                
                // Assuming the images are located in a publicly accessible folder
                $image_path = 'admin_area/product_images/' . $product_image1; // Correct relative path

                echo "
                <div class='product__item'>
                    <div class='product__banner'>
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
                       
                        <div class='product__price flex'>
                            <span class='new__price'>$$product_price</span>
                        </div>
                         <a href='index.php?add_to_cart=$product_id' class='action__btn cart__btn' aria-label='Add To Cart'>
                            <i class='fi fi-rs-shopping-bag-add'></i>
                        </a>
                    </div>
                </div>";
            }
        } else {
            echo "<p>No products found.</p>";
        }
    } else {
        echo "<p>Please enter a search query.</p>";
    }
}




//view details fintion 
function view_details() {
  global $conn;



    ///condition to check isset  or not

    if(isset($GET['product_id'])){


      
    


    if(!isset($GET['category'])){
        if(!isset($GET['brand'])){


          $product_id=$_GET['product_id'];

        


    

    $query = "SELECT * FROM products order by rand() limit 0,9";
        
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
                  <a href='index.php' class='action__btn' aria-label='Go home'>
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
                <a href='index.php?add_to_cart=$product_id' class='action__btn cart__btn' aria-label='Add To Cart'>
                  <i class='fi fi-rs-shopping-bag-add'></i>
                </a>
              </div>
            </div>";

          }

          }}}
        }
}


// get ip address function

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
$ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 



///////////////////

function cart() {
  if (isset($_GET['add_to_cart'])) {
      global $conn;
      $get_ip_add = getIPAddress(); 
      $get_product_id = $_GET['add_to_cart'];

      // Correct query to check if the product is already in the cart
      $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
      $result_query = mysqli_query($conn, $select_query);

      // Count rows to determine if the product exists
      $num_of_rows = mysqli_num_rows($result_query);

      if ($num_of_rows > 0) {
          echo "<script>alert('This item is already present in your cart.');</script>";
          echo "<script>window.open('index.php', '_self');</script>";
      } else {
          // Insert the product into the cart
          $insert_query = "INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$get_ip_add', 1)";
          $insert_result = mysqli_query($conn, $insert_query);

          if ($insert_result) {
              echo "<script>alert('Item added to cart successfully!');</script>";
              echo "<script>window.open('index.php', '_self');</script>";
          } else {
              echo "<script>alert('Error adding item to cart.');</script>";
          }
      }
  }
}
//////////////////////////////////////////////////////////////////////////////////
function cart_item() {
  global $conn;

  // Ensure database connection is established
  if (!$conn) {
      die("Database connection not established.");
  }

  // Get the user's IP address
  $get_ip_add = getIPAddress();

  // Query to check items in the cart for the user's IP
  $select_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
  $result_query = mysqli_query($conn, $select_query);

  // Handle potential query failure
  if (!$result_query) {
      die("Query failed: " . mysqli_error($conn));
  }

  // Count rows to determine the number of cart items
  $count_cart_items = mysqli_num_rows($result_query);

  // Display the count
  echo $count_cart_items;
}


function total_cart_price() {
  global $conn;

  // Get the user's IP address
  $get_ip_add = getIPAddress();
  $total = 0;

  // Query to get cart details for the user
  $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
  $result = mysqli_query($conn, $cart_query);

  while ($row = mysqli_fetch_array($result)) {
      $product_id = $row['product_id'];

      // Query to get the product details using product_id
      $select_products = "SELECT * FROM `products` WHERE product_id='$product_id'";
      $result_products = mysqli_query($conn, $select_products);

      // Fetch the product price and calculate the total
      while ($row_product_price = mysqli_fetch_array($result_products)) {
          $product_price = $row_product_price['product_price']; // Ensure this column exists
          $total += $product_price; // Add to total
      }
  }

  echo $total;
}

function get_user_order_details() {
  global $conn;

  // Start the session if not already started
  if (session_status() == PHP_SESSION_NONE) {
      session_start();
  }

  // Get the logged-in user's username
  $username = $_SESSION['username'];

  // Sanitize the username to prevent SQL injection
  $username = mysqli_real_escape_string($conn, $username);

  // Fetch user details
  $get_details = "SELECT * FROM `user_table` WHERE username = '$username'";
  $result_query = mysqli_query($conn, $get_details);
  
  // Check for query success
  if (!$result_query) {
    // Log error and show a generic message to the user
    error_log(mysqli_error($conn));
    echo "An error occurred. Please try again later.";
    return;
  }

  // Fetch user ID
  $user_id = null;
  while ($row_query = mysqli_fetch_array($result_query)) {
    $user_id = $row_query['user_id'];
  }

  // Check if user_id was found
  if (!$user_id) {
    echo "User not found.";
    return;
  }

  // Check if 'edit_account', 'my_orders', or 'delete_account' are not set in the query string
  if (!isset($_GET['edit_account']) 
  && !isset($_GET['my_orders']) && !isset($_GET['delete_account'])) {
      
    // Fetch pending orders for the user
    $get_orders = "SELECT * FROM `user_orders` WHERE user_id = '$user_id' AND order_status = 'pending'";
    $result_orders_query = mysqli_query($conn, $get_orders);
    
    // Check for query success
    if (!$result_orders_query) {
      // Log error and show a generic message to the user
      error_log(mysqli_error($conn));
      echo "An error occurred while fetching your orders. Please try again later.";
      return;
    }
    
    // Get the number of pending orders
    $row_count = mysqli_num_rows($result_orders_query);
    
    // Display the number of pending orders and show the 'Order Details' link only if there are pending orders
    if ($row_count > 0) {
      echo "<h3 class='text-center text-success'>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
      // Show the 'Order Details' link only if there are pending orders
      echo "<div class='text-center'>
              <a href='profile.php?my_orders' class='text-dark'>Order Details</a>
            </div>";
    } else {
      echo "<h3 class='text-center text-success'>You have zero pending orders</h3>";
    }
  }

  // Center the 'Explore products' link (this is displayed in either case)
  echo "<div class='text-center'>
          <a href='../index.php' class='text-dark'>Explore more products</a>
        </div>";
}


?>

