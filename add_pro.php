


<?php
    $cid=$_GET['cid'];

include "conn.php";
ini_set( "display_errors", 0); 
if(isset($_POST['addpro']))
{
    echo "addpro";
    $pro_name = $_POST['pro_name'];
    $quantity = $_POST['quantity'];
    $doo = $_POST['doo'];  
    echo $quantity;
    echo $pro_name;
    echo $cid;

    $pr = "SELECT * FROM product WHERE pid ='$pro_name'";

    $price_pro= mysqli_query($conn,$pr);
    while($data = mysqli_fetch_assoc($price_pro)){
              $p_pro= $data['price'];
            
    }

    $limit_qua = "SELECT * FROM product WHERE pid='$pro_name'";
    $limit_r =  mysqli_query($conn,$limit_qua);
    /*if (mysqli_query($conn,$limit_qua)){
      //echo "successful";
    }else{
      echo mysqli_error($conn);
    }*/

    while($row= mysqli_fetch_assoc($limit_r)){
    $limit  = $row['quantity'];
    $lower_limit = $row['q_lower_limit'];
    echo "limit is ".$limit;
    }       echo "<br>";
          echo $limit."   ".$quantity;
    if($limit<$quantity){
           
      echo "<script>alert('please enter quantity less than $limit ');</script>";

        // header("location:add_pro.php?cid=$cid");
  
  

    }
    
  
    else{

        $q = "INSERT INTO `cus_pro`(`cid`, `pid`, `quantity`,`doo`,`price`) VALUES ($cid,'$pro_name','$quantity','$doo','$p_pro')";
        if(mysqli_query($conn,$q)){
 
         echo "successful uploaded data  in table!\n";

           }else{
        echo mysqli_error($conn);
          }

      $total_q ="UPDATE customer SET total = (SELECT SUM(cus_pro.quantity * cus_pro.price) FROM cus_pro WHERE customer.cid = cus_pro.cid)";
      if(mysqli_query($conn,$total_q)){

          echo "successful q2!";
      
         }else{
           echo mysqli_error($conn);
         }
    

    //}

   

    $limit ="UPDATE product SET quantity = quantity-'$quantity' WHERE pid='$pro_name'";
    if(mysqli_query($conn,$limit)){

      echo "successful limit!";
  
     }else{
       echo mysqli_error($conn);
     }
     

     $price_q = "SELECT * FROM product WHERE pid ='$pro_name'";

     $price= mysqli_query($conn,$price_q);
     while($data = mysqli_fetch_assoc($price)){
               $quantity_afu= $data['quantity'];
               echo $quantity_afu;
             
     }
     if($quantity_afu<$lower_limit){
       echo "quantity is less than lower limit    ";
       $insert = "INSERT INTO lower_limit values ('$pro_name',$lower_limit,$quantity_afu)";
       if(mysqli_query($conn,$insert)){
         echo "    data inserted in q_lower limit";

       }else{
         echo mysqli_error($conn);
       }
     }
}   }

?>
<?php
$q = "SELECT * FROM customer WHERE cid = $cid";
$result = mysqli_query($conn,$q);

while($row = mysqli_fetch_assoc($result))
{
?>
     
   <div  class="container p-3 my-3 bg-dark text-white">
     
    <p><?php  echo "NAME  : ".$row['name'];  ?></p><br>

    <p><?php  echo "EMAIL  : ".$row['email'];  ?></p><br>
    <p><?php  echo "CONTACT NUMBER  : ".$row['phone'];  ?></p><br>

    <p><?php  echo "GENDER : ".$row['gender'];  ?></p><br>

 


    </div>



<?php
}
?>


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


<button  class="btn-secondary btn "><a href="index.php" class="text-white text-center">HOME</a></button> 

<h1 class='text-center'>CUSTOMER DETAILS</h1>
     <table class="table table-striped table-hover table-border">

     <TR>
     <th>OID</th>
     <th>PID</th>
<th>PNAME</th>
<th>QUANTIY</th>
<th>DATE OF ORDER</th>

<th><button class="btn-primary btn"><a href="sort_by_ordp.php?cid=<?php echo $cid; ?>"class="text-white text-center">SORT PRICE</a></button>
</th>
<th>UPDATE</th>
<th>DELETE</th>
   
      </tr>
<?php
//$show = "SELECT c.*,b.total,p.pname FROM cus_pro as c ,customer as b ,product as p WHERE c.cid=$cid and b.cid=$cid and p.pid=$pro_name";
//$show="SELECT cs.* ,p.pname FROM cus_pro as cs, product as p,customer as c WHERE cs.cid=$cid and p.pid=cs.pid ";
$show="SELECT cs.* ,p.pname , (cs.price * cs.quantity)as pro FROM cus_pro as cs, product as p WHERE cs.cid=$cid and p.pid=cs.pid";
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
<form method="post"><button class="btn-primary btn col-sm-4 btn-block" method="post" type="submit" name="plus">   + (add more)  </button><br><br>

<?php if (isset($_POST['plus']))
{
   ?>

<h1>INSERT CUSTOMER DATA</h1>


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
       </select><BR><BR>

    
     <label for="quantity">Enter quantity</label><br><br>
     <input type="number" id="quantity" name="quantity" required><br><br>

      </select> <label for="doo">DATE OF ORDER:</label>
     <input type="date" name="doo" id="doo">
         


     <button type="submit" name="addpro" id="addpro">ADD PRODUCT</button><br><br>
              <?php } ?>    
</form>
</body>

<footer>

<?php

$tt = "SELECT total FROM customer WHERE cid =$cid";

    $price_tt= mysqli_query($conn,$tt);
    while($data = mysqli_fetch_assoc($price_tt)){?>
            
             <TH>TOTAL</TH>
            <tH><?php  echo $data['total']; ?></tH>
    <?php
    }

?>


</footer>

</html>


