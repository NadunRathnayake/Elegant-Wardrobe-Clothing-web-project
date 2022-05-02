<!DOCTYPE html>
<html lang="en">
<!-----------------------------------------------Head INCLUDE here---------------------------------------------------------------------------->
<?php include 'Assets\files\header.php'; ?>
<style>
    table {
  font-family: verdana;
  border-collapse: collapse;
  width: 100%;
  box-shadow: 0 10px 20px 0 rgba(0, 0, 0, .03);
  margin: auto;
  border-radius: 10px;
  }

  td, th {
  border: 1px solid #ddd;
  padding: 8px;
  }

  tr:nth-child(even){background-color: #f2f2f2;}

  tr:hover {background-color: #ddd;}

  th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: cadetblue;
  color: white;
  font-family: verdana;
  }
  .main-div{
      width: 100%;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
  .center-div{
      width: 90%;
      height: 80vh;
      background: -webkit-linear-gradient(left, #f0f8ff);
      padding: 20px 0 0 0;
      box-shadow: 0 10px 20px 0 rgba(0, 0, 0, .03);
      border-radius: 10px;

  }
  .bg-modal{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    position: absolute;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    display: none;
}
.model-content{
    width: 200px;
    height: 300px;
    background-color: white;
    border-radius: 4px;
}
.close{
    position: absolute;
    top: 0;
    right: 14px;
    font-size: 42px;
    transform: rotate(45deg);
    cursor: pointer;
}
.close1{
    position: absolute;
    top: 0;
    right: 14px;
    font-size: 42px;
    transform: rotate(45deg);
    cursor: pointer;
}
.bg-modal1{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    position: absolute;
    top: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    display: none;
}


</style>
<script defer src = "Assets\js\Modal.js"></script>

<body>

<!-- ___________________________________________________NAVBAR HERE________________________________________________________ -->

<?php include ('Assets\files\AdminNav.php'); ?>

<!-- ___________________________________________________CONTENT HERTE________________________________________________________ -->

<div class="container-fluid" style="padding: 20px 30px;">
<div class="row">
        <div class="col-lg-3 col-md-8 col-sm-8 col-xm-8 bg-secondary  border border-light" style="padding: 20px 15px;">
            <a href = "AdminUser.php" style = "color: white;"><button type="button" class="btn btn-info px-3 btn-block" style = "text-decoration: none; text-decoration: white; color: white;"><i class="fa fa-info-circle" aria-hidden="true">  User Info</i></a></button><br/><br/>
            <a href = "AdminOrder.php"><button type="button" class="btn btn-info px-3 btn-block"><i class="fa fa-cart-plus" aria-hidden="true">  Orders</i></button></a><br/><br/>
            <a href = "#products"><button type="button" class="btn btn-info px-3 btn-block"><i class="fa fa-shopping-bag" aria-hidden="true">  Products</i></button></a><br/><br/>
           
            <?php
                require 'connect.php';
                $sql = "SELECT * FROM orders";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    printf("<h5> No of Orders available : %d.\n", $stmt->num_rows);
                }
            ?>
            <?php
                require 'connect.php';
                $sql = "SELECT * FROM products";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    printf("<h5> No. of Products : %d.\n", $stmt->num_rows);
                }
            ?>
            <?php
                require 'connect.php';
                $sql = "SELECT * FROM customers";
                if ($stmt = $conn->prepare($sql)) {
                    $stmt->execute();
                    $stmt->store_result();
                    printf("<h5> No. of Registered Users : %d.\n", $stmt->num_rows);
                }
            ?>
        </div>

        <div class="container col-lg-6 col-md-6 col-sm-12 bg-dark rounded" >
        <h2 class="text-light text-center ">Manage Items </h2>
        <a href="#search"><button type="button" class="btn btn-success btn-lg btn-block">Click Here To
                Search</button></a><br /><br /><br /><br />
        <a href="Add.php"><button type="button" class="btn btn-success btn-lg btn-block">Add
                Item</button></a><br /><br />
        <button type="button" class="btn btn-info btn-lg btn-block" id="btn">Update Item</button><br><br>
        <button type="button" class="btn btn-danger btn-lg btn-block" id = "del">Delete Item</button><br><br>
    </div>
            </div>

</section>

</section>
<section id = "products">
    <div class = "main-div ">
    <section id = "search"> <input class="form-control mb-4 container" id="tableSearch" type="text" placeholder="Search Products....." style = "border-color: black;"></section>
            <h1 style = "color: black;" >Products Available</h1>
            <div class = "center-div">
                <div classs = "table-responsive">
                    <table class = "col-sm-12 col-xm-12">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Quantity</th>
                                <th>Product Category</th>
                                <th>Product Description</th>


                            </tr>
                        </thead>
                        <tbody id = "myTable">
                        <?php
                            
                        require 'connect.php';
                            $sql = "SELECT * FROM products";
                            $query = mysqli_query($conn,$sql);
                            $nums = mysqli_num_rows($query);

                            while ($result = mysqli_fetch_array($query)){
                        ?>
                                <tr>
                                    <td><?php echo $result['Code'];?></td>
                                    <td><?php echo $result['ProName'];?></td>
                                    <td><?php echo $result['ProPrice'];?></td>
                                    <td><?php echo $result['Quantity'];?></td>
                                    <td><?php echo $result['ProCategory'];?></td>
                                    <td><?php echo $result['ProDesc'];?></td>
                                </tr>
                            <?php
                            }
                            ?>
                                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
                        </section>
</section>
<?php
require 'connect.php';
if(isset($_POST['Updt1'])){
    $Pcode = $_POST['code'];
    $Price = $_POST['NPrice'];

    $query = "UPDATE products SET ProPrice='$Price' WHERE Code='$Pcode'";

    $result = mysqli_query($conn,$query);

    if(!$result){
        echo '<script type = "text/javascript"> alert("Could not be updated.......")</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("Data Has Been Updated.......")</script>';
    }
}

?>
<!-- Modal Section -->
<div class="bg-modal">
  <div class="modal-content" style = "width: 700px; height: 700px; padding-left: 3%; padding-right: 3%; padding-top:2%; border-color: black;">
  <div class = "close">
    +
  </div>

<form method = "POST" action = "">
    <h4 style = "padding-top: 1%;"><center>Update the Price</center></h1>
    <div class = "form-group">
      <input type = "text" name = "code" class = "form-control" placeholder = "Enter the item code" required>
    </div>
    <div class = "form-group">
      <input type = "text" name = "NPrice" class = "form-control" placeholder = "Enter the new price" >
    </div>
    <input type = "submit" name = "Updt1" class = "btn btn-primary" value = "Update">
  
</form>


<?php
require 'connect.php';
if(isset($_POST['Updt2'])){
    $Pcode = $_POST['code1'];
    $Name = $_POST['Name'];

    $query = "UPDATE products SET ProName='$Name' WHERE Code='$Pcode'";

    $result = mysqli_query($conn,$query);

    if(!$result){
        echo '<script type = "text/javascript"> alert("Could not be updated.......")</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("Data has been updated.......")</script>';
    }
}

?>
<form method = "POST" action = "">
    <h4 style = "padding-top: 3%;"><center>Update the Name</center></h1>
    <div class = "form-group">
      <input type = "text" name = "code1" class = "form-control" placeholder = "Enter the item code" required>
    </div>
    <div class = "form-group">
      <input type = "text" name = "Name" class = "form-control" placeholder = "Enter the new Name" required>
    </div>
    <input type = "submit" name = "Updt2" class = "btn btn-primary" value = "Update">
</form>
<?php
require 'connect.php';
if(isset($_POST['Updt3'])){
    $Pcode = $_POST['code2'];
    $Quant = $_POST['Desc'];

    $query = "UPDATE products SET Quantity = Quantity + '$Quant' WHERE Code='$Pcode'";

    $result = mysqli_query($conn,$query);

    if(!$result){
        echo '<script type = "text/javascript"> alert("Could not be updated.......")</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("Data has been updated.......")</script>';
    }
}

?>
<form method = "POST" action = "">
    <h4 style = "padding-top: 3%;"><center>Update the Quantity</center></h1>
    <div class = "form-group">
      <input type = "text" name = "code2" class = "form-control" placeholder = "Enter the item code" required>
    </div>
    <div class = "form-group">
      <input type = "text" name = "Desc" class = "form-control" placeholder = "Enter the new Quantity" required><br/>
    <div class = "form-group">
      <input type = "submit" name = "Updt3" class = "btn btn-primary" value = "Update">
      <input type = "reset" name = "Res" class = "btn btn-danger" value = "Reset">
    </div>
</form>
    </div>
  </div>
</form>
</div><br><br><br><br><br><br><br><br><br>
<?php
require 'connect.php';
if(isset($_POST['ICode'])){
    $PcodeI = $_POST['ICode'];


    $query = "DELETE  FROM products WHERE Code = '$PcodeI'";

    $result = mysqli_query($conn,$query);

    if(!$result){
        echo '<script type = "text/javascript"> alert("Could not be deleted.......")</script>';
    }
    else{
        echo '<script type = "text/javascript"> alert("Data has been deleted.......")</script>';
    }
}

?>
<!-- Modal Section -->
<div class="bg-modal1">
  <div class="modal-content" style = "width: 700px; height: 500px; padding-left: 3%; padding-right: 3%; border-color: red;">
  <div class = "close1">
    +
  </div>
    <br/><br/><br/>
    <h1 class = "text-danger" style = "padding-top: 3%;"><center>Delete Items</center></h1>
    <form method = "POST" action = "">
    <div class = "form-group">
      <input type = "text" class = "form-control" placeholder = "Enter the ID" name ="ICode" required>
    </div>
    <div class = "form-group">
    <input type = "submit" class = "btn btn-danger" value = "Delete"></button>
    </div>
</form>
    </div>
  </div>
</div>

</body>
</html>
<script type = "text/javascript">
    document.getElementById('btn').addEventListener('click',function(){
        document.querySelector('.bg-modal').style.display = 'flex';
    });
    document.querySelector('.close').addEventListener('click',function(){
        document.querySelector('.bg-modal').style.display = 'none';
    });
</script>
<script type = "text/javascript">
    // Filter table

    $(document).ready(function(){
    $("#tableSearch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
<script type = "text/javascript">
    document.getElementById('del').addEventListener('click',function(){
        document.querySelector('.bg-modal1').style.display = 'flex';
    });
    document.querySelector('.close1').addEventListener('click',function(){
        document.querySelector('.bg-modal1').style.display = 'none';
    });
</script>
