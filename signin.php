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
</head>

<body bgcolor="#00CC00">

<div class="container">
  <div class="header"><!-- InstanceBeginEditable name="header" --><img src="images/WIPO banner.jpg" width="960" height="200" alt="woman" /><!-- InstanceEndEditable --><!-- end .header --></div>
  <ul id="MenuBar1" class="MenuBarHorizontal">
    <li><a href="signin.php">Home</a>    </li>
    <li><a href="category.php" >Categories</a>
    </li>
    <li><a href="contact.php">Contact us</a>    </li>
</ul>
  <div class="content"><!-- InstanceBeginEditable name="EditRegion4" -->
  <h1> Welcome to BOOK C@RT INDIA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php">Log out</a> </h1>
  <h2> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Shopping is safe, fun and simple here !!!!</h2>
  <p><b>This site is Of the students,For the students,By the students</b></p>
  <h3>About Books</h3>
  <p>If your favourite kind of journey is one that lets you lose yourself between the pages of the book, if you believe that the scent of an old book is the most enchanting fragrance in the universe, then you are a bibliophile.  Our online bookstore creates a virtual space that is every book lover's private paradise.
Dante's Inferno from the 14th century, Dan Brown's Inferno from 2013 and everything in between are available in our exhaustive collection of books. So that you don't lose yourself in the labyrinth, we have them neatly compartmentalized into categories and genres.
<img src="images/girl.png" alt="recycle" width="365" height="470" align="right" /><br/></p>
   <h3>Fiction</h3>
   <p>Our fiction catalogs juggle between classics and bestsellers and allow Shakespeare and J.K Rowling to coexist,so that there is a book that matches your comfort zone.  Pick your favourite from our shelves that feature mystery, thriller, science fiction, short stories, sex and erotica and more.  Set out on a roller-coaster ride of adventure and romance with our top authors like Amish Tripathi, Jeffrey Archer, Chetan Bhagat and Ravinder Singh.
</p>
   <h3>Non-Fiction</h3>
   <p>For an aspiring Nigella Lawson we have cook books. Books that deal with business & technology are for executives, while we help out the professionals of tomorrow with entrance material. Self help and health & fitness focus on grooming you physically and psychologically. Books on religion and philosophy join in on your quest to unravel the deeper philosophies of life. If you're into living life on the edge, sports & adventure and travel narratives are chosen to inspire you. In short there's a book on what you love to do, no matter what.
</p>
   <h3>Children's Literature</h3>
   <p>The best gift you can ever give your children is to let them fall in love with books. Classics, folktales, illustrated books, fairy tales, comics & graphic novels, fantasy and magic, detective stories, legends, myths and fables are just a few of the collections that will transform this platform into your child's favourite virtual hideout.
</p>
   <p>Even though every book is worth the wait we know the sooner you get to read it the better, which is why we have a pre-order option. Best things come in large packages with our book combos. Our new releases help you catch up with the current favourites, and if you'd rather listen to the stories, we have audio books.</p>
  <!-- InstanceEndEditable --><!-- end .content --></div>
  <h3>Costumer Testimonials</h3>
  <p >I am really glad with my shopping experience at <a href ="signin.php">BOOKC@RT INDIA </a>wbbsite website. The delivery is prompt and the free shipping across India policy is always the icing on the cake. -<b> Mr.T.Satish,Brahmapur.</b></p>
<p>I want to convey my heartfelt thanks to the entire team of <b>BOOKC@RT INDIA</b> website. Every time I buy books from here, I am pleasantly surprised by the ease of shopping, prompt delivery and excellent condition of books.
This is by far the best website I have come across for buying books and I am sure it will remain so in the years to come-<b> Mr. Sajan Sahu</b>,Odisha</p>
  <div class="footer"><!-- InstanceBeginEditable name="footer" -->
    <p>Copyrights are resrved under  <a href="signin.php" STYLE="text-decoration: none; "> bookc@rtindia.com</a></p>
  <!-- InstanceEndEditable --><!-- end .footer --></div>
<!-- end .container --></div>
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
