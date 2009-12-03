<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT type="text/javascript">
</SCRIPT>
<STYLE>
</STYLE>
</head>
<body><?foreach($result as $row):?>
<DIV> <!-- HEADER -->
     <DIV CLASS="Libelle"><?=htmlentities($row['libelle'])?></DIV>
     <DIV CLASS="Pseudo">
          <a href="#" onclick="More(this);StopEvent(event);" cle="<?=$row['keymembre']?>" liste="MQ" visu="<?=$vmore?>" cat="<?=TMmem?>" keyM="<?=$row['keymembre']?>" sel="false" maj="true">
          <?=htmlentities($row['pseudo'])?></a>
          <DIV STYLE="Display:none" ID="<?=$row['keymembre']."moreMQ".TMmem?>"></DIV>
     </DIV>
     <DIV CLASS="DateQ"><?=lang('lib_dateOnL')." ".$row['datecrea']?></DIV>
     <DIV CLASS="Portee"><?=lang('lib_portee').":".$row['portee']." (".$row['nbrerep']." ".lang('lib_reponses').")"?></DIV>
</DIV>
<DIV>  <!-- FOOTER -->
</DIV>
<?endforeach?>
</body>
</html>