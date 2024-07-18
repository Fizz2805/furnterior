<?php
	// Database credentials
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'furnterior';
    $conn = mysqli_connect($host, $username, $password, $dbname);

	$sql = "SELECT * FROM Contact_Details LIMIT 1";
    $result = mysqli_query($conn, $sql);
	$row= mysqli_fetch_assoc($result);
	$email= $row['Email'];
	$phone1= $row['Phone_No_1'];
	$phone2= $row['Phone_No_2'];
    $addr= $row['Address'];
?>
<style>
  .tap-to-top.show{ right: 33px;
    bottom: 90px}
  .contact-info{
    color: #8F807E; 
  } .contact-info:hover{
    color: #e87316 
  }
  .footer-newsletter .social-icons a {
  border-radius: 50%;
  background-color: #333 !important;
  color: #fff;
  display: inline-block;
  padding: 10px;
  margin-right: 10px;
}
  .footer-newsletter .social-icons a svg {
  stroke: #000 !important;
}
</style>
    <!-- service section start -->
    <section class="service-section service-style-2 section-b-space">
        <div class="container">
            <div class="row g-4 g-sm-3">
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#customer"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Customer Servcies</h3>
                            <span class="font-light">Top notch customer service.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#shop"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Special Discount</h3>
                            <span class="font-light">10% Discount above Rs. 99999 </span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#secure-payment"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">Secured Payment</h3>
                            <span class="font-light">We accept all major credit cards.</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="service-wrap">
                        <div class="service-icon">
                            <svg>
                                <use xlink:href="assets/svg/icons.svg#return"></use>
                            </svg>
                        </div>
                        <div class="service-content">
                            <h3 class="mb-2">No Returns</h3>
                            <span class="font-light">No return policy.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->
