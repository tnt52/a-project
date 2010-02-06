<?header("Content-Type: text/css");require("../../config/base.php");require("../../helpers/dimensions_helper.php");require("../../helpers/couleurs_helper.php");?>
*:focus {
        outline: 0;
        }
body
  {
      outline:none;
      font-family:Verdana;
      font-size:<?=hL?>px;
  }
input{
	  cursor:pointer;	  
}
#cockpit{
      background: url(<?=baseurl?>system/application/images/Fonds/FondCpit.gif) no-repeat left top;
 }
 #PagesCat{
	 color:black;
 }
 #haut{
	/*background: url(<?=baseurl?>system/application/images/Fonds/FondHaut.gif) no-repeat left top;*/	 
 }
 #bas{
	/*background: url(<?=baseurl?>system/application/images/Fonds/FondBas.gif) no-repeat left top;*/	 
 }
 .idM{
	background: url(<?=baseurl?>system/application/images/Fonds/FondId.gif) no-repeat left top;
	background-position: 3px 2px
 }
 #slogo {
    color:white;
    background-color:<?=Rec1_coul?>;
  }
  .hovered .pseudo,.hovered .titre,.hovered .nom, .hovered .libelle, .clicked,.H, #idMS .pseudo {
    color:red;
}
.idM .pseudo{
    font-size:<?=hLpseudo?>px;
    font-weight:bold;
}
#limitLignes,#labellimitQO,#ResultsM,#ResultsCat,#Imembres, .date,#deconnect{
    font-size:<?=hLmini?>px;
}

  #HeadCat
  {
   color:black;
   background-color:<?=Rec2_coul?>;
  }

  #HeadLM,#ResultsM {
    color:white;
    background-color:<?=Rec3_coul?>;
  }

  #idMA {
    color:black;
    background-color:<?=Rec7_coul?>;
  }

  #RelationMAMS{
	/*background-color:red;*/
  }
  #panel {
   color:white;
   background-color:<?=Rec8_coul?>;
  }
  #idMS {
   color:black;
   background-color:<?=Rec9_coul?>;
  }
  
  #Inavigation
  {
        font-family:courier new;
        font-size:<?=hLnav?>px;
        color:white;
        /*font-weight:bold;*/
        background-color:<?=Rec4_coul?>;
  }
  a:link,a:visited,a:active
  {
      text-decoration:none;
      color:white;

  }
  #PagesCat a:link,a:visited,a:active
  {
	  color:black;
  }
  a:hover{
	  color:red;	  
  }
  #Inavigation a:link,#Inavigation a:visited,#Inavigation a:active
  {
      color:white;
  }
  
  #Imembres
  {
        background-color:<?=Rec6_coul?>;
        color:white;
  }
  #liste{
        background-color:<?=Rec5_coul?>;
  }
  #visuaff{
        background-color:white;
  }
  <?$w=13;$h=20?>
.prev,.next,.close {
  vertical-align: text-top;
  width: <?=$w?>px;
  height:<?=$h?>px;
  background: no-repeat 0 0;
}
.prev {background-image: url(http://127.0.0.1/system/application/images/boutons/prev.png);}
.next {background-image: url(http://127.0.0.1/system/application/images/boutons/next.png);}
.close {background-image: url(http://127.0.0.1/system/application/images/boutons/close.png);}

/*.prev,.next,.close {background-position: 0 0px;}*/
.prev.H,.next.H,.close.H {background-position: 0 -<?=$h?>px;}


  #VQcontainer{
        /*border: 2px solid red;*/
        color:white;
        /*background-color:black;*/
  }
    #VQhandle
    {     
	 /* background: transparent /*url(<?=baseurl?>system/application/images/Fonds/FondVQHaut.gif) no-repeat left top;*/*/
	  /*background-color:black;*/
          color:white;
	  
    }
    #VQcadre
    {     /*border: #FFCCFF simple 5px;*/
        /*  background: url(<?=baseurl?>system/application/images/Fonds/FondVQ.gif) no-repeat left top;*/
          color:white;
	  
    }
    #PanelRep{
	    background: url(<?=baseurl?>system/application/images/Fonds/FondPR.gif) no-repeat left bottom;
    }
    #VQ_PR
    {     
	   /* background-color:black;
          color:red;*/
    }
    #VQFdleftbott{
	  background: url(<?=baseurl?>system/application/images/Fonds/FondVQ.gif) no-repeat left bottom;
    }
    
    #VQFdlefttop{
	  background: url(<?=baseurl?>system/application/images/Fonds/FondVQ.gif) no-repeat left top;
    }
    #VQFdrighttop{
	   background: url(<?=baseurl?>system/application/images/Fonds/FondVQ.gif) no-repeat right top;
    }
    #VQFdrightbott{
	   background: url(<?=baseurl?>system/application/images/Fonds/FondVQ.gif) no-repeat right bottom;
    }
    #VQFdsudest{
	    background: url(<?=baseurl?>system/application/images/Fonds/FondVQFdsudest.gif) no-repeat right bottom;
    }
    
    #VQRightHaut{
	    background: url(<?=baseurl?>system/application/images/Fonds/FondVQRightHaut.gif) no-repeat right bottom;
    }
    #VQRightBas{
	    background: url(<?=baseurl?>system/application/images/Fonds/FondVQRightBas.gif) no-repeat right bottom;
    }
  #VAcontainer{
        border: 2px solid red;
        color:white;
        background-color:black;
    }
    #VAhandle
    {     background-color:black;
          color:white;
    }
    #VisuA
    {     border: #FFCCFF simple 5px;
          background-color:black;
          color:white;
    }
    #VAsizehand
    {     background-color:black;
          color:red;
    }
  #VMcontainer{
        border: 2px solid red;
        color:white;
        background-color:black;
    }
    #VMhandle
    {     background-color:black;
          color:white;
    }
    #VisuM
    {     border: #FFCCFF simple 5px;
          background-color:black;
          color:white;
    }
    #VMsizehand
    {     background-color:black;
          color:red;
          position:absolute;
    }
/*#liste .clicked{
    background-color:#000000;
    color:#FFFFFF;
}
#membres .hovered{
    background-color:#CCCCCC;
}
#membres .clicked{
    background-color:#FFFFFF;
    color:#000000;
}
*/
.listitem, .navlink, #idMA, #idMS{
	cursor:pointer;
}


.CatTitle{
 font-size:<?=hLtitle?>px;
}
.resultcount{
 font-size:<?=0.8*hL?>px;
}
.Titre{
 font-size:<?=2*hL?>px;
 font-weight: 700;
 color:<?=Titre_coul?>;
 text-decoration: underline;
}