<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>

<head>
<title>|: arty.st :|</title>
<link rel="icon" type="image/png" href="<?=base_url()?>system/application/images/icone_a.png" />
<!--<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>system/application/images/icone_a.ico" />-->
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT language="JavaScript" type="text/JavaScript">
    var cat=<?=$cat?>;
    var TM=<?=TMmem?>;
    var urlbase='<?=base_url()?>';
    var Qsel=null; // A remplacer par MainSel
    var MainSel=null;
    var SubSel=null;
    var limitQO=20,pageQO=1;
    var triQO='',sensQO='';
    var Msel=null;
    var limitM=20,pageM=1;
    var triM='pseudo',sensM='ASC';
    var repmsels=new Array();
    var repMsel;//false si pas de col repMsel dans liste
    var searchTextCat;

    /*var triM_rg=new Array('voix','pseudo');//rangs tris
    var triM_ss=new Array('DESC','ASC');//sens tris*/

function StopEvent(pE)
{
   if (!pE)
     if (window.event)
  pE = window.event;
     else
  return;
   if (pE.cancelBubble != null)
      pE.cancelBubble = true;
   if (pE.stopPropagation)
      pE.stopPropagation();
   if (pE.preventDefault)
      pE.preventDefault();
   if (window.event)
      pE.returnValue = false;
   if (pE.cancel != null)
      pE.cancel = true;
}
</SCRIPT>
<STYLE>

</STYLE>
    <?=$Header?>
</HEAD>
<BODY LANG="fr-FR" DIR="LTR">
<DIV id="jscontainer"></DIV>
  <DIV id="cockpit">
     <form id="LookCat" method="post" action="#" onsubmit="searchCat(this,event)">
     <input id="tobesrchcat" name="tobesearched" type="hidden" value=""/>
     <input id="srchtblcat" name="searchtables" type="hidden" value=""/>
     </form>
     <DIV id="Inavigation">
      <DIV id="artystNav">
      <DIV id="Artistes">
      <a href="#" onclick="switchCat(<?=TMart?>);StopEvent(event);"><?=lang("nav_artistes")?></a>
      </DIV>
