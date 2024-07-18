<?php
session_start();
$cust_id= $_SESSION['userID'];
$paymentMessage = '';
if(!empty($_POST['stripeToken'])){
    
	// get token and user details
    $stripeToken  = $_POST['stripeToken'];
    $customerName = $_POST['customerName'];
    $customerEmail = $_POST['emailAddress'];
	$customerPhone = $_POST['phone'];
	$customerAddress = $_POST['customerAddress'];  	
	$customerCountry = $_POST['customerCountry'];
	$customerCity = $_POST['customerCity'];
	if(isset($_POST['customerZipcode'])) $customerZipcode = $_POST['customerZipcode']; else $customerZipcode = '';
	
    $cardNumber = $_POST['cardNumber'];
    $cardCVC = $_POST['cardCVC'];
    $cardExpMonth = $_POST['cardExpMonth'];
    $cardExpYear = $_POST['cardExpYear'];    
    
	//include Stripe PHP library
    require_once('stripe-php/init.php'); 
	
    //set stripe secret key and publishable key
    $stripe = array(
      "secret_key"      => "sk_test_51MyqUfJYjdCLWnHuBfJNT0hV6KkWdsAHi3evqu9a1OorAcqeDENAR3vXrtf9RVwlnLN42xhsMrrs6niHRRozXXPr00Jc1sPBeI",
      "publishable_key" => "pk_test_51MyqUfJYjdCLWnHuYsJSbGCjieYikmXLlYXDYSchWChltEWgBNPbBdS9ebFo2FGXvp1cooDCrewTBLPtbOsfPOuo00ARxYlspp"
    );    
	
    \Stripe\Stripe::setApiKey($stripe['secret_key']);    
    
	//add customer to stripe
    $customer = \Stripe\Customer::create(array(
		'name' => $customerName,
		'description' => 'Customer for Online Payment on Furnterior',
        'email' => $customerEmail,
        'source'  => $stripeToken,
		"address" => ["country" => $customerCountry, "city" => $customerCity, "line1" => $customerAddress, "line2" => "", "postal_code" => $customerZipcode, "state" => ""]
    ));  
	
    // initialize an empty array to store the cart items
    $items = array();

    // loop through the cart session items and add them to the array
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $product_name = $product['name'];
        $product_qty = $product['qty'];
        $product_cost = $product['cost'];
        $product_total = $product_qty * $product_cost;

        // add the item to the items array
        $item = array(
            'name' => $product_name,
            'description' => '',
            'quantity' => $product_qty,
            'price' => $product_cost,
          	'total-price' => $product_total,
            'currency' => "usd"
        );
        array_push($items, $item);
    }

    // create the charge with the cart items
    $payDetails = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $_SESSION['price']['total_order'],
        'currency' => "usd",
        'metadata' => array(
            'order_id' => $cust_id
        )
    ));  
	
    // get payment details
    $paymenyResponse = $payDetails->jsonSerialize();
	
    // check whether the payment is successful
    if($paymenyResponse['amount_refunded'] == 0 && empty($paymenyResponse['failure_code']) && $paymenyResponse['paid'] == 1 && $paymenyResponse['captured'] == 1){
        
		// transaction details 
        $amountPaid = $paymenyResponse['amount'];
        $balanceTransaction = $paymenyResponse['balance_transaction'];
        $paidCurrency = $paymenyResponse['currency'];
        $paymentStatus = $paymenyResponse['status'];
        $paymentDate = date("Y-m-d H:i:s");        
       
      	
	   
      //insert tansaction details into database
		include_once("include/db_connect.php");
       
	   $insertTransactionSQL = "INSERT INTO Customer_Stripe_Transaction(Cust_ID, cust_name, cust_email, card_number, card_cvc, card_exp_month, card_exp_year, paid_amount, txn_id, payment_status, created) 
		VALUES($cust_id,'".$customerName."','".$customerEmail."','".$cardNumber."','".$cardCVC."','".$cardExpMonth."','".$cardExpYear."','".$amountPaid."','".$balanceTransaction."','".$paymentStatus."','".$paymentDate."')";
		
		mysqli_query($conn, $insertTransactionSQL) or die("database error: ". mysqli_error($conn));
       
	   $lastInsertId = mysqli_insert_id($conn);       
      
	   //if order inserted successfully
       if($lastInsertId && $paymentStatus == 'succeeded'){
         	$_SESSION['Transaction_ID']= $lastInsertId; // used for storing in Orders table after order completion
            $paymentMessage = "The payment was successful. Order ID: {$orderNumber}";
       } else{
          $paymentMessage = "failed";
       }
	   
    } else{
        $paymentMessage = "failed";
    }
} else{
    $paymentMessage = "failed";
}
$_SESSION["message"] = $paymentMessage;
if($paymentMessage=="failed") header('location:index');
else header('location: ../order-success');
