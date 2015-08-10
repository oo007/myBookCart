<?php

?>

<!DOCTYPE html>
<html>
<head>
<style> 
div
{
width:100px;
height:100px;
background:red;
-webkit-animation:myfirst 5s; /* Chrome, Safari, Opera */
animation:myfirst 5s;
}

/* Chrome, Safari, Opera */
@-webkit-keyframes myfirst
{
from {background:red;}
to {background:yellow;}
}

/* Standard syntax */
@keyframes myfirst
{
from {background:red;}
to {background:yellow;}
}
</style>
</head>
<body>

<div></div>

</body>
</html>
