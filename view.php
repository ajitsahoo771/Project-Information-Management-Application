<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$Pid = $_GET['Pid'];
  $select = mysql_query("SELECT * FROM projects WHERE Pid = $Pid");
        $row2 = mysql_fetch_array($select);
        $a = $row2['Name']; 
        $b = $row2['Sdate'];
        $c = $row2['Edate']; 
        $d = $row2['Pcat']; 
        $e = $row2['Pman'];
        $f = $row2['Cost'];
        $select = mysql_query("SELECT suppliers.*,parts.*,warehouse.* FROM parts JOIN suppliers ON suppliers.Sid = parts.Sid JOIN warehouse ON warehouse.Wid=parts.Wid where Wno='$a'");
             
        $select1 = mysql_query("SELECT * FROM projects WHERE Pid = $Pid");
        $row3 = mysql_fetch_array($select);
        $a = $row2['Name']; 
        $b = $row2['Sdate'];
      
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Project</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    </head>
   <script src="tableToExcel.js"></script>
    <body>
        <div class="container">
             
                 <?php include("header.php"); ?>
	
	<span class="bann-line"> </span>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
	
	<div class="work-bottom"> 
         
        <span class="work-strip">Project Details</span>
       
<!--banner end here-->
 </div> 
    </body>
</html>

