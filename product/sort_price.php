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
    <button class="btn-primary btn"><a href="pro_insert.php"class="text-white text-center">ADD PRODUCT</a></button>
    <button class="btn-primary btn"><a href="sort_q_p.php"class="text-white text-center">SORT</a></button>
    <button  class="btn-secondary btn "><a href="../index.php" class="text-white text-center">HOME</a></button> 
    <button  class="btn-primary btn"><a href="../customer/cus_details.php" class="text-white text-center">CUSTOMER DETAILS</a></button> 
    <button  class="btn-primary btn "><a href="pro_details.php" class="text-white text-center">PRODUCT DETAILS</a></button>  <br><br>

     <h1 class='text-center'>PRODUCT DETAILS</h1>
     <table class="table table-striped table-hover table-border">

     <TR>
     <th>ID</th>
     <th><button class="btn-primary btn"><a href="pro_details.php"class="text-white text-center">SORT NAME</a></button>
</th>
     <th><button class="btn-primary btn"><a href="sort_q_p.php"class="text-white text-center">SORT QUANTITY</a></button>
</th>
     <th><button class="btn-primary btn"><a href="sort_price.php"class="text-white text-center">SORT PRICE(Rs.)</a></button>
</th>
     <th>QUANTITY LOWER LIMIT</th>
     <th>UPDATE</th>
     <th>DELETE</th>
     <th>VIEW DETAILS</th>
      </tr>
      <?php


        $q= "SELECT * FROM product order by price asc";
        $result= mysqli_query($conn,$q);
        while($query = mysqli_fetch_array($result))
{   
?>
      <tr>
      <th><?php  echo $query['pid']; ?></th>
     <td><?php  echo $query['pname']; ?></td>
     <td><?php  echo $query['quantity']; ?></td>
     <td><?php  echo "Rs.";echo $query['price']; ?></td>
     
     <td><?php  echo $query['q_lower_limit']; ?></td>

     <td><button class="btn-danger btn"><a href="pro_delete.php?pid=<?php  echo $query['pid']; ?> "class="text-white text-center">DELETE</a></button></td>
     <td><button class="btn-primary btn"><a href="pro_update.php?pid=<?php  echo $query['pid']; ?> "class="text-white text-center">UPDATE</a></button></td>
     <td><button class="btn-primary btn"><a href="pro_view.php?pid=<?php  echo $query['pid']; ?> "class="text-white text-center">VIEW</a></button></td>
     
      
      </tr>



<?php
}
?>



</body>

</html>

