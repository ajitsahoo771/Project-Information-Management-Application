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
        <title>Parts</title>
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
	<span class="work-strip">Parts Details</span>
        <div class='insert'>
         <form action="" method="post" name="form1">
             Warehouse Number : &nbsp; &nbsp;<?php
                   
                    $query = "SELECT Wid, Wno FROM warehouse";
                    $result = mysql_query ($query);
                    echo "<select name='wno' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Wno'].">".$r['Wno']."</option>"; 
                    }
                    echo "</select>";
                ?><br><br>
              <input type="submit" name="submit" value='Filter' />
        </form></div><br>
        
            <table id="testTable" class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
                
                 <caption hidden>Parts Details</caption><thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         
         <td>Name</td>
         <td>Model Id</td>
         <td>Manufacture Date</td>
         <td>Expiry Date</td>
         <td>Supplier Name</td>
         <td>Warehouse Number</td>
          <td>Warehouse Location</td>
         </tr>
   </thead>
   
   <tbody>
       <tr>
               <?php 
             if(isset($_POST['submit']))
             {
                 
                       $a=$_POST['wno'];
                       $select = mysql_query("SELECT suppliers.*,parts.*,warehouse.* FROM parts JOIN suppliers ON suppliers.Sid = parts.Sid JOIN warehouse ON warehouse.Wid=parts.Wid where Wno='$a'");
             }
 else {
             
             $select = mysql_query("SELECT suppliers.*,parts.*,warehouse.* FROM parts JOIN suppliers ON suppliers.Sid = parts.Sid JOIN warehouse ON warehouse.Wid=parts.Wid");
 }
       if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
         
         <td><?php echo $row2['PName']; ?></td>
         <td><?php echo $row2['Modid']; ?></td>
         <td><?php echo $row2['Mdate']; ?></td>
         <td><?php echo $row2['Edate']; ?></td>
         <td><?php echo $row2['SName']; ?></td>
         <td><?php echo $row2['Wno']; ?></td>
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