<footer class="footer-sm-space">
        <div class="main-footer">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer-contact">
                            <div class="brand-logo">
                                <a href="http://localhost/furnterior/" class="footer-logo">
                                    <img src="assets/images/logo.jpeg" class="img-fluid blur-up lazyload" alt="logo">
                                </a>
                            </div>
                            <ul class="contact-lists">
                                <li>
                                  	<span><b>Address:</b><span class="font-light"> <?php echo $addr; ?></span></span>
                                    
                                </li>
                                <li>
                                    <span><b>phone:</b> <span class="font-light"><a class="contact-info" href='tel:<?php echo $phone1?>'> <?php echo $phone1; ?></a></span></span>									
                                </li>
                                <li>
                                    <span><b>Email:</b><span class="font-light" style="text-transform: lowercase;"> <a class="contact-info" href='mailto:<?php echo $email?>'><?php echo $email; ?></a></span></span>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>About us</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="/" class="font-dark">Home</a>
                                    </li>
                                    <li>
                                        <a href="shop" class="font-dark">Shop</a>
                                    </li>
                                    <li>
                                        <a href="about-us" class="font-dark">About Us</a>
                                    </li>
                                    <li>
                                        <a href="our-blog" class="font-dark">Blog</a>
                                    </li>
                                    <li>
                                        <a href="contact-us" class="font-dark">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>All Categories</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="product-category-sofas" class="font-dark">Sofas</a>
                                    </li>
                                    <li>
                                        <a href="product-category-chairs" class="font-dark">Chairs</a>
                                    </li>
                                    <li>
                                        <a href="product-category-tables" class="font-dark">Tables</a>
                                    </li>
                                    <li>
                                        <a href="product-category-beds" class="font-dark">Beds</a>
                                    </li>
                                    <li>
                                        <a href="product-category-ar" class="font-dark">Augmented Reality</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-links">
                            <div class="footer-title">
                                <h3>Get Help</h3>
                            </div>
                            <div class="footer-content">
                                <ul>
                                    <li>
                                        <a href="user-dashboard" class="font-dark">Your Orders</a>
                                    </li>
                                    <li>
                                        <a href="user-dashboard" class="font-dark">Your Account</a>
                                    </li>
                                    <li>
                                        <a href="wishlist" class="font-dark">Your Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="privacy_policy" class="font-dark">Privacy Policy</a>
                                    </li>
                                    <li>
                                        <a href="refund-policy" class="font-dark">Return-Refund Policy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
              <div class="col-xl-3 col-lg-4 col-sm-6 d-none d-sm-block">
                <div class="footer-newsletter">
                    <h3>Let’s stay in touch</h3>
                    <form class="form-newsletter" method="POST" action="subscribe.php" id="newsletter-form">
                        <div class="input-group mb-4">
                          	<input type="hidden" name="redirect" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
                            <input type="email" class="form-control color-4" name="email" placeholder="Your Email Address" required>
                            <button type="submit" style="border: none;"><span class="input-group-text" id="basic-addon4"><i class="fas fa-arrow-right"></i></span></button>
                        </div>
                        <p class="font-dark mb-0">Keep up to date with our latest news and special offers.</p>
                        <?php
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                if ($message == "subscribed") {
                                    echo "<div class='subscribe-message success' id='subscribe-mssg' style='background: #60c081;margin-top: 10px;padding: 10px;'>You have been subscribed to our newsletter.</div>";
                                } else if ($message == "already_subscribed") {
                                    echo "<div class='subscribe-message error' id='subscribe-mssg' style='background: #e22454;margin-top: 10px;padding: 10px;'>You are already subscribed to our newsletter.</div>";
                                } else if ($message == "error") {
                                    echo "<div class='subscribe-message error' id='subscribe-mssg' style='background: #e22454;margin-top: 10px;padding: 10px;'>There was an error subscribing. Please try again later.</div>";
                                }
                            }
                        ?>
                    </form>
                  	<div class="social-icons mt-3">
                    <a href="https://www.facebook.com/anum.as.codemply" target="_blank" data-feather="facebook" style="stroke: #e87316 !important; margin-right: 10px;"></a>
                    <a href="https://www.instagram.com/anum.as.codemply/" target="_blank" data-feather="instagram" style="stroke: #e87316 !important; margin-right: 10px;"></a>
                    <a href="https://www.linkedin.com/in/anum-aamir-9854b81a3/" target="_blank" data-feather="linkedin" style="stroke: #e87316 !important; margin-right: 10px;"></a>
                  </div>
                </div>
			</div>
				
                </div>
            </div>
        </div>
        <div class="sub-footer">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-md-6">
                        <ul>
                            <li class="font-dark">We accept:</li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/1.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/2.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="assets/images/payment-icon/3.jpg" class="img-fluid blur-up lazyload"
                                        alt="payment icon">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-0 font-dark">© 2023, Furnterior by Codemply. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<script>
    // Get the subscribe message element
    const successMessage = document.getElementById('subscribe-mssg');

    // If the element exists, set a timeout to hide it after 5 seconds
    if (successMessage) {
        setTimeout(function() {
            successMessage.style.display = 'none';
        }, 5000);
    }
</script>

<!-- latest jquery-->
<script src="assets/js/jquery-3.5.1.min.js"></script>

<!-- Add To Home js -->
<script src="assets/js/pwa.js"></script>

<!-- Bootstrap js-->
<script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

<!-- feather icon js-->
<script src="assets/js/feather/feather.min.js"></script>

<!-- lazyload js-->
<script src="assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="assets/js/slick/slick.js"></script>
<script src="assets/js/slick/slick-animation.min.js"></script>
<script src="assets/js/slick/custom_slick.js"></script>

<!-- Notify js-->
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- Price Filter js -->
<script src="assets/js/price-filter.js"></script>

<!--Plugin JavaScript file-->
<script src="assets/js/ion.rangeSlider.min.js"></script>

<!-- Filter Hide and show Js -->
<script src="assets/js/filter.js"></script>

