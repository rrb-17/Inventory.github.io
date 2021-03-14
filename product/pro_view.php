<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>

<body>
    

<table class="table table-striped table-hover table-border">

<TR>
<th>ID</th>
<th>NAME</th>
<th>EMAIL</th>
<th>PHONE</th>
<th>GENDER</th>
<th>UPDATE</th>
<th>DELETE</th>
<th>VIEW DETAILS</th>


<?php

include '../conn.php';

$pid=$_GET['pid'];
$q= "SELECT distinct cid as a FROM cus_pro WHERE pid='$pid'";
$r = mysqli_query($conn,$q);

    echo "yes";
    while($row= mysqli_fetch_assoc($r)){
        $cid =  $row['a'];
    $q2 = "SELECT * FROM customer where cid=$cid";
    $r2=mysqli_query($conn,$q2);
    while($query = mysqli_fetch_assoc($r2)){   ?>


 <tr>
      <th><?php  echo $query['cid']; ?></th>
     <td><?php  echo $query['name']; ?></td>
     <td><?php  echo $query['email']; ?></td>
     <td><?php  echo $query['phone']; ?></td>
     <td><?php  echo $query['gender']; ?></td>

     <td><button class="btn-danger btn"><a href="cus_delete.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">DELETE</a></button></td>
     <td><button class="btn-primary btn"><a href="cus_update.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">UPDATE</a></button></td>
     <td><button class="btn-primary btn"><a href="../add_pro.php?cid=<?php  echo $query['cid']; ?> "class="text-white text-center">VIEW</a></button></td>
     
      
      </tr>


    
        
        













        <?php 
    }
 
}


?>



    
</body>
</html>