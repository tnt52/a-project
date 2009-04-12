<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT type="text/javascript">
var flashvars = {};
flashvars.autostart = "true";
flashvars.file = "../2/oeuvres/videos/video.flv";
flashvars.skin = "<?=base_url()?>system/application/catalogue/players/skins/thin.swf";
flashvars.allowfullscreen = "true";

var params = {};

var attributes = {};

window.addEvent('domready',function(){
      swfobject.embedSWF('<?=base_url()?>system/application/catalogue/players/player.swf', "player",'250','250','9.0.124',false,flashvars,params,attributes);
                                 /*swfobject.embedSWF(swfUrl, id, width, height, version, expressInstallSwfurl, flashvars, params, attributes);*/
});
</SCRIPT>
<STYLE>
</STYLE>
</head>
<body bgcolor="#FFFFFF">
<DIV  style="text-align: center">
      <DIV id="titreVQ" CLASS="Titre"></DIV>
      de
      <DIV id="nomVQ" CLASS="Nom"></DIV>
</DIV>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
<TR>
<TD width="48%" ALIGN="RIGHT"><DIV id="dateoVQ" CLASS="DateO">réalisé le </DIV></TD>
<TD width="4%"></TD>
<TD width="48%%" ALIGN="LEFT"><DIV id="datecVQ" CLASS="DateC">en ligne depuis le </DIV></TD>
</TR></TABLE>
<DIV id="player">
<!--<embed
  name="<?=$row['typeO']?>embplayer<?=$row['keyO']?>" id="<?=$row['typeO']?>embplayer<?=$row['keyO']?>"
  type="application/x-shockwave-flash"
  pluginspage="http://www.macromedia.com/go/getflashplayer"
  src="<?=base_url()?>system/application/catalogue/players/player.swf"
  width="100"
  height="100"
  allowfullscreen="true"
  flashvars="file=../2/oeuvres/videos/video.flv&autostart=true&skin=<?=base_url()?>system/application/catalogue/players/skins/thin.swf"
/>-->
<!--<embed
  src="<?=base_url()?>system/application/views/players/player.swf"
  width="100"
  height="100"
  allowscriptaccess="always"
  allowfullscreen="true"
  flashvars="file=<?=base_url()?>system/application/views/players/test.mpg&autostart=true"
/>-->
</DIV>
<DIV id="dimensionsVQ" CLASS="Dim">durée: </DIV>
<DIV id="parVQ" CLASS="Par"></DIV>
<DIV id="descrVQ" CLASS="Descr">
<!--<TEXTAREA WRAP='SOFT' overflow="Hidden" COL="" ROW=3 READONLY STYLE="border-style=none none none none; border-color=#FFFFFF; border-width=0 0 0 0;">
<?=$row['description']?></TEXTAREA>--></DIV>
</body>
</html>