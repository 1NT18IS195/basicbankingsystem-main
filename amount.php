
<?php
include 'db.php';

$message="";
$smessage="";
if(isset($_POST['sub']))
{
$rid=$_GET['id'];
$amt=$_POST['amt'];


$sid=$_SESSION['sender'];


$res1=$link->query("select * from user where id=$sid");
$res2=$link->query("select * from user where id=$rid");
$row1=$res1->fetch_row();
$row2=$res2->fetch_row();

   if($amt > $row1['5'])
  {
        $message=nl2br("TRANSACTION FAILED :( \n\r INSUFFICIENT BALANCE. \n\r TRY AGAIN.");
  
   }
    else if(($amt == 0) || ($amt < 0))
    {
        $message=nl2br("TRANSACTION FAILED :( \n\r AMOUNT SHOULD BE GREATER THAN ZERO. \n\r TRY AGAIN.");
   }
   else
    {

       $uamts = $row1['5'] - $amt;
       $link->query("update user set amt=$uamts where id=$sid");

       $uamtr = $row2['5'] + $amt;
       $link->query("update user set amt=$uamtr where id=$rid");
       
       $sna = $row1['2'];
       $rna = $row2['2'];
       $sac = $row1['1'];
       $rac = $row2['1'];
       $linknew=new mysqli("localhost","root","","tsf") or die("DATA NOT FOUND");
       $linknew->query("insert into transection values($sid,'$sac','$sna',$rid,'$rac','$rna',$amt)");
      
       if($linknew)
       {
        
        $message=nl2br("&#8377; $amt SUCCESSFULLY TRANSFERED :) \r\n FROM $row1[2] TO $row2[2] \r\n click 'USER'S DETAILS' to get all transaction history");
        $amt =0;
       }
      
   
   
    }
}
// else
// {


?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1"> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
  </script>
    <style>
      *
      {
        margin:0;
        padding:0;
      }
    .msg
 {
  text-align:center;
  
  font:20px Arial,sans-serif;
  font-weight:800;
  outline: 1px solid black;
  width:650px;
  
  color: black;
  
 }
 
  </style>
  </head>
  <body style="background-color:#87CEFA">
  <?php
  $rid=$_GET['id'];
  $sid=$_SESSION['sender'];
  
  ?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg mb-3">

  
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <img src="https://www.google.com/search?q=bank+symbol&rlz=1C1SQJL_enIN928IN928&sxsrf=ALeKk01V0_EqSXDK8UAr6cfDEDln0H_TPA:1623411360863&tbm=isch&source=iu&ictx=1&fir=g4Ahchy7PQSCTM%252CcQ5j5TEW1Pf2CM%252C_&vet=1&usg=AI4_-kSQwOomk6GYcqQ08A1gX08CkctoVg&sa=X&ved=2ahUKEwig4PPLvo_xAhVBfH0KHQ_OBIEQ9QF6BAgREAE#imgrc=g4Ahchy7PQSCTM" width="80" alt="" class="d-inline-block align-left mr-2">
      <!-- Logo Text -->
      <span class="text-uppercase font-weight-bold">THE ANISH BANK</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    
     <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto">
      
        <li class="nav-item"><a href="index.php"> <button type="button" class="btn btn-warning m-2">HOME</button></a></li>
        &nbsp
        &nbsp
        <li class="nav-item"><a href="receiver.php?id= <?php echo $rid ;?>"><button type="button" class="btn btn-warning m-2">BACK</button></a></li>
        &nbsp
        &nbsp
        <li class="nav-item"><a href="user.php?id= <?php echo $rid ;?>"><button type="button" class="btn btn-warning m-2">USER'S DETAILS</button></a></li>

      </ul>
    </div>


</nav>

  <div class='container'>
  
  <?php
  $link1=new mysqli("localhost","root","","tsf") or die("DATA NOT FOUND");
    
   $rid=$_GET['id'];
  $res1=$link1->query("select * from user where id=$sid");
  $row1=$res1->fetch_row();
  ?>

  <div class='row  align-items-center justify-content-center'>
  
  <div class='col-md-5'>
  
  <h2><b>SENDER'S DETAILS</b></h2>
  
  <div class="card border-dark" style="width: 25rem ;background-color:#87CEFA">
    <div class="card-body">
    <h3 class="card-title"><b><?php echo $row1[2] ?></b></h3>
    <p class="card-text"><h5><b>USER ID:</b> &nbsp<?php echo $row1[0] ?></h5></p>
    <p class="card-text"><h5><b>ACCOUNT NUMBER: </b>&nbsp<?php echo $row1[1] ?></h5></p>
    <p class="card-text"><h5><b>CONTACT NUMBER: </b>&nbsp<?php echo $row1[3] ?></h5></p>
    <p class="card-text"><h5><b>EMAIL: </b>&nbsp<?php echo $row1[4] ?></h5></p>
    <p class="card-text"><h5><b>BALANCE: </b>&nbsp<?php echo $row1[5] ?></h5></p>
    </div>
  </div>

</div>
  <?php
  
  $link1->close();
  
  $link2=new mysqli("localhost","root","","tsf") or die("DATA NOT FOUND");
  $res2=$link2->query("select * from user where id=$rid");
  $row2=$res2->fetch_row();
  ?>
  <div class='col-md-4'>
  <h2><b>RECEIVER'S DETAILS</b></h2>
  
  
  <div class="card border-dark" style="width: 25rem ;background-color:#87CEFA">
    <div class="card-body">
    <h3 class="card-title"><b><?php echo $row2[2] ?></b></h3>
    <p class="card-text"><h5><b>USER ID:</b> &nbsp<?php echo $row2[0] ?></h5></p>
    <p class="card-text"><h5><b>ACCOUNT NUMBER: </b>&nbsp<?php echo $row2[1] ?></h5></p>
    <p class="card-text"><h5><b>CONTACT NUMBER: </b>&nbsp<?php echo $row2[3] ?></h5></p>
    <p class="card-text"><h5><b>EMAIL: </b>&nbsp<?php echo $row2[4] ?></h5></p>
    <p class="card-text"><h5><b>BALANCE: </b>&nbsp<?php echo $row2[5] ?></h5></p>
    </div>
  </div>
  
  
</div>
</div>
</div>

  <?php

  $link2->close();
  ?>

        <div class="container">
        
        <form  name="amount" class="form-group" action="" method="POST">
        <div class="row align-items-center justify-content-center mt-3">
        <h2><b>ENTER AMOUNT</b></h2>
        </div>
        <div class="row align-items-center justify-content-center">
        <input type="number" id="amt" name="amt" min="0" required/>  <br/><br/> 
        </div>   
        
        <div class="row align-items-center justify-content-center">  
            <div class="btn-toolbar">
            <button class="btn btn-warning btn-lg m-2" name="sub" type="submit"; >Proceed</button>
            <button class="btn btn-warning btn-lg m-2" name="reset" type="reset" ;>Reset</button>
            </div>
        </div>    
            </form>
            </div>
            
            
            
<div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
 
</div>
<div class="container">
<div class="row align-items-center justify-content-center mb-5">
<div class="msg mb-5" style="font-family: 'Times New Roman,serif; background-color:#f0ad4e"><?php echo $message;?></div>
&nbsp
&nbsp
&nbsp
</br>



</div>
</div>
<?php
include 'footer.php';

?>
</body>
</html>