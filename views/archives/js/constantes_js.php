<? require("../../helpers/types_helper.php"); require("../../helpers/dimensions_helper.php");?>
<?header("Content-Type: text/javascript");?>
var TOson=<?=TOson?>;
var TQgout=<?=TQgout?>;
var TQavis=<?=TQavis?>;
var TScours=<?=TScours?>;
var TA=<?=TA?>;
var TAglo=<?=TAglo?>;
var TAoeu=<?=TAoeu?>;
var TAson=<?=TAson?>;
var TAque=<?=TAque?>;

Head="<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE='page-break-before: always; page-break-inside: avoid' align='center'><TR VALIGN=TOP><TD width=<?=col_plus?>>Plus</TD>";
HeadSon="<TD width=<?=col_titre?>>Titre</TD><TD width=<?=col_artiste?>>Artiste</TD><TD width=<?=col_avis?>>Les avis dé</TD><TD width=<?=col_avis?>>Ton avis</TD>";
HeadGout="<TD width=100>Libelle</TD><TD width=50>Pseudo</TD><TD width=20>Sexe</TD><TD width=50>Les avis dé</TD><TD width=50>Ton avis</TD>";
HeadAvis="<TD width=<?=col_libelle?>>Libelle</TD><TD width=<?=col_pseudo?>>Pseudo</TD><TD width=<?=col_sexe?>>Sexe</TD><TD width=<?=col_avis?>>Les avis dé</TD><TD width=<?=col_avis?>>Ton avis</TD>"