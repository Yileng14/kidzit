<?php
	session_start();
	include('conn.php');
	$pqty = 1;

	$checkUserCart = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kidit_cart WHERE user_id='".$_SESSION['user_id']."'"));

	if($checkUserCart == 0)
	{
		$addAccToCart = mysqli_query($conn,"INSERT INTO `kidit_cart`(`cart_total_price`, `user_id`) VALUES ('0','".$_SESSION['user_id']."')");
	}

	if(isset($_POST['pid']))
	{
		$pid = $_POST['pid'];
		$user = $_SESSION['user_id'];

		$checkCartId = mysqli_query($conn, "SELECT * FROM kidit_cart WHERE user_id='".$user."'");
		$getCartId = mysqli_fetch_assoc($checkCartId);

		$checkCartItem = mysqli_query($conn,"SELECT product_id, item_quantity FROM kidit_cart_item WHERE product_id='".$pid."' AND cart_id='".$getCartId['cart_id']."'");
		$checkingRow = mysqli_num_rows($checkCartItem);
		$getResult = mysqli_fetch_assoc($checkCartItem);
		
		$checkProduct = mysqli_query($conn,"SELECT * FROM kidit_product_details WHERE product_id = '".$pid."'");
		$getQtyProduct = mysqli_fetch_assoc($checkProduct);

		$checkProductPrice = mysqli_query($conn,"SELECT * FROM kidit_product WHERE product_id = '".$pid."'");
		$getProductPrice = mysqli_fetch_assoc($checkProductPrice);

		if($checkingRow == 0)
		{
			if($getQtyProduct['details_quantity'] < 1)
			{
				echo '<div class="alert alert-danger alert-dismissible mt-2">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Out of Stock</strong>
					  </div>';
			}
			else
			{
				if($getProductPrice['product_sales_price'] > 0)
				{
					$priceOfProduct = $getProductPrice['product_sales_price'];
				}
				else
				{
					$priceOfProduct = $getProductPrice['product_price'];
				}

				$insertCart = mysqli_query($conn,"INSERT INTO `kidit_cart_item`(`item_quantity`, `item_price`, `cart_id`, `product_id`) VALUES ('".$pqty."','".$priceOfProduct."','".$getCartId['cart_id']."','".$pid."')");

				//$query = $conn->prepare("INSERT INTO `cart`(`QTY`, `TOTALPRICE`, `PRODUCTID`, `PATIENTIC`) VALUES (?,?,?,'$patient')");
				//$query->bind_param("iii",$pqty,$pprice,$pid);
				//$query->execute();
				//$stmt ="INSERT INTO cart(QTY,TOTALPRICE,PRODUCTID,PATIENTIC)VALUES('$pqty','$pprice','$pid','$patient')";
				
				$totalPrice = "SELECT SUM(item_price) FROM kidit_cart_item WHERE cart_id='".$getCartId['cart_id']."'";
				$result = $conn->query($totalPrice);
				while($getSum = mysqli_fetch_array($result)){
				    $sum = $getSum['SUM(item_price)'];
				}

				$updatePriceCart = mysqli_query($conn,"UPDATE `kidit_cart` SET `cart_total_price`='".$sum."' WHERE cart_id='".$getCartId['cart_id']."'");


					echo '<div class="alert alert-success alert-dismissible mt-2">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Item added to your cart</strong>
					  </div>';
			}
		}
		else
		{
			$quantity = $getResult['item_quantity'] + 1 ;
			
			if($getQtyProduct['details_quantity'] < $quantity)
			{
				echo '<div class="alert alert-danger alert-dismissible mt-2">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Out of Stock</strong>
					  </div>';
			}
			else
			{
				if($getProductPrice['product_sales_price'] > 0)
				{
					$totalprice = $quantity * $getProductPrice['product_sales_price'];
				}
				else
				{
					$totalprice = $quantity * $getProductPrice['product_price'];
				}

				$checkCartId = mysqli_query($conn,"SELECT * FROM kidit_cart WHERE user_id='".$user."'");
				$getCartId = mysqli_fetch_assoc($checkCartId);
				
				$updateShoppingCart = mysqli_query($conn, "UPDATE `kidit_cart_item` SET `item_quantity`='".$quantity."',`item_price`='".$totalprice."' WHERE cart_id='".$getCartId['cart_id']."' && product_id='".$pid."'");

				$totalPrice = "SELECT SUM(item_price) FROM kidit_cart_item WHERE cart_id='".$getCartId['cart_id']."'";
				$result = $conn->query($totalPrice );
				while($getSum = mysqli_fetch_array($result)){
				    $sum = $getSum['SUM(item_price)'];
				}

				$updatePriceCart = mysqli_query($conn,"UPDATE `kidit_cart` SET `cart_total_price`='".$sum."' WHERE cart_id='".$getCartId['cart_id']."'");

				//$query = $conn->prepare("UPDATE cart SET QTY=?, TOTALPRICE=? WHERE PRODUCTID=? AND PATIENTIC='".$_SESSION['ic']."'");
				//$query->bind_param("iii",$quantity,$totalprice,$pid);
				//$query->execute();

				echo '<div class="alert alert-success alert-dismissible mt-2">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Succesfully add on</strong>
					  </div>';
			}
		}
	}

	if(isset($_GET['cartItem']) == 'cart_item'){
		$queryCart = mysqli_query($conn,"SELECT * FROM kidit_cart WHERE user_id='".$_SESSION['user_id']."'");
		$checkCartId = mysqli_fetch_assoc($queryCart);

		$countNumber = mysqli_query($conn,"SELECT * FROM kidit_cart_item WHERE cart_id = '".$checkCartId['cart_id']."'");
		$rows = mysqli_num_rows($countNumber);
		//$stmt = $conn->prepare("SELECT * FROM cart WHERE PATIENTIC='".$_SESSION['ic']."'");
		//$stmt->execute();
		//$stmt->store_result();
		//$rows = $stmt->num_rows;
		
		echo $rows;	
	}

	if(isset($_POST['promoCode']))
	{

		$code = trim($_POST['promoCode']);
		$total = $_POST['total'];
		$subTotal = 0;
		$checkPromoCode = mysqli_query($conn,"SELECT * FROM kidit_promo_code WHERE code_name = '".$code."'");
		$rowPromoCode = mysqli_num_rows($checkPromoCode);
		$rowPromoCode2 = mysqli_fetch_assoc($checkPromoCode);

		if($rowPromoCode != 0)
		{
			$checkPromoCodeAndAmount = mysqli_query($conn,"SELECT * FROM kidit_promo_code WHERE code_name = '".$code."' AND code_minimum_spending <= '".$total."'");
			$rowPromoCodeAndAmount = mysqli_num_rows($checkPromoCodeAndAmount);

			if($rowPromoCodeAndAmount != 0)
			{
				$rowPromoCodeAndAmount = mysqli_fetch_assoc($checkPromoCodeAndAmount);
				if($rowPromoCodeAndAmount['code_discount_percentage'] != 0)
				{
					$subTotal = $total - ($total * ($rowPromoCodeAndAmount['code_discount_percentage']/100));
				}
				else if ($rowPromoCodeAndAmount['code_discount_amount'] != 0)
				{
					$subTotal = $total - $rowPromoCodeAndAmount['code_discount_amount'];
				}

				 echo $subTotal;
			}
			else
			{
				$checkPromoCodeAndAmount = mysqli_query($conn,"SELECT * FROM kidit_promo_code WHERE code_name = '".$code."'");
				$rowPromoCodeAndAmount = mysqli_fetch_assoc($checkPromoCodeAndAmount);

				echo '<div class="alert alert-success alert-dismissible mt-2">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>Minimum Spend RM '.$rowPromoCodeAndAmount['code_minimum_spending'].' and Above</strong>
					  </div>';
			}
		}
		else
		{
			echo '<div class="alert alert-success alert-dismissible mt-2">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>PromoCode Invalid</strong>
		  </div>';
		}
	}


	/*
	if(isset($_GET['remove'])){
		$id = $_GET['remove'];
		$stmt = $conn->prepare("DELETE FROM cart WHERE CARTID=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:cart.php');
	}
	
	if(isset($_GET['clear'])){
		$stmt = $conn->prepare("DELETE FROM cart WHERE PATIENTIC='".$_SESSION['ic']."'");
		$stmt->execute();
		
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All item removed from the cart!';
		header('location:cart.php');
	}
	
	if(isset($_POST['qty'])){
		$qty = $_POST['qty'];
		$pid = $_POST['pid'];
		$pprice = $_POST['pprice'];
	
		$tprice = $qty * $pprice;
			
		$stmt = $conn->prepare("UPDATE cart SET QTY=?, TOTALPRICE=? WHERE CARTID=? AND PATIENTIC='".$_SESSION['ic']."'");
		$stmt->bind_param("iii",$qty,$tprice,$pid);
		$stmt->execute();
	}
	
	if(isset($_POST['action']) && isset($_POST['action']) =='order'){ 
		$patient = $_SESSION['ic'];
		$products = $_POST['products'];
		$grand_total = $_POST['grand_total'];
		$address = $_POST['address'];
		$pmode = $_POST['pmode'];
		
		$sql = mysqli_query($conn,"select * from PATIENT where PATIENTIC='".$_SESSION['ic']."'");
		$row = mysqli_fetch_assoc($sql);
		$Fname = $row['FNAME'];
		$Lname = $row['LNAME'];
		$Phone = $row['PHONENO'];
		$Email = $row['EMAIL'];
		$Gender= $row['GENDER'];
		$PatientIC= $row['PATIENTIC'];
		
		date_default_timezone_set("Asia/Kuala_Lumpur");
		$currentdate = date('Y-m-d H:i:s');
					
		function generateRandomString($length)
		{
			$include_chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
						
			$charLength = strlen($include_chars);
			$randomString = '';
			for ($i = 0; $i < $length; $i++)
			{
				$randomString .= $include_chars [rand(0, $charLength - 1)];
			}
			return $randomString;
		}
		$length2 = 6; # Set result string length
		$str = generateRandomString($length2);
	
		$data ='';
		
		$stmt ="INSERT INTO payment(PAYMENTID,PRODUCTS,PAYMENTDATE,AMOUNTPAID,PAYMENTMETHOD,ADDRESS,STATUS,PATIENTIC)VALUES('$str','$products','$currentdate','$grand_total','$pmode','$address','Pending','$patient')";
		if ($conn->query($stmt) == TRUE) 
		{
			$stmt2 = $conn->prepare("DELETE FROM cart WHERE PATIENTIC='".$_SESSION['ic']."'");
			$stmt2->execute();
		} 
		else 
		{
			echo "Error: " . $stmt . "<br>" . $conn->error;
		}			
		$data .= '<div class="text-center">
				  <h1 class="display-4 mt-2 text-danger"> Thank You!</h1>
				  <h2 class="text-success">Your Order Placed Successfully!</h2>
				  <h4 class="bg-danger text-light rounded p-2"> Items Purchased: '.$products.'</h4>
				  <h4>Your name :'.$Fname . " " .$Lname.'</h4>
				  <h4>Your Email :'.$Email.'</h4>
				  <h4>Your Phone :'.$Phone.'</h4>
				  <h4>Your Amount Paid :'.number_format($grand_total,2).'</h4>
				  <h4>Payment Mode : '.$pmode.'</h4>
				 </div>';
		echo $data;
	}*/
?>