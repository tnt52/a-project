<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
function initHeadM(){
         if (Msel==null) $$('.repMselCol').setStyle('opacity',0);
}
window.addEvent('domready', function(){
var s2 = new CustomSelect($('typeaff'), {
      theme : 'lines',
      
      onSelect: function(el) {

      },
      onChange: function(el) {
	      SelTA();
      },
      onShow: function(el) {

      },
      onHide: function(el) {

      }
    });
initHeadM();
cfeHeadM.init({scope:$('HeadLM') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});    

</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV id="titleLM" class="CatTitle membres" ALIGN=CENTER><?=lang("lib_Membres")?></DIV>
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
            <option value="<?=TAglo?>"><?=lang('lib_tout')?></option>
            <option value="<?=TAson?>"><?=lang('lib_les')." ".lang('lib_sons')?></option>
            <option value="<?=TAimg?>"><?=lang('lib_les')." ".lang('lib_images')?></option>
            <option value="<?=TAtxt?>"><?=lang('lib_les')." ".lang('lib_textes')?></option>
            <option value="<?=TAvdo?>"><?=lang('lib_les')." ".lang('lib_videos')?></option>
            <option value="<?=TAavi?>"><?=lang('lib_les')." ".lang('lib_avis')?></option>
            <option value="<?=TAgou?>"><?=lang('lib_les')." ".lang('lib_gouts')?></option>
            </select>
</DIV>
<TABLE id="LMHeads" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='left'>
     <COL WIDTH=<?=col_lm_sexe?>>
     <COL WIDTH=<?=col_lm_pseudo?>>
     <COL WIDTH=<?=col_lm_liens?>>
     <COL WIDTH=<?=col_lm_aff?>>
     <TR>
     <TD COLSPAN=4>
     
     </TD>
     </TR>
     <TR >
     <TD VALIGN="BOTTOM" >
         <DIV nowrap champ="sexe">
         </DIV>
     </TD>
     <TD VALIGN="BOTTOM">
         <DIV nowrap champ="pseudo"  style="cursor:pointer;width:<?=col_lm_pseudo?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_pseudo")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     
     <TD VALIGN="BOTTOM" ALIGN="CENTER">
         <DIV nowrap champ="liens"  style="cursor:pointer;width:<?=col_lm_liens?>px;overflow: hidden" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <!--<?=lang("lib_voix")?>--> <img id="liens" class="desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD VALIGN="BOTTOM" ALIGN="CENTER">
         <DIV nowrap champ="affinite"  style="cursor:pointer;width:<?=col_lm_aff?>px;overflow: hidden" onmousedown="pressTri(this)" onmouseup="releaseTri(this)" onclick="triM(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <!--<?=lang("lib_affinite")?>--> <img id="affinite" class="desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     </TR>
</TABLE>
</body>
<STYLE>
<?$hLA=20;$hLA=20?>
#liens,#affinite {
  vertical-align: text-top;
  width: <?=$wLA?>px;
  height:<?=$hLA?>px;
  background: no-repeat 0 0;
}
#liens {background-image: url(http://127.0.0.1/system/application/images/champs/liens.png);}
#liens.asc.A {background-position: 0 -<?=4*$hLA?>px;}
#liens.desc.A {background-position: 0 -<?=3*$hLA?>px;}
#liens.H {background-position: 0 -<?=2*$hLA?>px;}
#liens.H.A {background-position: 0 -<?=2*$hLA?>px;}
#liens.H.C {background-position: 0 -<?=2*$hLA?>px;}
#liens.H.A.C {background-position: 0 -<?=2*$hLA?>px;}

#affinite {background-image: url(http://127.0.0.1/system/application/images/champs/affinites.png);}
#affinite.asc.A {background-position: 0 -<?=4*$hLA?>px;}
#affinite.desc.A {background-position: 0 -<?=3*$hLA?>px;}
#affinite.H {background-position: 0 -<?=2*$hLA?>px;}
#affinite.H.A {background-position: 0 -<?=2*$hLA?>px;}
#affinite.H.C {background-position: 0 -<?=2*$hLA?>px;}
#affinite.H.A.C {background-position: 0 -<?=2*$hLA?>px;}

/*.desc.H {background-position: 0 -<?=$hLA?>px;}
.desc.H.A {background-position: 0 -<?=2*$hLA?>px;}
.desc.H.A.C {background-position: 0 -<?=$hLA?>px;}*/
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
<?$wTriSx=15;$hTriSx=20?>
.trisexe {
  vertical-align: text-top;
  width: <?=$wTriSx?>px;
  height:<?=$hTriSx?>px;
  background: no-repeat 0 0;
}
.trisexe {background-image: url(http://127.0.0.1/system/application/images/icones/sexes.png);}

.trisexe.asc.A {background-position: 0 -<?=3*$hTriSx?>px;}
.trisexe.asc.H {background-position: 0 -<?=$hTriSx?>px;}
.trisexe.asc.H.A {background-position: 0 -<?=5*$hTriSx?>px;}
.trisexe.asc.H.A.C {background-position: 0 -<?=6*$hTriSx?>px;}
.trisexe.asc.H.C {background-position: 0 -<?=2*$hTriSx?>px;}

.trisexe.desc.A {background-position: 0 -<?=7*$hTriSx?>px;}
.trisexe.desc.H {background-position: 0 -<?=5*$hTriSx?>px;}
.trisexe.desc.H.A {background-position: 0 -<?=$hTriSx?>px;}
.trisexe.desc.H.A.C {background-position: 0 -<?=2*$hTriSx?>px;}
.trisexe.desc.H.C {background-position: 0 -<?=6*$hTriSx?>px;}

</STYLE>
</html>