<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
?>
<?php
        $con=mysql_connect("localhost","root","");
        mysql_select_db("pima",$con);
        $id=$_GET['id'];
        $select = mysql_query("SELECT * FROM warehouse WHERE Wid=$id");
       $row2 = mysql_fetch_array($select);
       $a =  $row2['Wno'];
       $b = $row2['Capacity'];
       $c = $row2['Address'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Warehouse</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
	<span class="work-strip">Insert New Warehouse</span>
	<span class="line"> </span>
	<div class="work-bottom"> 
         
            
         <div class="insert">
	 <form name="p" action="" method="POST">
		Warehouse Number : <input type="text" required name="wnum" readonly value='<?php echo $a ?>' style="width: 20%"/>
                Capacity : <input type="text" required name="capacity" value='<?php echo $b ?>' style="width: 20%"/>
                <br>Location : <input type="text" required name="location" value='<?php echo $c ?>'style="width: 20%;margin-top: 10px;"/>
                <br><br><input type="submit" name="submit" value="Update" />
	</form>	
             <?php
             if(isset($_POST['submit']))
             {
                 $wno = $_POST['wnum'];
                 $capacity = $_POST['capacity'];
                 $loc = $_POST['location'];
                 $update=  mysql_query("Update warehouse set Wno='$wno' , Capacity = '$capacity' , Address = '$loc' WHERE Wid='$id' ");
                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Warehouse Details Edited!!!')
                                                    window.location.href='edit.php'
                                                    </SCRIPT>");
              }   
             ?>
	</div>   
                    
      </div>
<!--banner end here-->
 </div> 
    </body>
</html>

