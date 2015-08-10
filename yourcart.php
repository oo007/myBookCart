<?php
require 'connect.inc.php';
require 'current.inc.php';


if(loggedin())
{
  $firstname =  getuserfield('firstname') ;
  $lastname =   getuserfield('lastname');
  echo '<div  style= "position :absolute; top :30; left: 500;font-family:Lucida Sans Unicode;color:rgb(255,200,200);
    border-radius: 0.4em; padding :5px;
    border: 1px solid #191919;color:#FFD1FF;
    box-shadow:
        inset 0 0 2px 1px rgba(255,255,255,0.08),
        0 16px 10px -8px rgba(0, 0, 0, 0.6); ">You are logged in '.$firstname.' '.$lastname.'...</div>'  ;
         $category=$_SESSION['subject'] ; $bname=$_SESSION['bname']  ;
         $userid=$_SESSION['user_id'];
         $bookid=getbookinfo('book_id');$sum=0;
      //   $_SESSION['bookprice']=getbookinfo('price');
        //  $_SESSION['sum']=$sum;
         $array = array("cs", "ec", "novel","cr", "ee", "me");
  $query="create table if not exists new1(  serial int(11) not null auto_increment, id int(11) not null,
                                              book_id int(11) not null, quantity int(11) not null, primary key(serial))";
                mysql_query($query);
 if(isset($_POST['quantity']) )
 {
      $quantity=$_POST['quantity'];

      if(!empty($quantity))
      { //$query="create table if not exists new1(  serial int(11) not null auto_increment, id int(11) not null,
          //                                    book_id int(11) not null, quantity int(11) not null, primary key(serial))";
            //    mysql_query($query);
         $query="SELECT book_id FROM new1 WHERE book_id = '".mysql_real_escape_string($bookid)."'";
               $query_run = mysql_query($query);
               $query_num_rows =  mysql_num_rows($query_run);
               if($query_num_rows != 0)
              {    $query="UPDATE new1 SET quantity = quantity +$quantity WHERE  book_id = '".mysql_real_escape_string($bookid)."'  ";
                            mysql_query($query);

              }
              else
              {
                    $query="INSERT INTO new1(id, book_id,quantity) VALUES ('$userid','$bookid','$quantity')";
                            mysql_query($query);
              }
            $query="SELECT * FROM new1 WHERE id = '".mysql_real_escape_string($userid)."'";
           if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div style="position :absolute; top :257; left: 230;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                        0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">you have not ordered any book..</div>';
              }
              else{

                 echo '<div  style= "position:absolute; top:260px;left:200px">
                      <table id="tb" >
                        <tr>

                           <th>Book ID</th>
                           <th>Bookname </th>
                           <th>Category </th>
                           <th>Quantity</th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                              //echo '<td >' . $row['id'] . "</td>";
                               echo '<td  width="30px">' . $row['book_id'] . "</td>";

                               for ($i = 0; $i < count($array); $i++) {
                               $query1="SELECT * FROM $array[$i] WHERE book_id = '".mysql_real_escape_string($row['book_id'])."'";

                                   $row1 = mysql_fetch_array(mysql_query($query1));
                                   if($row1!=NULL)
                                   {
                                        echo '<td  width="auto">' . $row1['book_name'] . "</td>";
                                        echo '<td  width="50px">' .$array[$i]. "</td>";
                                            $sum =$sum+$row1['price'] *$row['quantity'];
                                   }
                               }
                                echo '<td width="30px">'. $row['quantity'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div>";
                          echo ' <div  style= "position:absolute; top:350px;left:1000px;background-color:green;color:yellow;border-radius: 0.4em;padding:4px;" >
                               <form action="https://www.onlinesbi.com/retail/login.htm" method="POST">
                               <textarea name="address" id="message" cols="40" rows="2">provide a shipping address</textarea>
              <input name="payon" type="submit"  style= "border-radius: 0.4em;"value="pay online"/> </form ></div >  ';

                        echo'<div style="position :absolute; top :160; left: 550;font-family:Lucida Sans Unicode;background: #000066;color:white;
              border-radius: 0.4em; padding :5px;border: 1px solid #191919; box-shadow:inset 0 0 2px 1px rgba(255,255,255,0.08),
                 0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">Your grandtotal is <span style="font-size:28px; color:	#00FF00;">'.$sum.'</span> rupees..</div>';

             }
       }          mysql_close($link);
      }
       else
       { echo'<div style="position :absolute; top :257; left: 230;font-family:Lucida Sans Unicode;background: #FFFF66;
              border-radius: 0.4em; padding :5px;border: 1px solid #191919; box-shadow:inset 0 0 2px 1px rgba(255,255,255,0.08),
                 0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">supply quantity .......</div>';
       }
}



