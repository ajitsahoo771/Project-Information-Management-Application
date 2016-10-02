<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
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
	<span class="work-strip">Supplier's Details</span>
        <div class='insert'>
         <form action="" name="sup" method="post">
            State : <select name="state" required style="width:20% ; margin-left:10px" >
                    <option></option>
                    <option value="Delhi">Delhi</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Chattisgarh">Chattisgarh</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    
                   </select><br></br>
            <input type="submit" name="submit" value='Filter' /></br></br>
        </form></div>
            <table id="testTable" class = "table" style="background-color: #dff1f1 ;width:900px;margin-left:230px" id="tblData">
               <caption hidden>Supplier's Details</caption>
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         <td>Name</td> 
         <td>Email Id</td> 
         <td>Contact Number</td> 
         <td>State</td>
         <td>City</td>
         <td>Pincode</td>
         </tr>
   </thead>
   
   <tbody>
       <tr>
            <?php 
             if(isset($_POST['submit']))
             {
                 $a=$_POST['state'];
                 $select=mysql_query("SELECT * FROM suppliers where State='$a'");
                 }
             else
                 {
                 
              $select = mysql_query("SELECT * FROM suppliers");
             }
             if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
         <td><?php echo $row2['SName']; ?></td>
         <td><?php echo $row2['Email']; ?></td>
         <td><?php echo $row2['Phone']; ?></td>
         <td><?php echo $row2['State']; ?></td>
         <td><?php echo $row2['City']; ?></td>
         <td><?php echo $row2['Pincode']; ?></td>
        <?php
       }
       ?>
      </tr>
   </tbody>
</table>
   <br>
<div class="insert">
         <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">
</div>        
<!--banner end here-->
 </div> 
    </body>
</html>
