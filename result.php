<?php
	session_start();
	include 'connect.php';

	// Add products into the cart table
	if (isset($_POST['Prid'])) {
	  $Prid = $_POST['Prid'];
      $PrCode = $_POST['PrCode'];
	  $ProName = $_POST['Proname'];
	  $ProPrice = $_POST['Proprice'];
	  $Proimage = $_POST['Proimage'];
	  $ProQuan = 1;
	  $Fullamnt = $ProPrice * $ProQuan;

	  $stmt = $conn->prepare('SELECT Code FROM cart WHERE Code=?');
	  $stmt->bind_param('s',$PrCode);
	  $stmt->execute();
	  $result = $stmt->get_result();
	  $res = $result->fetch_assoc();
	  $Pcode = $res['Code'] ?? '';

	  if (!$Pcode) {
		$query = $conn->prepare('INSERT INTO cart (Code,Pro_Name,Pro_Price,Pro_Image,Quantity,Full_Amount) VALUES (?,?,?,?,?,?)');
	    $query->bind_param('ssssii',$PrCode,$ProName,$ProPrice,$Proimage,$ProQuan,$Fullamnt);
	    $query->execute();

	

		
	    echo '<div class="alert alert-success alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item added to your cart!</strong>
						</div>';
	  } else {
	    echo '<div class="alert alert-danger alert-dismissible mt-2">
						  <button type="button" class="close" data-dismiss="alert">&times;</button>
						  <strong>Item already added to your cart!</strong>
						</div>';
	  }
	}
	// Get the items in the cart in order to be displayed
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'items_in_cart') {
		$stmt = $conn->prepare('SELECT * FROM cart');
		$stmt->execute();
		$stmt->store_result();
		$rows = $stmt->num_rows;
	  
		echo $rows;
	}
	// Remove single items from cart
	if (isset($_GET['remove'])) {
		$id = $_GET['remove'];
  
		$stmt = $conn->prepare('DELETE FROM cart WHERE ID=?');
		$stmt->bind_param('i',$id);
		$stmt->execute();
  
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'Item removed from the cart!';
		header('location:cart.php');
	  }
	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
		$stmt = $conn->prepare('DELETE  FROM cart');
		$stmt->execute();
		$_SESSION['showAlert'] = 'block';
		$_SESSION['message'] = 'All Item removed from the cart!';
		header('location:cart.php');
	}
	//Updating the quantity in cart table
	if (isset($_POST['ItemQuantity'])) {
		$quantity = $_POST['ItemQuantity'];
		$prid = $_POST['PID'];
		$Prprice = $_POST['Pprice'];
		$Totprice = $quantity * $Prprice;
  
		$stmt = $conn->prepare('UPDATE cart SET Quantity=?, Full_Amount=? WHERE ID=?');
		$stmt->bind_param('iii',$quantity,$Totprice,$prid);
		$stmt->execute();
	  }
	// Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
		$Cusname = $_POST['Cname'];
		$Cusemail = $_POST['Cemail'];
		$Cusphone = $_POST['Cphone'];
		$Products = $_POST['Products'];
		$full_total = $_POST['full_amnt'];
		$Cusaddress = $_POST['Caddress'];
		$Paymode = $_POST['mode'];
  
		$data = '';
  
		$stmt = $conn->prepare('INSERT INTO orders (Name,Email,Mobile,Address,Paymode,Products,Amount)VALUES(?,?,?,?,?,?,?)');
		$stmt->bind_param('sssssss',$Cusname,$Cusemail,$Cusphone,$Cusaddress,$Paymode,$Products,$full_total);
		$stmt->execute();
		$stmt1 = $conn->prepare('DELETE FROM cart');
		$stmt1->execute();
		$data .= '<div class="text-center">
								  <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
								  <h2 class="text-success">Your Order Has Been Placed Successfully</h2>
								  <h5 class="bg-info text-light rounded p-2">Items Purchased : ' . $Products . '</h4>
								  <h5>Your Name : ' . $Cusname . '</h4>
								  <h5>Your E-mail : ' . $Cusemail . '</h4>
								  <h5>Your Phone : ' . $Cusphone . '</h4>
								  <h5>Total Amount Paid : ' . number_format($full_total,2) . '</h4>
								  <h5>Payment Mode : ' . $Paymode . '</h4><br>
								  <a href = "Home.php"><button class = "btn btn-success btn-block">Thank You</button></a>
 							</div>';
		echo $data;
	  }
?>