if(isset($_POST['viewcart']))
{ $sum=0;
  $query="SELECT * FROM cart WHERE id = '".mysql_real_escape_string($userid)."'";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div style="position :absolute; top :167; left: 290;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">you have not ordered any book till now...</div>';
              }
              else{

                 echo '<div  style= "position:absolute; top:260px;left:200px">
                      <table id="tb" >
                        <tr> <th>Book ID</th><th>Bookname </th>
                           <th>Category </th> <th>Quantity</th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="30px">' . $row['book_id'] . "</td>";
                              for ($i = 0; $i < count($array); $i++) {
                               $query1="SELECT * FROM $array[$i] WHERE book_id = '".mysql_real_escape_string($row['book_id'])."'";

                                   $row1 = mysql_fetch_array(mysql_query($query1));
                                   if($row1!=NULL)
                                   {echo '<td  width="auto">' . $row1['book_name'] . "</td>";
                                        echo '<td  width="50px">' .$array[$i]. "</td>";
                                    }
                             }
                                echo '<td width="30px">'. $row['quantity'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br>";

                                          echo ' <br><br></div>';
                               
             }
       }
}
if(isset($_POST['viewrecentcart']))
{ $query="SELECT * FROM new1 ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div style="position :absolute; top :167; left: 290;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">you recent cart is empty...</div>';
              }
              else{

                 echo '<div  style= "position:absolute; top:260px;left:200px">
                      <table id="tb" >
                        <tr> <th>Book ID</th><th>Bookname </th>
                           <th>Category </th> <th>Quantity</th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="30px">' . $row['book_id'] . "</td>";
                              for ($i = 0; $i < count($array); $i++) {
                               $query1="SELECT * FROM $array[$i] WHERE book_id = '".mysql_real_escape_string($row['book_id'])."'";

                                   $row1 = mysql_fetch_array(mysql_query($query1));
                                   if($row1!=NULL)
                                   {echo '<td  width="auto">' . $row1['book_name'] . "</td>";
                                        echo '<td  width="50px">' .$array[$i]. "</td>";
                                        $sum =$sum+$row1['price'] *$row['quantity'];
                                    }
                             }
                                echo '<td width="30px">'. $row['quantity'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div>";
                              echo '
                               <div  style= "position:absolute; top:350px;left:1000px;background-color:green;color:yellow;border-radius: 0.4em;padding:4px;" >
                               <form action="https://www.onlinesbi.com/retail/login.htm" method="POST">
                               <textarea name="address" id="message" cols="40" rows="2">provide a shipping address</textarea>
              <input name="payon" type="submit"  style= "border-radius: 0.4em;"value="pay online"/> </form ></div >     ';

                        echo'<div style="position :absolute; top :160; left: 450;font-family:Lucida Sans Unicode;background: #000066;color:white;
              border-radius: 0.4em; padding :5px;border: 1px solid #191919; box-shadow:inset 0 0 2px 1px rgba(255,255,255,0.08),
                 0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">Your shopping till now is <span style="font-size:28px; color:	#00FF00;">'.$sum.'</span> rupees..</div>';
             }
       }
}
?>
<style>
    /* reset */
