<?php
session_start();
if(!isset($_SESSION['Email']))
{
    header("location:index.php");
}
?>
<?php
         
            $con=mysql_connect("localhost","root","");
            mysql_select_db("pima",$con);
            $eid = $_GET['eid'];
        $select = mysql_query("SELECT * FROM employee WHERE Eid = $eid");
        $row2 = mysql_fetch_array($select);
        $a = $row2['EName']; 
        $b = $row2['Email'];
        $c = $row2['Dept']; 
        $d = $row2['Desg']; 
        $e = $row2['Dob'];
        $f = $row2['Phone'];
        $g = $row2['Address'];
        $h = $row2['Salary'];
        
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
	<span class="work-strip">Edit Existing Employee</span>
	<span class="line"> </span>
	<div class="work-bottom"> 
         
            
         <div class="insert">
	 <form name="p" action="" method="POST">
		Employee Name : <input type="text" name="ename"  value="<?php echo $a ?>"required style="width:20%; "/>
                Email Id : <input type="email" name="eemail"  value="<?php echo $b ?>" required style="width:20% ; margin-left:60px "/>
               <br> Department : 
               <select name='dept' required value="" style='width:20% ;margin-left:40px' value=''>
                   <option><?php echo $c ?></option>
                   <option value="Production">Production</option>
                   <option value="Marketing">Marketing</option>
                   <option value="Human Resource">Human Resource</option>
                   <option value="Information Technology">Information Technology</option>
                   <option value="Finance & Administration">Finance & Administration</option>
                   <option value="Research & Development">Research & Development</option>
                   
               </select>
                Designation : <select name='desg' value="" required style='width:20%;margin-left:35px 'value=''>
                   <option><?php echo $d ?></option>
                   <option value="Staff">Staff</option>
                   <option value="Quality Director">Quality Director</option>
                   <option value="Operation Manager">Operation Manager</option>
                   <option value="Marketing Manager">Marketing Manager</option>
                   <option value="Accounting Manager">Accounting Manager</option>
                   <option value="Human Resource Manager">Human Resource Manager</option>
                   
                  
                  </select>
                  <br>Date of Birth : <input type="date" value="<?php echo $e ?>" required name="dob" value="Enter Project Name" style="width:20%;margin-left:30px"/>
                Contact Number : <input type="number" value="<?php echo $f ?>" required name="num" value="Contact Number" style="width:20%"/>
                <textarea name="address" required style="width: 50%;height: 8em"/><?php echo $g?></textarea><br>
                Salary : <input type="number" value="<?php echo $h ?>" required name="salary" value="Contact Number" style="width:20%"/>
                <br><br><input type="submit" name="submit" value="Update" />
	</form>	
              <?php
             if(isset($_POST['submit']))
             {
                 $ename = $_POST['ename'];
                 $eemail = $_POST['eemail'];
                 $dept = $_POST['dept'];
                 $desg = $_POST['desg'];
                 $dob = $_POST['dob'];
                 $num = $_POST['num'];
                 $add = $_POST['address'];
                 $salary = $_POST['salary'];
                 $update=  mysql_query("Update employee set Ename='$ename',Address='$add',Email='$eemail',Desg='$desg',Dept='$dept',Dob='$dob',Phone='$num',Salary='$salary' WHERE Eid='$eid' ");
                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Employee Details Edited!!!')
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
