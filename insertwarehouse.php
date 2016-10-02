<?php


$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$a=$_POST['wnum'];
$b=$_POST['capacity'];
$c=$_POST['location'];

if(isset($_POST['submit']))
{		
			$in=mysql_query("insert into warehouse (Wno,Capacity,Address)values('$a','$b','$c')");
			echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('New warehouse record inserted successfully !')
                                                    window.location.href='insertion.php?page=1'
                                                    </SCRIPT>");
}		
?>
