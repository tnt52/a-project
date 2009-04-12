<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT language="JavaScript" type="text/JavaScript">
// <![CDATA[
var cfePR = new cfe.base();
//cfePR.registerModules([cfeText,cfeRadiobutton]);
window.addEvent('domready', function(){
    cfePR.init({scope:$('repMA') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
    setStepNQ(1);
    $('LibNewQ').addEvent('keydown', function(event){
                                          if (event.key=='enter')  writeLibQ(this);
    });
});
/*
cfe.registerModules([cfeCheckbox,cfeRadiobutton,cfeSelect,cfePassword,cfeSubmit,cfeReset,cfeImage,cfeText,cfeTextarea,cfeFile]);
cfe.setModuleOptions(cfePassword,{slidingDoors:false});
cfe.setModuleOptions(cfeSelect,{scrolling:true, scrollSteps: 5});
cfe.setModuleOptions(cfeFile,{fileIcons:true,trimFilePath:true});
*/

var stepNQ=1;
var libR;
function newQ(){
         setStepNQ(3);
         typeQ=$('typeQpoR').value;
         var Q=$('NewQ');
         Q.setProperty('cat',typeQ);
         Q.setProperty('cle',"");
         majPR(Q);
}
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
function choixNQ(el,TQ){
         $('typeQpoR').value=TQ;
         el.addClass('C');
         setStepNQ(2);
         majNewQ();
}
function setStepNQ(step){
         this.stepNQ=step;
         if (stepNQ==1) DIVderriere($('retourPR'));
         else DIVdevant($('retourPR'));

}
function majNewQ(){
         switch (this.stepNQ)
         {
                case 1: switchDiv($('NewQ1'),$('NewQ2'));break;
                case 2: switchDiv($('NewQ2'),$('NewQ1'));break;
         }
}
function retourPR(){
         if (stepNQ>1 && $('keyQpoR').value=="") setStepNQ(stepNQ-1);
         else setStepNQ(stepNQ);
         majNewQ();
         majPR(null);
}
function writeLibQ(input){
         newQ();
         input.blur();
}
// ]]>
</SCRIPT>
<STYLE>
#repMA input, #NewQ{
 color: white;
 border: red solid 1px;
}
#NewQ{
text-align:center;
top:0px;
}
<?$wNQ=48;$hNQ=48;?>
#NewG{
  position:absolute;
  left:75%;
}
#NewA{
  position:absolute;
  left:25%;
}
#NewA, #NewG {
  width: <?=$wNQ?>px;
  height: <?=$hNQ?>px;
  background: no-repeat 0 0;
  background-image: url(<?=baseurl?>system/application/images/checkbox1.png);
}
#NewA.H, #NewG.H {background-position: 0 -<?=3*$hNQ?>px;}
#NewA.C.H, #NewG.C.H {background-position: 0 -<?=2*$hNQ?>px;}
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
<DIV id="NewQ" keyM="<?=$this->session->userdata('keyMA')?>" cat="" cle="">
     <DIV id="NewQ1">
          PARTAGER VOTRE
          <DIV id="NewG" onmouseover="hover(this)" onmouseout="unhover(this)" onclick="choixNQ(this,<?=TQgout?>)">GOUT</DIV>
          <DIV id="NewA" onmouseover="hover(this)" onmouseout="unhover(this)" onclick="choixNQ(this,<?=TQavis?>)">AVIS</DIV>
     </DIV>
     <DIV id="NewQ2">
          <input name="Qavis" id="LibNewQ" type="text" value="Une affirmation (ex: L'homme est un animal)" size="100" maxlength="100"/>
          <DIV class="OK" onmouseover="hover(this)" onmouseout="unhover(this)" onclick="newQ()">OK</DIV>
     </DIV>

<!--  <br />
     <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-inside: avoid">
     <TR>
     <TD ALIGN="right">
          <input name="Qavis" id="InQavis" type="text" value="Une affirmation (ex: L'homme est un animal)" size="100" maxlength="100" />
          <br>
          <input name="Qgout" id="InQgout" type="text" value="Une chose ex: les fraises" size="100" maxlength="100" />
     </TD>
     <TD ALIGN="LEFT">
          <a href="#" onclick="javascript:newQ(<?=TQavis?>)" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ShareG','','<?=base_url()?>system/application/images/boutons/OKrol.gif',1)"><img src="<?=base_url()?>system/application/images/boutons/OK.gif" alt="OK" name="ShareG" width="21" height="21" border="0" id="ShareG" /></a>
          <br>
          <a href="#" onclick="javascript:newQ(<?=TQgout?>)" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('ShareA','','<?=base_url()?>system/application/images/boutons/OKrol.gif',1)"><img src="<?=base_url()?>system/application/images/boutons/OK.gif" alt="OK" name="ShareA" width="21" height="21" border="0" id="ShareA" /></a>
     </TD>
     </TR>
     </TABLE> -->
</DIV>
<DIV id="PanelRep">
     <DIV id="Libelles">
          <DIV id="LibQgout">
          Est-ce que tu aimes
          </DIV>
          <DIV id="LibelleQ"></DIV>
          <DIV id="LibQavis">
          Est-tu d'accord?</DIV>
     </DIV>
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