html, body, div, span, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
html , body{
	line-height: 1;
	background-color: #334873;
	background-image: url(images/Little11.jpg);
}
img {
opacity:1;
}

img:hover { 
opacity: 0.8;
}

ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
/* end reset*/

/* @font-face @/
/* Generated by Font Squirrel (http://www.fontsquirrel.com) on May 2, 2011 04:30:37 PM America/New_York */



@font-face {
    font-family: 'ColaborateThinRegular';
    src: url('ColabThi-webfont.eot');
    src: url('ColabThi-webfont.eot?#iefix') format('embedded-opentype'),
         url('ColabThi-webfont.woff') format('woff'),
         url('ColabThi-webfont.ttf') format('truetype'),
         url('ColabThi-webfont.svg#ColaborateThinRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ColaborateLightRegular';
    src: url('ColabLig-webfont.eot');
    src: url('ColabLig-webfont.eot?#iefix') format('embedded-opentype'),
         url('ColabLig-webfont.woff') format('woff'),
         url('ColabLig-webfont.ttf') format('truetype'),
         url('ColabLig-webfont.svg#ColaborateLightRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ColaborateRegular';
    src: url('ColabReg-webfont.eot');
    src: url('ColabReg-webfont.eot?#iefix') format('embedded-opentype'),
         url('ColabReg-webfont.woff') format('woff'),
         url('ColabReg-webfont.ttf') format('truetype'),
         url('ColabReg-webfont.svg#ColaborateRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ColaborateMediumRegular';
    src: url('ColabMed-webfont.eot');
    src: url('ColabMed-webfont.eot?#iefix') format('embedded-opentype'),
         url('ColabMed-webfont.woff') format('woff'),
         url('ColabMed-webfont.ttf') format('truetype'),
         url('ColabMed-webfont.svg#ColaborateMediumRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'ColaborateBoldRegular';
    src: url('ColabBol-webfont.eot');
    src: url('ColabBol-webfont.eot?#iefix') format('embedded-opentype'),
         url('ColabBol-webfont.woff') format('woff'),
         url('ColabBol-webfont.ttf') format('truetype'),
         url('ColabBol-webfont.svg#ColaborateBoldRegular') format('svg');
    font-weight: normal;
    font-style: normal;

}

@font-face {
    font-family: 'Inconsolata';
    src: url('Inconsolata-webfont.eot');
    src: url('Inconsolata-webfont.eot?#iefix') format('embedded-opentype'),
         url('Inconsolata-webfont.woff') format('woff'),
         url('Inconsolata-webfont.ttf') format('truetype'),
         url('Inconsolata-webfont.svg#InconsolataMedium') format('svg');
    font-weight: normal;
    font-style: normal;

}

h1, h2, h3 {
	font-family: 'ColaborateRegular', Arial, sans-serif;	
}


strong {
	font-family: 'ColaborateMediumRegular', Arial, sans-serif;	
}

em {
	font-family: 'ColaborateThinRegular', Arial, sans-serif;	
}

.content {
	max-width: 760px;
	margin: 10px 0 0 100px;
}

.footer {
	position: fixed;
	bottom: 0;
	left: 0px;
	width: 100%;
	padding-top: 18px;
	background: url(../_images/bg-footer.png) repeat-x left top;       
}

.logo {
	letter-spacing: -1px;
	color: #ffff00;
	text-shadow: 5px 5px 3px #003366;
	background: ;
	font: bold 45px 'ColaborateThinRegular', Arial, sans-serif;
}

.logo i {
	font-size: 24px;
	font-family: 'ColaborateRegular', Arial, sans-serif;
	color: rgb(119,104,71);
	position: relative;
	top:-0.18em;
	display: inline-block;
	text-shadow: none;
}

.logo i.mm {
	font-size: 16px;
	color: white;
	text-shadow: 1px 1px 1px rgba(0,0,0,.75);
	top: 0.1em;
	left: 0.5em;
	line-height: 90%;
	text-align: right;
	background-color: #ff0000;
	padding: .25em .5em .25em 1em;
	-webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.75);
	-moz-box-shadow: 1px 1px 2px rgba(0,0,0,.75);
	box-shadow: 1px 1px 2px rgba(0,0,0,.75);
}


.clear:after {
content: "."; display: block; height: 0; clear: both; visibility: hidden;
}

.clear {
	min-height: 1px;
}

* html .clear {
 height: 1px;
}

.header {
	position: relative;

	padding: 10px 0 10px 0;
	margin-bottom: 20px;
}


.main {
	xxposition: relative;
	padding-bottom: 1em;
	border-bottom: solid 1px rgba(255,255,255,.5);
	xxoverflow:hidden;
	xxmin-height: 300px;
}

.main h1 {
	font-size: 32px;
	color: white;
	text-shadow: 1px 1px 1px rgba(0,0,0,.75);
	border-bottom: solid 1px rgba(255,255,255,.5);
	margin-bottom: 0.75em;
}


p , li, legend , form{
	font-size: 18px;
	color: #99FF33;
	font-family: 'ColaborateLightRegular', Arial, sans-serif;
	line-height: 125%;
	margin-bottom: 10px;
}

fieldset {
	padding: 10px;
	border: 1px solid white;
	margin: 25px 0;	
}

.nav {
	margin: 10px 0 0 100px;	
}

.nav li {
	display: inline-block;	
}

.nav a, .example {
	display: inline-block;
	font-family: 'ColaborateLightRegular', Arial, sans-serif;
	font-size: 12px;
	color: rgb(255,255,255);
	text-decoration: none;
	-moz-border-radius: 0.25em;
	border-radius: 0.25em;
	padding: .25em .5em;
	background-color: rgba(107,124,159, .75);
	-webkit-transition: all .25s ease-in;
	-moz-transition: all .25s ease-in;
	-o-transition: all .25s ease-in;
	transition: all .25s ease-in;
	cursor: pointer;
}

.nav a:hover, .example:hover{
	background-color: rgba(255,255,255,.85);
	color: rgb(0,0,0);
}

.footer p {
	font-size: 14px;
	font-family: 'ColaborateLightRegular', Arial, sans-serif;
	padding: .5em .25em .5em 1em;
	color:rgb(255,255,255);
	background: rgb(0,100,100);
	-moz-border-radius: 2px 0 0 0;
	border-radius: 2px 0 0 0;
	margin: 0;
}

#resources {
	background-color: rgba(255,255,255,0.95);
	padding: 0em 1em 1em .75em;
	position: absolute;
	top: 10em;
	left: -51em;
	width: 50em;
	-moz-border-radius: 0 0 .5em 0;
	border-radius: 0 0 .5em 0;
	display: none;
}

#resources .open {
	position: absolute;
	width: 20px;
	height: 20px;
	right: -20px;
	top: -20px;
	background-color: rgba(255,255,255,0.8);
	-moz-border-radius: 0.5em;
	border-radius: .5em 0;
	text-align: center;
	font-family: 'ColaborateBoldRegular', Arial, sans-serif;
	cursor: pointer;
	color: rgb(119,104,71);
	line-height: 100%;
}

#resources h2 {
	font-family: 'ColaborateBoldRegular', Arial, sans-serif;
	font-size:18px;
	text-transform:uppercase;
	/*color: rgb(59,82,128);*/
	color: rgb(119,104,71);
	margin-top: 1em;
	text-shadow: none;
}

