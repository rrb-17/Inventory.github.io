<?php

include "../conn.php";

$id=$_GET['cid'];
$q = "SELECT * FROM customer WHERE cid = $id";
$result = mysqli_query($conn,$q);
$q2 = "SELECT cs.* ,p.pname FROM cus_pro as cs, product as p WHERE cs.cid=$id and p.pid=cs.pid";
$result2 = mysqli_query($conn,$q2);

/*else {
    echo mysqli_error($conn);

}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUSTOMER DETAILS</title>
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<button  class="btn-primary btn"><a href="../product/pro_details.php" class="text-white text-center">PRODUCT DETAILS</a></button>  
    <button  class="btn-primary btn "><a href="../product/pro_insert.php" class="text-white text-center">ADD PRODUCT</button>
    <button  class="btn-primary btn "><a href="../q_lower_limit.php" class="text-white text-center">LOWER QUANTITY ITEM</a></button> 

<body>





<?php
$q = "SELECT * FROM customer WHERE cid = $id";
$result = mysqli_query($conn,$q);

while($row = mysqli_fetch_assoc($result))
{
?>
     
   <div  class="container p-3 my-3 bg-dark text-white">

    <p><?php  echo $row['email'];  ?></p><br>
    <p><?php  echo $row['phone'];  ?></p><br>

    <p><?php  echo $row['gender'];  ?></p><br>

    <p><?php  echo $row['name'];  ?></p><br>


    </div>



<?php
}
?>




<table class="table table-striped table-hover table-border">

<TR>
<th>PID</th>
<th>PNAME</th>
<th>QUANTIY</th>
<th>DATE OF ORDER</th>

<th>UPDATE</th>
<th>DELETE</th>

<?php

while($query = mysqli_fetch_assoc($result2))
{
?>
     <tr>
     <td><?php  echo $query['pid']; ?></td>
     <td><?php  echo $query['pname']; ?></td>

     <td><?php  echo $query['quantity']; ?></td>
     <td><?php  echo $query['doo']; ?></td>
     <td><button class="btn-danger btn"><a href="ord_delete.php?oid=<?php  echo $query['oid']; ?>&cid=<?php  echo $query['cid']; ?>&pid=<?php  echo $query['pid']; ?>"class="text-white text-center">DELETE</a></button></td>
     <td><button class="btn-danger btn"><a href="ord_update.php?oid=<?php  echo $query['oid']; ?>&cid=<?php  echo $query['cid']; ?>&pid=<?php  echo $query['pid']; ?>"class="text-white text-center">UPDATE</a></button></td>
  </tr>


<?php
}
?>
 <td><button class="btn-primary btn"><a href="../add_pro.php?cid=<?php  echo $id; ?> "class="text-white text-center">ADD TO CART</a></button></td> 


</body>

</html>