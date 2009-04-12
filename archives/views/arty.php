<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE>arty.st</TITLE>
    <SCRIPT language="JavaScript" type="text/JavaScript">
    var cat=<?=$cat?>;
    var urlbase='<?=base_url()?>';
    </SCRIPT>
    <STYLE>
    #compte {
             position:absolute;
             left: 80%;
             top: 0px;
             width:150;
    }

    </STYLE>
    <?=$Header?>
</HEAD>
<BODY LANG="fr-FR" DIR="LTR">
<DIV id="compte">
<?=$account?>
</DIV>
<TABLE ID="menu" WIDTH="80%">
     <TR>
     <TD><?echo anchor(base_url().'index.php/navigation/affiche/'.TMart, 'Artistes', array('title' => 'Les Artistes arty.st','target'=>'_self'));?> <img src="c:/users/i/desktop/sans titre.jpg" alt="Artistes" id="Artistes" cat="<?=TMart?>"></TD>
     <TD><DIV id="Sons"><?echo anchor(base_url().'index.php/navigation/affiche/'.TOson, 'Sons', array('title' => 'Les Sons d\'arty.st','target'=>'_self'));?></DIV></TD>
     <TD><DIV id="Images">Images</DIV></TD>
     <TD><DIV id="Textes">Textes</DIV></TD>
     <TD><DIV id="Videos">Videos</DIV></TD>
     <TD><DIV id="Agenda">Agenda</DIV></TD>
     <TD><DIV id="Avis"><?echo anchor(base_url().'index.php/navigation/affiche/'.TQ, 'Questions', array('title' => 'Questions d\'affinité','target'=>'_self'));?></DIV></TD>
     <TD><DIV id="Membres"><?echo anchor(base_url().'index.php/navigation/affiche/'.TMmem, 'Membres', array('title' => 'Les Membres d\'arty.st','target'=>'_self'));?></DIV></TD>
     </TR>
</TABLE>
<DIV id="liste">
<?=$liste_v?>
</DIV>
</BODY>
</HTML>