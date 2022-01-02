<?php
require_once"dbconfig.php";


$result=select("select * from books where bookid='".$_REQUEST['id']."'");

?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-BOOK HUB</title>
<link href="vendor/bootstrap/css/font.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/search.css" rel="stylesheet">

  </head>

  <body>
<a class="navbar-brand" href="#" style="color:white; font-weight:bold ;font-size:30px">E-BOOK HUB</a>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
		  <?php
		  if(isset($_SESSION['login']))
{
	
	?>
	<li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mycart.php">My Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>
	<?php
	
}
else
{
	?>
	<li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ragister.php">Register</a>
            </li>
			<?php
			
}
?>
            
			 
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
  <p style="color:red;font-weight:bold;font-size:20px;">Complete Detail<p>
</div>
        </div>
		 <div class="col-lg-1 text-center"></div>
       
	   
	   
      </div><?php
	  while($r=mysqli_fetch_array($result))
	  {
		  extract($r);
	  ?>
	  <div class="row">
	  <div class="col-lg-1"></div>
	  <div class="col-lg-10">
<div class="card text-center">
  <div class="card-header" style="font-weight:bold;font-size:20px">
    <?=ucwords($Title)?>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">ISBN-   <?=$isbn?></li>
    <li class="list-group-item">Author-  <?=ucwords($Author)?></li>
    <li class="list-group-item">Publisher-   <?=ucwords($publisher)?></li>
	
    <li class="list-group-item">Price-  <?=$price?>  $</li>
  </ul>
  
  <div class="card-body">
  <img src="admin/images/<?=$image?>" style="height:400px;width:300px;max-width:95%;border:6px double #545565;">
    <h5 class="card-title"><?=ucwords($discription)?></h5>
	<form method="post">
	<?php
	if(isset($_SESSION['login']))
{
?>	    <button name="cart" class="btn btn-primary">Add To Cart</button>
</div>
  <input type="hidden" name="bookid" value=<?=$bookid?>>
  <input type="hidden" name="userid" value=<?=$_SESSION['userid']?>>
  <div class="card-footer text-muted">
 
 <?php
}
else
{
?><a href="ragister.php" class="btn btn-primary">Add To Cart</a>
	   
<?php	
}
?>
       <a href="index.php" class="btn btn-primary">Continue shopping</a>
     
  </div>
  </form>
</div>	  
	  
	  </div></div><?php
	  }
	  ?>
	  <?php
	  
	  if(isset($_REQUEST['cart']))
	  {
		 extract($_REQUEST);
		$query= "INSERT INTO `cart`( `bookid`, `userid`) VALUES ('$bookid','$userid')";
		$n=iud($query);
	 if($n==1)
	{
		echo"<script>alert(' Successfull');
		 </script>";
	}
	else
	{
	echo"<script>alert('Something Wrong');
		 
		 </script>";
	
	}
	}
	  
	  ?>
	  
	  
	

	
	
	
	
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12" style="background-color: #66aaff">
	<i style="color:black;font-size:20px">Developed By GROUP-9 </i>
	</div>  
	</div> 
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  
</html>
