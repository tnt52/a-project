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
    //var Qsel=null; // A remplacer par MainSel
    var MainSel=null;
    var SubSel=null;
    var limitQO=<?=limitQO?>,pageQO=1;
    var champtriCAT='',sensQO='';
    var Msel=null;
    var Mvisu=null;
    var vmopen=false;
    var limitM=<?=limitM?>,pageM=1;
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
           <DIV id="Images" class="navlink" href="#" onclick="clickNav(this);switchCat(<?=TOimg?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_images")?></DIV>
           <DIV id="Textes"  class="navlink" href="#" onclick="clickNav(this);switchCat(<?=TOson?>); StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_textes")?></DIV>
           <DIV id="Videos" class="navlink" href="#" onclick="clickNav(this);switchCat(<?=TOvdo?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_videos")?></DIV>
           <DIV id="Agenda" class="navlink" href="#" onclick="clickNav(this);switchCat(<?=TAgenda?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_agenda")?></DIV>
           <DIV id="Artistes" class="navlink" href="#" onclick="clickNav(this);switchCat(<?=TMart?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_artistes")?></DIV>
      </DIV>
      <DIV id="servicesNav">
           <DIV id="Cours"><a href="#" onclick="switchCat(<?=TScours?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_cours")?></a></DIV>
           <DIV id="Services"><a href="#" onclick="switchCat(<?=TScommande?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_evenementiel")?></a></DIV>
      </DIV>
      <DIV id="affinitestNav">
           <DIV id="tribunes"><a href="#" onclick="switchCat(<?=TQ?>);StopEvent(event);" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_tribunes")?></a></DIV>
           <DIV id="affinites"><a href="#" onclick="showAffinites()" onmouseover="hoverNav(this);" onmousedown="pressNav(this);" onmouseout="outNav(this);"><?=lang("nav_affinites")?></a></DIV>
      </DIV>
    </DIV>
    <DIV id="haut">
    	<DIV id="slogo">arty.st<br> c'est</DIV>	    
	<DIV id="HeadCat" ></DIV>
	<DIV id="ResultsCat"> <span></span> <span></span></DIV>
	<DIV id="HeadLM"></DIV>
	<DIV id="ResultsM"> <span></span> <span></span></DIV>         
    </DIV>
    <DIV ALIGN=RIGHT id="Imembres" >
           <DIV id="membres" >
	   	<DIV id="membres1" ></DIV>
	   </DIV>
    </DIV>
    <DIV id="idMA" class="idM" onclick="window.open('<?=base_url()?>index.php/compte','Mon Compte','');" >AVATAR MA</DIV>
    <DIV id="RelationMAMS"></DIV>    
    <DIV id="idMS" class="idM" onmouseover="hoverQO(this)" onmouseout="unhoverQO(this)" onclick="More(Msel)">
	    <img id="idMSimg" alt='' width='<?=wIDimg?>px' height='<?=hIDimg?>px' border='0' />    
	    <DIV id="idMStxt"></DIV>
    </DIV>
	
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
        
        <DIV id="miniNP" STYLE="DISPLAY:NONE"><P><?echo anchor(base_url().'index.php/navigation/affiche/'.TM, 'Mes affinites', array('title' => 'Mes affinites','target'=>'_self'));?>
             (Nuage Points)</P></DIV>
        </TD>
      </TR>
      </TABLE>
    </DIV>
  </DIV>
  <DIV id="liste" >
  	<DIV id="liste1" >
	</DIV>
  </DIV>
  <DIV id="PagesCat"></DIV>
  <DIV id="status">STATUS</DIV>
  <DIV id="visuaff" class="derriere"></DIV>
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