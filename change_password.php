<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Change Password</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/bootstrap.min.js"></script>
<script>
$(document).ready(function()
{
	$('#search').keyup(function()
	{
		searchTable($(this).val());
	});
});

function searchTable(inputVal)
{
	var table = $('#tblData');
	table.find('tr').each(function(index, row)
	{
		var allCells = $(row).find('td');
		if(allCells.length > 0)
		{
			var found = false;
			allCells.each(function(index, td)
			{
				var regExp = new RegExp(inputVal, 'i');
				if(regExp.test($(td).text()))
				{
					found = true;
					return false;
				}
			});
			if(found == true)$(row).show();
				else $(row).hide();
		}
	});
}
</script>

    
    </head>
    <body>
        
	<div class="container">
             
                 <?php include("header.php"); ?>
	<div class="clearfix"> 	</div>
	<span class="bann-line"> </span>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
	
	<div class="work-bottom"> 
           
                        <span class="work-strip">Change Password</span>
	<span class="line"> </span>                   
         <div class="insert">
	 <form name="p" action="forgot.php" method="POST">
		Old Password : <input type="password" required name="password"  style="width:20%;margin-left: 27px "/>
                New Password :<input type="password" required name="password1"  style="width:20%;margin-left: 27px "/>
                </br></br><input type="submit" name="submit" value="Change" />
	</form>	
	</div>   
        
    </div>
<!--banner end here-->

 </div> 
    </body>
</html>
