 <?php

$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);

if(isset($_POST['submit']))
	{
		$new=$_POST['password1'];
		$old=$_POST['password'];

		$slct=mysql_query("select * from manager where Password='$old'");
		$row=mysql_fetch_array($slct);
		//$a=$row['Email']; 
		$d=$row['Password'];
		if($old==$d)
				{
					$login=mysql_query("Update manager set Password='$new'");
                                         echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Password Changed Successfully !!!')
                                                    window.location.href='home.php?page=1'
                                                    </SCRIPT>");
				}
                  else
                                {
                                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Invalid User Password !')
                                                    window.location.href='change_password.php'
                                                    </SCRIPT>");
                                }
	}
    

?>