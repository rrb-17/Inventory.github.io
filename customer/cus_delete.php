<?php

include "../conn.php";
$id = $_GET['cid'];

$q = "DELETE FROM customer WHERE  cid= $id ";

mysqli_query($conn,$q);
$q2 = "DELETE FROM cus_pro WHERE cid=$id";
mysqli_query($conn,$q2);
header('location:cus_details.php');

?>