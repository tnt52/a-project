<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  var mores=$$('div#membres #membres<?=$page?> tr');
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
<DIV nowrap ALIGN="LEFT" STYLE="height:<?=hLLM?>px;overflow:hidden">
	<TABLE ALIGN="LEFT" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid;">
	    <COL WIDTH=<?=col_lm_sexe?>>
	    <COL WIDTH=<?=col_lm_pseudo?>>
	    <COL WIDTH=<?=col_lm_liens?>>
	    <COL WIDTH=<?=col_lm_aff?>>
	
	    <TR VALIGN=TOP CLASS="listitem" liste="ML" visu="2" cle="<?=$row['cle']?>" cat="<?=TMmem?>" type="<?=$row['type']?>" sel="false" maj="true">
		<TD>
		    <DIV nowrap style="width:<?=col_lm_sexe?>px;overflow: hidden">
		    <img src="<?=base_url()?>/system/application/images/<?
		    switch ($row['sexe']){
			    case 0: echo "icones/femi.png";break;
			    case 1: echo "icones/masc";break;
			    default:echo "spacer.gif";break;
		    }?>"/>
		   </DIV>
		</TD>
		<TD>
		    <DIV class="pseudo" nowrap style="width:<?=col_lm_pseudo?>px;overflow: hidden"><?=$row['pseudo']?></DIV>
		    <input type="hidden" id="<?=$row['cle']."avatarML"?>" value="<?if ($row['avatar']=="") echo "images/AvatarDef.gif";else echo "catalogue/".$row['cle']."/".$row['avatar'];?>"/>
		    <DIV STYLE="Display:none" ID="<?=$row['cle']."idML"?>">
			 <DIV CLASS="pseudo"><?=htmlentities($row['pseudo'])?></DIV>
			 <DIV CLASS="date"><?=lang("lib_dateIns")." ".formatOutDBdate($row['datecrea'])?></DIV>
			 <?$liblien= $row['nblienstot']>1? lang("lib_liens"):lang("lib_lien");
			   $libmembre= $row['nbmemlies']>1? lang("lib_membres"):lang("lib_membre");?>
			 <DIV class="lienstxt"><?=$row['nblienstot']." ".$liblien." ".lang("lib_avec")." ".$row['nbmemlies']." ".$libmembre?></DIV>
			 <DIV CLASS="voix"><?=lang("lib_voix").": ".htmlentities($row['voix'])?></DIV>
			 <DIV class="texte"><?=$row['texte']?></DIV>
		    </DIV>
		    <DIV STYLE="Display:none" ID="<?=$row['cle']."moreML".TMmem?>"></DIV>
		</TD>        
		<TD ALIGN="CENTER">
		    <DIV nowrap style="width:<?=col_lm_liens?>px;overflow: hidden"><?=$row['liens']?></DIV>
	
		</TD>
		<TD ALIGN="CENTER">
		   <DIV nowrap style="width:<?=col_lm_aff?>px;overflow: hidden"><?=$row['affinite']?></DIV>
		</TD>
	    </TR>
	    
	</TABLE>
</DIV>
<? endforeach; endif?>
</BODY>
<STYLE>

</STYLE>
</HTML>