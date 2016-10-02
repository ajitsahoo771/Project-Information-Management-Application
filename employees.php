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
        <title>Employee</title>
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
     <script type="text/javascript" src="js/jquery.min.js"></script>
     <script type="text/javascript">
   <!--
      // Form validation code will come here.
      function myfunction()
      {
      
         if( document.getElementById("dept").value == "" )
         {
            alert( "Please provide your name!" );
            document.filter1.dept.focus() ;
            return false;
         }
         
         if( document.getElementById("desg").value == "" )
         {
            alert( "Please provide your Email!" );
            document.filter1.desg.focus() ;
            return false;
         }
         
         
       
      }
   //-->
</script>
    <body>
        <div class="container">
             
                 <?php include("header.php"); ?>
	
	<span class="bann-line"> </span>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
	      
           <span class="work-strip">Employee's Details</span>
           <div class="insert">
            <form action="" method="post" name="filter1" >
               Department : 
               <select name='dept' required style='width:20% ;margin-left:40px' value=''>
                   <option></option>
                   <option value="Production">Production</option>
                   <option value="Marketing">Marketing</option>
                   <option value="Human Resource">Human Resource</option>
                   <option value="Information Technology">Information Technology</option>
                   <option value="Finance & Administration">Finance & Administration</option>
                   <option value="Research & Development">Research & Development</option>
                   
               </select>
                Designation : <select name='desg' required style='width:20%;margin-left:35px 'value=''>
                   <option></option>
                   <option value="Staff">Staff</option>
                   <option value="Quality Director">Quality Director</option>
                   <option value="Operation Manager">Operation Manager</option>
                   <option value="Marketing Manager">Marketing Manager</option>
                   <option value="Accounting Manager">Accounting Manager</option>
                   <option value="Human Resource Manager">Human Resource Manager</option>
                   
                  
                  </select></br>
                  </br>
               <input type="submit" name="filter" value='Filter' onclick="return myfunction()">
           </form></br></div>
            <table id="testTable" class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
                 <caption hidden>Employee's Details</caption>
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         <td>Name</td> 
         <td>Email Id</td> 
         <td>Department</td> 
         <td>Designation</td>
         <td>Date Of Birth</td>
         <td>Contact Number</td> 
         <td>Address</td>
         <td>Salary</td>
        </tr>
   </thead>
   
   <tbody>
       <tr>
              <?php 
               if(isset($_POST["filter"]))
             {
                 $dept=$_POST['dept'];
                $desg=$_POST['desg'];
                 $select=mysql_query("SELECT * FROM employee WHERE Desg='$desg' AND Dept='$dept'");
             }
 else {
     
              $select = mysql_query("SELECT * FROM employee");
 }
       if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
         
         <td><?php echo $row2['EName']; ?></td>
         <td><?php echo $row2['Email']; ?></td>
         <td><?php echo $row2['Dept']; ?></td>
         <td><?php echo $row2['Desg']; ?></td>
         <td><?php echo $row2['Dob']; ?></td>
         <td><?php echo $row2['Phone']; ?></td>
         <td><?php echo $row2['Address']; ?></td>
         <td><?php echo $row2['Salary']; ?></td>        
       <?php
       }
       ?>
      </tr>
   </tbody>
</table><br>
<div class="insert">
         <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">
</div><br><br>
<div class="insert">
 <form action="" method="post" name="filter2" onsubmit="return(validate());">
              Average Salary of Department : 
               <select name='dept' required style='width:20% ;margin-left:40px' value=''>
                   <option></option>
                   <option value="Production">Production</option>
                   <option value="Marketing">Marketing</option>
                   <option value="Human Resource">Human Resource</option>
                   <option value="Information Technology">Information Technology</option>
                   <option value="Finance & Administration">Finance & Administration</option>
                   <option value="Research & Development">Research & Development</option>
                 </select>
              <input type="submit" name="filter1" value='Submit'><br><br>
              </div>
<table id="testTable" class = "table" style="background-color: #dff1f1 ;width:800px;margin-left:300px" id="tblData">
                 <caption hidden>Employee's Details</caption>
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         <td>Department</td> 
         <td>Average Salary</td>
        </tr>
   </thead>
   
   <tbody>
       <tr>
              <?php 
               if(isset($_POST["filter1"]))
             {
                 $dept=$_POST['dept'];
                $select=mysql_query("SELECT Dept,Avg(Salary) FROM employee Group By Dept having Dept='$dept'");
             }
       if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
         
         <td><?php echo $row2['Dept']; ?></td>
         <td><?php echo $row2['Avg(Salary)']; ?></td>
         <?php
       }
       ?>
      </tr>
   </tbody>
</table><br>
<br>
               
</div>
<!--banner end here-->
 </div> 
    </body>
</html>
