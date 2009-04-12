<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">

<SCRIPT type="text/javascript">

</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV> <!-- HEADER -->
  <?foreach($result as $row):?>
  <DIV><img src="<?=base_url()?>system/application/images/smiling.gif" alt="" title="smiling" width="100" height="100" border="0" /></DIV>
  <DIV CLASS="Pseudo"><?=htmlentities($row['pseudo'])?></DIV>
  <DIV CLASS="Voix"><?=htmlentities($row['voix'])?></DIV>
  <DIV CLASS="Date"><?=$row['datecrea']?></DIV>
  <DIV CLASS="Affinite"><?=$row['affglobal']?></DIV>
  <DIV>
  <?=$row['texte']?>
  </DIV>
  <?endforeach?>
</DIV>
<DIV>    <!-- FOOTER -->
</DIV>
</body>
</html>

