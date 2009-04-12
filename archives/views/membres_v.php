<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
cat=<?=TMmem?>;
<?=$script?>
</script>
</HEAD>
<BODY>
<TABLE WIDTH=80% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
    <!--<COL WIDTH=43*>
    <COL WIDTH=43*>
    <COL WIDTH=43*>
    <COL WIDTH=43*>
    <COL WIDTH=43*>
    <COL WIDTH=43*>-->
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

    <TR VALIGN=TOP>
        <TD>
        <DIV CLASS="more" cle="<?=$row['cle']?>">Plus</DIV>
        </TD>
        <TD>
            <?=$row['pseudo']?>
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
    <TR>
        <TD COLSPAN="6"><DIV ID="<?=$row['cle']?>more"></DIV></TD>
    </TR>
    <? endforeach; endif?>
</TABLE>
</BODY>
</HTML>