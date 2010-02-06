<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<STYLE TYPE="text/css">

</STYLE>
<SCRIPT>

function drawAffimap(){
var r1=150;r2=100;r3=50;
var teta;
var xI=150;yI=150;
var canvas=document.getElementById("affican");
  if(!canvas.getContext){return;}
  var ctx=canvas.getContext("2d");
  ctx.beginPath();
  teta=Math.asin(-r3/r1);
  ctx.fillStyle = "rgba(255,52,0,1)";
  ctx.arc(xI, yI, r1, Math.PI-teta,teta, false);
  ctx.fill();
  ctx.beginPath();
  teta=Math.asin(-r2/r1);
  ctx.fillStyle = "rgba(0,0,0,1)";
  ctx.arc(xI, yI, r1, Math.PI-teta, teta, false);
  ctx.fill();
  ctx.beginPath();
  teta=Math.asin(r3/r1);
  ctx.fillStyle = "rgba(255,0,0,1)";
  ctx.arc(xI, yI, r1, teta, Math.PI-teta, false);
  ctx.fill();
  ctx.beginPath();
  teta=Math.asin(r2/r1);
  ctx.fillStyle = "rgba(0,0,0,1)";
  ctx.arc(xI, yI, r1, teta, Math.PI-teta, false);
  ctx.fill();
  
  /*ctx.arcTo(xI, yI, r1, teta, Math.PI-teta, false);
  ctx.lineTo(xI-Math.sqrt(r1*r1-r2*r2),yI-r2);
  ctx.fillStyle = "rgba(255,0,0,1)";
  ctx.fill();*/
}
window.onload=drawAffimap;

</SCRIPT>
</head>
<body bgcolor="#FFFFFF">
<canvas id="affican" width='300' height='300'>
Sorry! - Browser does not support Graphics Canvas</canvas>
</body>
</html>