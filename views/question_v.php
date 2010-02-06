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
<DIV > <!-- HEADER -->
<?$enl=htmlentities(substr($row['libelle'],0,1));$l=htmlentities(substr($row['libelle'],1));?>
<DIV CLASS="Libelle"><span style="font-size:48px"><?=$enl?></span><?=$l?></DIV>
     <SPAN style="position: absolute; right: 10px;">
	     <a href="#" onclick="More(this);StopEvent(event);" cle="<?=$row['keymembre']?>" liste="MQ" visu="2" cat="<?=TMmem?>" keyM="<?=$row['keymembre']?>" sel="false" maj="true">
		  <?=htmlentities($row['pseudo'])?>
	     </a>
	     <DIV STYLE="Display:none" ID="<?=$row['keymembre']."moreMQ".TMmem?>"></DIV>
	     &nbsp <i><?=lang('lib_le')." ".DatefromDB($row['datecreation'])?></i>
     </SPAN>
     <DIV CLASS="Portee" style="font-size:10px"><?=lang('lib_portee').":".$row['portee']." (".$row['nbrerep']." ".lang('lib_reponses').")"?></DIV>
</DIV>
<DIV>  <!-- FOOTER -->
</DIV>
<?endforeach?>
</body>
</html>