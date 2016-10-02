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
        <div class="insert">
                                    <form name="filter" method="post">
                                        Project Start From : <input type="date" name="d1" required style="width:20%;margin-left: 50px" />
                To : <input type="date" name="d2" required style="width:20%;margin-left: 20px" />
                <br>
                <br><input type="submit" name="submit" id="" value="Filter">
                                    </form></div><br>
                                        <table id="testTable" class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
                                            <caption hidden>Project Details</caption>
                                            <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
                                  <tr>
                                     <!--<th>Project Id</th>-->
                                     <td>Project Name</td>
                                     <td>Project Category</td>
                                     <td>Start Date</td>
                                     <td>Expected End Date</td>
                                     <td>Project Manager</td>
                                     <td>Estimated Cost</td> 
                                     
                                  </tr>
                               </thead>

                               <tbody>
                                   <tr>
                                                                  <?php 
                                         if(isset($_POST['submit']))
                                         {
                                             $date1 = $_POST['d1'];
                                             $date2 = $_POST['d2'];
                                             $select=mysql_query("SELECT * FROM projects where Sdate BETWEEN '$date1' and '$date2'");
                                          }
                                         else{
                                         $select = mysql_query("SELECT projects.* FROM projects");
                                         }
                                   if($select === FALSE) { 
                                   die(mysql_error());}
                                   while($row2 = mysql_fetch_array($select))
                                   { 
                                    ?>
                                  <tr>
                                    <!-- <td><?php echo $row2['Pid']; ?></td>-->
                                     <td><a href="view.php?Pid=<?php echo $row2['Pid']; ?>"><?php echo $row2['Name']; ?></td>
                                     <td><?php echo $row2['Pcat']; ?></td>
                                     <td><?php echo $row2['Sdate']; ?></td>
                                     <td><?php echo $row2['Edate']; ?></td>
                                     <td><?php echo $row2['Pman']; ?></td>
                                     <td><?php echo $row2['Cost']; ?></td>
                                    
                                   <?php
                                   }
                                   ?>
                                  </tr>
                               </tbody>
                            </table><br>
                                    <div class="insert">
                                    <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">
                                    </div>
</div>
<!--banner end here-->
 </div> 
    </body>
</html>
