<?php
require 'connect.inc.php';
require 'current.inc.php';

if(loggedin())
{
  $firstname =  getuserfield('firstname') ;
  $lastname =   getuserfield('lastname');
   $array = array("cs", "ec", "novel","cr", "ee", "me");
  echo '<div  style= "position :absolute; top :30; left: 500;font-family:Lucida Sans Unicode;color:rgb(255,200,200);
    border-radius: 0.4em; padding :5px;
    border: 1px solid #191919;
    box-shadow:
        inset 0 0 2px 1px rgba(255,255,255,0.08),
        0 16px 10px -8px rgba(0, 0, 0, 0.6); ">You are logged in '.$firstname.' '.$lastname.'...</div>'  ;
 // echo 'Welcome  '.$firstname.' '.$lastname.'...<a href="logout.php">Log out</a>'  ;
  //header('Location:index.html');
if(isset($_POST['category']) && isset($_POST['bookname']))
{     $_SESSION['subject']=$_POST['category'];
      $_SESSION['bname']=$_POST['bookname'];
      $category=$_POST['category'];
      $bookname=$_POST['bookname'];
      $bookid=getbookinfo('book_id');
      $imgurl=getimgurl('imgurl',$bookid);
      if(!empty($category) && !empty($bookname))
      {
           $query="SELECT * FROM $category WHERE book_name = '".mysql_real_escape_string($bookname)."'";
           if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :257; left: 230;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                        0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">Book Not in this category ...</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tb" style= "position:absolute; top:360px;left:200px">
                      <table  >
                        <tr>
                        <th>Book ID</th>
                         <th>Book Name</th>
                          <th>Author</th>';
                      while($row = mysql_fetch_array($query_run))
                       {
                          if($row['co-author1']!=NULL)
                           echo '<th>Co-author1</th>';
                          if($row['co-author2']!=NULL)
                           echo '<th>Co-author2</th>';
                          if($row['co-author3']!=NULL)
                           echo '<th>Co-author3</th>';
                           echo '<th>Price</th>
                           </tr>';

                             echo "<tr>";
                              echo '<td >' . $row['book_id'] . "</td>";
                               echo '<td  width="auto">' . $row['book_name'] . "</td>";
                                echo '<td width="auto">'. $row['author'] . "</td>";
                                if($row['co-author1']!=NULL)
                                    echo '<td width="150px">' . $row['co-author1'] . "</td>";
                                if($row['co-author2']!=NULL)
                                  echo '<td width="150px">' . $row['co-author2'] . "</td>";
                                if($row['co-author3']!=NULL)
                                  echo '<td width="150px">' . $row['co-author3'] . "</td>";
                                  echo '<td >'. $row['price'] . "</td>";
                                   echo "</tr>";
                                         }
                                         echo "</table>";

                                  //$_SESSION['quantity']=0 ;

                      echo ' <br><br><form action="yourcart.php" method="POST">
                                 <input type = "Submit" value = "Proceed to buy"style="
                               background-color:rgba(255,255,255,0.08);color:yellow;position:absolute;left:800" ></form></div></div>';
           echo' <div  style= "position:absolute; top:160px;left:900px; ">
           <img src="'.$imgurl.'" alt="Photo not available..." width="150" height="200" style="border:5px solid white" ></div> ';

                              mysql_close($link);
             }
           }

      }
       if(empty($category) && empty($bookname))
       {     echo'<div class="box fade-in one"><div style="position :absolute; top :257; left: 230;font-family:Lucida Sans Unicode;background: #FFFF66;
    border-radius: 0.4em; padding :4px;
    border: 1px solid #191919;  font-size:15px;
    box-shadow:
        inset 0 0 2px 1px rgba(255,255,255,0.08),
        0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">must supply category and bookname of book...........</div></div>';
       }
       
       if(!empty($category) && empty($bookname))
       {     $query="SELECT * FROM $category ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
       }
       
