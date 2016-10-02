<!DOCTYPE HTML>
<html>
<head>
     <title>Header</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style_2.css" rel='stylesheet' type='text/css' />
</head>
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
            <br><br><br>
                                  
         </div>
</div>
</body>
</html>
	