<?php
require 'current.inc.php';
require 'connect.inc.php';

if(!loggedin())
{
  if(isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) &&isset($_POST['age'])&& isset($_POST['password'])&& isset($_POST['password_again']))
  {
     $username=$_POST['username'];
     $firstname=$_POST['firstname'];
     $lastname=$_POST['lastname'];
     $age=$_POST['age'];
     $password=$_POST['password'];
     $password_again=$_POST['password_again'];
     
     if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($age) && !empty($password) && !empty($password_again))
     { if($password!= $password_again)
       {
         echo '<div style="position :absolute; top :5; left: 550;color:red;font-size:20px; ">Passwords don\'t match..... </div>';
       }
       else
       {
         $query="SELECT UserName FROM persons WHERE UserName = '".mysql_real_escape_string($username)."'";
         if($query_run = mysql_query($query))
         {
                $query_num_rows =  mysql_num_rows($query_run);
                if($query_num_rows == 1)
                {
                  echo '<div style="position :absolute; top :5; left: 550;color:red;font-size:20px; ">The username '. $username .' already exists....</div>';
                }
                else
                {
                  $query = "INSERT INTO persons VALUES ('','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($lastname)."','".mysql_real_escape_string($age)."','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password)."')" ;
                  if($query_run = mysql_query($query))
                  {
                    header('Location:signin.php');
                  }
                  else
                  {
                    echo '<div style="position :absolute; top :5; background: #FFFF99;
       border-radius: 0.4em; padding :3px;border:solid yellow 2px;left: 550;color:#000099 ;font-size:20px; ">Sorry,Try again....</div>';
                  }
                }
         }
       }
     }
     else
     {
       echo '<div style="position :absolute; top :5; background: #FFFF99; 
       border-radius: 0.4em; padding :3px;border:solid yellow 2px;left: 550;color:#000099 ;font-size:20px;">ALL Fields are required....</div>' ;
     }
  }
?>
<div id="signup-form">
        
        <!--BEGIN #subscribe-inner -->
        <div id="signup-inner">
        
        	<div class="clearfix" id="header">
        	
        		<img id="signup-icon" src="./images/signup.png" alt="" />

                <h1>Sign up to Bookcart FREE Today!</h1>

            
            </div>
			<p>Please complete all the fields below</p>

            
            <form id="send" action="register.php" method="POST">
            	
                <p>

                <label for="name">UserName *</label>
                <input id="name" type="text" name="username" value="<?php if(isset($username)){echo $username; }?>" />
                </p>
                
                <p>
                <label for="company">FirstName</label>
                <input id="company" type="text" name="firstname" value="<?php if(isset($firstname)){echo $firstname;} ?>" />
                </p>

                <p>

                <label for="email">LastName</label>
                <input id="email" type="text" name="lastname" value="<?php if(isset($lastname)){echo $lastname;} ?>" />
                </p>
                
                <p>
                <label for="website">Password</label>
                <input id="website" type="password" name="password" value="<?php if(isset($age)){echo $age; }?>" />
                </p>
                
                <p>
                <label for="phone">Re-enter Password</label>
                <input id="phone" type="password" name="password_again" value="" />
                </p>
                
                <p>
                <label for="country">Age</label>
                <input id="Country" type="number" name="age" value="" />
                </p>
              
                
                <p>


                <input id="submit"type = "submit" value = "submit" >
                </p>

            </form>

		<div id="required">
		<p>* Required Fields<br/>
		NOTE: Your both passwords should match....<br/>
                  <h4>AFTER registering You have to sign in shortly....</h4></p>
		</div>


            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>
 <div style="position :absolute; top :30; left: 1200; "><a href="signin.php"STYLE="text-decoration: none;">
              <img src="images/home.png" alt="Photo not available..." width="90" height="90"></a></div>
<?php
}
else
{
  echo 'You are already registered and logged in';
}
?>  
<style>
body {
	background:url("images/123.jpg");  	float: right;  margin-right:100px;
}
body, input, textarea { 
	font: 14px/24px Helvetica, Arial, sans-serif; 
	color: #666;
}
input { 
	width: 60%;
}
form {
	margin: 30px 0 0 0  ;

}
input, textarea { 
	background: none repeat scroll 0 0 #FFFFFF; 
	border: 1px solid #C9C9C9; 
	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15) inset, -5px -5px 0 0 #F5F5F6, 5px 5px 0 0 #F5F5F6, 5px 0 0 0 #F5F5F6, 0 5px 0 0 #F5F5F6, 5px -5px 0 0 #F5F5F6, -5px 5px 0 0 #F5F5F6; 
	color: #545658; 
	padding: 8px; 
	font-size: 14px; 
	border-radius: 2px 2px 2px 2px; 
}
#submit {
	background: url("../images/submit_bg.gif") repeat-x scroll 0 0 transparent; 
	border: 1px solid #B7D6DF; 
	border-radius: 2px 2px 2px 2px; 
	box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1); 
	color: #437182; 
	cursor: pointer; 
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; 
	font-size: 14px;
	font-weight: bold; 
	height: auto; 
	padding: 6px 10px; 
	text-shadow: 0 1px 0 #FFFFFF; 
	width: auto; 
}
#submit:hover { 
	background: url("../images/submit_hover_bg.gif") repeat-x scroll 0 0 transparent; 
	border: 1px solid #9FBAC0; 
	cursor: pointer; 
}
a { 
	color: #88BBC8; 
	text-decoration: none; 
}
a:hover { 
	color: #f26525 
}
#signup-form { 
	width: 510px; 
	margin: 0 auto;
	margin-top: 50px; 
	margin-bottom: 50px;
	background: #fff; 
	padding: 40px; 
	border: 10px solid #f2f2f2; 
}
#signup-icon { 
	float: right; 
	width: 48px; 
	height: 48px; 
}
h1, h2, h3, h4, h5, h6 { 
	margin: 0; 
	padding: 0; 
	color: #444; 
}
h1 { 
	float: left; 

	font-size: 24px; 
	line-height: 34px; 
}
h2.secondary { 
	float: left; 
	width: 260px; 
	font-size: 16px; 
	font-weight: normal; 
	color: #999; 
	margin-bottom: 30px; 
	line-height: 26px; 
}
h3 { 
	margin: 30px 0 0 0 
}
.clearfix:after { 
	content: "."; 
	display: block; 
	height: 0; 
	clear: both; 
	visibility: hidden; 
}
.clearfix { 
	display: inline-block 
} /* Hide from IE Mac \*/
.clearfix { 
	display: block; 
} /* End hide from IE Mac */
.none { 
	display: none; 
} /* End Clearfix _NO__DOTCOMMA__AFTER__*/

#header { 
	margin: 0 0 30px 0; 
	border-bottom: 1px solid #efefef; 
}
#send p { 
	margin-bottom: 20px 
}
textarea { 
	width: 95%; 
	margin: 0 0 0 2px; 
}
#required p{
	font-size:10px;
}
#apply { 
	border-top: 1px solid #efefef; 
	margin-top: 30px; 
	padding: 20px 0 0 0; 
}
#apply ul { 
	margin-bottom: 50px 
}
form label { 
	display: block; 
	margin-bottom: 5px; 
	font-weight: bold; 
	font-size: 12px; 
}
</style>