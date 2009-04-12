
function selMember(m,origine){
    var txtdiv=$(m.getProperty('cle')+'more'+m.getProperty('cat'));
    if (m.maj!="false") {
    new Ajax(urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),{update: txtdiv,method: 'get', onComplete: function(){showM(m,txtdiv,origine);}, evalScripts: true}).request();
    }
    else  {showM(m,txtdiv,origine);}
}
function showM(m,txtdiv,origine){
   var Visu=$('VisuM');
   Visu.setHTML(txtdiv.innerHTML);
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
       new Ajax(urlbase+'index.php/navigation/repmsel/'+this.cat+'/'+m.getProperty('cle')+"/"+m.sel+"/"+limitQO+"/"+pageQO+"/"+triQO+"/"+sensQO,{update: null,method: 'get', onComplete: function(){}, evalScripts: true}).request();
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
 //§new Ajax(urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),{update: null,onComplete: function(){showQO(m)}, evalScripts: true}).request();
 new Ajax(urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),{update: $(m.getProperty('cle')+'more'+m.getProperty('cat')),method: 'get', onComplete: function(){showQO(m);}, evalScripts: true}).request();
 }
 else  {showQO(m);}
}
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
              $('VQheader').setHTML(header.innerHTML);
              var footer=$(m.getProperty('cat')+'footer'+m.getProperty('cle'));
              $('VQfooter').setHTML(footer.innerHTML);
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

/*function majPR(Qsel){

         PR=$('PanelRep');
         if (Qsel!=null){
            cat=Qsel.getProperty('cat');
            cle=Qsel.getProperty('cle');
            libelleQ=$('LibelleQ');
            libQavis=$('LibQavis');
            libQgout=$('LibQgout');
            PRgout=$('panelgout');
            PRavis=$('panelavis');

            switch(cat){
                case TQavis:
                     libelleQ.setHTML($(cle+"libelle").innerHTML);
                     libQavis.setStyle('display','block');
                     libQgout.setStyle(PR);
                     PRavis.setStyle('display','block');
                     PRgout.setStyle(PR);
                     break;
                default:
                     libelleQ.setHTML($(cle+"titre").innerHTML+ "?");
                     libQavis.setStyle(PR);
                     libQgout.setStyle('display','block');
                     PRavis.setStyle('display','none');
                     PRgout.setStyle('display','block');
                     break;
            }

            PR.removeClass("derriere");
            PR.addClass("devant");
            PR.effects({
                      duration: 600,
                      transition: Fx.Transitions.Bounce.easeOut
            }).start({
                      'opacity':[0,1]
            });
         }
         else {
            PR.effects({
                        duration: 600,
                        transition: Fx.Transitions.Bounce.easeOut
            }).start({
                        'opacity':[1,0]
            });
            PR.removeClass("devant");
            PR.addClass.bind(PR).pass("derriere").delay(600);
         }
}*/

/*function showmore(m){
 var h=100;
 var txtdiv=$(m.getProperty('cle')+'more'+m.getProperty('cat'));
 /*var fxIn=new Fx.Styles(m.getProperty('cle')+'more',
     {
       duration: 600,
       transition: Fx.Transitions.Bounce.easeOut
     });
 var fxOut=new Fx.Styles(m.getProperty('cle')+'more',
     {
       duration: 600,
       transition: Fx.Transitions.Bounce.easeOut
     });*//*
 if (m.maj!="false")
 {
      m.maj="false";
      m.haut=txtdiv.getCoordinates()['height'];
 }
 h=m.haut;
 /*var mySlider = new Fx.Slide(txtdiv, {duration: 500});/*, transition: Fx.Transitions.Elastic.easeOut}*//*
 if (m.cas=="+"){
    //txtdiv.setStyle('display','block');
    /*fxIn.start({
       'opacity':[0,1],
       'height':[0,h]
     });*//*
    txtdiv.effects({
     duration: 600,
     transition: Fx.Transitions.Bounce.easeOut
     }).start({
       'opacity':[0,1],
       'height':[0,h]
     });
     /*mySlider.slideIn();*//*
     m.setHTML("+/-");
     m.cas="-";
 }
 else {
     /*fxOut.start({
       'opacity':[1,0],
       'height':[h,0]
     });*//*
     txtdiv.effects({
     duration: 600,
     transition: Fx.Transitions.Bounce.easeOut
     }).start({
       'height':[h,0],
       'opacity':[1,0]
     });
     //txtdiv.setStyle.pass(['display','none'],txtdiv).delay(600);
     /*mySlider.slideOut();*//*
     m.setHTML("+/-");
     m.cas="+";
 }
}*/