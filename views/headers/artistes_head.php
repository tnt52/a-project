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
<DIV id="CatTitle" ALIGN=CENTER>Artistes</DIV>
<DIV id="SearchCat">
<form method="post" action="#" onsubmit="searchCat(this,event)">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td rowspan="2">
          <input type="text" name="searchtextcat" id="searchtextcat" />
          <label for="searchtextcat"></label>
          <input type="submit" class="GO" value="GO" />dans
      </td>
      <td><input type="checkbox" name="inTC1" id="inTC1" value="nom" checked />
          les
          <label for="inTC1">Artistes</label>
      </td>
    </tr>
    <tr>
      <td>
          <input type="checkbox" name="inTC2" id="inTC2" value="typesart" checked />
          les
          <label for="inTC2">Arts</label>
      </td>
    </tr>
  </table>
</form>
</DIV>
    <label for="limitQO">résultats par page</label>
    <select id="limitQO" name="limitQO" size="1">
    <option >20</option>
    <option>50</option>
    <option>100</option>
    </select>
<div id="PagesCat">
</div>
<DIV id="CatHeads">
     <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='center'>
     <COL WIDTH=<?=col_nom?>>
     <COL WIDTH=<?=col_arts?>>
     <COL WIDTH=<?=col_count?>>
     <COL WIDTH=<?=col_count?>>
     <COL WIDTH=<?=col_count?>>
     <COL WIDTH=<?=col_count?>>
     <TR >
     <TD >
         <DIV id="head_nom" champ="nom"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_nom")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_typesart" champ="typesart"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("lib_arts")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_nbimg" champ="nbimg"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("nav_images")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_nbson" champ="nbson"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("nav_sons")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_nbtxt" champ="nbtxt"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("nav_textes")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
         </DIV>
     </TD>
     <TD >
         <DIV id="head_nbvdo" champ="nbvdo"  style="cursor:pointer" onclick="triCat(this)" onmouseover="hoverTri(this)" onmouseout="unhoverTri(this)">
         <?=lang("nav_videos")?> <img class="tri desc" rang="" src="<?=base_url()?>/system/application/images/spacer.gif" />
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