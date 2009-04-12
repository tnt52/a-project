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
<body>
<DIV id="artiste_v">
<? foreach($artiste as $row):
$arts=simpleparseDBout($row['typesart']);?>
     <DIV CLASS="Nom"><?=htmlentities($row['nom'])?></DIV>
     <DIV CLASS="Arts"><? echo htmlentities($arts[0]); for ($i=1;$i<count($arts);$i++) echo ", ".$arts[$i];?></DIV>
     <DIV CLASS="DateC"><?=formatOutDBdate($row['datecrea'])?></DIV>
<?endforeach?>
<? if (count($sons)>0):?>
     <DIV CLASS="Sons"><?=count($sons)." ".lang("nav_sons")?></DIV>
     <?foreach($sons as $row):?>
     <a style="Display:block" id="<?=$row['cle'].'titreOA'?>" href="#" class="Titre listitem" visu="<?=$vmore?>" onclick="More(this);StopEvent(event);" cle="<?=$row['cle']?>" liste="OA" cat="<?=$row['type']?>" majpr="true" keyM="<?=$row['keymembre']?>" repM="<?=$row['reponse']?>" sel="false" maj="true">
        <?=htmlentities($row['titre'])?>
     </a>
     <DIV STYLE="Display:none" ID="<?=$row['cle']."moreOA".$row['type']?>"></DIV>
     <?endforeach;
endif;?>
</DIV>
<DIV></DIV><!--FOOTER-->
</BODY>
</HTML>