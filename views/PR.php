<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT language="JavaScript" type="text/JavaScript">
// <![CDATA[
//cfePR.registerModules([cfeText,cfeRadiobutton]);
window.addEvent('domready', function(){
    new cfe.base().init({scope:$('repMA') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});
/*
cfe.registerModules([cfeCheckbox,cfeRadiobutton,cfeSelect,cfePassword,cfeSubmit,cfeReset,cfeImage,cfeText,cfeTextarea,cfeFile]);
cfe.setModuleOptions(cfePassword,{slidingDoors:false});
cfe.setModuleOptions(cfeSelect,{scrolling:true, scrollSteps: 5});
cfe.setModuleOptions(cfeFile,{fileIcons:true,trimFilePath:true});
*/

var stepNQ=1;
var libR;

function answer(el){
         var keyQ=$('keyQpoR').value;
         var typeQ=$('typeQpoR').value;
         var rep=el.getChildren('input')[0].value;
         new Request.HTML({url: urlbase+'index.php/answer',update: $('status'),method: 'get', onComplete: function () {rep_recu(keyQ,rep);}}).post($('repMA'));
         /*$('repMA').set('send',{update: 'status', onComplete: function () {rep_recu(keyQ,rep)}});
         $('repMA').send();*/
         majLibPR(el);
}
function majLibPR(spanR){
         if (spanR!=null) this.libR=spanR.getProperty("lib");
         else this.libR="";
}
function rep_recu(keyQ,rep){
         if (keyQ!="") $(keyQ+"reponse").set('html',rep);
}
function LibR(el){
         if (el!=null) {
            $('LibRep').set('html',el.getProperty("lib"));
         }
         else  $('LibRep').set('html',this.libR);
}




// ]]>
</SCRIPT>
<STYLE>
#repMA input,{
 position:absolute;
  left:-925%;
	color: white;
 border: red solid 1px;
}
#PanelRep{
bottom: 0px;
}
</STYLE>
</head>
<body width="200">
<FORM id="repMA" action="<?=base_url()?>index.php/answer" method="POST" onsubmit="StopEvent(event)">
<INPUT TYPE=HIDDEN NAME="keyquestion" id="keyQpoR" value="">
<INPUT TYPE=HIDDEN NAME="typequestion" id="typeQpoR" value="">
<INPUT TYPE=HIDDEN NAME="keyMq" id="keyMQpoR" value="">
<INPUT TYPE=HIDDEN NAME="importance" value="1">
<INPUT TYPE=HIDDEN NAME="theme" value="1">
<INPUT TYPE=HIDDEN NAME="tribu" value="1">
<DIV id="retourPR" onclick="retourPR()">RETOUR</DIV>
<DIV id="PanelRep">
     <DIV id="panelgout">
     <TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=3 STYLE="page-break-inside: avoid">
       <TR VALIGN=TOP>
         <TD >
           <span  style="position:absolute;left:-1000px;"><input type="radio" name="Rgout" id="NoGout"/><label  for="#"></label></span>
           <span  onclick="answer(this)" onmouseout="LibR(null)"  onmouseover="LibR(this)" lib="<?=lang('repgout-3')?>"><input type="radio" name="Rgout" id="_BigS" value="<?=Val_BigS?>"/><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(this)" onmouseout="LibR(null)"  onmouseover="LibR(this)" lib="<?=lang('repgout-1')?>"><input type="radio" name="Rgout" id="_LittleS" value="<?=Val_LittleS?>" /><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(this)" onmouseout="LibR(null)"  onmouseover="LibR(this)" lib="<?=lang('repgout0')?>"><input type="radio" name="Rgout" id="NoF" value="<?=ValNoF?>"/><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(this)" onmouseout="LibR(null)"  onmouseover="LibR(this)" lib="<?=lang('repgout+1')?>"><input type="radio"  name="Rgout" id="LittleS" value="<?=ValLittleS?>" /><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(this)" onmouseout="LibR(null)"  onmouseover="LibR(this)" lib="<?=lang('repgout+3')?>"><input type="radio"  name="Rgout" id="BigS" value="<?=ValBigS?>" /><label  for="#"></label></span>
         </TD>
       </TR>
     </TABLE>
     </DIV>
     <DIV id="panelavis">
     <TABLE WIDTH=100% BORDER=1 CELLPADDING=4 CELLSPACING=3 STYLE="page-break-inside: avoid">
       <TR VALIGN=TOP>
         <TD >
           <span  onclick="answer(<?=Val_BigOK?>)"><input type="radio" name="Ravis" id="_BigOK" value="<?=Val_BigOK?>"/><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(<?=Val_LittleOK?>)"><input type="radio" name="Ravis" id="_LittleOK" value="<?=Val_LittleOK?>"/><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(<?=ValOKKO?>)"><input type="radio" name="Ravis" id="OKKO" value="<?=ValOKKO?>"/><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(<?=ValLittleOK?>)"><input type="radio"  name="Ravis" id="LittleOK" value="<?=ValLittleOK?>" /><label  for="#"></label></span>
         </TD>
         <TD >
           <span onclick="answer(<?=ValBigOK?>)"><input type="radio"  name="Ravis" id="BigOK" value="<?=ValBigOK?>" /><label  for="#"></label></span>
         </TD>
       </TR>
     </TABLE>
     </DIV>
     <DIV id="LibRep"></DIV>
</DIV>
</FORM>
</body>

</html>