<!-- Notify js-->
<script src="assets/js/bootstrap/bootstrap-notify.min.js"></script>

<!-- script js -->
<script src="assets/js/script.js"></script>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script type="text/javascript">
    $(document).on('click', '.quick-view-btn', function() {
     var product_id = $(this).data('product-id');
     $.ajax({
      url: 'ajax.php?action=get_product_details_for_quick_view',
      type: 'POST',
      data: {product_id: product_id},
      dataType: 'json',
      success: function(data) {
       $('#quick-view-name').html(data);
             // $('#quick-view-img').attr('src', 'admin/assets/images/products/' + data.Img_Url);
             // $('#quick-view-price').html('Rs. ' + data.Cost);
             // $('#quick-view-description').html(data.Description);
   },
   error: function(xhr, status, error) {
       console.log(xhr.responseText);
   }
});
 });

</script>


<!-- Add to WishList Start -->
<script>
 $(".product-box a.wishlist").on("click", function () {
     var productId = $(this).data('product-id');
     <?php if(isset($_SESSION['userID'])) { ?>
         $.ajax({
             url: 'ajax.php?action=add_to_wishlist',
             type: 'POST',
             data: {
                 product_id: productId
             },
             success: function(response) {
                var data = JSON.parse(response);
                console.log(data);
                $('#wishlist-count').text(data.count);
                $.notify({
                 icon: "fa fa-check",
                 title: "Success!",
                 message: "Item Successfully added in wishlist",
             }, {
                 element: "body",
                 position: null,
                 type: "info",
                 allow_dismiss: true,
                 newest_on_top: false,
                 showProgressbar: true,
                 placement: {
                     from: "top",
                     align: "right",
                 },
                 offset: 20,
                 spacing: 10,
                 z_index: 1031,
                 delay: 5000,
                 animate: {
                     enter: "animated fadeInDown",
                     exit: "animated fadeOutUp",
                 },
                 icon_type: "class",
                 template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                 '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
                 '<span data-notify="icon"></span> ' +
                 '<span data-notify="title">{1}</span> ' +
                 '<span data-notify="message">{2}</span>' +
                 '<div class="progress" data-notify="progressbar">' +
                 '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                 "</div>" +
                 '<a href="{3}" target="{4}" data-notify="url"></a>' +
                 "</div>",
             });
            },
            error: function(xhr, status, error) {
                   console.log(xhr.responseText); // Log any errors to the console
               }
           });
     <?php } else { ?>
         $.notify({
             icon: "fa fa-exclamation-triangle",
             title: "Warning!",
             message: "Please login to add items to your wishlist.",
         }, {
             element: "body",
             position: null,
             type: "info",
             allow_dismiss: true,
             newest_on_top: false,
             showProgressbar: true,
             placement: {
                 from: "top",
                 align: "right",
             },
             offset: 20,
             spacing: 10,
             z_index: 1031,
             delay: 5000,
             animate: {
                 enter: "animated fadeInDown",
                 exit: "animated fadeOutUp",
             },
             icon_type: "class",
             template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-danger" role="alert">' +
             '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
             '<span data-notify="icon"></span> ' +
             '<span data-notify="title">{1}</span> ' +
             '<span data-notify="message">{2}</span>' +
             '<div class="progress" data-notify="progressbar">' +
             '<div class="progress-bar progress-bar-info progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
             "</div>" +
             '<a href="{3}" target="{4}" data-notify="url"></a>' +
             "</div>",
         });
     <?php } ?>
 });


</script>
<!-- Add to WishList End -->

<!-- Add to Cart Start -->

