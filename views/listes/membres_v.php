<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  var mores=$$('div#membres tr');
  mores.each(function(m){
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (event){showID(m);StopEvent(event);});   //selMember(m,"liste")
  });
});
</script>
</HEAD>
<BODY>
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid;">
    <COL WIDTH=<?=col_lm_pseudo?>>
    <COL WIDTH=<?=col_lm_sexe?>>
    <COL WIDTH=<?=col_lm_voix?>>
    <COL WIDTH=<?=col_lm_aff?>>
    <?php
    if (count($result) > 0):
           foreach ($result as $row): ?>
    <TR VALIGN=TOP CLASS="listitem" liste="ML" visu="2" cle="<?=$row['cle']?>" cat="<?=TMmem?>" type="<?=$row['type']?>" sel="false" maj="true">
        <TD>
            <DIV nowrap style="width:<?=col_lm_pseudo?>px;overflow: hidden"><?=$row['pseudo']?></DIV>
            <input type="hidden" id="<?=$row['cle']."avatarML"?>" value="<?if ($row['avatar']=="") echo "images/AvatarDef.gif";else echo "catalogue/".$row['cle']."/".$row['avatar'];?>"/>
            <DIV STYLE="Display:none" ID="<?=$row['cle']."idML"?>">
                 <DIV CLASS="Pseudo"><?=htmlentities($row['pseudo'])?></DIV>
                 <DIV CLASS="Date"><?=lang("lib_dateIns")." ".formatOutDBdate($row['datecrea'])?></DIV>
                 <DIV CLASS="Voix"><?=lang("lib_voix").": ".htmlentities($row['voix'])?></DIV>
                 <DIV ><?=lang("lib_ilexprime")." ".$row['nbrepoeutot']." ".lang("lib_oeuvres")." ".lang("lib_etsur")." ".$row['nbrepquetot']." ".lang("lib_questions")?></DIV>
            </DIV>
            <DIV STYLE="Display:none" ID="<?=$row['cle']."moreML".TMmem?>"></DIV>
        </TD>
        <TD>
            <?=$row['sexe']?>
        </TD>
        <TD>
            <?=$row['voix']?>

        </TD>
        <TD>
           <?=$row['affglobal']?>
        </TD>
    </TR>
    <? endforeach; endif?>
</TABLE>
</BODY>
<STYLE>

</STYLE>
</HTML>