<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT language="JavaScript" type="text/JavaScript">
// <![CDATA[
window.addEvent('domready', function(){

    var cfe = new customFormElements(true);
    cfe.registerModules([cfeCheckbox,cfeRadiobutton,cfeSelect,cfePassword,cfeSubmit,cfeReset,cfeImage,cfeText,cfeTextarea,cfeFile]);
    cfe.setModuleOptions(cfePassword,{slidingDoors:false});
    cfe.setModuleOptions(cfeSelect,{scrolling:true, scrollSteps: 5});
    cfe.setModuleOptions(cfeFile,{fileIcons:true,trimFilePath:true});
    cfe.init({spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});
/*
window.addEvent('domready', function() {
     new mooForms('repMA<?=$keyQ?>', {
                          imageDir: '<?=base_url()?>system/application/images/',
                          radioImage: {image: 'radio.png', width: 24, height: 24},
                          inputs: ['radio']
                          });
     $('repMA<?=$keyQ?>').getElements('span').each(function(el){
          el.addEvent( 'click',function (){clicRep($('repMA<?=$keyQ?>'))} );
     });
});
*/
// ]]>
function clicRep(form){
           void(form.send());
  }
// ]]>
</SCRIPT>
</head>
<body>
<form id="repMA<?=$keyQ?>" CLASS="rep" action="<?=base_url()?>index.php/answer" method="POST">
<TABLE WIDTH=100% BORDER=1 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-inside: avoid">
<TR><TD><DIV CLASS="radio">
<TABLE WIDTH=100% BORDER=1 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-inside: avoid">
  <COL WIDTH=128*>
  <COL WIDTH=128*>
  <TR VALIGN=TOP>
    <TD ROWSPAN=2 WIDTH=50%>
      <P>Partager</P>
    </TD>
    <TD WIDTH=50%>
      <P><INPUT TYPE=RADIO NAME="OptionButton1" VALUE="" STYLE="width: 0.32cm; height: 0.48cm; background-image: url(http://127.0.0.1/system/application/images/radio.gif)">
      Bouton radio1 Une affirmation</P>
    </TD>
  </TR>
  <TR VALIGN=TOP>
    <TD WIDTH=50%>
      <P><INPUT TYPE=RADIO NAME="OptionButton" VALUE="" STYLE="width: 0.29cm; height: 0.4cm">
      Bouton radio Un gout</P>
    </TD>
  </TR>
</TABLE>
</DIV>
</TD></TR>
<TR><TD>
<DIV CLASS="gout" >
<TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=3 STYLE="page-break-inside: avoid">
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <COL WIDTH=37*>
  <TR VALIGN=TOP>
    <TD WIDTH=14%>
       <span><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==-3) echo 'checked="checked"';?> /><label  for="#"></label></span>
       <span ><input type="radio"  name="rep<?=$keyQ?>" class="gout" value="-3" <?if ($rep==-2) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>
    <TD WIDTH=14%>

    </TD>
    <TD WIDTH=14%>
      <span ><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==-1) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>
    <TD WIDTH=14%>
      <span ><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==-0) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>
    <TD WIDTH=14%>
      <span ><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==1) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>
    <TD WIDTH=14%>
      <span ><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==2) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>
    <TD WIDTH=14%>
      <span ><input type="radio"  name="rep<?=$keyQ?>" value="-3" <?if ($rep==3) echo 'checked="checked"';?> /><label  for="#"></label></span>
    </TD>

  </TR>
</TABLE>
</DIV>
</TD></TR>
<TR><TD>
<P>J'aime</P>
</TD></TR>
</TABLE>
</FORM>
</body>

</html>