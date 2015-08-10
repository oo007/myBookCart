<?php
require 'connect.inc.php';
require 'current.inc.php';

if(loggedin())                               
{
  $firstname =  getuserfield('firstname') ;
  $lastname =   getuserfield('lastname');
 // echo 'Welcome  '.$firstname.' '.$lastname.'...<a href="logout.php">Log out</a>'  ;
  //header('Location:index.html');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/cart.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	margin: 0;
	padding: 0;
	color: #000;
	background-color: #42413C;
	background-image: url(images/bkgd.jpg);
	background-attachment: fixed;
	background-position: top;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { /* Due to variations between browsers, it's best practices to zero padding and margin on lists. For consistency, you can either specify the amounts you want here, or on the list items (LI, DT, DD) they contain. Remember that what you do here will cascade to the .nav list unless you write a more specific selector. */
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 /* removing the top margin gets around an issue where margins can escape from their containing div. The remaining bottom margin will hold it away from any elements that follow. */
	padding-right: 15px;
	padding-left: 15px; /* adding the padding to the sides of the elements within the divs, instead of the divs themselves, gets rid of any box model math. A nested div with side padding can also be used as an alternate method. */
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #42413C;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #6E6C64;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ this fixed width container surrounds the other divs ~~ */
.container {
	width: 960px;
	margin: 0 auto; /* the auto value on the sides, coupled with the width, centers the layout */
	background-color: #FFF;
}

/* ~~ This is the layout information. ~~ 

1) Padding is only placed on the top and/or bottom of the div. The elements within this div have padding on their sides. This saves you from any "box model math". Keep in mind, if you add any side padding or border to the div itself, it will be added to the width you define to create the *total* width. You may also choose to remove the padding on the element in the div and place a second div within it with no width and the padding necessary for your design.

*/

.content {
	padding: 10px 0;
	background-image: url(images/bkgdContent.jpg);
}

/* ~~ The footer ~~ */
.footer {
	padding: 10px 0;
	background: #CCC49F;
}

/* ~~ miscellaneous float/clear classes ~~ */
.fltrt {  /* this class can be used to float an element right in your page. The floated element must precede the element it should be next to on the page. */
	float: right;
	margin-left: 8px;
}
.fltlft { /* this class can be used to float an element left in your page. The floated element must precede the element it should be next to on the page. */
	float: left;
	margin-right: 8px;
}
.clearfloat { /* this class can be placed on a <br /> or empty div as the final element following the last floated div (within the #container) if the #footer is removed or taken out of the #container */
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
h1 {
	font-size: 24px;
	color: #00F;
}
h2 {
	font-size: 18px;
	color: #F0F;
}
h1,h2,h3,h4,h5,h6 {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
body,td,th {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
-->
</style>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
<!-- InstanceParam name="content" type="boolean" value="true" -->
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body bgcolor="#00CC00">

<div class="container">
  <div class="header"><!-- InstanceBeginEditable name="header" --><img src="images/Book-On-Grass.jpg" width="960" height="200" alt="woman" /><!-- InstanceEndEditable --><!-- end .header --></div>
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a href="signin.php">Home</a>    </li>
    <li><a href="category.php" >Categories</a></li>
    <li><a href="contact.php">Contact us</a>    </li>
</ul>
  <div class="content"><!-- InstanceBeginEditable name="content" -->
    <h1>Contact us &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <a href="logout.php">Log out</a></h1>
    <p>We are always happy to hear from you. If you have any  questions or comments, feel free to contact us by 
    using the form below&nbsp;and  we will get back to you soon.</p>
    <table height="147"  cellpadding="0" cellspacing="0">
      <tr>
        <td width="193" height="145" valign="top"><p align="right">&nbsp;</p></td>
        <td width="700" valign="top">
        <form id="form" name="form" method="post" action="contact.php">
          <p><span id="nametextfield">
          <label for="name4"></label>
          <input type="text" name="name" size=60id="name4" />
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
          <p><span id="emailtextfield">
          <label for="email"></label>
          <input type="text" name="email" size=60 id="email" />
          <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldMinCharsMsg">Minimum number of characters not met.</span><span class="textfieldMaxCharsMsg">Exceeded maximum number of characters.</span><span class="textfieldInvalidFormatMsg">Invalid format.</span></span></p>
          <p><span id="messagetext">
          <label for="message"></label>
          <textarea name="message" id="message" cols="45" rows="5"></textarea>
          <span id="countsprytextarea1">&nbsp;</span><span class="textareaRequiredMsg">A value is required.</span><span class="textareaMinCharsMsg">Minimum number of characters not met.</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span></span></p>
          <p>
            <input type="submit" name="submit" id="submit" value="Submit" />
          </p>
        </form>          <p>&nbsp;</p></td>
      </tr>
    </table>
<p>&nbsp;</p>
  <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("nametextfield", "none", {minChars:1, maxChars:50, hint:"name", validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("emailtextfield", "email", {minChars:1, maxChars:50, validateOn:["blur"], hint:"email"});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("messagetext", {minChars:1, maxChars:400, counterType:"chars_count", counterId:"countsprytextarea1"});
  </script>
  <!-- InstanceEndEditable -->
  <!-- end .content --></div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
<!-- InstanceEnd --></html>

<?php
}
else
{
  include 'loginform.inc.php';
}
?>