<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-----------------------------------------------Head INCLUDE here---------------------------------------------------------------------------->
    <?php include ('Assets\files\header.php'); ?>
    <style>
        .sidenav {
  height: 100%;
  background-color: #000;
  overflow-x: hidden;
  padding-top: 20px;
}


.main {
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
}

@media screen and (max-width: 450px) {
  .login-form{
      margin-top: 10%;
  }

  .register-form{
      margin-top: 10%;
  }
}

@media screen and (min-width: 768px){
  .main{
      margin-left: 40%; 
  }

  .sidenav{
      width: 40%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
  }

  .login-form{
      margin-top: 80%;
  }

  .register-form{
      margin-top: 20%;
  }
}


.login-main-text{
  margin-top: 20%;
  padding: 60px;
  color: #fff;
}

.login-main-text h2{
  font-weight: 300;
}

.btn-black{
  background-color: #000 !important;
  color: #fff;
}
    </style>
</head>
<body>
<div class="sidenav bg-dark">
         <div class="login-main-text">
            <h1>Admin<br> Login Page</h1>
            <p>Login from Here to Manage Items.</p>
         </div>
         <div class="login-gif">
            <img src = "image\Admin.gif">
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form bg-light">
               <form action = "AdminConfig.php" method = "POST">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" placeholder="User Name" name = "AUname" style = "border-color: black;" required>
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name = "APwd" style = "border-color: black;" required>
                  </div>
                  <button type="submit" class="btn btn-info">Login</button>
               </form>
            </div>
         </div>
      </div>
</body>
</html>