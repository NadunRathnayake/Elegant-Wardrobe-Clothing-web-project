<?php
require 'connect.php';

if(isset($_POST['contact'])){
        $First_Name = $_POST['Fname'];
        $Last_Name = $_POST['Lname'];
        $mob = $_POST['mobile'];
        $Email = $_POST['mail'];
        $Comment = $_POST['comment'];

        $sql = "INSERT INTO contactus(FName, LName, Mobile, Email, Cusmessage) VALUES('$First_Name','$Last_Name','$mob','$Email','$Comment')";
        if (!mysqli_query($conn, $sql)) {
                echo '<script type = "text/javascript"> alert("Fail")</script>';
        } else {
                echo '<script type = "text/javascript"> alert("Thank you for your Feedback, We will contact you soon.")</script>';
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<!-----------------------------------------------Head INCLUDE here---------------------------------------------------------------------------->
<?php include ('Assets\files\header.php'); ?>



<body>

<!-- ___________________________________________________NAVBAR HERE________________________________________________________ -->

<?php include ('Assets\files\nav.php'); ?>



<!-- ___________________________________________________CONTENT HERTE________________________________________________________ -->


<div class="container mt-5">
        <div class="row align-items-center">
                <div class="col-6 ">
                        
                        <form method = "POST" action = "">
                                <div class ="form-group">
                                        <label for="FName"> First Name </label>
                                        <input type = "text" class ="form-control" name="Fname" placeholder= "" required>
                                </div>
                                <div class ="form-group">
                                        <label for="LName"> Last Name </label>
                                        <input type = "text" class ="form-control" name="Lname" placeholder= "" required>
                                </div>
                                <div class ="form-group">
                                        <label for="mob"> Mobile </label>
                                        <input type = "text" class ="form-control" name="mobile" placeholder= "" maxlength = "10" minlength = "10" required>
                                </div>
                                <div class ="form-group">
                                        <label for="Email"> Email </label>
                                        <input type = "email" class ="form-control" name="mail" placeholder= "name@email.com" required>
                                </div>
                                <div class ="form-group">
                                        <label for="message"> Enter Your Message/Feedback </label><br>
                                        <textarea name="comment" rows="5" cols="40" class = "form-control"></textarea>
                                </div>
 
                                <input type = "submit" class="btn btn-info" name= "contact" value = "Send my message"> </button>

                        </form>
                </div>
        

                <div class = "col-sm-5">
                        <h2>Where can you find us</h2>
                        <div class="mapouter"><div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d19890.76677508476!2d79.85652747886763!3d6.913051093506329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2slk!4v1645101802702!5m2!1sen!2slk" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe><a href="https://www.fnfgo.com/">FNF Mods</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:623px;}
                        .gmap_canvas {overflow:hidden;background:none!important;width:100%;height:600px;}.gmap_iframe {height:603px!important;}</style></div>
                </div>
        </div>
</div>

<!-- ___________________________________________________FOORTER HERE________________________________________________________ -->
<?php include ('Assets\files\footer.php'); ?>
</body>
</html>