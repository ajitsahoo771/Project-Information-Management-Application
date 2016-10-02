
<?php
$link=mysqli_connect("localhost","root","","pima");



$id=$_GET['id'];

{
   
    $sql="DELETE from projectemp where Eid='$id'";
        if(mysqli_query($link, $sql)){
            echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Deleted Successfully!!!')
                                                    window.location.href='edit.php'
                                                    </SCRIPT>");
            } else{
                echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Not Deleted!!!')
                                                    window.location.href='edit.php'
                                                    </SCRIPT>");
                
            }
   
}


/*echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Deleted!!!')
                                                    window.location.href='edit.php'
                                                    </SCRIPT>");*/

?>