<script type="text/javascript">
    // Function to update cart details in the dropdown
    function updateCartDetails() {
        console.log("updateCartDetails function called");
      // Get cart items count and total price from session
      var cart = <?php echo isset($_SESSION['cart']) ? json_encode($_SESSION['cart']) : '[]'; ?>;
      var total_items = 0;
      var total_price = 0;
      $.each(cart, function (index, item) {
        total_items += parseInt(item.qty);
        total_price += parseFloat(item.qty * item.cost);
      });

      // Update cart items count and total price in the dropdown
      $('.cart-title h6 .label').text(total_items);
      $('.cart-total span').text('Rs. ' + total_price.toFixed(2));

      // Update cart items details in the dropdown
      var cart_items_html = '';
      $.each(cart, function (index, item) {
        cart_items_html += '<li data-product-id="' + item.id + '"><div class="media"><img src="admin/assets/images/products/' + item.image + '" class="img-fluid blur-up lazyload" alt=""><div class="media-body"><h6>' + item.name + '</h6><div class="qty-with-price"><span>Rs. ' + (item.qty * item.cost).toFixed(2) + '</span><span><input type="number" class="form-control" value="' + item.qty + '"></span></div></div><button type="button" class="btn-close d-block d-md-none" aria-label="Close"><i class="fas fa-times"></i></button></div></li>';

      });
      $(".onhover-div").show();
      $('.custom-scroll').html(cart_items_html);
      $('#total-cost').text('Rs.' +total_price);
    }
    // updateCartDetails(); 
</script>
<script type="text/javascript">

        // Add to cart button click event
    $(".addtocart-btn").on("click", function () {
        var product_id = $(this).data('product-id');
        console.log(product_id);
        $.ajax({
            type: 'POST',
            url: 'ajax.php?action=add_to_cart',
            data: {
                product_id: product_id
            },
            success: function(response) {
                // var data = JSON.parse(response);
                // console.log(response);
               updateCartDetails();
                
            }
        });
    });


</script>
<script type="text/javascript">
    
    // Event handler for updating cart item quantity
    $('.custom-scroll').on('change', '.form-control', function () {
      // var product_id = $(this).closest('li').index();
      var product_id = $(this).closest('li').data('product-id');

      var product_qty = $(this).val();
      $.ajax({
        type: "POST",
        url: "ajax.php?action=update_cart",
        data: {
          product_id: product_id,
          product_qty: product_qty
        },
        dataType: "json",
        success: function (response) {
          // Update cart details in the dropdown
          updateCartDetails();
          
        }
      });
    });

    // Call updateCartDetails() on page load
    updateCartDetails();
</script>
<script type="text/javascript">
  
    $(document).ready(function() {

      // Add event listener to the quantity input field
      $(document).on("input", ".cart-item-quantity", function() {
       
        // Get the product ID and new quantity value
        var product_id = $(this).closest("tr").data("product-id");
        var new_quantity = $(this).val();

        // Make an AJAX request to update the quantity in the session cart
        $.ajax({
          url: "ajax.php?action=update_cart",
          type: "POST",
          data: { product_id: product_id, product_qty: new_quantity },
          success: function(data) {
            // If the update was successful, reload the page to show the updated cart
            location.reload();
            updateCartDetails();
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });

</script>

<script type="text/javascript">
     // Add event listener to the cross button to remove the item from the cart
      $(document).on("click", ".cart-item-remove", function() {

        // Get the product ID of the item to remove
        var product_id = $(this).closest("tr").data("product-id");

        // Make an AJAX request to remove the item from the session cart
        $.ajax({
          url: "ajax.php?action=remove_cart_item",
          type: "POST",
          data: { product_id: product_id },
          success: function(data) {
            // If the removal was successful, reload the page to show the updated cart
            location.reload();
            updateCartDetails();
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });







</script>

<!-- Add to Cart End -->

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64046fdf4247f20fefe41104/1gqola139';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

  
// Find the chat widget iframe based on its attributes
var widgetIframe = document.querySelector('iframe[title="chat widget"]');

// Apply inline styles to the iframe
if (widgetIframe) {
  widgetIframe.style.right = '50px';
  widgetIframe.style.bottom = '50px';
}


</script>
<!--End of Tawk.to Script-->


</body>
</html>
