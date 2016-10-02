<?php
$link=mysqli_connect("localhost","root","","pima");



$id=$_GET['id'];
$sql2 = "UPDATE parts set Sid=NULL Where Sid='$id'";
{
    if(mysqli_query($link, $sql2)){
    $sql="DELETE from suppliers where Sid='$id'";
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
    else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

}
/*echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Deleted!!!')
                                                    window.location.href='edit.php'
                                                    </SCRIPT>");*/

?>