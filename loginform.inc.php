<?php
if(isset($_POST['username']) && isset($_POST['password']))
{
    $username=$_POST['username'];        
    $password=$_POST['password'];
    if(!empty($username) && !empty($password))
    {
      $query="SELECT id FROM persons WHERE UserName = '".mysql_real_escape_string($username)."' AND Password = '".mysql_real_escape_string($password)."'";
      if($query_run = mysql_query($query) or die(mysql_error()))
      {
        $query_num_rows =  mysql_num_rows($query_run);
        if($query_num_rows == 0)
        {
          echo '<div style="position :absolute; top :100; left: 520; font-family:Lucida Sans Unicode;"> Invalid username/password.Try Again... </div>';
        }
        else if($query_num_rows == 1)
        {
          $user_id =  mysql_result($query_run,0,'id');//mysql_fetch_array mysql_fetch_row
          $_SESSION['user_id']=$user_id ;
          header('Location: signin.php');
        }
      }
    }                                                                                                           
    else
    {   echo'<div style="position :absolute; top :100; left: 520;font-family:Lucida Sans Unicode; ">You must supply username and password ...</div>';
    }
}
?>
<style type="text/css">
h1 {
	font-size: 36px;
}
body,td,th {
	color: #FFF;
}
h1,h2,h3,h4,h5,h6 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", "sans-serif";
}
</style>
<body background="images/Butterflies-Book.jpeg">
<div class="box fade-in three"><div style="position:absolute;top:-10px;left:200px;width:960px;
      border:5px solid #FF9900;padding:0px;margin-left:10px;color:#99FF99; -webkit-animation:myfirst 10s;animation:myfirst 10s;">
