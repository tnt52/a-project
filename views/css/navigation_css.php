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
	     <?$mrg1=3;$offsetliste=+10;$mrg_r_lst=$offsetliste;$mrg_b_logo=2;$offsetlm=5;?>
	     <?$left2=75;$mrg2=2;$bot_srch=hBand+$mrg_b_logo+hL;?>
	     
	      // HEAD CAT //
            #HeadCat
            {
             margin: 0 0 0 0;
             padding: 0 0 0 0;
             height:<?=hHaut?>px;
             width:100%;
            }
                #logoCat{
                 position:absolute;
                 right:<?=wLM+$mrg_r_lst+3?>px;
                 bottom:<?=hBand+$mrg_b_logo?>px;
                }
                .CatTitle{
                    position:absolute;
                    top: 10px;/*<?=((hHaut-hBand-hLtitle)/2)?>px;*/
                }
                #titleQ{
                   left:<?=wNav+$offsetliste?>px;
                }		
                
               #searchQO{
		      position:absolute;
		      bottom: <?=$bot_srch?>px;
		      left: <?=wNav+3+$offsetliste?>px;
		      z-index:5;
		}		               
		#avismanquants{
		      position:absolute;
		      bottom: <?=hBand+$mrg_b_logo?>px;
		      left: <?=wNav-4+$offsetliste?>px;
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
		#ResultsCat{
		position: absolute;
		left:<?=wNav+2+$offsetliste?>px;
		bottom:<?=15?>px;
		}
		#CatHeads{
		 position:absolute;
		 left:50%;
		 margin-left:<?=-wHead/2+$offsetliste?>px;
		 bottom:<?=$mrg1?>px;
		 width:<?=wHead-$mrg_r_lst-$offsetliste?>px;
		 /*height:<?=hBand?>px;*/
		}
	#liste{
		position:absolute;
		width:<?=wHead-$mrg_r_lst-$offsetliste?>px;
		height:<?=hNav-7?>px;
		top: <?=hHaut?>px;
		left:50%;
		margin-left:<?=-wHead/2+$offsetliste?>px;
		z-index:3;
		overflow-x:hidden;
		overflow-y:auto;
	}
		// HEAD LM//		
            #HeadLM {
              margin: 0 0 0 0;
              padding: 0 0 0 0;
              border:solid #FF0000 1 1 1 1;
              height:<?=hHaut?>px;
              width:<?=wLM-$offsetlm?>px;
            }
	    #titleLM{
		   left:<?=wCpit-wLM+$offsetlm?>px;
		}
	    
	    #SearchM{
		position: absolute;
		left:<?=wCpit-wLM+$offsetlm?>px;
		bottom:<?=$bot_srch?>px;
		width:<?=wLM?>px;
	    }
	    #SelTA{
		position: absolute;
		left:<?=wCpit-wLM+$left2-5+$offsetlm?>px;
		bottom:<?=hBand+$mrg_b_logo?>px;
		width:<?=wLM?>px;	
	    }
	    #labeltypeaff{
			position:absolute;
			bottom: <?=$mrg2?>px;
			left: -<?=$left2-5?>px;
	    }
	    #ResultsM{
		position: absolute;
		left:<?=wCpit-wLM+$offsetlm?>px;
		bottom:<?=15?>px;
	    }
	    #LMHeads{
		 position:absolute;
                 left:<?=wCpit-wLM+$offsetlm?>px;
                 bottom:<?=$mrg1?>px;
                 /*height:<?=hBand?>px;*/
	    
	    }
	    
	   

   #idMA {
       position:absolute;
       z-index:5;
       top:<?=hHaut+hNav?>px;
       left:9px;
       width:<?=wID?>px;
       height:<?=hID?>px;
      }
   #deconnect{
	position:absolute;
	right:8px;
	bottom:2px;
	}

  
  #idMS {
       position:absolute;
       z-index:5;
       top:<?=hHaut+hNav?>px;
       right:12px;         
       width:<?=wID?>px;
       height:<?=hID?>px;
  }
  <?$mrg3=10;$mrg4=10;$mrg5=3;?>
  .idM .pseudo{
       position:absolute;
       top:<?=$mrg4?>px;
       left:<?=wIDimg+$mrg3+$mrg5?>px;                
  }
  .idM .date{
       position:absolute;
       top:<?=20+$mrg4?>px;
       left:<?=wIDimg+$mrg3+$mrg5?>px;                
  }
  .idM .lienstxt{
       position:absolute;
       top:<?=38+$mrg4?>px;
       left:<?=wIDimg+$mrg3+$mrg5?>px;                
  }
  .idM .voix{
       position:absolute;
       top:<?=55+$mrg4?>px;
       left:<?=wIDimg+$mrg3+$mrg5?>px;                
  }
  .idM .texte{
       position:absolute;
       top:<?=hIDimg+3+$mrg4?>px;
       left:<?=$mrg3?>px;                
  }
  #idMSimg, #avatar{
       position:absolute;
       top:<?=$mrg4?>px;
       left:<?=$mrg3?>px;      
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
       top:170px;
       margin-left:<?=$mrgNav?>px;
    }
    #affinitestNav {
       position:absolute;
       top:230px;
       margin-left:<?=$mrgNav?>px;
    }
  #Imembres
  {
        position:absolute;
        z-index:3;
        top:<?=hHaut?>px;
        left:<?=wCpit-wLM+$offsetlm?>px;
        height:<?=hNav-100?>px; /*100%;*/
        width:<?=wLM-$offsetlm-wScroll?>px;
	overflow-x:hidden;
	overflow-y:auto;
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