<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE>arty.st</TITLE>
    <SCRIPT language="JavaScript" type="text/JavaScript">
    var cat=<?=$cat?>;
    var TM=<?=TMmem?>;
    var urlbase='<?=base_url()?>';
    </SCRIPT>
    <STYLE>
    #cockpit{
      position:absolute;
      top:0px;
      left:0px;
      z-index:2;
    }
    #Inavigation {
     position:relative
     top:0px;
     left:0px;
     height:300;
     width:200;
     border: #bcc2fc double 5px;
    }
    #categorie {
     background-color:yellow;
     position:relative
     top:0px;
     right:0;
     border: #bcc2fc double 5px;
     width:100%;
     height:100;
    }
    #Imembres{
     background-color:red;
     position:relative;
     top:0px;
     right:0px;
     height:300;
     width:200;
     border: #bcc2fc double 5px;
    }
    #bas {
     position:relative;
     bottom:0px;
     left:0px;
     border: #bcc2fc double 5px;
     width:100%;
     height:100;
    }
 /*   #membres {
     position:relative;
     top:0px;
     left:0px;
    }
    #affinimap {
     position:relative;
     bottom:0px;
     left:0px;
    }
    #avatar {
     position:relative;
     top:0px;
     left:0px;
    }
    #compte {
     position:relative;
     top:0px;
     right:0px;
    }
    #panel {
     position:relative;
     top:0px;
     right:0px;*/
    }    </STYLE>
    <?=$Header?>
</HEAD>
<BODY LANG="fr-FR" DIR="LTR">
<TABLE STYLE="z-index:1; background-color:transparent" WIDTH=100% BORDER=2 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid" id="cockpit">
  <COL WIDTH=200>
  <COL >
  <COL WIDTH=200>
  <TR VALIGN=TOP>
    <TD ROWSPAN=2 STYLE="z-index:1" height=100%>
     <DIV WIDTH=200 id="Inavigation">
      <P>Searchbox</P>
      <P>Les Expressions</P>                                                                                                                            
      <br>d'artistes
      <DIV id="Sons"><?echo anchor(base_url().'index.php/navigation/affiche/'.TOson, 'Sons', array('title' => 'Les Sons d\'arty.st','target'=>'_self'));?></DIV>
      <DIV id="Images">Images</DIV>
      <DIV id="Textes">Textes</DIV>
      <DIV id="Videos">Videos</DIV>
      <DIV id="Agenda">Agenda</DIV>
      <br>des Membres
      <DIV id="avis"><?echo anchor(base_url().'index.php/navigation/affiche/'.TQavis, 'Affirmations', array('title' => 'Affirmations','target'=>'_self'));?></DIV>
      <DIV id="gouts"><?echo anchor(base_url().'index.php/navigation/affiche/'.TQgout, 'Gouts', array('title' => 'Gouts','target'=>'_self'));?></DIV>
    </DIV>
    </TD>
    <TD COLSPAN=2 STYLE="z-index:1">
      <DIV id="categorie">
      <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
      <COL>
      <COL WIDTH=200>
      <TR VALIGN=TOP>
        <TD STYLE="z-index:1"><P ALIGN=CENTER>Questions</P>
      <TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
      <!--<COL WIDTH=43*>
      <COL WIDTH=43*>
      <COL WIDTH=43*>
      <COL WIDTH=43*>
      <COL WIDTH=43*>
      <COL WIDTH=43*>-->
      <TR VALIGN=TOP>
          <TD STYLE="z-index:1">
              <P>Plus</P>
          </TD>
          <TD STYLE="z-index:1">
              <P>Libelle</P>
          </TD>
          <TD STYLE="z-index:1">
              <P>Pseudo</P>
          </TD>
          <TD STYLE="z-index:1">
              <P>Sexe</P>
          </TD>
          <TD STYLE="z-index:1">
              <P>Les avis dé
              </P>
          </TD>
          <TD STYLE="z-index:1">
              <P>Ton avis</P>
          </TD>
      </TR></TABLE>
        </TD>
        <TD STYLE="z-index:1" VALIGN="bottom" ><P ALIGN=RIGHT>Membres</P></TD>
      </TR>
      </TABLE>
      </DIV>
    </TD>
  </TR>
  <TR VALIGN=TOP>
    <TD STYLE="z-index:-7" height=300 >
      <P></P>
    </TD>
    <TD ROWSPAN=2 STYLE="z-index:1" height=100%>
      <DIV ALIGN=RIGHT id="Imembres" >
      <TABLE  cols="1" height=100% CELLPADDING=0 CELLSPACING=0 border=1>
           <TR><TD VALIGN=TOP>
           <DIV id="membres"></DIV>
           </TD></TR>
           <TR><TD VALIGN=BOTTOM height=200>
           <DIV id="affinimap" ><P ><DIV id="avis"><?echo anchor(base_url().'index.php/navigation/affiche/'.TM, 'Mes affinites', array('title' => 'Mes affinites','target'=>'_self'));?></DIV>
           (Nuage Points)</P></DIV>
           </TD></TR>
      </TABLE>
      </DIV>
    </TD>
  </TR>
  <TR VALIGN=TOP>
    <TD STYLE="z-index:1" COLSPAN=2 >
      <DIV STYLE="z-index:1" id="bas">
       <DIV id="avatar">AVATAR
       </DIV>
      <!-- <DIV id="compte">
           <?=$account?>
      </DIV>-->
      <DIV STYLE="z-index:1" WIDTH=65% id="panel">
        <?=$panelrep?>
      </DIV>
    </DIV>
    </TD>
  </TR>
</TABLE>
<TABLE STYLE="z-index:-5" WIDTH=100% BORDER=2 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid" id="cockpit">
  <COL WIDTH=200>
  <COL >
  <COL WIDTH=200>
  <TR VALIGN=TOP>
    <TD STYLE="z-index:0" ROWSPAN=2 height=100%>
    </TD>
    <TD STYLE="z-index:0" COLSPAN=2 height=200>
    </TD>
  </TR>
  <TR VALIGN=TOP>
    <TD STYLE="z-index:0" ALIGN=CENTER height=1500 style="height-min:1500">
      <DIV id="liste">
      </DIV>
    </TD>
    <TD STYLE="z-index:0" ROWSPAN=2 height=100%>
    </TD>
  </TR>
  <TR VALIGN=TOP>
    <TD STYLE="z-index:0" COLSPAN=2 >
    </TD>
  </TR>
</TABLE>
</BODY>
</HTML>