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
        <title>Insertion</title>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="bootstrap/bootstrap.min.css" rel="stylesheet">
<script src="bootstrap/bootstrap.min.js"></script>

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
	
	<div class="work-bottom"> 
           
                <ul id = "myTab" class = "nav nav-tabs" style="width:85%;margin-left:100px">
   <li class = "active">
      <a href = "#project" data-toggle = "tab">Project</a>
   </li>
   <li><a href = "#emp" data-toggle = "tab">Employee</a></li>
  <li><a href = "#parts" data-toggle = "tab">Parts</a></li>
  <li><a href = "#suppliers" data-toggle = "tab">Suppliers</a></li> 
  <li><a href = "#warehouse" data-toggle = "tab">Warehouse</a></li>
</ul>

<div id = "myTabContent" class = "tab-content">

   <div class = "tab-pane fade in active" id = "project">
          <span class="work-strip">Insert New Project</span>
	<span class="line"> </span>                   
         <div class="insert">
	 <form name="p" action="insertproject.php" method="POST">
		Project Name : <input type="text" required name="name"  style="width:20%;margin-left: 27px "/>
                Project Category :<select name="pcat" required style="width:20% ; margin-left:10px" >
                    <option value="Two Wheeler">Two Wheeler</option>
                    <option value="Four Wheeler">Four Wheeler</option>
                   </select>
                <br>Start Date : <input type="date" name="sdate" required style="width:20%;margin-left: 50px" />
                Expected End Date : <input type="date" name="edate" required style="width:20%;margin-left: 20px" />
		
                <br> Project Manager : &nbsp; &nbsp;<?php
                    
                    $query = "SELECT Eid,Ename From employee where Eid not in (Select Eid from projectemp)";
                    $result = mysql_query ($query);
                    echo "<select name='pman' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                        echo "<option value=".$r['Ename'].">".$r['Ename']."</option>"; 
                    }
                    echo "</select>";
                ?>
                Assign New Employee: <?php
                   
                    $query = "SELECT Eid,Ename From employee where Eid not in (Select Eid from projectemp)";
                    $result = mysql_query ($query);
                    echo "<select name='aemp[]' required style='width:20%' multiple='multiple' size='2' value=''>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Eid'].">".$r['Ename']."</option>"; 
                    }
                    echo "</select>";
                ?>
                <br>Parts To Use  : <?php
                   
                    $query = "SELECT id, PName FROM parts";
                    $result = mysql_query ($query);
                    echo "<select name='parts[]' required multiple='multiple' size='2' style='width:20%;margin-left:50px' value=''>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['id'].">".$r['PName']."</option>"; 
                    }
                    echo "</select>";
                ?>
                Estimated Cost(in $) : <input type="text" name="cost" required style="width:20%;margin-left: 5px"/>
         <br>
         <br><input type="submit" name="submit" value="Insert" />
	</form>	
	</div>   
                    
          
             </div>  
    <div class="tab-pane fade" id="emp">
                 
        <span class="work-strip">Insert New Employee</span>
	<span class="line"> </span>
         
         <div class="insert">
	 <form name="p" action="insertemployee.php" method="POST">
		Employee Name : <input type="text" name="ename"  required style="width:20%; "/>
                Email Id : <input type="email" name="eemail"  required style="width:20% ; margin-left:60px "/>
               <br> Department : 
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
                   
                  
                  </select>
                  <br>Date of Birth : <input type="date" required name="dob" value="Enter Project Name" style="width:20%;margin-left:30px"/>
                Contact Number : <input type="number" required name="num" value="Contact Number" style="width:20%"/>
                <textarea name="address" onfocus="this.value = '';" required style="width: 50%;height: 8em"onblur="if (this.value == '') {this.value = 'Address';}"/>Address</textarea>
         <br>Salary : <input type="number"  required name="salary" value="Contact Number" style="width:20%"/>
         <br><br><input type="submit" name="submit" value="Insert" />
	</form>	
	</div> 
          
</div>
     <div class="tab-pane fade" id="parts">
         <span class="work-strip">Insert New Parts</span>
	<span class="line"> </span>
         <div class="insert">
	 <form name="p" action="insertparts.php" method="POST">
		Parts Name : <input type="text" name="pname" required  style="width:20%;margin-left: 27px "/>
                Model Id :<input type="text" name="model" required style="width:20% ; margin-left:10px" >
                 <br>Manufacture Date : <input type="date" required name="mdate" style="width: 20%;margin-top: 5px" value="Manufacture Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                Expiry Date : <input type="date" name="edate" required style="width: 20%"  value="Expiry Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                <br> Supplier Name : &nbsp; &nbsp;<?php
                    
                    $query = "SELECT Sid, SName FROM suppliers";
                    $result = mysql_query ($query);
                    echo "<select name='sname' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Sid'].">".$r['SName']."</option>"; 
                    }
                    echo "</select>";
                ?>
                Warehouse Number : &nbsp; &nbsp;<?php
                   
                    $query = "SELECT Wid, Wno FROM warehouse";
                    $result = mysql_query ($query);
                    echo "<select name='wno' required style='width:20% ;margin-left:0px' value=''><option></option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Wid'].">".$r['Wno']."</option>"; 
                    }
                    echo "</select>";
                ?>
                <br><br>
                 <br><input type="submit" name="submit" value="Insert" />
	</form>	
	</div>         
        
    </div>
    
    <div class="tab-pane fade" id="suppliers">
             <span class="work-strip">Insert New Suppliers</span>
            <span class="line"> </span>
            <div class="insert">
	 <form name="p" action="insertsupplier.php" method="POST">
		Supplier Name : <input type="text" required name="sname" style="width:20%;"/>
                Email Id : <input type="email" required name="semail" style="width:20%;"/>
                <br>Contact Number : <input type="number" required name="num" style="width:20%"/>
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
                    
                   </select>
                <br>City : <input type="text" name="city" required style="width:20%;margin-top: 15px;margin-left: 80px"/>
                Pincode : <input type="number" name="pincode" required style="width:20%;margin-top: 15px"/>
                <br><br><input type="submit" name="submit" value="Insert" />
	</form>	
	</div>  
         
    </div>
    <div class="tab-pane fade" id="warehouse">
         <span class="work-strip">Insert New Warehouse</span>
	<span class="line"> </span>  
        <div class="insert">
	 <form name="p" action="insertwarehouse.php" method="POST">
		Warehouse Number : <input type="text" required name="wnum" style="width: 20%"/>
                Capacity : <input type="text" required name="capacity" style="width: 20%"/>
                <br>Location : <input type="text" required name="location" style="width: 20%;margin-top: 10px;"/>
                <br><br><input type="submit" name="submit" value="Insert" />
	</form>	
	</div>   
        
    </div>
<!--banner end here-->

 </div> 
    </body>
</html>
