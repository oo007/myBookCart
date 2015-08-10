<?php
require 'current.inc.php';
require 'connect.inc.php';

$query="create table if not exists new1(
        serial int(11) not null auto_increment,
        id int(11) not null,
        book_id int(11) not null,
        quantity int(11) not null,
        primary key(serial))";
                mysql_query($query);
                
                echo"created";
                
                
$query="drop table if exists new1";
                mysql_query($query);
?>

