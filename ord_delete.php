<?php

include "conn.php";
$oid = $_GET['oid'];
$cid=$_GET['cid'];
$pid= $_GET['pid'];
echo $pid;




//UPDATE PRODUCT TABLE

$quantity_d = "SELECT * FROM cus_pro WHERE oid=$oid";
 $quantity_r = mysqli_query($conn,$quantity_d);
 while($row= mysqli_fetch_assoc($quantity_r)){
  $quantity  = $row['quantity'];
  echo $quantity;

}

$limit ="UPDATE product SET quantity = quantity+'$quantity' WHERE pid='$pid'";
if(mysqli_query($conn,$limit)){

  echo "successful update product table!";

 }else{
   echo mysqli_error($conn);
 }


 //DELETE FROM CUS_PRO TABLE 
 $q = "DELETE FROM cus_pro WHERE oid=$oid";
 if(mysqli_query($conn,$q)){
 
     echo "successful";
 }else{
 echo mysqli_error($conn);
 }
     

//UPDATE CUSTOMER TABLE 
$total_q ="UPDATE customer SET total = (SELECT SUM(cus_pro.quantity * cus_pro.price) FROM cus_pro WHERE customer.cid = cus_pro.cid)";
if(mysqli_query($conn,$total_q)){

      echo "successful q2!";
  
     }else{
       echo mysqli_error($conn);
     }



    

header("location:add_pro.php?cid='$cid'");



?>