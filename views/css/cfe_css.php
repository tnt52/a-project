<?require("../../config/base.php"); header("Content-Type: text/css"); $baseurl=baseurl?>
form{clear:both;}

form ul{
    list-style:none;margin:10px;padding:0;
    float:left;clear:both;
}
form ul li{
    float:left;
    clear:both;
    padding:3px;
}

label.jsTextL,label.jsPasswordL, label.jsFileL, label.jsSelectorL{
    float:left;
    margin-right: 5px;
    padding:4px 0;
}

 /**********************************************/
/*  customFormElements Definitions              */
/*                                              */
/*  classes:                                    */
/*  F - Element has focus                       */
/*  H - Mouse is over the Element               */
/*  A - Element is somehow active (e.g. checked)*/
/*  P - Element is pressed                      */
/*                                              */
/*  classes can be used in any combination      */
 /**********************************************/
 
 form *:focus{outline: none;}
 
 /* fieldsets */
 /*fieldset.F{
    border: 1px dotted #cc3300;
 }
 
 fieldset.F legend{
    background-color: #cc3300;
 }*/
  
 fieldset.H{
    border: 2px dashed #F0E68C;
    background-color: #FFFFF0;  
 }
  
 fieldset.H legend{
    background-color: #F0E68C;
 }
 
 fieldset.A{
    background-color: #F0FFFF;
    border-color: #40E0D0;
 }
 
 fieldset.A legend{
    background-color: #40E0D0;
 }

/* labels */
label{cursor:pointer;}
label.H{color:#339999;}
label.F{color:#cc3300;}

/* tool tip related */
.tip{border: 1px solid #339999;background-color: #fff;z-index:100;font-size:0.9em;color:#666;padding:2px 4px;}

.jsQM{
    cursor: help;
    margin-left: 3px;
    vertical-align: middle;
    height: 13px;
    width: 12px;
    background: url(../gfx/qm.gif) no-repeat left top;
}

/* textfields with sliding doors */
.jsTextSlide,.jsPasswordSlide{
    background: url(<?=$baseurl?>system/application/images/customcfe/cfeTextL.gif) no-repeat left top;
    float:left;display:inline;
    border: none;
}
.jsTextSlide .jsText,.jsPasswordSlide .jsPassword{
    float:left;display:inline;
    background: url(<?=$baseurl?>system/application/images/customcfe/cfeTextR.gif) no-repeat right top;
    border: none; margin:0 0 0 6px;
    padding: 5px 6px 5px 0;
    height: 20px;
}
.jsTextSlide.F,.jsPasswordSlide.F{background-position: 0 -40px;}
.jsTextSlide.F .jsText,.jsPasswordSlide.F .jsPassword{background-position: 100% -40px;}
.jsTextSlide.H,.jsPasswordSlide.H{background-position: 0 -40px;}
.jsTextSlide.H .jsText,.jsPasswordSlide.H .jsPassword{background-position: 100% -40px;}

/* teaxtareas with sliding doors */
.jsTextareaSlide{
    float:left;
    background: url(../gfx/cfeTextareaR.gif) no-repeat right top;
}
.jsTextareaSlide .jsTextarea{
    float:left;
    background: url(../gfx/cfeTextareaL.gif) no-repeat left top;
    border:0;margin:0;
    width: 200px;
    padding: 5px 6px;
    height: 108px;
}
.jsTextareaSlide.F{background-position: 100% -120px;}

.jsTextareaSlide.F .jsTextarea{background-position: 0 -120px;}

/* checkboxes and radiobuttons */
.jsCheckbox img,.jsRadiobutton img{
    vertical-align: text-top;
    width: 20px;
    height: 20px;
    background: no-repeat 0 0;
}
<?$wR=24;$hR=24;?>
#panelgout .jsRadiobutton img, #panelavis .jsRadiobutton img{
    vertical-align: text-top;
    width: <?=$wR?>px;
    height: <?=$hR?>px;
    background: no-repeat 0 0;
}



#panelgout .jsRadiobutton img{background-image: url(<?=$baseurl?>system/application/images/radio.png);}
#panelavis .jsRadiobutton img{background-image: url(<?=$baseurl?>/system/application/images/checkbox2.png);}
#panelgout .jsRadiobutton.A img, #panelavis .jsRadiobutton.A img{background-position: 0 -<?=2*$hR?>px;}
#panelgout .jsRadiobutton.H img, #panelavis .jsRadiobutton.H img {background-position: 0 -<?=$hR?>px;}
#panelgout .jsRadiobutton.H.A img, #panelavis .jsRadiobutton.H.A img {background-position: 0 -<?=2*$hR?>px;}
#panelgout .jsRadiobutton.F img, #panelavis .jsRadiobutton.F img {background-position: 0 -<?=2*$hR?>px;}
#panelgout .jsRadiobutton.F.A img, #panelavis .jsRadiobutton.F.A img {background-position: 0 -<?=3*$hR?>px;}
#panelgout .jsRadiobutton.F.H img, #panelavis .jsRadiobutton.F.H img {background-position: 0 -<?=$hR?>px;}
#panelgout .jsRadiobutton.F.A.H img, #panelavis .jsRadiobutton.F.A.H img {background-position: 0 -<?=3*$hR?>px;}

<?$wS=16;$hS=20;?>
#SearchQO .jsCheckbox img{
    vertical-align: text-top;
    width: <?=$wS?>px;
    height: <?=$hS?>px;
    background: no-repeat 0 0;
}

#SearchCat .jsCheckbox img{background-image: url(<?=$baseurl?>system/application/images/checkbox.gif);}
#SearchCat .jsCheckbox.A img {background-position: 0 -<?=2*$hS?>px;}
#SearchCat .jsCheckbox.H img {background-position: 0 -<?=$hS?>px;}
#SearchCat .jsCheckbox.H.A img {background-position: 0 -<?=3*$hS?>px;}
#SearchCat .jsCheckbox.F img {background-position: 0 0px;}
#SearchCat .jsCheckbox.F.A img {background-position: 0 -<?=2*$hS?>px;}
#SearchCat .jsCheckbox.F.H img {background-position: 0 -<?=$hS?>px;}
#SearchCat .jsCheckbox.F.A.H img {background-position: 0 -<?=3*$hS?>px;}

<?$wS=16;$hS=20;?>
#avismanquants .jsCheckbox img{
    vertical-align: text-top;
    width: <?=$wS?>px;
    height: <?=$hS?>px;
    background: no-repeat 0 0;
}

