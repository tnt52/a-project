<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
cat=<?=TOson?>;
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
        <TD >
            <P>Plus</P>
        </TD>
        <TD >
            <P>Titre</P>
        </TD>
        <TD >
            <P>Artiste</P>
        </TD>
        <TD >
            <P>Les avis dé
            </P>
        </TD>
        <TD >
            <P>Ton avis</P>
        </TD>
        <TD >
            <P>Play</P>
        </TD>
    </TR>
    <?php
    if ($result->num_rows() > 0):
           foreach ($result->result_array() as $row): ?>

    <TR VALIGN=TOP>
        <TD >
            <DIV CLASS="more" cle="<?=$row['cle']?>">Plus</DIV>
        </TD>
        <TD >
            <?=$row['titre']?>
        </TD>
        <TD >
            <?=$row['nom']?>
        </TD>
        <TD >
            <?=$row['adhesion']?>

        </TD>
        <TD  ROWSPAN=2 VALIGN=BOTTOM>
            <?=$this->viewPR($row['cle'],$row['keymembre'],$row['reponse'])?>
        </TD>
        <TD ROWSPAN=2 VALIGN=BOTTOM>
            <?$row['fichier']?>
        </TD>
    </TR>
    <TR>
        <TD COLSPAN="4" width="60%"><DIV ID="<?=$row['cle']?>more"></DIV></TD>
    </TR>
    <? endforeach; endif?>
</TABLE>
</BODY>
</HTML>