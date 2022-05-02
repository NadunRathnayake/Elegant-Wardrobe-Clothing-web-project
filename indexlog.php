<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<!-----------------------------------------------Head INCLUDE here---------------------------------------------------------------------------->
<?php include ('Assets\files\header.php'); ?>

<body>
    <!------------------------------------------------NAVBAR LINK HERE---------------------------------------------------------------------------->
    <?php include ('Assets\files\lognav.php'); ?>
    <?php include ("Assets\Files\BackToTop.php");?>

    <!-------------------preloader----------------------------------------->
    <div class="loader">
        <img src="image\5Clm.gif" alt="preloader">
    </div> 
    <!-- content Start here -->
    <div class="container-fluid" style="padding: 15px 15px;">
        <?php include ('Assets\files\carousel.php');?>
    </div>  


    <div class="container " style="margin-top:-180px; ">
        <div class="card-group">
            <div class="card" id = "card">
                <img class="card-img-top" img src="Assets\images\nordwood-themes-Nv4QHkTVEaI-unsplash.jpg" alt="Card image cap">
                <div class="card-body bg-dark">

                    <p class="card-text" style = "color: white;"> Deck out your wardrobe with us. 
                    We have a fantastic range of products from crisp Polo Shirts, smart Loafers, breezy linen Shirts, travel & work Bags, stylish Jeans & Chinos and much more!</p>
                </div>
            </div>
            <div class="card" id = "card">
                <img class="card-img-top" img src="Assets\images\heather-ford-5gkYsrH_ebY-unsplash.jpg" alt="Card image cap">
                <div class="card-body">

                    <p class="card-text"> Clothing are items worn on the body. Typically, clothing is made of fabrics or textiles,
                         but over time it has included garments made from animal skin and other thin sheets of materials and natural products found in the environment, put together.</p>
                </div>
            </div>
            <div class="card" id = "card"> 
                <img class="card-img-top" img src="Assets\images\jordan-nix-CkCUvwMXAac-unsplash.jpg" alt="Card image cap">
                <div class="card-body bg-dark">

                    <p class="card-text" style = "color: white;"> The days are gone when kids used to wear everything and anything that their parents used to choose for them. Now kids always want to be dressed in fashionable clothes as they want to be a fashionable kid. 
                    They want to be dresses in attires of their own choice and have their own favourites.</p>
                </div>
            </div>
        </div>
        <br />
        <br /> <br /> <br />
        
        <section class="container">
        <h1><a href = "#" id = "a" style = "color: black; text-decoration: none;">About Us</a></h1>
            <div class="row">
                <p class="container col-md-8">
                Sri Lanka’s biggest fashion chain offers a wide range of clothes and accessories for Men, Women and Kids. 
                The retail store houses a range of Homeware and Lifestyle products to compliment a comprehensive family shopping experience for all our customers.
                   <br><br>
                   We’re a friendly lot. So simply subscribe to our Newsletter and we’ll keep you updated on the newest
collections, latest discounts, look-books and more!
<br><br>
                </p>
                <img src="Assets\images\priscilla-du-preez-dlxLGIy-2VU-unsplash.jpg" class="col-md-4" />
            </div>
            <br /> <br />
            <br /> <br />

        </section>
        <br /><br />
        
        <!-- content End here -->

        <!-- ___________________________________________________FOORTER HERE________________________________________________________ -->
        <?php include ('Assets\files\footer.php'); ?>


        <script>
            window.addEventListener("load", function() {
                const loader = document.querySelector(".loader");
                loader.className += " hidden";
            });

            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }
                x[myIndex - 1].style.display = "block";
                setTimeout(carousel, 5000);
            }
        </script>
        <script>
            //Get the button
            let mybutton = document.getElementById("btn-back-to-top");

            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function () {
            scrollFunction();
            };

            function scrollFunction() {
            if (
                document.body.scrollTop > 25 ||
                document.documentElement.scrollTop > 25
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
            }
            // When the user clicks on the button, scroll to the top of the document
            mybutton.addEventListener("click", backToTop);

            function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
            }
        </script>
</body>

</html>