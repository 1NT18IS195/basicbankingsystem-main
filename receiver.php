<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
<style>
      *
      {
        margin:0;
        padding:0;
      }
      
      td
      {
        font-weight: bold;
      }
      @media screen and (max-width :1000px)
      {
        th,td
        {
          width:100vW;
          font-size:16px;
          padding: 0 !important;
           margin: 0 !important;

        }
        

      }
      @media screen and (max-width :900px)
      {
        th,td
        {
          width:100vW;
          font-size:14px;
          padding: 0 !important;
           margin: 0 !important;
        }
       

      }
      @media screen and (max-width :800px)
      {
        th,td
        {
          width:100vW;
          font-size:11px;
          padding: 0 !important;
           margin: 0 !important;
        }
        
      }
    
    </style>
    <?php
$sid=$_GET['id'];
session_start();
$_SESSION['sender']=$sid;
?>

</head>
<body style="background-color:#FFFFFF">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg mb-3">

  
    <a href="#" class="navbar-brand">
      <!-- Logo Image -->
      <img src="https://image.shutterstock.com/image-vector/bank-icon-vector-isolated-260nw-668137015.jpg" width="80" alt="" class="d-inline-block align-left mr-2">
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
        <li class="nav-item"><a href="sender.php"> <button type="button" class="btn btn-warning m-2">BACK</button></a></li>
        
      </ul>
    </div>


</nav>
<?php

$link=new mysqli("localhost","root","","Basic-Banking-System-main") or die("DATA NOT FOUND");
$res=$link->query("select * from user where id!=$sid");
?>
<div class="container text-center">
<h2><b>SELECT RECEIVER</b></h2>
<div class="table-responsive mb-5">
<table class='table table-hover table-bordered text-center'>
<thead class="thead-dark">
<tr>
    <th scope="col">USER ID</th>
    <th scope="col">ACCOUNT NUMBER</th>
    <th scope="col">NAME</th>
   
    <th scope="col">BALANCE</th>
    <th scope="col">SELECT SENDER</th>
  </tr>
</thead>
<tbody>

<?php

while($row=$res->fetch_row())
{   
?>

<tr>
<td><?php echo $row[0] ?></td>
<td><?php echo $row[1] ?></td>
<td><?php echo $row[2] ?></td>
<td><?php echo $row[5] ?></td>

<td><a href="amount.php?id='<?php  echo $row[0];?>'"> <button type="submit" name="sub" class="btn btn-warning btn-block">SELECT</button></a>
</tr>   
<?php
}

?>

</tbody>  
</table>
</div>
</div>
</div>
<div>
<?php

?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
</div>

<?php
$link->close();
include 'footer.php';
?>
</body>
</html>