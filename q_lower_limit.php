

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
<body>

<H1 style="text-align:center;">product with lower quantity</H1>   
 <button  class="btn-secondary btn "><a href="index.php" class="text-white text-center">HOME</a></button> <br><br>

<table class="table table-striped table-hover table-border">


<th>PID</th>
<th>QUANTITY _LOWER _LIMIT</th>
<th>LEFT QUANTITY</th>





<?php

include "conn.php";

$q = "SELECT * FROM product WHERE quantity <q_lower_limit";
$r= mysqli_query($conn,$q);
while($row=mysqli_fetch_assoc($r)){


?>
<TR>
<td><?php  echo $row['pid']; ?></td>
<td><?php  echo $row['q_lower_limit']; ?></td>
<td><?php  echo $row['quantity']; ?></td>


</TR>



<?php


}
?>