#resources h3 {
	font-family: 'ColaborateMediumRegular', Arial, sans-serif;
	font-size: 14px;
	color: rgba(0,0,0,.8);
	margin-top: 8px;
}

.resourceList > li {
	display: inline-block;
	padding: .5em 1em;
	-moz-border-radius: 0.25em;
	border-radius: 0.25em;
	background-color: rgba(119,104,74, .5);
	font-family: 'ColaborateRegular', Arial, sans-serif;
	font-size: 12px;
	color: rgb(255,255,255);
	margin-bottom: 5px;
}

#resources ul {
	margin: 5px 0 0 0;
}
a {
	color: rgba(255,255,255,.75);
}
h2 {
	color: rgb(143,180,255);
	margin-bottom: 5px;
	font-size: 22px;
	text-shadow: 1px 1px 1px rgba(0,0,0,.75);
}
h3 {
	font-size: 18px;
	color: rgb(227,198,133);;
}

.example, code {
	font-family: 'Inconsolata', Courier, monospaced;
	font-size: 16px;
	color: rgb(255,255,255);
}

.results {
	-moz-border-radius: 10px;
	border-radius: 10px;
	background-color: rgba(255,255,255,.4);
	padding: 1em;
	margin-bottom: 1em;
	overflow: hidden;
}

