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
#cockpit{
      background: url(<?=baseurl?>system/application/images/Fonds/FondCpit.gif) no-repeat left top;
 }
 #PagesCat{
	 color:black;
 }
 #haut{
	background: url(<?=baseurl?>system/application/images/Fonds/FondHaut.gif) no-repeat left top;	 
 }
 #bas{
	background: url(<?=baseurl?>system/application/images/Fonds/FondBas.gif) no-repeat left top;	 
 }
  #slogo {
    color:white;
    background-color:<?=Rec1_coul?>;
  }
  #header
  {
   color:black;
   background-color:<?=Rec2_coul?>;
  }
      #limitLignes,#labellimitQO,#avismanquants{
            font-size:<?=hLmini?>px;
      }

  #HeadLM {
    color:white;
    background-color:<?=Rec3_coul?>;
  }

  #idMA {
    color:white;
    background-color:<?=Rec7_coul?>;
  }
      #mypseudo{
       font-size:<?=hLpseudo?>px;
      }
  #RelationMAMS{
	background-color:red;
  }
  #panel {
   color:white;
   background-color:<?=Rec8_coul?>;
  }
  #idMS {
   color:white;
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
  #VQcontainer{
        border: 2px solid red;
        color:white;
        background-color:black;
  }
    #VQhandle
    {     background-color:black;
          color:white;
    }
    #VisuQ
    {     border: #FFCCFF simple 5px;
          background: url(<?=baseurl?>system/application/images/FondVisuM.gif) no-repeat left top;
          color:white;
    }
    #VQsizehand
    {     background-color:black;
          color:red;
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
#liste .clicked{
    background-color:#000000;
    color:#FFFFFF;
}
#liste .hovered{
    background-color:#CCCCCC;
}
#membres .hovered{
    background-color:#CCCCCC;
}
#membres .clicked{
    background-color:#FFFFFF;
    color:#000000;
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