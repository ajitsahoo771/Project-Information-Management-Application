<?php
session_start();
session_destroy();
session_unset();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.min.js"></script>
    <link href="css/style_1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".username").focus(function() {
		$(".user-icon").css("left","-48px");
	});
	$(".username").blur(function() {
		$(".user-icon").css("left","0px");
	});
	
	$(".password").focus(function() {
		$(".pass-icon").css("left","-48px");
	});
	$(".password").blur(function() {
		$(".pass-icon").css("left","0px");
	});
});
</script>
 </head>
    <body>
        <div class="mothergrid">
	<div class="container">
           
		<?php include 'header_1.php'; ?>

	<div class="clearfix"> 	</div>
	<span class="bann-line"> </span>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
    <div id="wrapper">

    <div class="user-icon"></div>
    <div class="pass-icon"></div>
   
<form name="login-form" class="login-form"  method="post" action="checklogin.php">

    <div class="header">
    <h1>Admin Login</h1>
   <span>Fill out the form below to login.</span>
    </div>
    <div class="content">
    <input name="userid" type="text" class="input username" placeholder="User Id" onfocus="this.value=''" required="required"/>
   <input name="password" type="password" class="input password" placeholder="Password" onfocus="this.value=''" required="required"/>
   </div>
    <div class="footer">
    <input type="submit" name="submit" value="Login" class="button" />
  
    </div>
</form>
</div>
    
<!--banner end here-->
<!--copyright start here-->

  </div>

<!--copyright end here-->
    </body>
</html>
