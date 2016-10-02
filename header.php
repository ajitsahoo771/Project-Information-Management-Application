<!DOCTYPE HTML>
<html>
<head>
     <title>Header</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style_2.css" rel='stylesheet' type='text/css' />
</head>
<style>
    #list:hover
    {
        color: black;
    }
</style>
<script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<body onload="startTime()">
    <div></div>
<div class="banner1">	  
	 <div class="header">
             <div class="top-menu1">
             <ul class="navig">
                 <li style="margin-left: 18px">Automobile Project Information Management Application</li>
             </ul>
             </div>    
             <div id="date" style="color:white;margin-left:1100px"><div id="txt"></div> <?php $mydate=getdate(date("U"));
echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?></div>
			 <div class="top-menu">
				 <span class="menu"></span>
				 <ul class="navig">
					 <li class="active"><a href="home.php?page=1">Home</a></li>
                                         <li><ul class="menuTemplate2 decor2_1" license="mylicense"> 
                                         <li><a href="#" class="arrow" style="margin-bottom: 13px">Record Manipulation</a>
                                              <div class="drop decor2_2" style="width: 150px;background: #4ca0b0;border-bottom-left-radius: 9mm;border-bottom-right-radius: 9mm">
                                                    <div id="list">
                                                        <a href="insertion.php?page=1">Insert New Record</a><br />
                                                        <a href="edit.php">Edit Existing Record</a><br />
                                                        </div>
                                             </div></li></ul>
                                         
                                         <li><ul class="menuTemplate2 decor2_1" license="mylicense"> 
                                         <li><a href="#" class="arrow" style="margin-bottom: 13px">Data Report</a>
                                              <div class="drop decor2_2" style="width: 150px;background: #4ca0b0;border-bottom-left-radius: 9mm;border-bottom-right-radius: 9mm">
                                                    <div id="list">
                                                        <a href="project.php">Project</a><br />
                                                        <a href="employees.php">Employee</a><br />
                                                        <a href="parts.php">Parts</a><br />
                                                        <a href="suppliers.php">Suppliers</a><br />
                                                        <a href="warehouse.php">Warehouse</a><br />
                                                    </div>
                                             </div></li></ul>
					 <li><ul class="menuTemplate2 decor2_1" license="mylicense"> 
                                         <li><a href="#" class="arrow" style="margin-bottom: 13px">My Account</a>
                                              <div class="drop decor2_2" style="width: 127px;background: #4ca0b0;border-bottom-left-radius: 9mm;border-bottom-right-radius: 9mm">
                                                    <div id="list">
                                                        <a href="change_password.php">Change Password</a><br />
                                                        <a href="logout.php">Logout</a><br />
                                                    </div>
                                             </div>
                                         </li></ul>
				 </ul>
                         </div><br><br><br>
                                  
         </div>
</div>
</body>
</html>
	