<?php  
 $connect = mysqli_connect("localhost", "root", "", "book_Shopping");  
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM books WHERE Title LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li style="color:white;font-weight:bold;font-size:20px;cursor: pointer;">'.$row["Title"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>book not available</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  