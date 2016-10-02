<?php


$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$a=$_POST['ename'];
$b=$_POST['eemail'];
$c=$_POST['address'];
$d=$_POST['desg'];
$e=$_POST['dept'];
$f=$_POST['dob'];
$g=$_POST['num'];
$h = $_POST['salary'];

if(isset($_POST['submit']))
	
		
		{		
			$in1=mysql_query("insert into employee (EName,Email,Address,Desg,Dept,Dob,Phone,Salary)values('$a','$b','$c','$d','$e','$f','$g','$h')");
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('New Employee Inserted Successfully !')
                                                    window.location.href='insertion.php?page=1'
                                                    </SCRIPT>");
                       
		}
		
		

?>
