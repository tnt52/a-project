<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<?foreach($result as $row):?>
<SCRIPT type="text/javascript">
</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV CLASS="Libelle"><?=htmlentities($row['libelle'])?></DIV>
<DIV CLASS="Pseudo"><?=htmlentities($row['pseudo'])?></DIV>
<DIV CLASS="DateC"><?=$row['datecrea']?></DIV>
<?endforeach?>
</body>

</html>