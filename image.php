<?php
require 'connect.inc.php' ;
$id = $_GET['id'];
$query = "SELECT data FROM files WHERE book_id=$id";
 if($query_run = mysql_query($query))
           {
                     $row = mysql_fetch_array($query_run);
                      header("Content-type: image/gif");
                      echo  $row['data'];

           }
?>