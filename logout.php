<?php
require 'current.inc.php';
require 'connect.inc.php';
$query="SELECT * FROM new1 ";

 if($query_run = mysql_query($query))
 {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows != 0)
              {  while($row = mysql_fetch_array($query_run))
                  {   $bookid = $row['book_id'] ;$id=$row['id'];$quantity=$row['quantity'];
                      $query="INSERT INTO cart(id, book_id,quantity) VALUES ('$id','$bookid','$quantity')";
                      mysql_query($query);
                  }
              }
}
$query="drop table if exists new1";
             mysql_query($query);
session_destroy();
header('Location:signin.php');
?>