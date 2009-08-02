<?header("Content-Type: text/css");require("../../helpers/dimensions_helper.php");require("../../helpers/couleurs_helper.php")?>
  body
  {
   /* height:100%;*/
  }
  TABLE, TR, TD {
   white-space: nowrap;
  }
  #cockpit{
      position:absolute;
      height:600px;
      width:<?=wCpit?>px;
      top:0px;
      left:50%;
      margin-left:-<?=wCpit/2?>px;
  }
  #visuaff{
      position:absolute;
      width:<?=wCpit-2*wID?>px;
      height:<?=hNav+hID?>px;
      top:<?=hHaut?>px;
      left:50%;
      margin-left:-<?=(wCpit-2*wID)/2?>px;
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
  #haut{
      position:absolute;
      top:0px;
      left:0px;
      width:<?=wCpit?>px;
      height:<?=hHaut?>px;
      z-index:4;
      margin: 0 0 0 0;
      padding: 0 0 0 0;
      vertical-align:top;
  }
            #slogo {
             margin: 0 0 0 0;
             padding: 0 0 0 0;
             height:<?=hHaut?>px;
             width:<?=wNav?>px;
            }
            #HeadCat
            {
             margin: 0 0 0 0;
             padding: 0 0 0 0;
             height:<?=hHaut?>px;
             width:100%;
            }
                #logoCat{
                 position:absolute;
                 right:<?=wNav+5?>px;
                 bottom:<?=hBand+5?>px;
                }
                .CatTitle{
                    position:absolute;
                    top: -10px;//<?=((hHaut-hBand-hLtitle)/2)?>px;
                }
                #titleQ{
                   left:<?=wNav+5?>px;
                }		
                
                <?$mrg1=3?> 
                #CatHeads{
                 position:absolute;
                 left:50%;
                 margin-left:-<?=wHead/2?>px;
                 bottom:<?=$mrg1?>px;
                 width:<?=wHead?>px;
                 //height:<?=hBand?>px;
                }
                /*#bandeau{
                 position:absolute;
                 left:<?=wNav?>px;
                 bottom:0px;
                 width:<?=wHead+7?>px;
                 height:<?=hBand?>px
                }*/
            #HeadLM {
              margin: 0 0 0 0;
              padding: 0 0 0 0;
              border:solid #FF0000 1 1 1 1;
              height:<?=hHaut?>px;
              width:<?=wLM?>px;
            }
	    #titleLM{
		   left:<?=wCpit-wLM?>px;
		}
	    <?$left2=75;$mrg2=2;?>
	    #SearchM{
		position: absolute;
		left:<?=wCpit-wLM?>px;
		bottom:<?=hBand+25?>px;
		width:<?=wLM?>px;
	    }
	    #SelTA{
		position: absolute;
		left:<?=wCpit-wLM+$left2-5?>px;
		bottom:<?=hBand+5?>px;
		width:<?=wLM?>px;	
	    }
	    #labeltypeaff{
			position:absolute;
			bottom: <?=$mrg2?>px;
			left: -<?=$left2-5?>px;
	    }
	    <?$left1=wNav+5;?>
	#searchQO{
	      position:absolute;
	      bottom: <?=hBand+25?>px;
	      left: <?=$left1?>px;
	      z-index:5;
	}
	/*#GOsrchq{
	      position:absolute;
	      bottom: <?=hBand+35?>px;
	      left: <?=$left1+100?>px;
	      z-index:5;
	}*/
	<?$offset=170;?>	               
	#avismanquants{
	      position:absolute;
	      bottom: <?=hBand+5?>px;
	      left: <?=$left1?>px;
	      z-index:5;
	}
	      #labelavismq{
		   text-align:left;
		   vertical-align:bottom;
		   position:absolute;
		   bottom: <?=2?>px;
		   left: <?=15?>px;
		   z-index:5;
	      }
	    #ResultsM{
		position: absolute;
		left:<?=wCpit-wLM?>px;
		bottom:<?=15?>px;
	    }
	    #LMHeads{
		 position:absolute;
                 left:<?=wCpit-wLM?>px;
                 bottom:<?=$mrg1?>px;
                 //height:<?=hBand?>px;
	    
	    }

   #idMA {
       position:absolute;
       z-index:5;
       top:<?=hHaut+hNav?>px;
       left:0px;
       width:<?=wID?>px;
       height:<?=hID?>px;
      }
      	#avatar{
              position:absolute;
              left:<?=wID-5-wIDimg?>px;
              top:5px;
          }
	#deconnect{
	position:absolute;
	left:5px;
	bottom:5px;
	}
	#moncompte{
	position:absolute;
	right:5px;
	bottom:5px;
	}
  #RelationMAMS{
	position:absolute;
	z-index:5;
	top:<?=hHaut+hNav?>px;
	left:<?=wID?>px;
	width:<?=wPanel?>px;
	height:<?=hID?>px;  
  }
  #bas {
        position:absolute;
        z-index:4;
        top:<?=hHaut+hNav?>px;
        left:0px;
        width:<?=wCpit?>px;
        height:<?=hID?>;
  }
     
          
      #panel {
      /*       width:200px;*/
       height:<?=hID?>px;
      }
      #idMS {
       width:<?=wID?>px;
       height:<?=hID?>px;
      }
  #Inavigation
  {
        position:absolute;
        z-index:4;
        top:<?=hHaut?>px;
        left:0px;
        width:<?=wNav?>px;
        height:<?=hNav?>px;
  }
  
  <?$mrgNav=15;?>
    #artystNav {
       position:absolute
       top:0px;
       margin-left:<?=$mrgNav?>px;
    }
    #servicesNav{
       position:absolute;
       top:175px;
       margin-left:<?=$mrgNav?>px;
    }
    #affinitestNav {
       position:absolute;
       top:240px;
       margin-left:<?=$mrgNav?>px;
    }
  #Imembres
  {
        position:absolute;
        z-index:3;
        top:<?=hHaut?>px;
        left:<?=wCpit-wLM?>px;
        height:<?=hNav-100?>px; /*100%;*/
        width:<?=wLM?>px;
	overflow-x:hidden;
	overflow-y:auto;
  }
  #liste{
        position:absolute;
        width:<?=wHead?>px;
        top: <?=hHaut?>px;
        left:50%;
        margin-left:-<?=wHead/2?>px;
        z-index:3;
  }
  #PagesCat{
        position:absolute;
        top: <?=(hHaut+hNav-hL-5)?>px;
        right:50%;
        margin-right:-<?=wHead/2-10?>px;
        z-index:5;
  }
  #VQcontainer{
        width:<?=wVQ?>px;
        height:<?=hVQ?>px;
        position:absolute;
        margin-left:50%;
        /*overflow-x:hidden;
        overflow-y:auto;*/
        /*left:<?=-wVQ/2?>px;
        top:50%;*/
  }
  #VAcontainer{
        width:<?=wVA?>px;
        height:<?=hVA?>px;
        position:absolute;
        margin-left:50%;
    }
  #VMcontainer{
        width:<?=wVM?>px;
        height:<?=hVM?>px;
        position:absolute;
        margin-left:50%;
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