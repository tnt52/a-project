<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title ></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT type="text/javascript">
var flashvars = {};
flashvars.autostart = "false";
flashvars.file = "../2/oeuvres/videos/video.flv";
flashvars.skin = "<?=base_url()?>system/application/catalogue/players/skins/thin.swf";
flashvars.allowfullscreen = "true";

var params = {};
params.allowfullscreen = "true";

var attributes = {};

window.addEvent('domready',function(){
      swfobject.embedSWF('<?=base_url()?>system/application/catalogue/players/player.swf', "player",'<?=wPlaVDO?>','<?=hPlaVDO?>','9.0.124',false,flashvars,params,attributes);
                                 /*swfobject.embedSWF(swfUrl, id, width, height, version, expressInstallSwfurl, flashvars, params, attributes);*/
});
</SCRIPT>
<STYLE>
</STYLE>
</head>
<body >
<DIV  class="Vhead" type="<?=TOson?>" style="text-align: center"></DIV>
<DIV id="player">
</DIV>
<DIV  class="Vfoot" style="text-align: center"></DIV>
</body>
</html>