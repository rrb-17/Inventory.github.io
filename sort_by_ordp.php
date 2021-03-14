<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERT DATA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>


<h1 class='text-center'><a href="index.php">CUSTOMER DETAILS</a></h1>
     <table class="table table-striped table-hover table-border">

     <TR>
     <th>OID</th>
     <th>PID</th>
<th>PNAME</th>
<th>QUANTIY</th>
<th>DATE OF ORDER</th>
<th>PRICE</button>
</th>
<th>UPDATE</th>
<th>DELETE</th>
   
      </tr>

<?php
 $cid= $_GET['cid'];
 include "conn.php";
//$show = "SELECT c.*,b.total,p.pname FROM cus_pro as c ,customer as b ,product as p WHERE c.cid=$cid and b.cid=$cid and p.pid=$pro_name";
//$show="SELECT cs.* ,p.pname FROM cus_pro as cs, product as p,customer as c WHERE cs.cid=$cid and p.pid=cs.pid ";
$show="SELECT cs.* ,p.pname ,(cs.price * cs.quantity)as pro FROM cus_pro as cs, product as p WHERE cs.cid=$cid and p.pid=cs.pid ORDER BY pro";
$result = mysqli_query($conn,$show);
while($row=mysqli_fetch_array($result)){
  
?>
 <tr>
      <td><?php  echo $row['oid']; ?></td>
      <td><?php  echo $row['pid']; ?></td>
      <td><?php  echo $row['pname']; ?></td>   

     <td><?php  echo $row['quantity']; ?></td>
     <td><?php  echo $row['doo']; ?></td>
     <td><?php  echo $row['pro']; ?></td>
   
     <td><button class="btn-danger btn"><a href="ord_delete.php?oid=<?php  echo $row['oid']; ?>&cid=<?php  echo $row['cid']; ?>&pid=<?php  echo $row['pid']; ?>"class="text-white text-center">DELETE</a></button></td>
     <td><button class="btn-danger btn"><a href="ord_update.php?oid=<?php  echo $row['oid']; ?>&cid=<?php  echo $row['cid']; ?>&pid=<?php  echo $row['pid']; ?>"class="text-white text-center">UPDATE</a></button></td>
 </tr>

<?php } ?>

</body>
</html>