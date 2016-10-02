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
        <title>Edit</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/bootstrap.min.js"></script>
</head><script LANGUAGE="JavaScript">
function ValidateForm(form){
ErrorText= "";
if ( ( form.type[0].checked == false ) && ( form.type[1].checked == false ) ) 
{
alert ( "Please choose Employee or Parts of the project" ); 
return false;
}
if (ErrorText= "") { form.submit() }
}
</script>
   

    <body>
        
	<div class="container">
             
                 <?php include("header.php"); ?>
	
	<span class="bann-line"> </span>
</div>
<!--header end here-->
<!--banner start here-->
<div class="banner">
	<div class="work-bottom"> 
            
            <ul id = "myTab" class = "nav nav-tabs" style="width:85%;margin-left:100px">
            <li class = "active">
                <a href = "#project" data-toggle = "tab" style='font-family:Bookman Old Style'>Project</a></li>
                <li><a href = "#emp" data-toggle = "tab" style='font-family:Bookman Old Style'>Employee</a></li>
           <li><a href = "#parts" data-toggle = "tab" style='font-family:Bookman Old Style'>Parts</a></li>
           <li><a href = "#suppliers" data-toggle = "tab" style='font-family:Bookman Old Style'>Suppliers</a></li> 
           <li><a href = "#warehouse" data-toggle = "tab" style='font-family:Bookman Old Style'>Warehouse</a></li>
         </ul>
    
	
<div id = "myTabContent" class = "tab-content">
<div class="tab-pane fade in active" id="project">
    <span class="work-strip">Project Details</span>
            <div class="insert">
            <form action="" method="POST" name="form">
             <?php
                    
                    $query = "SELECT Pid, Name FROM projects";
                    $result = mysql_query ($query);
                    echo "Project Name:<select name='pname' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Pid'].">".$r['Name']."</option>"; 
                    }
                    echo "</select>";
                ?>
                                  
<input type="radio" name="type" value="employee">EMPLOYEE
<input type="radio" name="type" value="parts">PARTS
<br><br>
<input type="submit" name="submit" value="Filter" onClick="ValidateForm(this.form)"><br><br>

</form>
             </div>  
    <?php
if(isset($_POST['submit']))
{

$p=$_POST['pname'];
$b=$_POST['type'];
$c="employee";
$d="parts";

if($b==$c)
{
	 $p=$_POST['pname'];
$se=mysql_query("SELECT projects.*,employee.*,projectemp.* FROM projectemp JOIN projects ON projects.Pid = projectemp.Pid JOIN employee ON employee.Eid=projectemp.Eid where projects.Pid=$p");
?>
<table id="testTable" class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
    <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
<tr>
    <td>Project Name</td>
    <td>Employee Name</td>
    <td>Email Id</td>
    <td>Department</td>
    <td>Designation</td>
    <td>Date Of Birth</td>
    <td>Contact Number</td>
    <td>Delete</td>
   </tr>
    </thead>
   <?php
while($rs1=mysql_fetch_array($se))
{
	?>
    
<tr>
         
         <td><?php echo $rs1['Name']; ?></td>
         <td><?php echo $rs1['EName']; ?></td>
         <td><?php echo $rs1['Email']; ?></td>
         <td><?php echo $rs1['Dept']; ?></td>
         <td><?php echo $rs1['Desg']; ?></td>
         <td><?php echo $rs1['Dob']; ?></td>
         <td><?php echo $rs1['Phone']; ?></td>
          <td><a href="emp_delete.php?id=<?php echo $rs1['Eid']?>"><img src="images/delete.png" width="40px"></a></td>
         </tr>
        
         


<?php
}}
 else if($b==$d) {
     
    $p=$_POST['pname'];
$se=mysql_query("SELECT projects.*,parts.*,projectparts.* FROM projectparts JOIN projects ON projects.Pid = projectparts.Pid JOIN parts ON parts.id=projectparts.id where projects.Pid=$p");
?>
<table id="testTable" class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
    <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
<tr>
    <td>Project Name</td>
    <td>Parts Name</td>
    <td>Model Id</td>
    <td>Manufacture Date</td>
    <td>Expiry Date</td>
    <td>Delete</td>
     </tr>
    </thead>
   <?php
while($rs1=mysql_fetch_array($se))
{
	?>
    
<tr>
         <td><?php echo $rs1['Name']; ?></td>
         <td><?php echo $rs1['PName']; ?></td>
         <td><?php echo $rs1['Modid']; ?></td>
         <td><?php echo $rs1['Mdate']; ?></td>
         <td><?php echo $rs1['Edate']; ?></td>
          <td><a href="parts_delete.php?id=<?php echo $rs1['id']?>"><img src="images/delete.png" width="40px"></a></td>
        </tr>
        
         


<?php
}}
}
?>
 </table>

