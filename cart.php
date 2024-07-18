<?php
$page_title = 'Cart';

require_once "header-new.php";
require_once "navbar.php";
require_once "admin/config.php";
?>
<head>
  <style>
       .cont {
  text-align: center;
}

.progress-container {
  display: flex;
  justify-content: space-between;
  position: relative;
  margin-bottom: 60px;
  max-width: 100%;
}

.progress-container::before {
  content: "";
  background-color: #C4C1C1;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 100%;
  z-index: -1;
}

.progress {
  background-color: #e87316 !important;
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  height: 4px;
  width: 0%;
  z-index: -1;
  transition: 0.4s ease;
}

.circle {
  background: #C4C1C1;
  color: #C4C1C1;
  border-radius: 50%;
  height: 10px;
  width: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 3px solid #C4C1C1;
  transition: 0.4s ease;
}

.circle.active {
  border-color: #e87316;
  background-color: #fff;
  color: #e87316;
  scale: 1.1;
}

.circle .icon {
  position: absolute;
  font-size: 25px;
  bottom: 25px;
}
.circle .caption {
  position: absolute;
  font-size: 14px;
  font-weight: bolder;
  bottom: -30px;
}


@media only screen and (max-width: 400px) {
  .cont {
    width: 85%;
  }
}
  </style>
</head>
<!-- Breadcrumb section start -->
<section class="breadcrumb-section section-b-space">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Shopping Cart</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <i class="fas fa-home"></i>/
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Cart</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb section end -->

<!-- Cart Section Start -->
<section class="cart-section section-b-space">
    <div class="container mt-3">
      <div class-="row g-4">
            <div class="col">
              <div class="container cont">
                <div class="progress-container">
                  <div class="progress" id="progress"></div>
                  <div class="circle active">
                    <i data-feather="shopping-cart" class="icon"></i>
                    <div class="caption">Cart</div>
                  </div>
                  <div class="circle">
                    <i data-feather="truck" class="icon"></i>
                    <div class="caption">Shipping</div>
                  </div>
                  <div class="circle">
                    <i data-feather="credit-card" class="icon"></i>
                    <div class="caption">Billing</div>
                  </div>
                  <div class="circle">
                    <i data-feather="check-circle" class="icon"></i>
                    <div class="caption">Confirmation</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
           <!-- <div class="col-12">
                <div class="count-down">
                    <h5>Your cart will be expired in <span class="count-timer theme-color" id="timer"></span>
                    minutes !</h5>
                    <button type="button" onclick="location.href = 'checkout.html';"
                    class="btn btn-solid-default btn-sm fw-bold">Check Out</button>
                </div>
            </div>-->

            <div class="col-sm-12 table-responsive mt-4">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_price = 0;
                        foreach ($_SESSION['cart'] as $product_id => $product) {
                            $product_name = $product['name'];
                            $product_image = $product['image'];
                            $product_qty = $product['qty'];
                            $product_cost = $product['cost'];
                            $product_total = $product_qty * $product_cost;
                            $total_price += $product_total;
                            ?>
                            <tr data-product-id="<?php echo $product_id; ?>" >
                                <td>
                                    <a href="product.php?id= <?php echo $product_id?>">
                                        <img src="admin/assets/images/products/<?php echo $product_image; ?>" class=" blur-up lazyload" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="product.php?id= <?php echo $product_id?>"><?php echo $product_name; ?></a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            <div class="qty-box">
                                                <div class="input-group">
                                                    <input type="number"  name="quantity" class="form-control input-number " value="<?php echo $product_qty; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <h2>Rs. <?php echo $product_cost; ?></h2>
                                        </div>
                                        <div class="col">
                                            <h2 class="td-color">
                                                <a href="javascript:void(0)">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h2>Rs. <?php echo $product_cost; ?></h2>
                                </td>
                                <td>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number cart-item-quantity" value="<?php echo $product_qty; ?>">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="javascript:void(0)">
                                        <i class="fas fa-times cart-item-remove"></i>
                                    </a>
                                </td>
                                <td>
                                    <h2 class="td-color">Rs. <?php echo $product_total; ?></h2>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="5" class="text-right">Subtotal</td>
                            <td class="text-right">Rs. <?php echo $total_price; ?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

<div class="col-12 mt-md-5 mt-4">
  <div class="row">
    <div class="col-md-6">
        <div class="left-side-button">
            <a href="shop" class="btn btn-solid-default btn-fw-bold mb-0 ms-0">
                <i class="fas fa-arrow-left"></i> Continue Shopping
            </a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="cart-checkout-section">
            <div class="cart-box">
                <div class="cart-box-details">
                    <div class="total-details">
                        <div class="top-details">
                            <h3>Cart Totals</h3>
                            <h6>Total MRP (Maximum Retail Price) <span>Rs. <?php echo $total_price; ?></span></h6>
                            <h6>Discount Amount<span><?php if($total_price >= 99999){ echo "- Rs. ".$discount = round($total_price * 0.1, 2); } else{ echo "- Rs. ".$discount= 0; } ?></span></h6>
                            <h6>Final Price <span><?php echo "Rs. ".$sub_total= intval($total_price - $discount); ?></span></h6>
                          <?php  
                          	$_SESSION['price']= ['total'=> $total_price, 'discount'=> $discount, 'final'=> $sub_total, 'shipping'=> 0, 'total_order'=> $sub_total];
                          ?>
                        </div>
                        <div class="bottom-details">
                            <a href="shipping" class="btn btn-solid-default btn-fw-bold">
                                Process Checkout
                                <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          </div>  </div>

            </div>
        </section>
        <!-- Cart Section End -->
		
		<?php include 'footer.php' ?>