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

function init(){
         if (Msel==null) $$('.repMselCol').setStyle('opacity',0);
}
window.addEvent('domready',function (){
   init();
});

</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV id="titleLM" class="CatTitle membres" ALIGN=CENTER><?=lang("lib_membres")?></DIV>
<DIV id="SearchM">
<form method="post" action="#" onsubmit="searchM(this,event)"><!--setTimeout('$(\'searchtextm\').select()',1)-->
           <input type="text" id="searchtextm" name="searchtextm" size="25" onfocus="focusDef(this,libdefSM)" onblur="blurDef(this,libdefSM)" onkeyup="keyupSearch.delay(500,this)" value="<?=lang("lib_chercher")." ".lang("lib_unmembre")?>"/><label for="searchtextm"></label>
           <input id="searchtablesm" name="searchtablesm" type="hidden" value=",pseudo"/>
           <!--<input type="submit" class="GO" value="GO" />-->
     </form>
</DIV>
<DIV id="SelTA">
            <label id="labeltypeaff" for="#"><?=lang('lib_affinitesur')?></label>
	    <select id="typeaff" name="typeaff" size="1" >
            <option value="<?=TAglo?>">tout</option>
            <option value="<?=TAson?>">les sons</option>
            <option>les images</option>
            <option>les textes</option>
            <option>les vidéos</option>
            <option>les avis</option>
            <option>les goûts</option>
            </select>
</DIV>
<TABLE id="LMHeads" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='left'>
     <COL WIDTH=<?=col_lm_pseudo?>>
     <COL WIDTH=<?=col_lm_sexe?>>
     <COL WIDTH=<?=col_lm_voix?>>
     <COL WIDTH=<?=col_lm_aff?>>
     <TR>
     <TD COLSPAN=4>
     
     </TD>
     </TR>
     <TR >
     <TD >
         <DIV nowrap champ="pseudo"  style="cursor:pointer;width:<?=col_lm_pseudo?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_pseudo")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV nowrap champ="sexe"  style="cursor:pointer;width:<?=col_lm_sexe?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_sexe")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV nowrap champ="voix"  style="cursor:pointer;width:<?=col_lm_voix?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_voix")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV nowrap champ="affinite"  style="cursor:pointer;width:<?=col_lm_aff?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_affinite")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     </TR>
</TABLE>
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