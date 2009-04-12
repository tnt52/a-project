<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<STYLE TYPE="text/css">

</STYLE>
<SCRIPT>
var lastspot=null;
function selSpot(keyM){
var clear=focusSpot(keyM);
var m=$(keyM+"more<?=TMmem?>");
  if (m!=null) selMember(m.getPrevious(),"affimap");
  else {
       m=$('MspotInfo');
       m.sel=clear;
       m.maj="true";
       var txtdiv=$('MspotInfo');
       new Request.HTML({url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+keyM,update: txtdiv,method: 'get', onComplete: function(){showM(m,txtdiv);}, evalScripts: true}).request();
  }
}
function focusSpot(keyM){
         if (lastspot!=null && lastspot.hasClass("spot")) lastspot.removeClass('S')
         if (lastspot!=$('spot'+keyM)){
            lastspot=$('spot'+keyM);
            lastspot.addClass('S');
            return "false";
         }
         lastspot=null;
         return "true";
}
var x0,y0,spots=new Array(),affs=new Array();

function initspots(){
   x0=$('cible').getStyle('left').toInt();
   y0=$('cible').getStyle('top').toInt();
  <? foreach ($affinites as $aff):?>
  spots.push($('spot<?=$aff['keyobjet']?>'));
  affs[<?=$aff['keyobjet']?>]=new Array();
    <? foreach ($aff as $key=>$val):?>
    affs[<?=$aff['keyobjet']?>]['<?=$key?>']=<?=$val?>;
    <? endforeach;?>
  <? endforeach;?>
  //document.write(affs['spot6']['keyobjet']);
}
function spotting(typeA){
  var di,xi,yi,ws,hs,dim,w=343;
  var aff,lien,affmax=100*<?=ValBigS*ValBigS?>;
  var keyMo;
  switch (typeA){
         case TA:aff="affglobal",lien="liens";break;
         default:aff="affglobal",lien="liens";break;
  }
  for (i=spots.length-1; i>-1;i--){
      keyMo=spots[i].id.substring(4,11);
      di=w*(1-affs[keyMo][aff]/affmax)/2;
      if (affs[keyMo][aff]<10) {
                               dim='dim1';
                               ws=16;
                               hs=20;
      }
      else {
                               dim='dim1';
                               ws=16;
                               hs=20;
      }
      xi=(w-di*Math.sin(2*Math.PI*di/20))/2;   //spirale
      yi=(w-di*Math.cos(2*Math.PI*di/20))/2;
      spots[i].setStyle('left',(x0+xi)-ws/2);
      spots[i].setStyle('top',(y0+yi)-hs/2);
      spots[i].addClass(dim);
  }
}
window.addEvent('domready', function() {
  initspots();
  spotting(TA);
});
</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<DIV STYLE="Display:none" ID="MspotInfo" cat="<?=TMmem?>"></DIV>
hflhdsl<BR>
ksdlmgjk<BR>
jdfklmgjklmd<BR>
jdfklmjklm      <BR>
jdfklmsgmsl         <BR>
jdfklmsj                <BR>

<DIV id="cible" style="left:0px;top:0px">
     <? foreach ($affinites as $aff):?>
     <DIV id="spot<?=$aff['keyobjet']?>" class="spot" onclick="selSpot(<?=$aff['keyobjet']?>)" onmouseover="this.addClass('H')" onmouseout="this.removeClass('H')"><?=$aff['keyobjet']?></DIV>
     <? endforeach;?>
</DIV>
AFFIMAP
<!--<img src="<?echo base_url().'index.php/navigation/affimap/1/1/'.$w;?>" width="<?=$w?>" height="<?=$w?>">-->
</body>
<STYLE TYPE="text/css">
#cible{
  position:relative;
  left:0;
  top:0;
  width: 343px;
  height:343px;
  background-image: url(http://127.0.0.1/system/application/images/7zones.gif);
}
.spot{
 position:absolute;
 z-index:10;
 background: no-repeat 0 0;
}

.spot.dim1{
 width: 16px;
 height:20px;
 background-image: url(http://127.0.0.1/system/application/images/radio.gif);
}

.spot.dim1.H{
 background-position: 0 -20px;
}
.spot.dim1.H.S,.spot.dim1.S{
 background-position: 0 -40px;
}
</STYLE>
</html>