.results strong {
	font-family: 'ColaborateRegular', Arial, sans-serif;
	color: rgb(227,198,133);
}
.results .found {
	color: rgb(255,0,0);
}

.unit {
	display: inline-block;
	width: 45%;
}
.results h2 {
	color: rgba(255,255,255,1);
}
.results div {
	padding-bottom: 10px;
}
.results div code {
	float: right;
	width: 60%;
}

input {
	font-size: 20px;
}
.found {
	color: rgba(255,0,0,1);
}
form .wide {
	font-size: 18px;
	width: 100%;
}
.resultSection {
	float: right;
	width: 45%;
	margin-left: 20px;
}
#regexTester {
	margin-right: 55%;
}
.sideBySide li {
	float: left;
	overflow: hidden;
	width: 220px;
}
.clickable {
	cursor:pointer;
	margin-bottom: 5px;
}

.clickable:hover {
background-color:#FFC;
}

.highlighted {
	position: absolute;
	background-color: transparent;
	opacity: 0.5;
	filter: alpha(opacity=50);
	border:1px solid white;
	z-index: 100;
}
.badge {
	position: absolute;
	margin-top: -10px;
	z-index:50;
	font-family: 'Inconsolata', Courier, monospaced;
	font-size:14px;
	font-weight:bold;
	padding: 5px;
	color: black !important;
	background-color: #3FF;
	border: 1px black solid;
	opacity: 0.6;
	filter: alpha(opacity=60);
}

.col1 {
	float: left;
	width: 75%;	
}
.col2 {
	float: right;
	width: 20%;	
}

.col2 ul {
	margin-left: 20px;
	list-style: square;
}
.col2 li {
	font-size: 90%;	
}


#selectorList {
	overflow: hidden;	
}
#selector {
	width: 275px;
}
#bib {
	padding: 15px;
	border: 1px dotted #FFF;
	font-size: 80%;
	margin-bottom: 25px;
}

#gallery img {
	display: inline-block;
	margin: 0 0 10px 0;
	border: 1px solid rgb(0,0,0);
}

form#order div, form#signup div{
	padding-bottom: 10px;	
}

form#order .label, form#signup .label {
	display: block;
	clear: left;
	float: left;
	width: 175px;
	text-align: right;
	padding: 7px 15px 0 0;
	text-transform: uppercase;	
	font-weight: bold;
}

form#signup .label {
	width: 200px;	
}

.labelBlock {
	text-transform: uppercase;
	font-weight: bold;	
	display: block;
	padding-bottom: 0 !important;
	clear: both;
	margin-top: 10px;
}

form#order select, form#signup select {
	display: inline-block;
	margin-top: 8px;	
}

form#order input[type="radio"], form#signup input[type="radio"], form#signup input[type="checkbox"] {
   display: inline-block;
   margin-top: 10px;	
}

