
<?php

include "conn.php";
if(isset($_POST['addpro']))
{

    $cid=$_GET['cid'];
    $pro_name = $_POST['pro_name'];
    $quantity = $_POST['quantity'];
    $doo = $_POST['doo'];


   /* if(mysqli_query($conn,$pr)){

      echo "successful price!";

 }else{
     echo mysqli_error($conn);
 }*/

 $pr = "SELECT * FROM product WHERE pid ='$pro_name'";

    $price_pro= mysqli_query($conn,$pr);
    while($data = mysqli_fetch_assoc($price_pro)){
              $p_pro= $data['price'];
            
    }

     //echo $p_pro;
    //echo $quantity;
    //echo $pro_name;
    //echo $cid;
    


    $q = "INSERT INTO `cus_pro`(`cid`, `pid`, `quantity`,`doo`,`price`) VALUES ($cid,'$pro_name','$quantity','$doo','$p_pro')";
    if(mysqli_query($conn,$q)){

         echo "successful uploaded data  in table!";

    }else{
        echo mysqli_error($conn);
    }

    $total_q ="UPDATE customer SET total = (SELECT SUM(cus_pro.quantity * cus_pro.price) FROM cus_pro WHERE customer.cid = cus_pro.cid)";
    if(mysqli_query($conn,$total_q)){

          echo "successful q2!";
      
         }else{
           echo mysqli_error($conn);
         }
    //$q2 = "SELECT * FROM product WHERE pname='$pro_name'";
  // if(mysqli_query($conn,$q2)){

//        echo "successful q2!";

  // }else{
   //    echo mysqli_error($conn);
   //}
    //  $result2 = mysqli_query($conn,$q2);
     // while($r = mysqli_fetch_assoc($result2)){
          //echo $r['pid'],$r['pname'],$r['price'];
      

    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSERT DATA</title>
</head>
<body>



<h1>INSERT CUSTOMER DATA</h1>

<form  method="post">
     <label for="pro_name">PRODUCT NAME</label><br><br>
   
   <?php //  <input type="text" class="pro_name" id="pro_name" name="pro_name" required><br><br> ?>
   <select name="pro_name" id="pro_name">
     <?php 
       $q2 = "SELECT * FROM product ";
       $result2 = mysqli_query($conn,$q2);
       while($r = mysqli_fetch_assoc($result2)){
     
     
     ?>


          <option value=<?php echo $r['pid']; ?>><?php echo $r['pname']; ?></option>
                
       <?php   } ?>
    </select>

     
     <label for="quantity">Enter quantity</label><br><br>
     <input type="number" id="quantity" name="quantity"  required><br><br>
        
     

      </select> <label for="doo">DATE OF ORDER:</label>
     <input type="date" name="doo" id="doo">




           


     <button type="submit" name="addpro" id="addpro">ADD PRODUCT</button><br><br>
</form>
    
</body>
</html>




<?php

//$query ="UPDATE customer SET total = (SELECT SUM(cus_pro.quantity * cus_pro.price) FROM cus_pro WHERE customer.cid = cus_pro.cid)";

?>