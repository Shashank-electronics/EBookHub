<?php require_once"dbconfig.php";

if(isset($_REQUEST['onsearch']))
{
	extract($_REQUEST);
	$result=select("SELECT * FROM `books` where Title like '%$country%'");
}
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-BOOK HUB</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/search.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/font.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>
<a class="navbar-brand" href="#" style="color:white; font-weight:bold ;font-size:30px">E-BOOK HUB</a>
       
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
	 
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
    
	<h1>Search Results</h1></br></br>

  

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-1 text-center"></div>
        <div class="col-lg-10 text-center">
		
          
        </div>
		 <div class="col-lg-1 text-center"></div>
       
      </div>
	  
	  
	  <div class="row">
	  <?php
	  while($r=mysqli_fetch_array($result))
	  {
		  extract($r);
	  ?>
	  <div class="col-lg-3">
	  
	  <div class="card" style="box-shadow:  2px 0px 6px 0px  red;;">
  <div class="card-header" style="font-weight:bold">
    <?=ucwords($Title)?>
  </div>
  <div class="card-body">

	<?php for($i=1;$i<=$book_rating;$i++) :  ?>

								<i class="fa fa-heart" style="color:red" aria-hidden="true"></i>
								<?php  endfor; ?>
								
    <h5 class="card-title">Author-  <?=ucwords($Author)?></h5>
	
<img src="admin/images/<?=$image?>" style="height:200px;width:150px;max-width:95%;border:6px double #545565;">
 
   <a href="book_detail.php?id=<?=$bookid?>" class="btn btn-primary">View Detail</a>
   
  </div>
</div>
	  
	  
	  </div>
	  <?php
	  }
	  ?>
	   
	   
	   
	 
	  </div></br>
	

	
	
	
	
	<div class="container-fluid">
	<div class="row">
	<div class="col-lg-12" style="background-color: #66aaff">
	<i style="color:black;font-size:20px">Developed By Group 9</i>
	</div>  
	</div> 
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
	<script>  
 $(document).ready(function(){  
      $('#country').keyup(function(){  
           var query = $(this).val();  
           if(query != '')  
           {  
                $.ajax({  
                     url:"searchinput.php",  
                     method:"POST",  
                     data:{query:query},  
                     success:function(data)  
                     {  
                          $('#countryList').fadeIn();  
                          $('#countryList').html(data);  
                          
                     }  
                });  
           }  
      });  
      $(document).on('click', 'li', function(){  
           $('#country').val($(this).text());  
           $('#countryList').fadeOut();  
      }); 

$('.navbar-light .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(150);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(105)
    });	  
 });  
 </script>  
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  
</html>