if(empty($category) && !empty($bookname))
  {
    $_SESSION['bname']=$_POST['bookname'];
       for ($i = 0; $i < count($array); $i++) {
                   $bookid=getbookid('book_id',$array[$i]);
                   if($bookid!=NULL){
                     $_SESSION['subject']=$array[$i];
                        break;
                   }
        }

      $imgurl=getimgurl('imgurl',$bookid);

         for ($i = 0; $i < count($array); $i++) {
            $query="SELECT * FROM $array[$i] WHERE book_name = '".mysql_real_escape_string($bookname)."'";
            if($query_run = mysql_query($query))
            {
                    $query_num_rows =  mysql_num_rows($query_run);
             if($query_num_rows != 0)
           { echo '<div class="box fade-in one"><div  id="tb" style= "position:absolute; top:360px;left:200px">
                      <table  >
                        <tr>
                        <th>Book ID</th>
                         <th>Book Name</th>
                          <th>Author</th>';
                      while($row = mysql_fetch_array($query_run))
                       {
                          if($row['co-author1']!=NULL)
                           echo '<th>Co-author1</th>';
                          if($row['co-author2']!=NULL)
                           echo '<th>Co-author2</th>';
                          if($row['co-author3']!=NULL)
                           echo '<th>Co-author3</th>';
                           echo '<th>Price</th>
                           </tr>';

                             echo "<tr>";
                              echo '<td >' . $row['book_id'] . "</td>";
                               echo '<td  width="auto">' . $row['book_name'] . "</td>";
                                echo '<td width="auto">'. $row['author'] . "</td>";
                                if($row['co-author1']!=NULL)
                                    echo '<td width="150px">' . $row['co-author1'] . "</td>";
                                if($row['co-author2']!=NULL)
                                  echo '<td width="150px">' . $row['co-author2'] . "</td>";
                                if($row['co-author3']!=NULL)
                                  echo '<td width="150px">' . $row['co-author3'] . "</td>";
                                  echo '<td >'. $row['price'] . "</td>";
                                   echo "</tr>";
                                         }
                                         echo "</table>";

                                  //$_SESSION['quantity']=0 ;

                      echo ' <br><br><form action="yourcart.php" method="POST">
                                 <input type = "Submit" value = "Proceed to buy"style="
                               background-color:rgba(255,255,255,0.08);color:yellow;position:absolute;left:800" ></form></div></div>';

        echo' <div  style= "position:absolute; top:160px;left:900px;">
            <img src="'.$imgurl.'" alt="Photo not available..."  width="150" height="200" style="border:5px solid white"></div> ';
                                         mysql_close($link);

                                    }
                                 }
                             }

       }

}
if(isset($_POST['cs']))
{ $query="SELECT * FROM cs ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
}
if(isset($_POST['ec']))
{ $query="SELECT * FROM ec ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
}

if(isset($_POST['novel']))
{ $query="SELECT * FROM novel ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
}
if(isset($_POST['me']))
{ $query="SELECT * FROM me ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
}
if(isset($_POST['cr']))
{ $query="SELECT * FROM cr ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
             }
       }
}
if(isset($_POST['ee']))
{ $query="SELECT * FROM ee ;";
   if($query_run = mysql_query($query))
           {  $query_num_rows =  mysql_num_rows($query_run);
              if($query_num_rows == 0)
              {   echo'<div class="box fade-in one"><div style="position :absolute; top :100; left: 780;font-family:Lucida Sans Unicode;
                                            background: #FFFF66; border-radius: 0.4em; padding :5px;  border: 1px solid #191919;
                                                  box-shadow:  inset 0 0 2px 1px rgba(255,255,255,0.08),
                                                    0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">No book available</div></div>';
              }
              else{

                 echo '<div class="box fade-in one"><div  id="tbd" style= "position:absolute; top:120px;left:800px">
                      <table  >
                        <tr> <th>Bookname </th> <th>Price </th>
                           </tr>';
                       while($row = mysql_fetch_array($query_run))
                            {
                             echo "<tr>";
                               echo '<td  width="270px">' . $row['book_name'] . "</td>";

                                echo '<td width="25px">'. $row['price'] . "</td>";
                                   echo "</tr>";
                             }
                                         echo "</table><br><br><br></div></div>";
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
	background-image: url(images/url1.jpg);
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
	margin: 20px 0 0 100px;
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
	color: #47FF47;
	text-shadow: 2px 2px 1px rgba(0,0,0,.25);
	font: normal 39px 'ColaborateThinRegular', Arial, sans-serif;
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
	background-color: rgb(200,40,100);
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
	color: white;
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

#tb table{border:4px solid black;margin-left:20px;margin-top:20px;width:100%;}
           #tb table th{border:1px solid black; padding:6px;font-family: 'ColaborateRegular', Arial, sans-serif;background-color:#275420;color:white;}
      #tb table             td{border:1px solid black; padding:8px;}
      #tb table             tr{border:1px solid black;font-family: 'ColaborateRegular', Arial, sans-serif;background-color:#e1eef4;font-weight:bold;padding:6px;color:#006699}
       #tb table            tr:hover{border:1px solid black; font-family: 'ColaborateRegular', Arial, sans-serif;color:#36752D;background-color:#C6FFC2;font-weight:bold;}

#tbd table {border:4px solid black;margin-left:20px;margin-top:20px;width:100%;}
           #tbd table        th{border:1px solid black;padding:6px;background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 14px; font-weight: bold; border-left: 1px solid #0070A8;}
           #tbd table        td{border:1px solid black;padding:6px;color: #00557F; border-left: 1px solid #E1EEF4;font-size: 10px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }.datagrid table tbody td:first-child { border-left: none; }
           #tbd table             tr{border:1px solid black;font-family: 'ColaborateRegular', Arial, sans-serif;background-color:#e1eef4;font-weight:bold;padding:6px;color:#006699}
       #tbd table            tr:hover{border:1px solid black; font-family: 'ColaborateRegular', Arial, sans-serif;color:#36752D;background-color:#C6FFC2;font-weight:bold;}

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
 
    -webkit-animation-duration:0.5s;
    -moz-animation-duration:0.5s;
    animation-duration:0.5s;
}
 
.fade-in.one {
-webkit-animation-delay: 0.7s;
-moz-animation-delay: 0.7s;
animation-delay: 0.7s;
}
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
  col = "rgb(0,255,255)";
 }else if(x%3==2){
  col = "rgb(255,0,255)";
 }
 else {
  col = "rgb(255,255,255)";
 }

 aF.style.color=col;x++;if(x>3){x=1};setTimeout("blink()",500);
}
</script>


