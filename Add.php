<?php
require 'connect.php';

$message = '';

if (isset($_POST['pSub'])) {
    $prCode = $_POST['pCode'];
    $prName = $_POST['pName'];
    $quan = $_POST['quantity'];
    $prPrice = $_POST['pPrice'];
    $category = $_POST['Category'];
    $prdescription = $_POST['description'];

    $target_dir = 'image/';
    $target_file = $target_dir . basename($_FILES['pImage']['name']);
    move_uploaded_file($_FILES['pImage']['tmp_name'], $target_file);

    $sql = "INSERT INTO products(Code,ProName,Quantity,ProPrice,ProCategory,ProDesc,ProImage) VALUES('$prCode','$prName','$quan','$prPrice','$category','$prdescription','$target_file')";

    if (!mysqli_query($conn, $sql)) {
        $message = 'Data cannot be entered into the database';
    } else {
        $message = 'Product entered to the database';
    }
}
?>
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
    <title>Add Items</title>
</head>
<body class = "bg-info" style= "padding-top:5%;">
<!-- ___________________________________________________NAVBAR HERE________________________________________________________ -->

<?php include ('Assets\files\adminback.php'); ?>

<div class = "container">
<div class = "row justify-content-center">
<div class = "col-md-6 bg-light mt-5 rounded" style= "padding-top:3%; padding-bottom:3%;">
<h2 class = "text-center p-2">Add Item Details</h2>
<form action = "" method = "post" enctype = "multipart/form-data">
<div class = "form-group">
<input type = "text" class = "form-control" name = "pCode" placeholder = "Enter the code of the Item" required>
</div>
<div class = "form-group">
<input type = "text" class = "form-control" name = "pName" placeholder = "Enter the name of the Item" required>
</div>
<div class = "form-group">
<input type = "number" class = "form-control" name = "quantity" placeholder = "Enter the quantity of Item" required>
</div>
<div class = "form-group">
<input type = "text" class = "form-control" name = "pPrice" placeholder = "Enter the price of the Item" required>
</div>
<div class = "form-group">
        <select id ="title" name="Category" class = "form-control" value = "" placeholder = "Enter Category Name">
            <option value="Mens Shirts">Men's Shirts</option>
            <option value="Mens T-Shirts">Men's T-Shirts</option>
            <option value="Mens Trousers">Men's Trousers</option>
            <option value="Womens Shirts">Women's Shirts</option>
            <option value="Womens T-Shirts">Women's T-Shirts</option>
            <option value="Womens Trousers">Women's Trousers</option>
            <option value="Kids Shirts">Kid's Shirts</option>
            <option value="Kids T-Shirts">Kid's T-Shirts</option>
            <option value="Kids Trousers">Kid's Trousers</option>
            <option value="Watches">Watches</option>
            <option value="Bags">Bags</option>
            <option value="Sun Glasses">Sun Glasses</option>
        </select>
</div>
<div class = "form-group">
<textarea id="description" name="description" rows="4" cols="50" class = "form-control" placeholder="Enter the description of the Item"></textarea>
</div>
<div class = "form-group">
<div class = "custom-file">
<input type = "file" name = "pImage" class = "custom-file-input" id = "customFile" required>
<label for = "customFile" class = "custom-file-label">Choose Item Image</label>
</div>
</div>
<div class = "form-group">
<input type = "submit" class = "btn btn-info btn-block" name = "pSub">
</div>
<div class = "form-group">
<h3 class = "text-center"><?= $message ?></h3>
</div>
</form>
<div class = "row justify-content-center">
<div class="col md-6 mt-3 bg-light rounded" style = "padding-bottom:3%;">
<a href = "Admin panel.php" style="text-decoration:none;"><input type = "button" class = "btn btn-success btn-block" value = "Proceed To Admin Panel"></a>
</div>
</div>
</div>
</div>
</div>
    
</body>
</html>