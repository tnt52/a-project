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
<DIV class="pseudo"><?=htmlentities($row['pseudo'])?></DIV>
<DIV CLASS="date"><?=lang("lib_dateIns")." ".formatOutDBdate($row['datecrea'])?></DIV>
<?$liblien= $row['nblienstot']>1? lang("lib_liens"):lang("lib_lien");
$libmembre= $row['nbmemlies']>1? lang("lib_membres"):lang("lib_membre");?>
<DIV class="lienstxt"><?=$row['nblienstot']." ".$liblien." ".lang("lib_avec")." ".$row['nbmemlies']." ".$libmembre?></DIV>
<DIV CLASS="voix"><?=lang("lib_voix").": ".htmlentities($row['voix'])?></DIV>
<DIV class="texte"><?=$row['texte']?></DIV>
<DIV id="avatar"><img src="<?=base_url()?>system/application/<?=$avasrc?>" alt="" title="smiling" width="<?=wIDimg?>px" height="<?=hIDimg?>px" border="0" /></DIV>
<DIV id="deconnect"><?=lang("lib_medeconnecter")?></DIV>
<?endforeach?>
</body>

</html>