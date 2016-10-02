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
        <title>Home</title>
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
</head>
   <script src="tableToExcel.js"></script>
   
   
  <script LANGUAGE="JavaScript">
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
        </tr>
        
         


<?php
}}
}
?>
 </table>
         <br>
                                    <div class="insert">
                                    <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" value="Export to Excel">
                                    </div>
<!--banner end here-->

 </div> 
    </body>
</html>
