<html>
<head>


<!--<script type="text/javascript" src="swfobject.js"></script>-->


<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #666666;
}
-->
</style></head>
<body>




<h3 align="center">playlist file, with different colors:</h3>


<p align="center" id="player2"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</p>
<script type="text/javascript">
	var s2 = new SWFObject("<?=base_url()?>system/application/views/players/mediaplayer.swf","playlist","300","312","7");
	s2.addParam("allowfullscreen","true");
	s2.addVariable("file","<?=base_url()?>system/application/catalogue/2/oeuvres/videos/video.flv");
	s2.addVariable("displayheight","200");
	s2.addVariable("backcolor","0x000000");
	s2.addVariable("frontcolor","0xCCCCCC");
	s2.addVariable("lightcolor","0x557722");
	s2.write("player2");
</script>





</body>
</html>