<body onload="blink()">
<div style="position :absolute; top :30; left: 900;font-family:Lucida Sans Unicode ;
	font-size: 30px; "><a id="aF" href="logout.php"STYLE="text-decoration: none;"><b>* Log out! *</b></a></div>

  <div class="content">

    <div class="main">
    <div style="position :absolute; top :30; left: 1200; "><a href="signin.php"STYLE="text-decoration: none;">
              <img src="images/home.png" alt="Photo not available..." width="90" height="90"></a></div>
    <div style="position :absolute; top :120; left: 1200; "><a href="category.php"STYLE="text-decoration: none;">
              <img src="images/download.png" alt="Photo not available..." width="100" height="100"></a></div>
    <div style="position :absolute; top :220; left: 1200; "><a href="contact.php"STYLE="text-decoration: none;">
              <img src="images/contact us.png" alt="Photo not available..." width="100" height="100"></a></div>
    <form action="category.php" method="POST">
       category<br><input type = "text" name = "category" value=""><br><br>
       bookname<br><input type = "text" name = "bookname" value="" size=60 style="font-size:20px;"><br><br>
       <input type = "Submit" value = "submit" ><br></form>
<form action="category.php" method="POST">
  <button  type="submit"  name="cr" style="position :absolute; top :80; left: 720;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">CR</button>
</form>
<form action="category.php" method="POST">
  <button  type="submit"  name="ee" style="position :absolute; top :80; left: 780;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">EE</button>
</form>
<form action="category.php" method="POST">
  <button  type="submit"  name="me" style="position :absolute; top :80; left: 835;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">ME</button>
</form>
<form action="category.php" method="POST">
  <button  type="submit"  name="cs" style="position :absolute; top :80; left: 900;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">CS</button>
</form>
<form action="category.php" method="POST">
  <button  type="submit"  name="ec" style="position :absolute; top :80; left: 960;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">EC</button>
</form>
<form action="category.php" method="POST">
  <button  type="submit"  name="novel" style="position :absolute; top :80; left: 1020;font-family:Lucida Sans Unicode ;
	font-size: 20px; ">NOVEL</button>
</form>

      <h1></h1>
      <p style="font-size: 20px; ">Book info will be listed here...</p>
    </div>
    <div class="aside"> </div>
  </div>
  <div class="footer">
    <p><b>Visit our site for all books</b> <a href="signin.php">BOOKC@RTINDIA.com</a></b></p>
  </div>
</div>

<div style="position :absolute; top :70; left: 100;font-family:Lucida Sans Unicode;background: #FFFF66;
    border-radius: 0.4em; padding :4px;
    border: 1px solid #191919;  font-size:15px;
    box-shadow:
        inset 0 0 2px 1px rgba(255,255,255,0.08),
        0 16px 10px -8px rgba(0, 0, 0, 0.6);  ">supply category or bookname here to see the details of books......</div>
</body>


<?php
}
else
{
  include 'loginform.inc.php';
}

?>
