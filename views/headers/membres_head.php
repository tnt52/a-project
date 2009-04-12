<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
window.addEvent('domready', function(){
    cfeHeadM.init({scope:$('HeadLM') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
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
         triM=el.getProperty('champ');
         if (img.hasClass('asc')) sensM='ASC'; else sensM='DESC';
         if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
         new Request.HTML({url: urlbase+'index.php/navigation/liste/'+TM+'/'+limitM+'/'+pageM+'/'+triM+'/'+sensM+'/'+keyMsel,update: $('membres'),method: 'get', evalScripts: true}).send();
}

function searchM(e){
         new Request.HTML({
         url: urlbase+'index.php/navigation/search/'+TM+'/'+limitM+'/'+pageM+'/'+triM+'/'+sensM,
         update: $('membres'),
         onComplete: function () {endSearchM();}}).post($('LookM'));
         StopEvent(e);
}

function init(){
         if (Msel==null) $$('.repMselCol').setStyle('opacity',0);
}
window.addEvent('domready',function (){
   init();
});

</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV class="CatTitle membres" ALIGN=CENTER><?=lang("lib_membres")?></DIV>
<DIV id="SearchM">
     <form id="LookM" method="post" action="#" onsubmit="searchM(event)">
           <input type="text" name="tobesearched"/>
           <input name="searchtables" type="hidden" value=",membres.pseudo"/>
           <label for="tobesearched"></label>
           <input type="submit" class="GO" value="GO" />
     </form>
</DIV>
<!--<div>
  <TABLE ALIGN="RIGHT" BORDER=0 width="100%" CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
  <TR>
  <TD ALIGN="RIGHT"><? if ($page>1):?><a href="javascript:membres_page(<?=$page-1?>)" target="_self">&lt;</a><?endif?></TD>
  <TD ALIGN="RIGHT"><?for ($i=1; $i<$page; $i++) :?>
      <a href="javascript:membres_page(<?=$i?>)" target="_self"><?=$i?></a>
      <?endfor?>
  </TD>
  <TD ALIGN="CENTER"><strong><a href="javascript:membres_page(<?=$page?>)" target="_self"><?=$page?></a></strong>
  </TD>
  <TD ALIGN="LEFT"><?for ($i=$page+1; $i<$Ptot+1; $i++) :?>
      <a href="javascript:membres_page(<?=$i?>)" target="_self"><?=$i?></a>
      <?endfor?>
  </TD>
  <TD ALIGN="LEFT"><? if ($page<$Ptot):?><a href="javascript:membres_page(<?=$page+1?>)" target="_self">&gt;</a><?endif?></TD>
  </TR>
  </TABLE>
</div>-->
<DIV id="ResultsM"></DIV>
<DIV STYLE="bottom:0px; background=#000000">
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='left'>
     <COL WIDTH=<?=col_lm_pseudo?>>
     <COL WIDTH=<?=col_lm_sexe?>>
     <COL WIDTH=<?=col_lm_voix?>>
     <COL WIDTH=<?=col_lm_aff?>>
     <TR>
     <TD COLSPAN=4>
     <span>
            <label for="typeaff">Affinité sur</label>
            <select id="typeaff" name="typeaff" size="1" style="width:30px">
            <option>tout</option>
            <option>les sons</option>
            <option>les images</option>
            <option>les textes</option>
            <option>les vidéos</option>
            <option>les avis</option>
            <option>les goûts</option>
            </select>
      </span>
     </TD>
     </TR>
     <TR >
     <TD >
         <DIV champ="pseudo"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_pseudo")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV champ="sexe"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_sexe")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV champ="voix"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_voix")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV champ="affinite"  style="cursor:pointer" onclick="tri(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_affinite")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
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