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
     <DIV CLASS="Titre"><?=htmlentities($row['titre'])?></DIV>
           <?=lang('lib_de')?>
     <DIV CLASS="Nom">
          <!--<a href="#" onclick="GetArtiste(<?=$row['keymembre']?>);StopEvent(event);" liste="LO"><?=htmlentities($row['nom'])?></a>-->
          <a href="#" onclick="More(this);StopEvent(event);" cle="<?=$row['keymembre']?>" liste="AO" visu="<?=$vmore?>" cat="<?=TMart?>" keyM="<?=$row['keymembre']?>" sel="false" maj="true">
          <?=htmlentities($row['nom'])?></a>
          <DIV STYLE="Display:none" ID="<?=$row['keymembre']."moreAO".TMart?>"></DIV>
     </DIV>
     <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
     <TR>
     <TD width="48%" ALIGN="RIGHT"><DIV CLASS="DateO"><?=lang('lib_dateVDO')." ".$row['dateoeuvre']?></DIV></TD>
     <TD width="4%"></TD>
     <TD width="48%%" ALIGN="LEFT"><DIV CLASS="DateC"><?=lang('lib_dateOnL')." ".$row['datecrea']?></DIV></TD>
     </TR></TABLE>
</DIV>
<DIV>  <!-- FOOTER -->
     <DIV CLASS="Dim"><?=lang('lib_duree').": ".$row['dimensions']?></DIV>
     <DIV CLASS="Par"><?$v=parseDBout($row['par']);
          foreach ($v as $value){
           if (count($value)>1)
           echo htmlentities($value[0]).":".htmlentities($value[1])."\n<br>";
          }?></DIV>
     <DIV CLASS="Descr">
     <?=$row['description']?>
     </DIV>
</DIV>
<?endforeach?>
</body>
</html>