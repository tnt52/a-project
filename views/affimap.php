<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<STYLE TYPE="text/css">

</STYLE>
<SCRIPT>
document.write("test");
var r1=150;r2=100;r3=50;
var teta;
var xI=150;yI=150;
var canvas=document.getElementById("affican");
  if(!canvas.getContext){return;}
  var ctx=canvas.getContext("2d");
  ctx.beginPath();
  ctx.arcTo(xI, yI, r1, Math.asin(r2/r1), Math.asin(r2/r1)+Math.PI/2, false);
  ctx.fillStyle = "rgba(255,127,90,0.6)";
  ctx.fill();
  
  
var lastspot=null;
function selSpot(keyM){
	var clear=focusSpot(keyM);
	var m=$(keyM+"moreML<?=TMmem?>");
	if (m!=null) showID(m.getParent().getParent());
	else {
	m=$('MspotInfo');
	m.sel=clear;
	m.maj="true";
	var txtdiv=$('MspotInfo');
	new Request.HTML({
	url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+keyM,
	update: txtdiv,
	method: 'get',
	//onComplete: function(){showM(m,txtdiv);},
	evalScripts: true
	}).send();
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
<canvas id="affican" width='300' height='300'>
Sorry! - Browser does not support Graphics Canvas</canvas>
<DIV ID="MspotInfo" cat="<?=TMmem?>">MspotInfo</DIV>
hflhdsl<BR>
ksdlmgjk<BR>
jdfklmgjklmd<BR>
jdfklmjklm      <BR>
jdfklmsgmsl         <BR>
jdfklmsj                <BR>

<DIV id="cible" style="left:0px;top:0px">
     <? foreach ($affinites as $aff):?>
     <DIV id="spot<?=$aff['keyobjet']?>" class="spot" onclick="selSpot(<?=$aff['keyobjet']?>)" onmouseover="this.addClass('H')" onmouseout="this.removeClass('H')">
     <?=$aff['keyobjet']?></DIV>
     <? endforeach;?>
</DIV>
AFFIMAP
<!--<img src="<?echo base_url().'index.php/navigation/affimap/1/1/'.$w;?>" width="<?=$w?>" height="<?=$w?>">-->
</body>
<STYLE TYPE="text/css">

</STYLE>
</html>