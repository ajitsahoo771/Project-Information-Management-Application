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
	<span class="work-strip">Warehouse Details</span>
        <div class='insert'>
         <form action="" method="post" name="warehouse">
             
          Location: &nbsp; &nbsp;<?php
                   
                    $query = "SELECT Address FROM warehouse";
                    $result = mysql_query ($query);
                    echo "<select name='loc' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Address'].">".$r['Address']."</option>"; 
                    }
                    echo "</select>";
                ?>
            <input type="submit" name="submit" value='Filter'/></br></br>
        </form></div>
            <table id="testTable" class = "table" style="background-color: #dff1f1 ;width:600px;margin-left:380px" id="tblData">
             <caption hidden>Warehouse Details</caption>
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         
         <td>Warehouse Number</td> 
         <td>Capacity</td> 
         <td>Location</td>
         </tr>
   </thead>
   
   <tbody>
       <tr>
             
             <?php 
             if(isset($_POST['submit']))
             {  
                 
            $a=$_POST['loc'];            
             $select = mysql_query("SELECT * FROM warehouse where Address='$a'");
             }
 else {
     $select=mysql_query("SELECT * FROM warehouse");
 }
       if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
        <td><?php echo $row2['Wno']; ?></td>
         <td><?php echo $row2['Capacity']; ?></td>
         <td><?php echo $row2['Address']; ?></td>
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
