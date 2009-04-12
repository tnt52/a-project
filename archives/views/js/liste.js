function GetMore(m){
 if (m.maj!="false") {
 new Ajax(urlbase+'index.php/navigation/more/'+cat+'/'+m.getProperty('cle'),{update: $(m.getProperty('cle')+'more'),method: 'get', onComplete: function(){showmore(m);}, evalScripts: true}).request();
 }
 else  {showmore(m);}
}
function showmore(m){
 var h=100;
 var txtdiv=$(m.getProperty('cle')+'more');
 /*var fxIn=new Fx.Styles(m.getProperty('cle')+'more',
     {
       duration: 600,
       transition: Fx.Transitions.Bounce.easeOut
     });
 var fxOut=new Fx.Styles(m.getProperty('cle')+'more',
     {
       duration: 600,
       transition: Fx.Transitions.Bounce.easeOut
     });*/
 if (m.maj!="false")
 {
      m.maj="false";
      m.haut=txtdiv.getCoordinates()['height'];
 }
 h=m.haut;
 /*var mySlider = new Fx.Slide(txtdiv, {duration: 500});/*, transition: Fx.Transitions.Elastic.easeOut}*/
 if (m.cas=="+"){
    txtdiv.setStyle('display','block');
    /*fxIn.start({
       'opacity':[0,1],
       'height':[0,h]
     });*/
    txtdiv.effects({
     duration: 600,
     transition: Fx.Transitions.Bounce.easeOut
     }).start({
       'opacity':[0,1],
       'height':[0,h]
     });
     /*mySlider.slideIn();*/
     m.setHTML("Moins");
     m.cas="-";
 }
 else {
     /*fxOut.start({
       'opacity':[1,0],
       'height':[h,0]
     });*/
     txtdiv.effects({
     duration: 600,
     transition: Fx.Transitions.Bounce.easeOut
     }).start({
       'height':[h,0],
       'opacity':[1,0]
     });
     txtdiv.setStyle.pass(['display','none'],txtdiv).delay(600);
     /*mySlider.slideOut();*/
     m.setHTML("Plus");
     m.cas="+";
 }
}

window.addEvent('domready', function() {
  var mores=$$('div.more');
  mores.each(function(m){
      m.cas="+";
      m.maj="true";
      m.addEvent('click',function (){GetMore(m)});
  });
});