#avismanquants .jsCheckbox img{background-image: url(<?=$baseurl?>system/application/images/checkbox.gif);}
#avismanquants .jsCheckbox.A img {background-position: 0 -<?=2*$hS?>px;}
#avismanquants .jsCheckbox.H img {background-position: 0 -<?=$hS?>px;}
#avismanquants .jsCheckbox.H.A img {background-position: 0 -<?=3*$hS?>px;}
#avismanquants .jsCheckbox.F img {background-position: 0 0px;}
#avismanquants .jsCheckbox.F.A img {background-position: 0 -<?=2*$hS?>px;}
#avismanquants .jsCheckbox.F.H img {background-position: 0 -<?=$hS?>px;}
#avismanquants .jsCheckbox.F.A.H img {background-position: 0 -<?=3*$hS?>px;}

/* Original code
.jsCheckbox img{background-image: url(../gfx/checkboxes.gif);}
.jsRadiobutton img{background-image: url(../gfx/radiobuttons.gif);}

.jsCheckbox.A img,.jsRadiobutton.A img{background-position: 0 -40px;}

.jsCheckbox.H img,.jsRadiobutton.H img{background-position: 0 -80px;}
.jsCheckbox.H.A img,.jsRadiobutton.H.A img{background-position: 0 -120px;}

.jsCheckbox.F img,.jsRadiobutton.F img{background-position: 0 -160px;}
.jsCheckbox.F.A img,.jsRadiobutton.F.A img{background-position: 0 -200px;}

.jsCheckbox.F.H img,.jsRadiobutton.F.H img{background-position: 0 -240px;}
.jsCheckbox.F.A.H img,.jsRadiobutton.F.A.H img{background-position: 0 -280px;}
*/

/* alternate checkboxes in second fieldset */
.chb2 .jsCheckbox img{
    background-image: none;
    background-color: white;
    border: 1px solid #000;
    width: 12px;
    height: 12px;
    margin: 3px;
}