<!--      <DIV id="Sons"><a href="#" onclick="GetListe(<?=TOson?>)">Sons</a></DIV> -->
      <DIV id="Sons"><?echo anchor(base_url().'index.php/navigation/affiche/'.TOson, lang("nav_sons"), null);?></DIV>
           <DIV id="Images"><a href="#" onclick="switchCat(<?=TOson?>);StopEvent(event);"><?=lang("nav_images")?></a></DIV>
           <DIV id="Textes"><?=lang("nav_textes")?></DIV>
           <DIV id="Videos"><?=lang("nav_videos")?></DIV>
           <DIV id="Agenda"><?=lang("nav_agenda")?></DIV>
      </DIV>
      <DIV id="servicesNav">
           <DIV id="Cours"><a href="#" onclick="GetHeader(<?=TOson?>);GetListe(<?=TOson?>)">Cours</a></DIV>
      </DIV>
      <DIV id="affinitestNav">
           des Membres
           <DIV id="avis"><a href="#" onclick="GetHeader(<?=TQavis?>);GetListe(<?=TQavis?>);">Avis</a></DIV>
           <DIV id="gouts"><a href="#" onclick="GetHeader(<?=TQgout?>);GetListe(<?=TQgout?>)">Gout</a></DIV>
           <DIV id="affinites"><a href="#" onclick="showAffinites()">Affinites</a></DIV>
      </DIV>
    </DIV>
    <DIV id="haut">
         <TABLE width="<?=wCpit?>" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; margin: 0em 0em 0em 0em;" height="100%">
         <COL WIDTH=<?=wNav?>>
         <COL>
         <COL WIDTH=<?=wLM?>>
         <TR>
         <TD align="right"><DIV id="slogo">arty.st<br> c'est</DIV></TD>
         <TD VALIGN="top">
           <DIV id="header">
           </DIV>
         </TD>
         <TD valign="bottom"  align="left">
         <DIV id="HeadLM"></DIV>
         </TD>
         </TR></TABLE>
    </DIV>
    <DIV ALIGN=RIGHT id="Imembres">
           <DIV id="membres"></DIV>
    </DIV>
    <DIV id="bas">
       <TABLE WIDTH="<?=wCpit?>" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
         <COL WIDTH=300>
         <COL>
         <COL WIDTH=300>
         <TR><TD align="right"><DIV id="idMA">AVATAR MA</DIV></TD>
        <!-- <DIV id="compte">
             <?=$account?>
        </DIV>-->
        <TD align="center"><DIV id="panel">
          <?=$panelrep?>
        </DIV></TD>
        <TD align="left">
        <DIV id="idMS">AVATAR MS</DIV>
        <DIV id="miniNP" STYLE="DISPLAY:NONE"><P ><?echo anchor(base_url().'index.php/navigation/affiche/'.TM, 'Mes affinites', array('title' => 'Mes affinites','target'=>'_self'));?>
             (Nuage Points)</P></DIV>
        </TD>
      </TR>
      </TABLE>
    </DIV>
  </DIV>
  <TABLE WIDTH="<?=wCpit?>" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="position:absolute; left:0px; top:0px; page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
    <COL WIDTH=<?=wNav?>>
    <COL>
    <COL WIDTH=<?=wLM?>>
    <TR><TD colspan=3 height="<?=hHaut?>px"></TD></TR>
    <TR VALIGN=TOP>
    <TD></TD>
    <TD><DIV id="liste"></DIV></TD>
    <TD></TD>
    </TR>
  </TABLE>
  <DIV id="status">STATUS</DIV>

  <DIV id="VQcontainer" class="derriere">
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;left:0px;top:0px;z-index:100" id="VQhandle">
            handle <span id="VQprv" onclick="prev(MainSel)">previous</span> <span id="VQnxt" onclick="next(MainSel)">next</span> <span onclick="showMore(MainSel)">fermer</span>
       </DIV>
       <DIV id="VQcadre" STYLE="position:absolute;top:<?=hVhead?>px;height:<?=hVQ-2*hVhead?>px;width:100%;overflow-x:hidden;overflow-y:auto;">
           <DIV id="VisuQ" ></DIV>
       </DIV>
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;bottom:0px;right:0px;" id="VQsizehand" >resize</DIV>
  </DIV>
  <DIV id="VAcontainer" class="derriere">
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;left:0px;top:0px;z-index:100" id="VAhandle">
            handle <span id="VAprv" onclick="prev(SubSel)">previous</span> <span id="VAnxt" onclick="next(SubSel)">next</span> <span onclick="showMore(SubSel)">fermer</span>
       </DIV>
       <DIV id="VAcadre" STYLE="position:absolute;top:<?=hVhead?>px;height:<?=hVA-2*hVhead?>px;width:100%;overflow-x:hidden;overflow-y:auto;">
           <DIV id="VisuA" ></DIV>
       </DIV>
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;bottom:0px;right:0px;" id="VAsizehand" >resize</DIV>
  </DIV>
  <DIV id="VMcontainer" class="derriere">
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;left:0px;top:0px;z-index:100" id="VMhandle">
            handle <span id="VMprv" onclick="prev(Msel)">previous</span> <span id="VMnxt" onclick="next(Msel)">next</span> <span onclick="showMore(Msel,2)">fermer</span>
       </DIV>
       <DIV id="VMcadre" STYLE="position:absolute;top:<?=hVhead?>px;height:<?=hVM-2*hVhead?>px;width:100%;overflow-x:hidden;overflow-y:auto;">
           <DIV id="VisuM" ></DIV>
       </DIV>
       <DIV STYLE="height:<?=hVhead?>px;position:absolute;bottom:0px;right:0px;" id="VMsizehand" >resize</DIV>
  </DIV>


<?=$Footer?>
</BODY>
<SCRIPT>

</SCRIPT>
</HTML>