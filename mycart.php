<?php
require_once"dbconfig.php";
if(isset($_SESSION['login']))
{
	
}
else
{
	header("location:ragister.php");
}

$result=select("SELECT *
FROM cart
INNER JOIN books ON cart.bookid = books.bookid WHERE userid='".$_SESSION['userid']."'");
$result1=select("SELECT sum(price)
FROM cart
INNER JOIN books ON cart.bookid = books.bookid WHERE userid='".$_SESSION['userid']."'");
$result2=select("select * from user where userid='".$_SESSION['userid']."'");

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-BOOK HUB</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/search.css" rel="stylesheet">

  </head>

  <body>
<a class="navbar-brand" href="#" style="color:white; font-weight:bold ;font-size:30px">E-BOOK HUB</a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
	  <?php
	
	while($t=mysqli_fetch_array($result2))
	{
		extract($t);
	?>
        <a class="navbar-brand" href="#">Welcome <span><?=ucwords($name)?></span> </a><?php
	}
		?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home
                
              </a>
            </li>
            
            <li class="nav-item active">
              <a class="nav-link" href="mycart.php">My Cart
			  <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav></br>

    <!-- Page Content -->
    

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-1 text-center"></div>
        <div class="col-lg-10 text-center">
		
          <div class="alert alert-light" role="alert">
  <p style="color:red;font-weight:bold;font-size:20px;">My Cart Details<p>
</div>
        </div>
		 <div class="col-lg-1 text-center"></div>
       
	   
	   
      </div>
	  <div class="row">
	  <div class="col-lg-1"></div>
	  <div class="col-lg-10">
<div class="card text-center">
  
  <table class="table">
  <tr style="font-weight:bold">
<td>
S.No.
</td>
<td>
Book name
</td>
<td>
Price
</td>
<td>
Remove
</td>
  </tr>
  <?php
  $n=1;
  while($p=mysqli_fetch_array($result))
  {extract($p); 
  ?>
  <tr>
  <td><?=$n?>.</td>
  <td><?=ucwords($Title)?></td>
  <td><?=$price?>  $</td>
  <td><a href="myphp.php?dele=yes&id=<?=$cartid?>">
          <span class="btn btn-danger">X</span>
        </a></td>
  <?php
	 $n++;
	 }
  ?>
  </tr>
</table>
  <div class="card-footer text-muted">
  <?php
  while($t=mysqli_fetch_array($result1))
  {extract($t);
  ?>
     <a href="index.php" class="btn btn-danger" style="font-weight:bold">Total Price- <?=$t[0]?>  $</a>
	 
          <a href="payment.php?price=<?=$t[0]?>"><span class="btn btn-success">Buy</span></a>
     	 <?php
  }
	 ?>
  </div>
  <div class="card-footer text-muted">
     <a href="index.php" class="btn btn-primary">Continue shopping</a>
  </div>
</div>	  
	  
	  </div></div>
	  
	  
	  
	

	
	
	
	
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12" style="background-color: #66aaff">
	<i style="color:black;font-size:20px">Developed By Group 9</i>
	</div>  
	</div> 
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  
</html>
