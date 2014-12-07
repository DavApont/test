<html>
<head>
<title>Sistema S&C Celular v 1.0</title>
<script language="JavaScript">
<!--
var secs
var timerID = null
var timerRunning = false
var delay = 10
function InitializeTimer()
{
// Set the length of the timer, in seconds
secs = 4
StopTheClock()
StartTheTimer()
}
function StopTheClock()
{
if(timerRunning)
clearTimeout(timerID)
timerRunning = false
}
function StartTheTimer()
{
if (secs==0)
{
openFullscreen('sistema/index.php');
}
else
{
self.status = secs
secs = secs - 1
timerRunning = true
timerID = self.setTimeout("StartTheTimer()", delay)
}
}
//-->
</script>
<script language="JavaScript">
<!-- Begin
function openFullscreen(page) {
var yes = 1;
var no = 0;
var menubar = no; // The File, Edit, View Menus
var scrollbars = yes; // Horizontal and vertical scrollbars
var locationbar = no; // The location box with the site URL
var directories = no; // the "What's New", "What Cool" links
var resizable = no; // Can the window be resized?
var statusbar = no; // Status bar (with "Document: Done")
var toolbar = no; // Back, Forward, Home, Stop toolbar
if (navigator.appName == "Microsoft Internet Explorer"){ // better be ie6 at least
windowprops = "width=" + (screen.width-10) + ",height=" + (screen.height-30) + ",top=0,left=0";
}
else { // i.e. if Firefox
windowprops = "width=" + (screen.width-5) + ",height=" + (screen.height-30) + ",top=0,left=0";
}
windowprops += (menubar ? ",menubars" : "") +
(scrollbars ? ",scrollbars" : "") +
(locationbar ? ",location" : "") +
(directories ? ",directories" : "") +
(resizable ? ",resizable" : "") +
(statusbar ? ",status" : "") +
(toolbar ? ",toolbar" : "");
window.open(page, 'fullPopup', windowprops);
window.opener = top; // this will close opener in ie only (not Firefox)
window.close();
}
// End -->
</script>
</head>

<body onLoad="InitializeTimer()">

<center>
<br><br><br><br><br><br>
<img border="0" src="sistema/images/logosistem.png">


</center>
</body>
</html>