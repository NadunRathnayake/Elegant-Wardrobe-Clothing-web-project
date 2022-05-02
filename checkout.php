<?php
	require 'connect.php';

	$final_total = 200;
	$allProds = '';
	$products = [];
  $minezqty = 0;

	$sql = "SELECT CONCAT(Pro_Name, '(',Quantity,')') AS ItemQ, Full_Amount FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $final_total += $row['Full_Amount'];
	  $products[] = $row['ItemQ'];
    $minezqty = $products;
	}
	$allProds = implode(', ', $products);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Font awesome cdn-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!------------------------------------------------NAVBAR LINK HERE---------------------------------------------------------------------------->
        <?php include ('Assets\files\header.php'); ?>

    <title>Checkout</title>
</head>
<body>
<?php include ('Assets\files\nav.php'); ?>
<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart" style = "padding-left:90%;"></i> <span id="cart-item" class="badge badge-warning">1</span></a></li>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="text-center text-success p-2">Take your final steps !!!!</h4>
        <div class="jumbotron p-3 mb-2 text-center bg-warning">
          <h6 class="lead"><b>Product(s) : </b><?= $allProds; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Rs.200/=</h6>
          <h5><b>Total Amount Payable : </b>Rs.<?= number_format($final_total,2) ?>/=</h5>
        </div>
        <form action="" method="post" id="OrderPlacement">
          <input type="hidden" name="Products" value="<?= $allProds; ?>">
          <input type="hidden" name="full_amnt" value="<?= $final_total; ?>">
         
          
          <div class="form-group">
            <input type="text" name="Cname" class="form-control" placeholder="Enter Your Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="Cemail" class="form-control" placeholder="Enter Your E-Mail Address" required>
          </div>
          <div class="form-group">
            <input type="tel" name="Cphone" class="form-control" placeholder="Enter Your Contact Details" maxlength = "10" minlength = "10" required>
          </div>
          <div class="form-group">
            <textarea name="Caddress" class="form-control" rows="3" cols="10" placeholder="Enter Your Delivery Address" required></textarea>
          </div>
          <h6 class="text-justify lead">Select Payment Mode</h6>
          <select name="mode" id="" class = "form-control">
            <option value="Cash On Delivery">Cash On Delivery</option>
            <option value="Credit/Debit Card">Credit/Debit Card</option>
          </select><br/>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-info btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Sending Form data to the server
    $("#OrderPlacement").submit(function(b) {
      b.preventDefault();
      $.ajax({
        url: 'result.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response) {
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'result.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>


</body>

</html>
