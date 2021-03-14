<?php
 include "conn.php";
 $oid = $_GET['oid'];
 $cid=$_GET['cid'];
 $pid= $_GET['pid'];

 if(isset($_POST['update'])){
   
    $quantity=$_POST['quantity'];
    $pro_name = $_POST['pro_name'];
    $doo = $_POST['doo'];
    echo "quantity entered ".$quantity;
    $limit_qua = "SELECT * FROM product WHERE pid='$pid'";
    $limit_r =  mysqli_query($conn,$limit_qua);
    while($row= mysqli_fetch_assoc($limit_r)){
        $limit  = $row['quantity'];
        echo "limit is ".$limit;
      }
      if($limit<$quantity){
        echo "limit exceeded\r\n";
       // header("location:add_pro.php?cid=$cid");
      }
      else{
        echo "available";
        $q1 = "SELECT * FROM cus_pro WHERE oid=$oid";
        $r1 = mysqli_query($conn,$q1);
      
      while($row1=mysqli_fetch_assoc($r1)){
            $prev_quantity = $row1['quantity'];
            echo "previous quantity \r\n".$prev_quantity;

        }
        $q2="UPDATE cus_pro SET quantity=$quantity, doo='$doo' ,pid='$pro_name' where oid=$oid" ;
        $r2 = mysqli_query($conn,$q2);
        $q3 = "SELECT * FROM cus_pro WHERE oid=$oid";
        $r3 = mysqli_query($conn,$q1);
      
      while($row3=mysqli_fetch_assoc($r3)){
            $updated_quantity = $row3['quantity'];
            echo "updated quantity \r\n".$updated_quantity;

        }   


        $final_quantity = $updated_quantity - $prev_quantity;
        echo $final_quantity;
        /*while($row2=mysqli_fetch_assoc($r2)){
                $updated_quantiy = $row2['quantity'];
                echo $updated_quantity;
    
            }
         */
        $limit ="UPDATE product SET quantity = quantity-'$final_quantity' WHERE pid='$pro_name'";
        if(mysqli_query($conn,$limit)){
    
          echo "successful limit!";
          header("location:add_pro.php?cid='$cid'");
      
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
