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
      <DIV CLASS="Titre">titre</DIV>
      de
      <DIV CLASS="Nom" onclick="$('player').sendEvent('STOP',null)">nom</DIV>
</DIV>
<TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
<TR>
<TD width="48%" ALIGN="RIGHT"><DIV CLASS="DateO">réalisé le dateoeuvre</DIV></TD>
<TD width="4%"></TD>
<TD width="48%%" ALIGN="LEFT"><DIV CLASS="DateC">en ligne depuis le datecrea</DIV></TD>
</TR></TABLE>
<DIV id="player" >

</DIV>
<DIV CLASS="Dim">durée: dimensions</DIV>

<DIV CLASS="Descr">
description
<!--<TEXTAREA WRAP='SOFT' overflow="Hidden" COL="" ROW=3 READONLY STYLE="border-style=none none none none; border-color=#FFFFFF; border-width=0 0 0 0;">
description</TEXTAREA>--></DIV>