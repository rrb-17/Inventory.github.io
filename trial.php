<form action="trial.php" method="post">

<select name="standard" >
<option value="2">2</option>
<option value="3">3</option>
</select>
<button type="submit" name="insert">INSERT</button>


</form>
<?php

$conn = "";
if(isset($_POST['insert']))
{
  $standard= $_POST['standard'];
  
  header("location:two.php?standard=$standard");






}

?>