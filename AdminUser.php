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



</section>
</section>
<section id = "users">
    <div class = "main-div">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 ml-auto">
                <h1 class="text-info">Customers</h1>
            </div>
            <div class="col-lg-4">
                <section id="search"><input class="form-control mb-4 container" id="tableSearch" type="text"
                        placeholder="Search Customers....." style="border-color: black;">
                </section>
            </div>
        </div>
    </div>
            <div class = "center-div">
                <div class = "table-responsive">
                <table>
                        <thead>
                            <tr>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>District</th>

                                
                            </tr>
                        </thead>
                        <tbody id = "myTable" >
                        <?php
                            
                        require 'connect.php';
                            $sql = "SELECT * FROM customers";
                            $query = mysqli_query($conn,$sql);
                            $nums = mysqli_num_rows($query);

                            while ($result = mysqli_fetch_array($query)){
                        ?>
                                <tr>
                                    <td><?php echo $result['C_ID'];?></td>
                                    <td><?php echo $result['First_Name'];?></td>
                                    <td><?php echo $result['Mobile'];?></td>
                                    <td><?php echo $result['Email'];?></td>
                                    <td><?php echo $result['Address'];?></td>
                                    <td><?php echo $result['District'];?></td>
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


    <!-- ___________________________________________________FOORTER HERE________________________________________________________ -->
    <?php include ('Assets\files\footer.php'); ?>

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

