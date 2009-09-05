<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  var mores=$$('div#membres #membres<?=$page?> .listitem');
  mores.each(function(m){
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (event){showID(m);StopEvent(event);});   //selMember(m,"liste")
  });
});
</script>
</HEAD>
<BODY>
<input type="hidden" id="Mnumrows<?=$page?>" value="<?=$numrows?>"/>

    <?php
    if (count($result) > 0):
           foreach ($result as $row): ?>
	<DIV ALIGN="LEFT" STYLE="height:<?=hL?>px" CLASS="listitem" liste="ML" visu="2" cle="<?=$row['cle']?>" cat="<?=TMmem?>" type="<?=$row['type']?>" sel="false" maj="true">
	    <div nowrap style="position:relative;float:left;display:inline;height:<?=hL?>px;width:<?=col_lm_sexe?>px;overflow: hidden">
		    <img src="<?=base_url()?>/system/application/images/<?
		    switch ($row['sexe']){
			    case 0: echo "icones/femi.png";break;
			    case 1: echo "icones/masc";break;
			    default:echo "spacer.gif";break;
		    }?>"/>
	</div>
	<div nowrap style="position:relative;float:left;display:inline;height:<?=hL?>px; width:<?=col_lm_pseudo?>px;overflow: hidden"><?=$row['pseudo']?></div>
	<input type="hidden" id="<?=$row['cle']."avatarML"?>" value="<?if ($row['avatar']=="") echo "images/AvatarDef.gif";else echo "catalogue/".$row['cle']."/".$row['avatar'];?>"/>
	<DIV STYLE="Display:none" ID="<?=$row['cle']."idML"?>">
		<DIV CLASS="Pseudo"><?=htmlentities($row['pseudo'])?></DIV>
		<DIV CLASS="Date"><?=lang("lib_dateIns")." ".formatOutDBdate($row['datecrea'])?></DIV>
		<DIV CLASS="Voix"><?=lang("lib_voix").": ".htmlentities($row['voix'])?></DIV>
		<DIV ><?=lang("lib_ilexprime")." ".$row['nbrepoeutot']." ".lang("lib_oeuvres")." ".lang("lib_etsur")." ".$row['nbrepquetot']." ".lang("lib_questions")?></DIV>
	</DIV>
	<DIV STYLE="Display:none" ID="<?=$row['cle']."moreML".TMmem?>"></DIV>
	<div nowrap style="position:relative;float:left;display:inline;height:<?=hL?>px;width:<?=col_lm_voix?>px;overflow: hidden"><?=$row['voix']?></DIV>
	<div nowrap style="position:relative;float:left;display:inline;height:<?=hL?>px;width:<?=col_lm_aff?>px;overflow: hidden"><?=$row['affinite']?></DIV>
	</DIV>
    <? endforeach; endif?>

</BODY>
<STYLE>

</STYLE>
</HTML>