<?php
include "../conn.php";



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <button class="btn-primary btn"><a href="insert.php"class="text-white text-center">ADD CUSTOMER</a></button>
    <button  class="btn-secondary btn "><a href="../index.php" class="text-white text-center">HOME</a></button> 
    <button  class="btn-primary btn"><a href="../product/pro_details.php" class="text-white text-center">PRODUCT DETAILS</a></button>  
    <button  class="btn-primary btn "><a href="../product/pro_insert.php" class="text-white text-center">ADD PRODUCT</button>
    <button  class="btn-primary btn "><a href="../q_lower_limit.php" class="text-white text-center">LOWER QUANTITY ITEM</a></button> 

     <h1 class='text-center'>CUSTOMER DETAILS</h1>
     <table class="table table-striped table-hover table-border">

     <TR>
     <th>ID</th>
     <th><button class="btn-primary btn"><a href="sort_ord.php"class="text-white text-center">SORT NAME</a></button>
</th>
     <th>EMAIL</th>
     <th>PHONE</th>
     <th>GENDER</th>
     <th><button class="btn-primary btn"><a href="sort_ord.php"class="text-white text-center">SORT TOTAL</a></button>
</th>
     <th>UPDATE</th>
     <th>DELETE</th>
     <th>VIEW DETAILS</th>
      </tr>
      <?php


        $q= "SELECT * FROM customer ORDER BY total";
        $result= mysqli_query($conn,$q);
        while($query = mysqli_fetch_array($result))
{   
?>
      <tr>
      <th><?php  echo $query['cid']; ?></th>
     <td><?php  echo $query['name']; ?></td>
     <td><?php  echo $query['email']; ?></td>
     <td><?php  echo $query['phone']; ?></td>
     <td><?php  echo $query['gender']; ?></td>
     <td><?php  echo $query['total']; ?></td>

     <td><button class="btn-danger btn"><a href="cus_delete.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">DELETE</a></button></td>
     <td><button class="btn-primary btn"><a href="cus_update.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">UPDATE</a></button></td>
     <td><button class="btn-primary btn"><a href="../add_pro.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">VIEW</a></button></td>
     
      
      </tr>



<?php
}
?>



</body>

</html>


