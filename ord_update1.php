<?php
include 'conn.php';

$cid= $_GET['cid'];
$oid = $_GET['oid'];

if(isset($_POST['update'])){
   
  $quantity=$_POST['quantity'];
  $pro_name = $_POST['pro_name'];
  $doo = $_POST['doo'];
  echo "quantity entered ".$quantity;

  
  $limit_qua = "SELECT * FROM product WHERE pid='$pro_name'";
 $limit_r =  mysqli_query($conn,$limit_qua);
/*if (mysqli_query($conn,$limit_qua)){
  //echo "successful";
}else{
  echo mysqli_error($conn);
}*/

  while($row= mysqli_fetch_assoc($limit_r)){
    $limit  = $row['quantity'];
    echo "limit is ".$limit;
  }
  if($limit<$quantity){
    echo "limit exceeded";
  }
 

else {
  echo "available";

  $q="UPDATE cus_pro SET quantity=$quantity, doo='$doo' ,pid='$pro_name' where oid=$oid" ;
  if(mysqli_query($conn,$q)){
         echo "successfull!";
  }else{
      echo mysqli_error($conn);
      }
      $total_q ="UPDATE customer SET total = (SELECT SUM(cus_pro.quantity * cus_pro.price) FROM cus_pro WHERE customer.cid = cus_pro.cid)";
      if(mysqli_query($conn,$total_q)){
  
            echo "successful q2!";
        
           }else{
             echo mysqli_error($conn);
           }
      
           header("location:add_pro.php?cid='$cid'");
           $limit ="UPDATE product SET quantity = quantity-'$quantity' WHERE pid='$pro_name'";
           if(mysqli_query($conn,$limit)){
       
             echo "successful limit!";
         
            }else{
              echo mysqli_error($conn);
            }


          }
       
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE ORDER</title>
</head>
<body>
<form method="post">
<h1>UPDATE ORDER</h1>


<label for="pro_name">PRODUCT NAME</label><br><br>
   
   <?php //  <input type="text" class="pro_name" id="pro_name" name="pro_name" required><br><br> ?>
   <select name="pro_name" id="pro_name">
         <?php 
          $q2 = "SELECT * FROM product ";
           $result2 = mysqli_query($conn,$q2);
           while($r = mysqli_fetch_assoc($result2))
          { 
 
          ?>


    <option value=<?php echo $r['pid']; ?>><?php echo $r['pname']; ?></option>
            
    <?php   } ?>
   </select>

 
 <label for="quantity">Enter quantity</label><br><br>
 <input type="number" id="quantity" name="quantity"  required><br><br>
    
 

  </select> <label for="doo">DATE OF ORDER:</label>
 <input type="date" name="doo" id="doo">
     


 <button type="submit" name="update" id="UPDATE">UPDATE</button><br><br>
      
</form>
</body>
</html>
