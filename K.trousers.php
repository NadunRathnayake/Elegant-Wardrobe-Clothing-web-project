!DOCTYPE html>
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

    <title>Index</title>
</head>
<body>
<?php include ('Assets\files\nav.php'); ?>
<a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart" style = "padding-left:90%;"></i> <span id="cart-item" class="badge badge-warning">1</span></a></li><br/>
<div class="container">
   <br />
   <div class="container">
   <br />
   <h2 align="center">Search Products</h2><br />
   <form action = "" method = "GET">
   <div class="form-group">
    <div class="input-group">
     <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search item">
     <button type="submit" class="btn btn-primary">Search</button>
    </div>
   </div>
</form>
   <br />
   <div id="result"></div>
  </div>
<?php
require 'connect.php';
$sql = "SELECT * FROM products WHERE ProCategory='Kids Trousers'";
$result = mysqli_query($conn, $sql);
?>
<?php 


  if(isset($_GET['search']))
  {
      $filtervalues = $_GET['search'];
      $query = "SELECT * FROM products WHERE ProName LIKE '%$filtervalues%' ";
      $query_run = mysqli_query($conn, $query);

      if(mysqli_num_rows($query_run) > 0)
      {
         foreach ($query_run as $row) { ?>

<div class = "col-lg-3 col-md-4 col-sm-6 mt-3 mb-3">
<div class = "card-deck"  style = "border: 1px solid dark; padding: 0.5rem;background-color:white;border-radius:6px;margin-bottom:20px;padding-left:3 %">
<div class = "column p 2" style="padding-left:4%;align-items:center">

    <img src = "<?= $row['ProImage'] ?>" class = "card-img-top" height= "150" >

    <h5 class = "card-title">Product: <?= $row['ProName'] ?></h5>

    <h5 class = "card-title">Description: <?= $row['ProDesc'] ?></h5>

    <h5>Price: Rs.<?= number_format($row['ProPrice']) ?>/=</h5>

    <b class = "text-Primary">Availability: <?= $row['Quantity']?> products</b><br/><br/>

    <form action="" class="form-submit">
        <input type = "hidden" class = 'Prid' value = "<?php echo $row['ProID']; ?>">
        <input type = "hidden" class = 'PrCode' value = "<?php echo $row['Code']; ?>">
        <input type = "hidden" class = 'Proname' value = "<?php echo $row['ProName']; ?>">
        <input type = "hidden" class = 'Proprice' value = "<?php echo $row['ProPrice']; ?>">
        <input type = "hidden" class = 'Proimage' value = "<?php echo $row['ProImage']; ?>">
        <button class="btn btn-info btn-block addCartBtn" ><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
    </form>
         

              
          
          </div>
          </div>
          </div><?php
         }
      
      }
      else
      {?>
        <span>Data Not Found</span>
        <?php
        
            
          
      }
  }
?>
<div class = "container">
    <div id = "alert"></div>
<div class = "row">
<?php while ($row = mysqli_fetch_array($result)) { ?>
<div class = "col-lg-3 col-md-4 col-sm-6 mt-3 mb-3">

<div class = "card-deck"  style = "border: 1px solid dark; padding: 0.5rem;background-color:white;border-radius:6px;margin-bottom:20px;padding-left:3 %">


<div class = "column p 2" style="padding-left:4%;align-items:center">

    <img src = "<?= $row['ProImage'] ?>" class = "card-img-top" height= "150" >

    <h5 class = "card-title">Product: <?= $row['ProName'] ?></h5>

    <h5 class = "card-title">Description: <?= $row['ProDesc'] ?></h5>

    <h5>Price: Rs.<?= number_format($row['ProPrice']) ?>/=</h5>

    <b class = "text-success">Availability: <?= $row['Quantity']?> products</b><br/><br/>

    <form action="" class="form-submit">
        <input type = "hidden" class = 'Prid' value = "<?php echo $row['ProID']; ?>">
        <input type = "hidden" class = 'PrCode' value = "<?php echo $row['Code']; ?>">
        <input type = "hidden" class = 'Proname' value = "<?php echo $row['ProName']; ?>">
        <input type = "hidden" class = 'Proprice' value = "<?php echo $row['ProPrice']; ?>">
        <input type = "hidden" class = 'Proimage' value = "<?php echo $row['ProImage']; ?>">
        <button class="btn btn-info btn-block addCartBtn" ><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to cart</button>
    </form>

</div>
</div>
</div>
<?php } ?>

</div>
<script src = 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addCartBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var Prid = $form.find(".Prid").val();
      var PrCode = $form.find(".PrCode").val();
      var Proname = $form.find(".Proname").val();
      var Proprice = $form.find(".Proprice").val();
      var Proimage = $form.find(".Proimage").val();

      $.ajax({
        url: 'result.php',
        method: 'post',
        data: {
            Prid: Prid, PrCode: PrCode, Proname: Proname, Proprice: Proprice, Proimage: Proimage
        },
        success: function(response) {
          $("#alert").html(response);
          window.scrollTo(0, 0);//Moves to the top when clicked
          load_cart_item_number();
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
        cartItem: "items_in_cart",
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