.chb2 .jsCheckbox.A img{background-color: #477B76;}

.chb2 .jsCheckbox.H img{background-color: #ddd;}
.chb2 .jsCheckbox.H.A img{background-color: #999;}


/* file input */
.jsFileWrapper{
    width: 125px;
    height: 26px;
    background: url(../gfx/cfeFile.gif) no-repeat 0 3px;
}
.jsFileWrapper.H{background-position:0 -76px;}

.jsFileWrapper,.jsFileL{
    float:left;display:inline;
}

.jsFilePath{
    float:left;
    height: 20px;
    padding: 3px 0;
}
.jsFilePath.hidden{display:none;}

.jsFilePath *{
    vertical-align: middle;
}
.jsFilePath img{
    width: 16px;height:16px;
    margin-right: 3px;
    background-image:url(../gfx/fileicons/file.gif);
}
.jsFilePath img.delete{
    width: 16px;height:16px;
    margin-left: 5px;
    background-image:url(../gfx/cross.gif);
    cursor: pointer;
}
    
.jsFilePath img.pdf{background-image:url(../gfx/fileicons/pdf.gif)}
.jsFilePath img.jpg,.jsFilePath img.gif,.jsFilePath img.jpeg,.jsFilePath img.tif,.jsFilePath img.bmp{background-image:url(../gfx/fileicons/img.gif)}
.jsFilePath img.doc{background-image:url(../gfx/fileicons/doc.gif)}
.jsFilePath img.xls{background-image:url(../gfx/fileicons/xls.gif)}
.jsFilePath img.sql,.jsFilePath img.db{background-image:url(../gfx/fileicons/db.gif)}
.jsFilePath img.html,.jsFilePath img.htm{background-image:url(../gfx/fileicons/html.gif)}
.jsFilePath img.swf,.jsFilePath img.fla{background-image:url(../gfx/fileicons/flash.gif)}
.jsFilePath img.zip,.jsFilePath img.rar,.jsFilePath img.ace{background-image:url(../gfx/fileicons/zip.gif)}
.jsFilePath img.txt,.jsFilePath img.odt{background-image:url(../gfx/fileicons/text.gif)}

/*****************************
 * submit and reset button   *
 ****************************/
/*  description:
    ~ this example covers sliding doors configuration
    ~ if you have slidingDoors disabled, then a simple backgroundimage will be sufficient
      and you may delete the ".js*******Slide"-parts 
*/
.jsSubmit,.jsReset{
    width: auto;
    background: url(<?=$baseurl?>system/application/images/customcfe/cfeButtonL.gif) no-repeat left top;
    text-align:center;
    padding: 2px 0 5px 0;
}
.jsSubmitSlide,.jsResetSlide{
    height: 100%;
    background: url(<?=$baseurl?>system/application/images/customcfe/cfeButtonR.gif) no-repeat right top;
    padding: 2px 0 5px 0;
}

*+html .jsSubmit{padding:0;}
*+html .jsReset{padding:0;}

.jsButton .label{
    line-height: 2em;
    padding: 0 15px;
    /*uncomment this to hide the buttons text */
    /*visibility:hidden;*/
}
.jsButton.P{background-position: 0 -40px;}
.jsButton.H{background-position: 0 -80px;}
.jsButton.F{background-position: 0 -200px;}
.jsButton.F.P{background-position: 0 -160px;}
.jsButton.H.P{background-position: 0 -40px;}

.jsButton.P span{background-position: 100% -40px;}
.jsButton.H span{background-position: 100% -80px;}
.jsButton.F span{background-position: 100% -200px;}
.jsButton.F.P span{background-position: 100% -160px;}
.jsButton.H.P span{background-position: 100% -40px;}

/* selector boxes */
.jsSelector1{width: 200px;}
.jsSelector0{width: 100px;}
<?$hSelAff=12;?>
.jsSelector{
    cursor: pointer;
    height: 30px;
    float:left;
    background: url(<?=$baseurl?>system/application/images/selects/mySelectL.gif) no-repeat left top;
}
.jsSelector.H{background-position: 0 -40px;}
.jsSelector.H .jsSelectorArrow{background-position: 3px -36px}

.jsSelectorArrow{
    height: 20px;width: 20px;
    background: url(<?=$baseurl?>system/application/images/cfeSelectorArrow.gif) no-repeat 3px 4px;
    margin-right: 7px;
}

.jsSelectorSlide{
    float:left;
    width: 100%;
    background: url(<?=$baseurl?>system/application/images/selects/mySelectR.gif) no-repeat right top;
    padding: 6px 0 4px 0;
}


.jsSelector .jsOption{padding:0 0 0 8px;margin:0 0 0 5px;}

.jsSelectorCWrapper{
    margin: -3px 0 0 0;
    background: url(<?=$baseurl?>system/application/images/selects/mySelector1B.gif) no-repeat 5px 100%;
}

.jsSelectorContent{
    width: 78px;height: 120px;
    padding: 3px 0 2px 8px;
    background: url(<?=$baseurl?>system/application/images/selects/mySelector1T.gif) no-repeat 5px 0;
}

.jsOption{
    padding: 6px 0 4px 5px;
    cursor: pointer;
    color: #009999;
    height: 13px;
}
.jsSelectorContent .H{color: #FFFFFF;background-color: #666;}

.jsSelectorScrollerWrapper img{width: 17px;height: 13px;display:block;cursor:pointer;}
.jsSelectorScrollerWrapper .scrollTop{background: url(<?=$baseurl?>system/application/images/scrollUp.gif) no-repeat 3px 3px;}
.jsSelectorScrollerWrapper .scrollKnob{background: url(<?=$baseurl?>system/application/images/scrollKnob.gif) no-repeat 3px 0;}
.jsSelectorScrollerWrapper .scrollBottom{background: url(<?=$baseurl?>system/application/images/scrollDown.gif) no-repeat 3px 3px;}