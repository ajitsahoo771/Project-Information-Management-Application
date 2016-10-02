 <?php

$con=mysql_connect("localhost","root","");
mysql_select_db("pima",$con);

if(isset($_POST['submit']))
	{
		$a=$_POST['userid'];
		$d=$_POST['password'];

		$login=mysql_query("select * from manager where Email='$a' and Password='$d'");
		$row=mysql_fetch_array($login);
		if($row['Email']==$a && $row['Password']==$d)
				{
					session_start();
                                        $_SESSION['Email']=$_POST['userid'];
					header("Location:home.php?page=1&page1=1");
					exit();
				}
                  else
                                {
                                    echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Invalid User Id Or Password !')
                                                    window.location.href='index.php'
                                                    </SCRIPT>");
                                }
	}
    

?>