form .indent, #submit {
	margin-left: 215px;	
}
#console label {
	float: left;
	width: 100px;
}
.clearLeft {
	clear: left;
}
.imgRight {
	float: right;
	margin-bottom: 5px;
	margin-left: 5px;
}
.imgLeft {
	float: left;
	margin-bottom: 5px;
	margin-right: 5px;
}

#signup .indent label.error {
  margin-left: 0;
}

#tb{border:4px solid black;margin-left:20px;margin-top:20px;width:100%;}
                   th{border:1px solid black; padding:6px;font-family: 'ColaborateRegular', Arial, sans-serif;background-color:#275420;color:white;}
                   td{border:1px solid black; padding:8px;}
                   tr{border:1px solid black;font-family: 'ColaborateRegular', Arial, sans-serif;background-color:#e1eef4;font-weight:bold;padding:6px;color:#006699}
                   tr:hover{border:1px solid black; font-family: 'ColaborateRegular', Arial, sans-serif;color:#36752D;background-color:#C6FFC2;font-weight:bold;}
</style>


</head>

<body>
<div class="wrapper">
  <div class="header">
    <p class="logo">BOOK C@RT INDIA<i class="mm">The<br>
      World<br>
      of Books</i></p>
  </div>
  <script type="text/javascript">
var col = new String();
var x=1;var y;

function blink()
{
 if(x%3==1)
 {
  col = "rgb(0,0,255)";
 }else if(x%3==2){
  col = "rgb(255,0,0)";
 }
 else {
  col = "rgb(0,255,0)";
 }

 aF.style.color=col;x++;if(x>3){x=1};setTimeout("blink()",500);
}
</script>


<body onload="blink()">
<div style="position :absolute; top :30; left: 900;font-family:Lucida Sans Unicode ;
	font-size: 30px; "><a id="aF" href="logout.php"STYLE="text-decoration: none;"><b>* Log out! *</b></a></div>

<div style="position :absolute; top :200; left: 950px;font-family:Lucida Sans Unicode;font-size: 20px;
    border-radius: 0.4em; padding :5px;
    border: 1px solid #800000;">
    <a  href="category.php"STYLE="text-decoration: none;color:#66FFFF;"><b>Continue shopping</b></a></div>

  <div class="content">

    <div class="main">
    <div style="position :absolute; top :30; left: 1200; "><a href="signin.php"STYLE="text-decoration: none;">
              <img src="images/home.png" alt="Photo not available..." width="90" height="90"></a></div>
    <div style="position :absolute; top :120; left: 1200; "><a href="category.php"STYLE="text-decoration: none;">
              <img src="images/download.png" alt="Photo not available..." width="100" height="100"></a></div>
    <div style="position :absolute; top :220; left: 1200; "><a href="contact.php"STYLE="text-decoration: none;">
              <img src="images/contact us.png" alt="Photo not available..." width="100" height="100"></a></div>

     <form action="yourcart.php" method="POST">
                                       Quantity&nbsp;<input type = "text" name = "quantity"  value=""size=2>&nbsp;
                                       &nbsp;<input type = "Submit" value = "buy"style="
                                       background-color:rgba(255,255,255,0.08);color:#FFFFCC" ></form>

    <form action="yourcart.php" method="POST">
                       <input name="viewcart" type="submit"  value="order history " style=" position:absolute;left:950px;
                        top:100px;background-color:rgba(255,255,255,0.08);color:#FFFF00" />
    </form>
    <form action="yourcart.php" method="POST">
                       <input name="viewrecentcart" type="submit"  value="View your cart" style=" position:absolute;left:950px;
                        top:150px;background-color:rgba(255,255,255,0.08);color:#FFFF00" />
    </form>
      <h1></h1>
      <p style="font-size: 20px; ">Your cart info,here...</p>
    </div>
    <div class="aside"> </div>
  </div>
  <div class="footer">
    <p><b>Visit our site for all books</b> <a href="signin.php">BOOKC@RTINDIA.com</a></b></p>
  </div>
</div>
</body>


<?php
}
else
{
  include 'loginform.inc.php';
}

?>

