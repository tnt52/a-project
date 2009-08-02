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
    //var urlbase='<?=base_url()?>'; dans global.js
    var Qsel=null; // A remplacer par MainSel
    var MainSel=null;
    var SubSel=null;
    var limitQO=20,pageQO=1;
    var champtriCAT='',sensQO='';
    var Msel=null;
    var Mvisu=null;
    var vmopen=false;
    var limitM=20,pageM=1;
    var champtriM='pseudo',sensM='ASC';    
    var repmsels=new Array();
    var repMsel=false;//false si pas de col repMsel dans liste
    var searchTextCat;

    /*var triM_rg=new Array('voix','pseudo');//rangs tris
    var triM_ss=new Array('DESC','ASC');//sens tris*/

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
     <input id="varscat" name="addvars" type="hidden" value="-1"/>
     </form>
     <form id="LookM" method="post" action="#">
     <input id="tobesrchm" name="tobesearched" type="hidden" value=""/>
     <input id="srchtblm" name="searchtables" type="hidden" value=""/>
     <input id="varsm" name="addvars" type="hidden" value="<?=TAglo?>"/>
     </form>
     <DIV id="Inavigation">
      <DIV id="artystNav">
<!--      <DIV id="Sons"><a href="#" onclick="GetListe(<?=TOson?>)">Sons</a></DIV> -->
           <DIV id="Sons"><?echo anchor(base_url().'index.php/navigation/affiche/'.TOson, lang("nav_sons"), null);?></DIV>
           <DIV id="Images"><a href="#" onclick="switchCat(<?=TOimg?>);StopEvent(event);"><?=lang("nav_images")?></a></DIV>
           <DIV id="Textes" ><a href="#" cat=<?=TOson?> onclick="clickNav(this);switchCat(<?=TOson?>); StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_textes")?></a></DIV>
           <DIV id="Videos"><a href="#" onclick="switchCat(<?=TOvdo?>);StopEvent(event);"><?=lang("nav_videos")?></a></DIV>
           <DIV id="Agenda"><?=lang("nav_agenda")?></DIV>
           <DIV id="Artistes"><a href="#" onclick="switchCat(<?=TMart?>);StopEvent(event);"><?=lang("nav_artistes")?></a></DIV>
      </DIV>
      <DIV id="servicesNav">
           <DIV id="Cours"><a href="#" onclick="switchCat(<?=TScours?>);StopEvent(event);"><?=lang("nav_cours")?></a></DIV>
           <DIV id="Services"><a href="#" onclick="switchCat(<?=TSevenement?>);StopEvent(event);"><?=lang("nav_evenementiel")?></a></DIV>
      </DIV>
      <DIV id="affinitestNav">
           <DIV id="tribunes"><a href="#" onclick="switchCat(<?=TQ?>);StopEvent(event);"><?=lang("nav_tribunes")?></a></DIV>
           <DIV id="affinites"><a href="#" onclick="showAffinites()"><?=lang("nav_affinites")?></a></DIV>
      </DIV>
    </DIV>
    <DIV id="haut">
         <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; margin: 0em 0em 0em 0em;" height="100%">
         <COL WIDTH=<?=wNav?>>
         <COL>
         <COL WIDTH=<?=wLM?>>
         <TR>
         <TD VALIGN="top" align="center"><DIV id="slogo">arty.st<br> c'est</DIV></TD>
         <TD id="HeadCat" VALIGN="top">
           <DIV >
           </DIV>
         </TD>
         <TD valign="top"  align="left">
         <DIV id="HeadLM"></DIV>
	 <DIV id="ResultsM"> <span></span> <span></span></DIV>
         </TD>
         </TR></TABLE>
    </DIV>
    <DIV ALIGN=RIGHT id="Imembres">
           <DIV id="membres" >
	   	<DIV id="membres1" ></DIV>
	   </DIV>
    </DIV>
    <DIV id="idMA">AVATAR MA</DIV>
    <DIV id="RelationMAMS"></DIV>
    <DIV id="bas">
       <TABLE WIDTH="<?=wCpit?>px" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
         <COL WIDTH=300>
         <COL>
         <COL WIDTH=300>
         <TR><TD align="left"></TD>
        <TD align="center"><DIV id="panel">
          <?=$panelrep?>
        </DIV></TD>
        <TD align="right">
        <DIV id="idMS" onmouseover="hoverQO(this)" onmouseout="unhoverQO(this)" onclick="More(Msel)">
        IDMS     Artiste inscrit
        <TABLE border="0" cellpadding="0" cellspacing="0">
        <TR>
          <TD id="idMS1"> IDMS1 Artiste inscrit
          </TD>
          <TD id="idMS2">
          </TD>
        </TR>
        </TABLE>
        </DIV>
        <DIV id="miniNP" STYLE="DISPLAY:NONE"><P><?echo anchor(base_url().'index.php/navigation/affiche/'.TM, 'Mes affinites', array('title' => 'Mes affinites','target'=>'_self'));?>
             (Nuage Points)</P></DIV>
        </TD>
      </TR>
      </TABLE>
    </DIV>
  </DIV>
  <DIV id="liste"></DIV>
  <DIV id="PagesCat"></DIV>
 <!-- <div STYLE="z-index:3">
  <TABLE WIDTH="<?=wCpit?>px" BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="position:absolute; left:50%;margin-left:-<?=wCpit/2?>px; top:0px; page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
    <COL WIDTH=<?=wNav?>>
    <COL>
    <COL WIDTH=<?=wLM?>>
    <TR><TD colspan=3 height="<?=hHaut?>px"></TD></TR>
    <TR VALIGN=TOP>
    <TD></TD>
    <TD></TD>
    <TD></TD>
    </TR>
  </TABLE>
  </div>  -->
  <DIV id="status">STATUS</DIV>
  <DIV id="visuaff"></DIV>
  <DIV id="visus">
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
                 handle <span id="VMprv" onclick="prevM(Msel)">previous</span> <span id="VMnxt" onclick="nextM(Msel)">next</span> <span onclick="showMore(Mvisu)">fermer</span>
            </DIV>
            <DIV id="VMcadre" STYLE="position:absolute;top:<?=hVhead?>px;height:<?=hVM-2*hVhead?>px;width:100%;overflow-x:hidden;overflow-y:auto;">
                <DIV id="VisuM" ></DIV>
            </DIV>
            <DIV STYLE="height:<?=hVhead?>px;position:absolute;bottom:0px;right:0px;" id="VMsizehand" >resize</DIV>
       </DIV>
</DIV>
<?=$Footer?>
</BODY>
<SCRIPT>

</SCRIPT>
</HTML>