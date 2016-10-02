<?php


$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$a=$_POST['pname'];
$b=$_POST['mdate'];
$c=$_POST['edate'];
$d=$_POST['model'];
$e=$_POST['sname'];
$g=$_POST['wno'];
if(isset($_POST['submit']))
	
		
		{		
			$in=mysql_query("insert into parts (PName,Mdate,Edate,Modid,Sid,Wid)values('$a','$b','$c','$d','$e','$g')");
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('New parts record inserted successfully !')
                                                    window.location.href='insertion.php?page=1'
                                                    </SCRIPT>");
	
	
		}
		
		

?>
