<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
var libdefO='<?=$libdefO?>';
<?=$js?>
</SCRIPT>
<style>

</style>
</head>
<body bgcolor="#FFFFFF">
<DIV id="titleQ" class="CatTitle" ALIGN=CENTER><?=lang("nav_sons")?></DIV>
<DIV id="logoCat"><img src="<?=base_url()?>system/application/images/CatTitles/sons_logoxl.gif" alt="" title="Images" border="0" /></DIV>
<span id="SearchCat" >
      <form method="post" action="#" onsubmit="searchCat(this,event)">
      <DIV id="searchQO">
      	<input type="text" name="searchtextcat" id="searchtextcat" size="25" onfocus="focusDef(this,libdefO)" onblur="blurDef(this,libdefO)" onkeyup="keyupSearch.delay(500,this)" value="<?=$libdefO?>" /><label for="searchtextcat"></label>
      </DIV>
      <DIV id="avismanquants" >
      	<label id="libselavis" for="#"></label>
	    <select id="selavis" name="selavis" size="1" >
            <option value="<?=ALL?>"><?=lang('lib_tous')?></option>
            <option value="<?=SSavis?>"><?=lang("lib_avismanquants")?></option>
            <option value="<?=AVavis?>"><?=lang("lib_avecavis")?></option>
            </select>	    
      </DIV>
      <!--<input type="checkbox" name="avismanq" id="avismanq" /><label id="labelavismq" for="#"><?=lang("lib_avismanquants")?></label>-->
      <input id="searchtablescat" name="searchtablescat" type="hidden" value=",oeuvres.titre,artistes.nom"/>
      </form>
</span>

     <TABLE id="CatHeads" WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='center'>
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
     </TR>
     <TR >
     <? foreach($champs as $key=>$value):?>
     <TD >
         <DIV id="head_<?=$value?>" champ="<?=$value?>"  style="cursor:pointer;width:<?=$cols[$key]?>px;overflow: hidden" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_$value")?> <img class="tri asc" src="<?=base_url()?>system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <?endforeach?>
     <TD >
         <DIV id="head_portee" champ="portee"  style="cursor:pointer;width:<?=col_avis?>px;overflow: hidden" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_portee")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_adhesion" champ="adhesion"  style="cursor:pointer;width:<?=col_avis?>px;overflow: hidden" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_adhesion")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_rep1.reponse" champ="rep1.reponse"  style="cursor:pointer;width:<?=col_avis?>px;overflow: hidden" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_marep")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD class="repMselCol" >
         <DIV id="head_rep2.reponse" champ="rep2.reponse"  style="cursor:pointer;width:<?=col_avis?>px;overflow: hidden" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_sarep")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
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