<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
var cfeHead = new customFormElements(true);
cfeHead.registerModules([cfeText,cfeCheckbox]);
window.addEvent('domready', function(){
    cfeHead.init({scope:$('LookQO') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});
var lastTri=null;
var img;
function tri(el){
         el=$(el);
         img=el.getChildren()[0];
         img.addClass('C');
         if (img.hasClass('A')) {
            if (img.hasClass('asc')){
               img.removeClass('asc');
               img.addClass('desc');
            }
            else if (img.hasClass('desc')){
               img.removeClass('desc');
               img.addClass('asc');
            }
         }
         else {
              if (lastTri!=null && lastTri.hasClass('A')) {
                 lastTri.removeClass('A');
              }
              img.addClass('A');
              lastTri=img;
         }
         triQO=el.getProperty('champ');
         if (img.hasClass('asc')) sensQO='asc'; else sensQO='desc';
         if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
         new Ajax(urlbase+'index.php/navigation/liste/'+cat+'/'+limitQO+'/'+pageQO+'/'+triQO+'/'+sensQO+'/'+keyMsel,{update: $('liste'),method: 'get', evalScripts: true}).request();
}
function hoverTri(el){
         el=$(el);
         el.getChildren()[0].addClass('H');
}
function unhoverTri(el){
         el=$(el);
         img=el.getChildren()[0];
         if (img.hasClass('C')) img.removeClass('C');
         img.removeClass('H');
}
function searchQO(e){
         $('LookQO').action=urlbase+'index.php/navigation/search_liste/'+cat+'/'+limitQO+'/'+pageQO+'/'+triQO+'/'+sensQO;
         $('LookQO').send({
         update: $('liste'),
         onComplete: function () {endSearchQO();}});
         StopEvent(e);
}
function endSearchQO(){

}

function init(){
         if (Msel==null) $$('.repMselCol').setStyle('opacity',0);
}
window.addEvent('domready',function (){
   init();
});
/*var triQO=new Array();
triQO['titre']=new Array(0,'asc');
triQO['adhesion']=new Array(1,'desc');

function initTris(){
         $$('tri').each(function (el){
                   el.rang=-1;
                   el.sens="";
         });

}*/
</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV id="CatTitle" ALIGN=CENTER>Oeuvres</DIV>
<DIV id="SearchQO">
<form id="LookQO" method="post" action="#" onsubmit="searchQO(event)">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="2">
          <input type="text" name="tobesearched" id="tobesearched" />
          <label for="tobesearched"></label>
          <input type="submit" class="GO" value="GO" />dans</td>
          <td><input type="checkbox" name="inQO" id="inQO" checked />
          les
          <label for="inQO">Oeuvres</label>
      </td>
    </tr>
    <tr>
      <td>
          <input type="checkbox" name="inAM" id="inAM" checked />
          les
          <label for="inAM">Artistes</label>
      </td>
    </tr>
  </table>
</form>
</DIV>
<DIV id="ResultsQO">
</DIV>
<DIV id="CatHeads">
     <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='center'>
     <? foreach($cols as $value):?>
     <COL WIDTH=<?=$value?>>
     <?endforeach;?>
     <COL WIDTH=<?=col_avis?>>
     <COL WIDTH=<?=col_avis?>>
     <COL WIDTH=<?=col_avis?>>
     <COL WIDTH=<?=col_avis?>>
     <TR>
     <TD COLSPAN=<?=count($cols)+1?>></TD>
     <TD ALIGN="center" VALIGN=Bottom COLSPAN=3>Les avis</TD>
     <TR >
     <? foreach($champs as $value):?>
     <TD >
         <DIV champ="<?=$value?>"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("head_$value")?> <img class="tri asc" src="<?=base_url()?>system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <?endforeach?>
     <TD >
         <DIV champ="portee"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("head_portee")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
     </TD>
     <TD >
         <DIV champ="adhesion"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("head_adhesion")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
     </TD>
     <TD >
         <DIV champ="rep1.reponse"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("head_marep")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
     </TD>
     <TD class="repMselCol" >
         <DIV champ="rep2.reponse"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("head_sarep")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
     </TR>
     </TABLE>
</DIV>
</body>
<STYLE>
<?$wTri=10;$hTri=10?>
.tri {
  vertical-align: text-top;
  width: <?=$wTri?>px;
  height:<?=$hTri?>px;
  background: no-repeat 0 0;
}
.tri {background-image: url(http://127.0.0.1/system/application/images/tris.png);}
.tri.asc.A {background-position: 0 -<?=2*$hTri?>px;}
.tri.asc.H {background-position: 0 -<?=2*$hTri?>px;}
.tri.asc.H.A {background-position: 0 -<?=$hTri?>px;}
.tri.asc.H.A.C {background-position: 0 -<?=2*$hTri?>px;}

.tri.desc.A {background-position: 0 -<?=$hTri?>px;}
.tri.desc.H {background-position: 0 -<?=$hTri?>px;}
.tri.desc.H.A {background-position: 0 -<?=2*$hTri?>px;}
.tri.desc.H.A.C {background-position: 0 -<?=$hTri?>px;}

</STYLE>
</html>