<style>
@keyframes myfirst
{
from {color:yellow;}
to {color:#99FF99;}

}

</style>
<marquee direction="left" behavior="alternate"><p><img src="images/index.jpg"><span style="font-family:Lucida Sans Unicode;font-size:40px;">BOOKC@RT INDIA:</span>
<span style="font-family:Lucida Sans Unicode;font-size:20px;">The world of books</span></p></marquee>

</div> </div>
<script type="text/javascript">
var col = new String();
var x=1;var y;

function blink()
{
 if(x%2)
 {
  col = "rgb(0,255,255)";
 }else{
  col = "rgb(255,255,255)";
 }

 aF.style.color=col;x++;if(x>2){x=1};setTimeout("blink()",500);
}
</script>


<body onload="blink()">
<div class="box fade-in two"><div style="position :absolute; top :100; left: 1000;font-family:Lucida Sans Unicode;font-size: 30px; "><a id="aF" href="register.php"STYLE="text-decoration: none;"><b>* Sign up! *</b></a></div>
</div><p>&nbsp</p>
<p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p><p>&nbsp</p>



<div class="box fade-in one">
<form action="<?php echo $current_file?>" method="POST" class="form-3">
    <p class="clearfix">
        <label for="login">Username</label>
      <input type="text" name="username" id="login" placeholder="Username">
    </p>
    <p class="clearfix">
      <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
    </p>
    <p class="clearfix">
        <label >       </label>
    </p>
    <p class="clearfix">
        <input type="submit" name="submit" value="Sign in">
    </p>
</form>
</div>
<div class="box fade-in eight"><div style="position :absolute; top :125; left: 605; ">
              <img src="images/books.png" alt="Photo not available..." width="135" height="135"></div> </div>
<div style="position :absolute; top :145; left: 150; ">
<p style="font-family:sans-serif ;font-size:20px;color:yellow;margin:0px;padding:0px;">We provide </p>
<p style="font-family:sans-serif ;font-size:20px;color:black ;margin:1px;width:auto;background: #A3FFC2;
       border-radius: 0.4em; padding :2px;">ENGINEERING BOOKS</p>
<table >
<tr>
  <td><img src="images/dynamics.gif" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/fine.gif" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/graph.gif" alt="Photo not available..." width="100" height="100"></td>
</tr>
<tr>
  <td>Dynamics</td>
  <td>Relativity</td>
  <td>Graphics</td>
</tr>
</table>
</div>


<div style="position :absolute; top :350; left: 150; ">
<p style="font-family:sans-serif ;font-size:20px;color:black ;margin:1px;width:auto;background: #A3FFC2;
       border-radius: 0.4em; padding :2px;">BIOGRAPHY</p>
<table >
<tr>
  <td><img src="images/Gandhiji.gif" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/678.jpg" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/Craig.gif" alt="Photo not available..." width="100" height="100"></td>
</tr>
<tr>
  <td>Gandhi</td>
  <td>Kalam</td>
  <td>BOND</td>
</tr>
</table>
</div>

<div style="position :absolute; top :170; left: 900; ">

<p style="font-family:sans-serif ;font-size:20px;color:black ;margin:1px;width:auto;background: #A3FFC2;
       border-radius: 0.4em; padding :2px;">NOVELS</p>
<table >
<tr>
  <td><img src="images/photo.gif" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/sherlock.gif" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/davinci.gif" alt="Photo not available..." width="100" height="100"></td>
</tr>
<tr>
  <td>Harrypoter</td>
  <td>Sherlock</td>
  <td>Davinci code</td>
</tr>
</table>
</div>


<div style="position :absolute; top :350; left: 900; ">
<p style="font-family:sans-serif ;font-size:20px;color:black ;margin:1px;width:auto;background: #A3FFC2;
       border-radius: 0.4em; padding :2px;">KID BOOKS</p>
<table >
<tr>
  <td><img src="images/wimpy.jpg" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/grand.jpg" alt="Photo not available..." width="100" height="100"></td>
  <td><img src="images/you n me.jpg" alt="Photo not available..." width="100" height="100"></td>
</tr>
<tr>
  <td>Wimpy Kid</td>
  <td>Grandpa</td>
  <td>You n Me</td>
</tr>
</table><span style="font-family:Lucida Sans Unicode;color:#B8DBFF;margin-left:100px;font-size:20px;">and many more...</span></div>
<div style="position :absolute; top :520; left:200;width:1000px "><marquee direction="left" behavior="alternate"><p><span style="font-family:Lucida Sans Unicode;font-size:40px;">So,come to us</span>
<span style="font-family:Lucida Sans Unicode;font-size:20px;">Find your choice</span></p></marquee></div>



<style>
table td{  border:1px solid white; padding:5px;background:linear-gradient(#1f2124, #27292c);color:red;
            font-family:sans-serif ;font-size:15px;color:yellow ;margin:0px;}
.form-3 {
    font-family: 'Ubuntu', 'Lato', sans-serif;
    font-weight: 400;
    /* Size and position */
    width: 300px;
    position: relative;
    margin: 60px auto 30px;
    padding: 10px;
    overflow: hidden;
 
    /* Styles */
    background: #111;
    border-radius: 0.4em;
    border: 1px solid #191919;
    box-shadow:
        inset 0 0 2px 1px rgba(255,255,255,0.08),
        0 16px 10px -8px rgba(0, 0, 0, 0.6);
}
.form-3 label {
    /* Size and position */
    width: 50%;
    float: left;
    padding-top: 9px;
 
    /* Styles */
    color: #ddd;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-shadow: 0 1px 0 #000;
    text-indent: 10px;
    font-weight: 700;
    cursor: pointer;
}
 
.form-3 input[type=text],
.form-3 input[type=password] {
    /* Size and position */
    width: 50%;
    float: left;
    padding: 8px 5px;
    margin-bottom: 10px;
    font-size: 12px;
 
    /* Styles */
    background: linear-gradient(#1f2124, #27292c);    
    border: 1px solid #000;
    box-shadow:
        0 1px 0 rgba(255,255,255,0.1);
    border-radius: 3px;
 
    /* Font styles */
    font-family: 'Ubuntu', 'Lato', sans-serif;
    color: #fff;
 
}
 
.form-3 input[type=text]:hover,
.form-3 input[type=password]:hover,
.form-3 label:hover ~ input[type=text],
.form-3 label:hover ~ input[type=password] {
    background: #27292c;
}
 
.form-3 input[type=text]:focus,
.form-3 input[type=password]:focus {
    box-shadow: inset 0 0 2px #000;
    background: #494d54;
    border-color: #51cbee;
    outline: none; /* Remove Chrome outline */
}
.form-3 p:nth-child(3),
.form-3 p:nth-child(4) {
    float: left;
    width: 50%;
}
 
.form-3 input[type=checkbox] {
    margin-left: 10px;
    vertical-align: middle;
}
.form-3 input[type=submit] {
    /* Width and position */
    width: 100%;
    padding: 8px 5px;
  
    /* Styles */
    border: 1px solid #0273dd; /* Fallback */
    border: 1px solid rgba(0,0,0,0.4);
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,0.3),
        inset 0 10px 10px rgba(255,255,255,0.1);
    border-radius: 3px;
    background: #38a6f0;
    cursorointer;
  
    /* Font styles */
    font-family: 'Ubuntu', 'Lato', sans-serif;
    color: white;
    font-weight: 700;
    font-size: 15px;
    text-shadow: 0 -1px 0 rgba(0,0,0,0.8);
}
 
.form-3 input[type=submit]:hover {
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.6);
}
 
.form-3 input[type=submit]:active {
    background: #287db5;
    box-shadow: inset 0 0 3px rgba(0,0,0,0.6);
    border-color: #000; /* Fallback */
    border-color: rgba(0,0,0,0.9);
}
 
.no-boxshadow .form-3 input[type=submit]:hover {
    background: #2a92d8;
}
/* Gradient line */
.form-3:after {
    /* Size and position */
    content: "";
    height: 1px;
    width: 33%;
    position: absolute;
    left: 20%;
    top: 0;
 
    /* Styles */
    background: linear-gradient(left, transparent, #444, #b6b6b8, #444, transparent);
}
 
/* Small flash */
.form-3:before {
    /* Size and position */
    content: "";
    width: 8px;
    height: 5px;
    position: absolute;
    left: 34%;
    top: -7px;
    
    /* Styles */
    border-radius: 50%;
    box-shadow: 0 0 6px 4px #fff;
}
.form-3 p:nth-child(1):before{
    /* Size and position */
    content: "";
    width: 250px;
    height: 100px;
    position: absolute;
    top: 0;
    left: 45px;
 
    /* Styles */
    transform: rotate(75deg);
    background: linear-gradient(50deg, rgba(255,255,255,0.15), rgba(0,0,0,0));
    pointer-events: none;
}

.no-pointerevents .form-3 p:nth-child(1):before {
    display: none;
}
</style>

<style>
img {
opacity:1;
} 

img:hover { 
opacity: 0.8;
}
/* make keyframes that tell the start state and the end state of our object */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
 
.fade-in {
    opacity:0;  /* make things invisible upon start */
    -webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
    -moz-animation:fadeIn ease-in 1;
    animation:fadeIn ease-in 1;
 
    -webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
    -moz-animation-fill-mode:forwards;
    animation-fill-mode:forwards;
 
    -webkit-animation-duration:1s;
    -moz-animation-duration:1s;
    animation-duration:1s;
}
 
.fade-in.one {
-webkit-animation-delay: 0.3s;
-moz-animation-delay: 0.3s;
animation-delay:0.3s;
}
 
.fade-in.two {
-webkit-animation-delay: 0.6s;
-moz-animation-delay:0.6s;
animation-delay: 0.6s;
}
 
.fade-in.three {
-webkit-animation-delay:0.9s;
-moz-animation-delay: 0.9s;
animation-delay: 0.9s;
}

.fade-in.four {
-webkit-animation-delay:1.2s;
-moz-animation-delay: 1.2s;
animation-delay: 1.2s;
}
.fade-in.five {
-webkit-animation-delay: 1.5s;
-moz-animation-delay: 1.5s;
animation-delay:1.5s;
}
.fade-in.six {
-webkit-animation-delay:1.8s;
-moz-animation-delay: 1.8s;
animation-delay:1.8s;
}
.fade-in.seven {
-webkit-animation-delay: 2.1s;
-moz-animation-delay: 2.1s;
animation-delay: 2.1s;

.fade-in.eight {
-webkit-animation-delay:2.4s;
-moz-animation-delay: 2.4s;
animation-delay:2.4s;
}
.fade-in.nine {
-webkit-animation-delay: 2.7s;
-moz-animation-delay: 2.71s;
animation-delay: 2.7s;

.fade-in.ten {
-webkit-animation-delay:3.0s;
-moz-animation-delay: 3.0s;
animation-delay:3.0s;
}
}


</style>

