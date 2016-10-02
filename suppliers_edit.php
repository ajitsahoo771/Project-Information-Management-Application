<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
?>
<?PHP
 $con=mysql_connect("localhost","root","");
            mysql_select_db("pima",$con);
            $id = $_GET['id'];
        $select = mysql_query("SELECT * FROM suppliers WHERE Sid=$id");
        $row2 = mysql_fetch_array($select);
        $a = $row2['SName'];
        $b = $row2['Email'];
        $c = $row2['Phone'];
        $d = $row2['State'];
        $e = $row2['City'];
        $f = $row2['Pincode'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Supplier</title>
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
	<span class="work-strip">Insert New Supplier</span>
	<span class="line"> </span>
	<div class="work-bottom"> 
         
            
         <div class="insert">
	 <form name="p" action="" method="POST">
		Supplier Name : <input type="text" value='<?php echo $a ?>' required name="sname" style="width:20%;"/>
                Email Id : <input type="email" value='<?php echo $b ?>' required name="semail" style="width:20%;"/>
                <br>Contact Number : <input type="number" value='<?php echo $c ?>' required name="num" style="width:20%"/>
                State : <select name="state" value='' required style="width:20% ; margin-left:10px" >
                    <option><?php echo $d ?></option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Chattisgarh">Chattisgarh</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    
                   </select>
                <br>City : <input type="text" name="city" value='<?php echo $e ?>' required style="width:20%;margin-top: 15px;margin-left: 80px"/>
                Pincode : <input type="number" name="pincode" value='<?php echo $f ?>' required style="width:20%;margin-top: 15px"/>
                <br><br><input type="submit" name="submit" value="Update" />
	</form>	
              <?php
             if(isset($_POST['submit']))
             {
                 $sname = $_POST['sname'];
                 $semail = $_POST['semail'];
                 $num = $_POST['num'];
                 $state = $_POST['state'];
                 $city = $_POST['city'];
                 $pincode = $_POST['pincode'];
                 $update=  mysql_query("Update suppliers set Sname='$sname',Phone='$num',Email='$semail',State='$state' ,City='$city',Pincode = '$pincode' WHERE Sid=$id ");
                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Suppliers Details Edited!!!')
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