</div>
    <div class="tab-pane fade" id="emp">
                 
           <span class="work-strip">Employee's Details</span>
            <table class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      
         <td>Name</td> 
         <td>Email Id</td> 
         <td>Department</td> 
         <td>Designation</td>
         <td>Date Of Birth</td>
         <td>Contact Number</td> 
         <td>Address</td>
         <td>Salary</td>
         <td>Edit</td>
      </tr>
   </thead>
   
   <tbody>
       <tr>
             <?php 
              $select = mysql_query("SELECT * FROM employee");
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
         <td><a href="emp_edit.php?eid=<?php echo $row2['Eid']?>&id=1"><img src="images/edit1.png" width="30px"></a></td>        
       <?php
       }
       ?>
      </tr>
   </tbody>
</table>
                 
</div>
     <div class="tab-pane fade" id="parts">
         <span class="work-strip">Parts Details</span>
            <table class = "table" style="background-color: #dff1f1 ;width:1150px;margin-left:100px" id="tblData">
                <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         
         <td>Name</td>
         <td>Model Id</td>
         <td>Manufacture Date</td>
         <td>Expiry Date</td>
         <td>Supplier Name</td>
         <td>Warehouse Number</td>
          <td>Warehouse Location</td>
         <td>Edit</td> 
      </tr>
   </thead>
   
   <tbody>
       <tr>
             <?php 
             $select = mysql_query("SELECT suppliers.*,parts.*,warehouse.* FROM parts JOIN suppliers ON suppliers.Sid = parts.Sid JOIN warehouse ON warehouse.Wid=parts.Wid");
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
         <td><a href="parts_edit.php?id=<?php echo $row2['id']?>"><img src="images/edit1.png" width="30px"></a></td>
       <?php
       }
       ?>
      </tr>
   </tbody>
</table>
                
    </div>
    <div class="tab-pane fade" id="suppliers">
                       
           <span class="work-strip">Supplier's Details</span>
            <table class = "table" style="background-color: #dff1f1 ;width:900px;margin-left:230px" id="tblData">
               <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         <td>Name</td> 
         <td>Email Id</td> 
         <td>Contact Number</td> 
         <td>State</td>
         <td>City</td>
         <td>Pincode</td>
         <td>Edit</td>
         <td>Delete</td>
      </tr>
   </thead>
   
   <tbody>
       <tr>
             <?php 
             $select = mysql_query("SELECT * FROM suppliers");
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
         <td><a href="suppliers_edit.php?id=<?php echo $row2['Sid']?>"><img src="images/edit1.png" width="30px"></a></td>
         <td><a href="suppliers_delete.php?id=<?php echo $row2['Sid']?>"><img src="images/delete.png" width="40px"></a></td>
       <?php
       }
       ?>
      </tr>
   </tbody>
</table>
                
    </div>
    <div class="tab-pane fade" id="warehouse">
                    
           <span class="work-strip">Warehouse Details</span>
            <table class = "table" style="background-color: #dff1f1 ;width:600px;margin-left:380px" id="tblData">
               <thead style="color: #0073ff;font-family:Bookman Old Style;font-weight: 550">
      <tr>
         
         <td>Warehouse Number</td> 
         <td>Capacity</td> 
         <td>Location</td>
         <td>Edit</td>
      </tr>
   </thead>
   
   <tbody>
       <tr>
             <?php 
             $select = mysql_query("SELECT * FROM warehouse");
       if($select === FALSE) { 
       die(mysql_error());}
       while($row2 = mysql_fetch_array($select))
       { 
        ?>
      <tr>
        <td><?php echo $row2['Wno']; ?></td>
         <td><?php echo $row2['Capacity']; ?></td>
         <td><?php echo $row2['Address']; ?></td>
         <td><a href="warehouse_edit.php?id=<?php echo $row2['Wid']?>" ><img src="images/edit1.png" width="30px"></a></td>
         
       <?php
       }
       ?>
      </tr>
   </tbody>
</table>
               
    </div>
<!--banner end here-->

 </div> 
    </body>
</html>
