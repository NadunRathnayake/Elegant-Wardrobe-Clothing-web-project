<?php 
session_start();
require_once("connect.php");
if(isset($_POST['submit'])){
	$email = trim($_POST['logmail']);
	$password = trim($_POST['logpass']);
	
	$sql = "select * from customers where Email = '".$email."'";
	$result = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($result);
	
	if($numRows  == 1){
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password,$row['Password'])){
			echo '<script type = "text/javascrip">alert("Login Successful")</script>';
      header('location:indexlog.php');
      $_SESSION['logmail'] = $email;
		}
		else{
      echo '<div class="alert alert-danger alert-dismissible mt-2">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Incorrect Password or email check again!!!!</strong>
    </div>';
      include('Login.php');
		}
	}

	
}
?>