<?header("Content-Type: text/css");require("../../helpers/dimensions_helper.php");?>

body
  {
      font-family:verdana;
      font-size:<?=hL?>px;
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
  TABLE, TR, TD {
   white-space: nowrap;
  }
  .devant {
   z-index:10;
  }
  .derriere {
   z-index:0;
   display:none;
  }
  #status {
      position:absolute;
      top:0px;
      right:0px;
      height:10px;
      z-index:10;
      margin: 0 0 0 0;
      padding: 0 0 0 0;
      vertical-align:bottom;
  }
  #cockpit{
   /*   position:absolute;
      top:0px;
      left:0px;
      width:<?=wCpit?>;
      z-index:4;*/
  }
  #haut{
      position:absolute;
      top:0px;
      left:0px;
      width:<?=wCpit?>;
      height:<?=hHaut?>px;
      z-index:4;
      margin: 0 0 0 0;
      padding: 0 0 0 0;
      vertical-align:top;
  }
            #slogo {
             background-color:white;
             height:<?=hHaut?>px;
            }
            #header {
             margin: 0 0 0 0;
             padding: 0 0 0 0;
             color:white;
             background-color:orange;
             height:<?=hHaut?>px;
          /*
             position:absolute;
             z-index:4;
             top:0px;
             left:200px;
             width:100%;
             height:100;*/
            }
            #CatTitle{

            }
            #CatHeads{

            }
            #HeadLM {
              height:<?=hHaut?>;
              background-color:white;
            }
   #bas {
        position:absolute;
        z-index:4;
        bottom:0px;
        left:0px;
        width:<?=wCpit?>;
        height:100;
  }
      #avatar {
       height:100px;
       width:300;
       background-color:white;
      }
      #panel {
       width:200;
       height:100px;
       color:white;
       background-color:black;
      }
      #VisuM {
       width:300;
       height:100px;
       background-color:white;
      }
  #Inavigation
  {
        position:absolute;
        color:white;
        top:<?=hHaut?>px;
        z-index:4;
        left:0px;
        width:<?=wNav?>px;
  }
    #artystNav {
       height:200px;
       color:white;
       background-color:black;
    }
    #servicesNav {
       height:100px;
       //border: 2px solid red;
       background-color:white;
    }
    #affinitestNav {
       height:200px;
       color:white;
       background-color:black;
    }
  #Imembres
  {
        background-color:black;
        color:white;
        position:absolute;
        z-index:4;
        top:<?=hHaut?>px;
        right:0px;
        width:<?=wLM?>px;
  }
  #VQcontainer{
        width:400px;
        height:400px;
        border: 2px solid red;
        color:white;
        background-color:black;
        position:absolute;
        margin-left:50%;
        /*overflow-x:hidden;
        overflow-y:auto;*/
        /*left:<?=-wVQ/2?>px;
        top:50%;*/
  }
    #VQhandle
    {     background-color:black;
          color:white;
    }
    #VisuQ
    {     border: #FFCCFF simple 5px;
          background-color:black;
          color:white;
    }
    #VQsizehand
    {     background-color:black;
          color:red;
          position:absolute;
/*          z-index:12;
          right:0px;
          bottom:0px;*/
    }
  #liste{
        position:static;
        top: 0px;
        left:0px;
        z-index:3;
  }

 /* #membres {
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
     right:0px;
    }*/