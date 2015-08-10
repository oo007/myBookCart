<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = '';
$mysql_databasename = 'sachi';
$link=mysql_connect($mysql_host, $mysql_user, $mysql_password) ;
if(!$link||!mysql_select_db($mysql_databasename))
{
  die(mysql_error());
}

?>