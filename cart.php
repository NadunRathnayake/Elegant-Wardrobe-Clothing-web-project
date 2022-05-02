<?php
session_start();
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

    <title>Cart</title>
</head>
<body>
<?php include ('Assets\files\nav.php'); ?>
<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart" style = "padding-left:90%;"></i> <span id="cart-item" class="badge badge-warning">1</span></a></li>
<div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="7">
                  <h4 class="text-center text-dark m-0">Products in your cart!&nbsp;(<i>The grand total must be above Rs.1000/=)</h4>
                </td>
              </tr>
              <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>
                  <a href="result.php?clear=all" onclick="return confirm('Your Cart will be cleared, is it fine??');" style = "color:red;">Clear Cart</a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'connect.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                $delivery_fee = 200;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['ID'] ?></td>
                <input type="hidden" class="PID" value="<?= $row['ID'] ?>">
                <td><?= $row['Pro_Name'] ?></td>
                <input type="hidden" class="PName" value="<?= $row['Pro_Name'] ?>">
                <td><img src="<?= $row['Pro_Image'] ?>" width="80"></td>
                <td>
                  Rs.<?= number_format($row['Pro_Price'],2);?>/=
                </td>
                <input type="hidden" class="Pprice" value="<?= $row['Pro_Price'] ?>">
                <td>
                  <input type="number" class="form-control ItemQuantity" value="<?= $row['Quantity'] ?>" maxlength = "10" style="width:75px;">
                </td>
                <td>Rs.<?= number_format($row['Full_Amount'],2); ?>/=</td>
                <td>
                  <a href="result.php?remove=<?= $row['ID'] ?>" class="text-danger lead" onclick="return confirm('Do you want to remove ?');"style = "text-decoration: red;">Remove</i></a>
                </td>
              </tr>
              <?php $grand_total += $row['Full_Amount'] ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  <a href="Home.php" class="btn btn-success">Continue
                    Shopping</a>
                </td>
                <td colspan="2"><b>Grand Total</b></td>
                <td><b>Rs.<?= number_format($grand_total,2); ?>/=</b></td>
                <td>
                  <a href="checkout.php" class="btn btn-info <?= ($grand_total > 1000) ? '' : 'disabled'; ?>">Checkout</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".ItemQuantity").on('change', function() {
      var $el = $(this).closest('tr');

      var PID = $el.find(".PID").val();
      var Pprice = $el.find(".Pprice").val();
      var ItemQuantity = $el.find(".ItemQuantity").val();
      location.reload(true);
      $.ajax({
        url: 'result.php',
        method: 'post',
        cache: false,
        data: {
          PID: PID,
          Pprice: Pprice,
          ItemQuantity: ItemQuantity

        },
        success: function(response) {
          console.log(response);
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
