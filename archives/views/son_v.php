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
<DIV CLASS="Titre"><?=$row['titre']?></DIV>
<DIV CLASS="Nom"><?=$row['nom']?></DIV>
<DIV CLASS="DateO"><?=$row['dateoeuvre']?></DIV>
<DIV CLASS="Dim"><?=$row['dimensions']?></DIV>
<DIV CLASS="Player" fichier="<?=$row['fichier']?>"></DIV>
<DIV CLASS="Par"><?$v=$this->Parseurs->parseSQLout($row['par']);
     foreach ($v as $value){
      if (count($value)>1)
      echo $value[0].":".$value[1]."<br>";
     }?></DIV>
<DIV CLASS="Descr">
<TEXTAREA WRAP='SOFT' owerflow=Hidden COL="" ROW=3 READONLY STYLE="border-style=none none none none; border-color=#FFFFFF; border-width=0 0 0 0;">
<?=$row['description']?></TEXTAREA></DIV>
<?endforeach?>

</body>

</html>