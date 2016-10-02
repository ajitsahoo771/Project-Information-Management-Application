<?php


$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$a=$_POST['sname'];
$b=$_POST['num'];
$c=$_POST['state'];
$d=$_POST['semail'];
$e=$_POST['city'];
$f=$_POST['pincode'];
if(isset($_POST['submit']))
	
		
		{		
			$in=mysql_query("insert into suppliers (SName,Phone,Email,State,City,Pincode)values('$a','$b','$d','$c','$e','$f')");
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('New record inserted successfully !')
                                                    window.location.href='insertion.php?page=1'
                                                    </SCRIPT>");
	
	
		}
		
		

?>
