<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
</head>
<body bgcolor="#FFFFFF">
<?foreach($result as $row):
if ($row['avatar']=="") $avasrc="images/AvatarDef.gif";
else $avasrc="catalogue/".$row['cle']."/".$row['avatar'];
?>
<DIV STYLE="position:absolute;top:10px;left:5px;width:<?=wID-wIDimg-15?>px;line-height:20px;text-align:center;">
  <DIV id="mypseudo"><?=htmlentities($row['pseudo'])?></DIV>
  <DIV CLASS="Date"><?=lang("lib_dateIns")." ".formatOutDBdate($row['datecrea'])?></DIV>
  <DIV CLASS="Voix"><?=lang("lib_voix").": ".htmlentities($row['voix'])?></DIV>
</DIV>

<DIV STYLE="position:absolute;top:<?=hIDimg+10?>px;left:5px;width:<?=wID-10?>px;text-align:center;">
  <?=lang("lib_jai")." ".$row['nblienstot']." ".lang("lib_liens")." ".lang("lib_avec")." ".$row['nbmemlies']." ".lang("lib_membres")?>
  <?//=lang("lib_jexprime")." ".$row['nbrepoeutot']." ".lang("lib_oeuvres")." ".lang("lib_etsur")." ".$row['nbrepquetot']." ".lang("lib_questions"),?>
</DIV>
<DIV id="avatar"><img src="<?=base_url()?>system/application/<?=$avasrc?>" alt="" title="smiling" width="<?=wIDimg?>px" height="<?=hIDimg?>px" border="0" /></DIV>
<DIV id="deconnect"><?=lang("lib_medeconnecter")?></DIV>
<DIV id="moncompte"><?=lang("lib_moncompte")?></DIV>
<!--<TABLE border="0" cellpadding="0" cellspacing="0">
<TR>
<TD>

</TD>
<TD>

</TD>-->
<?endforeach?>
</body>

</html>