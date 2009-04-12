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
      m.sel="false";
      m.maj="true";
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (){selMember(m,"liste")});
  });
});
</script>
</HEAD>
<BODY>
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid;">
    <COL WIDTH=<?=col_lm_plus?>>
    <COL WIDTH=<?=col_lm_pseudo?>*>
    <COL WIDTH=<?=col_lm_sexe?>>
    <COL WIDTH=<?=col_lm_voix?>>
    <COL WIDTH=<?=col_lm_aff?>>
    <TR VALIGN=TOP>
        <TD>
            <P>Plus</P>
        </TD>
        <TD>
            <P>Pseudo</P>
        </TD>
        <TD>
            <P>Sexe</P>
        </TD>
        <TD>
            <P>Voix</P>
        </TD>
        <TD>
            <P>Affinité</P>
        </TD>
    </TR>
    <?php
    if ($result->num_rows() > 0):
           foreach ($result->result_array() as $row): ?>

    <TR VALIGN=TOP cle="<?=$row['cle']?>" cat="<?=TMmem?>">
        <TD>
        <DIV CLASS="more" >+/-</DIV>
        <DIV STYLE="Display:none" ID="<?=$row['cle']."more".TMmem?>"></DIV>
        </TD>
        <TD> <DIV nowrap style="width:<?=col_lm_pseudo?>px;overflow: hidden"><?=$row['pseudo']?></DIV>
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
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
<TR>
<TD width="20"><? if ($page>1):?><a href="javascript:membres_page(<?=$page-1?>)" target="_self">&lt;</a><?endif?></TD>
<TD ALIGN="CENTER"><?for ($i=1; $i<$page; $i++) :?>
    <a href="javascript:membres_page(<?=$i?>)" target="_self"><?=$i?></a>
    <?endfor?>
    <strong><a href="javascript:membres_page(<?=$page?>)" target="_self"><?=$page?></a></strong>
    <?for ($i=$page+1; $i<$Ptot+1; $i++) :?>
    <a href="javascript:membres_page(<?=$i?>)" target="_self"><?=$i?></a>
    <?endfor?>
</TD>
<TD width="20"><? if ($page<$Ptot):?><a href="javascript:membres_page(<?=$page+1?>)" target="_self">&gt;</a><?endif?></TD>
</TR></TABLE>
</BODY>
<STYLE>

</STYLE>
</HTML>