
function selMember(m,origine){
    var txtdiv=$(m.getProperty('cle')+'more'+m.getProperty('cat'));
    if (m.maj!="false") {
    new Request.HTML({url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),update: txtdiv,method: 'get', onComplete: function(){showM(m,txtdiv,origine);}, evalScripts: true}).request();
    }
    else  {showM(m,txtdiv,origine);}
}
function showM(m,txtdiv,origine){
   var Visu=$('VisuM');
   Visu.set('html',txtdiv.innerHTML);
   if (m.sel=="false" || Msel!=m){
       if (m.maj!="false") m.maj="false";
       m.sel="true";
       m.addClass("clicked");
       if (Msel!=null && Msel!=m) {
                       Msel.sel="false";
                       Msel.removeClass("clicked");
       }
       Msel=m;
       DIVdevant(Visu);
       Visu.effects({
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[0,1]
       });
   }
   else {
       m.removeClass("clicked");
       m.sel="false";
       Msel=null;
       Visu.effects({
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[1,0]
       });
       this.DIVderriere.bind(Visu).pass(Visu).delay(600);
   }
   majfromM.delay(300,this,[origine,m]);
}
function majfromM(origine,m){
    if (origine=="liste"){
       if ($('spot'+m.getProperty('cle'))!=null) focusSpot(m.getProperty('cle'));
       else if (this.repMsel)
       new Request.HTML({url: urlbase+'index.php/navigation/repmsel/'+this.cat+'/'+m.getProperty('cle')+"/"+m.sel+"/"+limitQO+"/"+pageQO+"/"+triQO+"/"+sensQO,update: null,method: 'get', onComplete: function(){}, evalScripts: true}).request();
    }
}
function hoverQO(el){
         el.addClass('hovered');
}
function unhoverQO(el){
         el.removeClass('hovered');
}
function click(el){
         GetMore(el);
}
function GetMore(m){
 if (m.maj!="false") {
 //§new Request.HTML({url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),update: null,onComplete: function(){showQO(m)}, evalScripts: true}).request();
 new Request.HTML({url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),update: $(m.getProperty('cle')+'more'+m.getProperty('cat')),method: 'get', onComplete: function(){showQO(m);}, evalScripts: true}).send();
 }
 else  {showQO(m);}
}
//new Fx.Morph(el, obj)
function showQO(m){
          Vcont=$('VQcontainer');
          /*Visu=$('VisuQ');
          Vsiha=$('VQsizehand');
          Vhand=$('VQhandle');*/
          if (m.sel=="false" || Qsel!=m){
              if (m.maj!="false") m.maj="false";
              m.sel="true";
              m.addClass("clicked");
              if (Qsel!=null && Qsel!=m) {
                              this.Qsel.sel="false";
                              this.Qsel.removeClass("clicked");
              }
              this.Qsel=m;
              var header=$(m.getProperty('cat')+'header'+m.getProperty('cle'));
              $('VQheader').set('html',header.innerHTML);
              var footer=$(m.getProperty('cat')+'footer'+m.getProperty('cle'));
              $('VQfooter').set('html',footer.innerHTML);
              DIVdevant(Vcont);
              /*DIVdevant(Vsiha);
              DIVdevant(Vhand);
              DIVdevant(Visu);*/
              Vcont.effects({
                          duration: 600,
                          transition: Fx.Transitions.Bounce.easeOut
              }).start({
                          'opacity':[0,1]
              });
              majPR(Qsel);
          }
          else {
              m.removeClass("clicked");
              m.sel="false";
              majPR(null);
              Vcont.effects({
                          duration: 600,
                          transition: Fx.Transitions.Bounce.easeOut
              }).start({
                          'opacity':[1,0]
              });
              this.DIVderriere.bind(Vcont).pass(Vcont).delay(600);
              /*this.DIVderriere.bind(Vhand).pass(Vhand).delay(600);
              this.DIVderriere.bind(Vsiha).pass(Vsiha).delay(600);
              this.DIVderriere.bind(Visu).pass(Visu).delay(600);*/
              var plyr=$('player');
              plyr.sendEvent("STOP",null);
              //document.write($(m.getProperty('cat')+'embplayer'+m.getProperty('cle')));
          }
}