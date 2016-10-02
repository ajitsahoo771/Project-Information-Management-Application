<?php
mysql_error();
$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);
$a=$_POST['name'];
$b=$_POST['pman'];
$c=$_POST['sdate'];
$d=$_POST['edate'];
$e=$_POST['cost'];
$f= $_POST['aemp'];
$g=$_POST['parts'];
$h=$_POST['pcat'];


if(isset($_POST['submit']))
	{		
			$in=mysql_query("insert into projects (Name,Sdate,Edate,Pcat,Pman,Cost)values('$a','$c','$d','$h','$b','$e')");
			
                   /*Fetching Pid*/     $slct=mysql_query("select Pid from projects order by Pid desc limit 1");
                        $row= mysql_fetch_array($slct);
                        
                    /*Fetching Eid*/    $array_of_ids[] = array();
                        foreach($_POST['aemp'] as $selectedOption)
                        $array_of_ids[] = $selectedOption;
                        
                      foreach($array_of_ids as $value)
                        {
                           $up=mysql_query("INSERT INTO projectemp(Pid,Eid) VALUES('$row[Pid]','$value')");
                         }
                         
                         $array_of_ids1[] = array();
                        foreach($_POST['parts'] as $selectedOption1)
                        $array_of_ids1[] = $selectedOption1;
                        
                      foreach($array_of_ids1 as $value1)
                        {
                           $up1=mysql_query("INSERT INTO projectparts(Pid,id) VALUES('$row[Pid]','$value1')");
                         }
                         echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('New Project Inserted Successfully !')
                                                    window.location.href='insertion.php?page=1'
                                                    </SCRIPT>");
	}
?>
