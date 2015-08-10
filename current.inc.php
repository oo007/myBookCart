<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']))
{
   $http_referer = $_SERVER['HTTP_REFERER'];
}
function loggedin()
{
  if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
  {  return true;}
  else
  {  return false;}
}


function getuserfield($field)
{
    $query="SELECT $field FROM persons WHERE id='".$_SESSION['user_id']."'";
    if($query_run = mysql_query($query))
    {   
      if($query_result = mysql_result($query_run,0,$field))
      {
        return  $query_result;
      }
    }
}


function getbookinfo($field)
{     $sub= $_SESSION['subject'];
    $query="SELECT $field FROM $sub WHERE book_name='".$_SESSION['bname']."'";
    if($query_run = mysql_query($query))
    { $query_num_rows =  mysql_num_rows($query_run);
      if($query_num_rows != 0)
     {
      if($query_result = mysql_result($query_run,0,$field))
      {
        return  $query_result;
      }
     }
    }
}

function getbookid($field,$db)
{
  $query="SELECT $field FROM $db WHERE book_name='".$_SESSION['bname']."'";
    if($query_run = mysql_query($query))
    { $query_num_rows =  mysql_num_rows($query_run);
      if($query_num_rows != 0)
     {
      if($query_result = mysql_result($query_run,0,$field))
      {
        return  $query_result;
      }
     }
    }
}

function getimgurl ($field,$bid)
{
  $query="SELECT $field FROM image WHERE book_id=$bid";
    if($query_run = mysql_query($query))
    { $query_num_rows =  mysql_num_rows($query_run);
      if($query_num_rows != 0)
     {
      if($query_result = mysql_result($query_run,0,$field))
      {
        return  $query_result;
      }
      }
    }
}
?>