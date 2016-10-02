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
            $id=$_GET['id'];
        $select = mysql_query("SELECT suppliers.*,parts.*,warehouse.* FROM parts JOIN suppliers ON suppliers.Sid = parts.Sid JOIN warehouse ON warehouse.Wid=parts.Wid WHERE parts.id=$id");
        $row2 = mysql_fetch_array($select);
        $a = $row2['PName'];
        $b = $row2['Modid']; 
        $c = $row2['Mdate']; 
        $d = $row2['Edate']; 
        $e = $row2['SName']; 
        $f = $row2['Wno'];
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Parts</title>
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
	<span class="work-strip">Edit Existing Parts</span>
	<span class="line"> </span>
	<div class="work-bottom"> 
         
            
         <div class="insert">
	 <form name="p" action="" method="POST">
		Parts Name : <input type="text" name="pname" required value="<?php echo $a?>" style="width:20%;margin-left: 27px "/>
                Model Id :<input type="text" name="model"  value="<?php echo $b?>" required style="width:20% ; margin-left:10px" >
                 <br>Manufacture Date : <input type="date" required name="mdate"  value="<?php echo $c?>" style="width: 20%;margin-top: 5px" value="Manufacture Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                Expiry Date : <input type="date" name="edate" required style="width: 20%"  value="<?php echo $d?>"value="Expiry Date" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                <br> Supplier Name : &nbsp; &nbsp;<?php
                   
                $result1 = mysql_query("SELECT * FROM parts WHERE id=$id");
                     $fetch =  mysql_fetch_array($result1);
                     $sid = $fetch['Sid'];
                     
                    $query = "SELECT Sid, SName FROM suppliers";
                    $result = mysql_query ($query);
                    echo "<select name='sname' required  style='width:20% ;margin-left:0px' value=''><option value='.$sid.'>$e</option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Sid'].">".$r['SName']."</option>"; 
                    }
                    echo "</select>";
                ?>
                Warehouse Number : &nbsp; &nbsp;<?php
                  
                    $result1 = mysql_query ("SELECT * FROM parts WHERE id=$id");
                     $fetch = mysql_fetch_array($result1);
                     $wid = $fetch['Wid'];
                    
                     $query = "SELECT Wid, Wno FROM warehouse";
                    $result = mysql_query ($query);
                    echo "<select name='wno' required  style='width:20% ;margin-left:0px' value=''><option value='.$wid.'>$f</option>";
                    while($r = mysql_fetch_array($result)) {
                      echo "<option value=".$r['Wid'].">".$r['Wno']."</option>"; 
                    }
                    echo "</select>";
                ?>
                <br>
	         <br><input type="submit" name="submit" value="Update" />
	</form>	
             
             
             <?php
             if(isset($_POST['submit']))
             {
                 $pname = $_POST['pname'];
                 $model = $_POST['model'];
                 $mdate = $_POST['mdate'];
                 $sname = $_POST['sname'];
                 $wno = $_POST['wno'];
                 $edate = $_POST['edate'];
                 $update=  mysql_query("Update parts set PName='$pname',Mdate = '$mdate',Edate = '$edate',modid= '$model',Sid='$sname' ,Wid='$wno'  WHERE id=$id ");
                 echo ("<SCRIPT LANGUAGE='JavaScript'>
                                                    window.alert('Parts Details Edited!!!')
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
