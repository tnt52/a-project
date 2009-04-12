<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
<?=$js?>
</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV class="CatTitle oeuvres" ALIGN=CENTER>Oeuvres</DIV>
<!--<TABLE BORDER=0 width="100%" CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
    <COL WIDTH="30%">
    <COL>
    <COL WIDTH="30%">
    <TR valign="top">
    <TD ALIGN="LEFT">
      <span>
            <label for="limitQO">Affichage:</label>
            <select id="limitQO" name="limitQO" size="1" style="width:30px">
            <option>20</option>
            <option>50</option>
            <option>100</option>
            </select>
            <?=" ".lang("lib_par")." ".lang("lib_page")?>
      </span>
    </TD>
    <TD ALIGN="RIGHT">
      <span id="SearchCat" >
      <form method="post" action="#" onsubmit="searchCat(this,event)">
        <TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
        <TR>
            <TD ALIGN="RIGHT">
            <input type="text" name="searchtextcat" id="searchtextcat" size="15" value="<?=lang("lib_chercher")?>" /><label for="searchtextcat"></label>
            </TD>
            <TD ALIGN="LEFT">
            <?=" ".lang("lib_parmiles")?>
            <input type="checkbox" name="inTC1" id="inTC1" value="oeuvres.titre" checked /><label for="inTC1"><?=lang("lib_oeuvres")?></label>
            <input type="checkbox" name="inTC2" id="inTC2" value="artistes.nom" checked /><label for="inTC2"><?=lang("lib_artistes")?></label>
            </TD>
            <TD ALIGN="RIGHT">
            <input type="submit" class="GO" value="GO"/>
            </TD>
        </TR>
        </TABLE>
      </form>
      </span>
    </TD>
    <TD ALIGN="RIGHT">
        <span id="PagesCat"></span>
    </TD>
    </TR>
</TABLE>-->
<DIV id="CatHeads"><!---->
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