function showID(m){
         if (m.getProperty("sel")=="false"){      // || Msel!=m
              m.setProperty("sel","true");
              m.addClass("clicked");
              if (Msel!=null && Msel!=m) {
                              Msel.setProperty("sel","false");
                              Msel.removeClass("clicked");
              }
              $('idMStxt').set('html',$(m.getProperty('cle')+'id'+m.getProperty('liste')).innerHTML);
              $('idMSimg').set('src',urlbase+"system/application/"+$(m.getProperty('cle')+'avatar'+m.getProperty('liste')).value);
              new Fx.Morph($('idMS'),{
                               duration: 600,
                               transition: Fx.Transitions.Bounce.easeOut
                   }).start({
                               'opacity':[0,1]
              });
              if (vmopen=="true") More(m);
         }
         else {
              m.removeClass("clicked");
              m.setProperty("sel","false");
              new Fx.Morph($('idMS'),{
                               duration: 600,
                               transition: Fx.Transitions.Bounce.easeOut
                   }).start({
                               //'height':[100,0],
                               'opacity':[1,0]
              });
              if (vmopen=="true") showMore(m);
         }
         Msel=m;
	 $('varscat').value=Msel.getProperty('cle');
         majfromM(m);
}
function majfromM(m){
         if (m!=null && champtriCAT!=""){
            if (m.getProperty('liste')=="ML"){
               if ($('spot'+m.getProperty('cle'))!=null) focusSpot(m.getProperty('cle'));
               else if (this.repMsel){
                    new Request.HTML({
                        url: urlbase+'index.php/navigation/repmsel/'+this.cat+'/'+m.getProperty('cle')+"/"+m.getProperty("sel")+"/"+limitQO+"/"+pageQO+"/"+champtriCAT+"/"+sensQO,
                        update: $('jscontainer'),
                        method: 'get',
                        onComplete: function(){},
                        evalScripts: true
                    }).send();
               }
            }
         }
}

function hoverQO(el){
         el.addClass('hovered');
}
function unhoverQO(el){
         el.removeClass('hovered');
}

n=0;

function More(m){
//    document.write(m);
         m=$(m);
         if (m.getProperty("liste").substr(0,1)=="L") closeVisuS();
         var visu=parseInt(m.getProperty("visu")); //visu= 0(Vmain),1(Vsub) ou 2(VM)
         var Vstr;
         var type;
         switch (visu){
                case 0: Vstr='Q';break;
                case 1: Vstr='A';break;
                case 2: Vstr='M';break;
         }
         type=$('V'+Vstr+'scroll').get('type');
         if (getNextItem(m)==null) $('V'+Vstr+'nxt').setStyle('opacity',0); else $('V'+Vstr+'nxt').setStyle('opacity',1);
         if (getPrevItem(m)==null) $('V'+Vstr+'prv').setStyle('opacity',0); else $('V'+Vstr+'prv').setStyle('opacity',1);
         if (m.getProperty('cat')!=type){
            new Request.HTML({
                url: urlbase+'index.php/navigation/player/'+m.getProperty('cat'),
                update: $('V'+Vstr+'cadre'),
                method: 'get',
                onComplete: function(){GetMore(m);},
                evalScripts: true
            }).send();
         }
         else {GetMore(m);}
}

function GetMore(m){
         if (m.getProperty("maj")!="false" && m.getProperty('cat')!=TQgout && m.getProperty('cat')!=TQavis) {
            new Request.HTML({
                url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle')+"/"+m.getProperty("visu")+"/"+m.getProperty("type"),
                update: $(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat')),
                method: 'get',
                onComplete: function(){showMore(m);},
                evalScripts: true
            }).send();
         }
         else  {showMore(m);}
}
function showMore(m){
         var Vstr,Vcont,Vcadre,Vsplash;
         var Sel;
         var visu=parseInt(m.getProperty("visu"));
         switch (visu){
                case 0: Vstr='Q';Sel=MainSel;break;
                case 1: Vstr='A';Sel=SubSel;break;
                case 2: Vstr='M';Sel=Mvisu;break;
         }
         Vcont=$('V'+Vstr+'container');
         Vcadre=$('V'+Vstr+'cadre');
	 Vsplash=$('V'+Vstr+'splash');
         var divmore=$(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat'));
         if (m.getProperty("maj")!="false") m.setProperty("maj","false");
         if (visu==2){
            if (Mvisu!=m || vmopen=="false"){
                vmopen="true";
                showVisu(divmore,Vcadre,Vcont,Vsplash);
            }
            else {
                vmopen="false";
                hideVisu(Vcont,Vsplash);
            }
         }
         else{
            if (m.getProperty("sel")=="false"){        //|| Sel!=m
                m.setProperty("sel","true");
                m.addClass("clicked");
                   if (Sel!=null && Sel!=m) {
                                   Sel.setProperty("sel","false");
                                   Sel.removeClass("clicked");
                   }
		  /*$('V'+Vstr+'scroll').setStyle('height',divmore.getHeight());
		  $('V'+Vstr+'scroll').getParent().setStyle('height',divmore.getHeight());
		  $('V'+Vstr+'scroll').getNext().getChildren()[1];*/ 
                   showVisu(divmore,Vcadre,Vcont,Vsplash);
                   if (m.getProperty('majpr')=="true") majPR(m);
            }
            else {
                m.removeClass("clicked");
                m.setProperty("sel","false");
                if (m.getProperty('majpr')=="true") majPR(null);
                hideVisu(Vcont,Vsplash);
            }
         }
         switch (visu){
                case 0: Vstr='Q';MainSel=m;break;
                case 1: Vstr='A';SubSel=m;break;
                case 2: Vstr='M';Mvisu=m;break;
         }
}
var VQscroll=new Element('div',{
		'class':'Vhead',
		id:'VQscroll'
	     }
);
var hVc;
function showVisu(divmore,Vcadre,Vcont,Vsplash){
	 var Vhead,Vfoot;
         var header=divmore.getElement('div');
	 $('VQscroll').getParent().destroy();
	 VQscroll.setStyles({
			 'left':'5px',
			 'top':'11px'
	 });
	 VQscroll.inject($('VQcadre'),'top');
	 var h=divmore.getHeight().toInt()+13;
	 var w=divmore.getWidth().toInt();
	 //wVc=divmore.getWidth().toInt()+13;
	 $('VQscroll').setStyles({
			 'overflow-x':'hidden',
			 'overflow-y':'auto',
			 'width':w
	 });
	 if (h>70) h=70;
	 hVc=h+140;
         $('VQscroll').setStyle('height',h);
         Vhead=Vcadre.getElement('.Vhead');
         Vhead.set('html',header.innerHTML);
	 scroll_vq=new UvumiScrollbar("VQscroll");//update();
         var footer=header.getNext('div');
         Vfoot=Vhead.getParent().getNext('.Vfoot');
         Vfoot.set('html',footer.innerHTML);
	 //hVc=Vcont.getHeight().toInt();
	 //wVc=Vcont.getWidth().toInt();
	 /*if (Vcont.getStyle('margin-left').toInt()<-2000)
	 {
		 Vcont.setStyles({
				 'margin-left':Vcont.getStyle('margin-left').toInt()+500000
		 });*/
         //if (!Vcont.hasClass('devant') || Vcont.get('opacity')!=1)
		 new Fx.Morph(Vsplash,{
			     duration: 300,
			     transition: Fx.Transitions.Bounce.easeOut
		 }).start({
			     'height':[Vsplash.getHeight().toInt(),hVc],
			     'width':[Vsplash.getWidth().toInt(),wVc],
			     'margin-left':[Vsplash.getStyle('margin-left').toInt(),-wVc/2],
			     'margin-top':[Vsplash.getStyle('margin-top').toInt(),0]
		 });
		this.DIVdevant.bind(Vcont).pass(Vcont).delay(350);
		/*this.DIVdevant.bind(Vcont.getChildren()[1]).pass(Vcont.getChildren()[1]).delay(345);
		this.DIVdevant.bind(Vcont.getChildren()[2]).pass(Vcont.getChildren()[2]).delay(340);*/
		//this.DIVdevant.bind($('VQ_PR')).pass($('VQ_PR')).pass(600);
		//$('VQ_PR').setStyles.bind($('VQ_PR')).pass({'height':60}).delay(600);
	 //}
	 
}
function hideVisu(Vcont,Vsplash){
	/*var h=Vcont.getHeight().toInt();
	var w=Vcont.getWidth().toInt();*/
	/*$('VQ_PR').setStyles({
			'height':'0px'
	});*/
        new Fx.Morph(Vsplash,{
             duration: 300
         }).start({
                      'height':[hVc,0],
		      'width':[wVc,0],
		      'margin-left':[Vsplash.getStyle('margin-left').toInt(),Vsplash.getStyle('margin-left').toInt()+wVc/2],
		      'margin-top':[Vsplash.getStyle('margin-top').toInt(),Vsplash.getStyle('margin-top').toInt()+hVc/2]
         });
	 this.DIVderriere.bind(Vcont).pass(Vcont).delay(300);
	 /*this.DIVderriere.bind(Vcont.getChildren()[1]).pass(Vcont.getChildren()[1]).delay(300);
	 this.DIVderriere.bind(Vcont.getChildren()[2]).pass(Vcont.getChildren()[2]).delay(300);*/
         //this.DIVderriere.bind(Vcont).pass(Vcont).delay(600);
	 /*if (Vcont.getStyle('margin-left').toInt()>-2000)
		 Vcont.setStyles.bind(Vcont).pass({
				 'margin-left':Vcont.getStyle('margin-left').toInt()-500000,
		 }).delay(600);*/
	/*Vcont.setStyles.bind(Vcont).pass({
			 'height':hVc,
			 'width':wVc
	 }).delay(700);*/
	var plyr=$('player');
        if (plyr!=null && plyr.getAttribute("sendEvent")!=null) plyr.sendEvent("STOP",null);
}
/*function GetArtiste(cle){
         new Request.HTML({
             url: urlbase+'index.php/navigation/artiste/'+cle,
             update: $('VisuA'),
             method: 'get',
             onComplete: function(){showA();},
             evalScripts: true
         }).send();
}
function showA(){
   var Vcont=$('VAcontainer');
   DIVdevant(Vcont);
   new Fx.Morph(Vcont,{
               duration: 200,
               transition: Fx.Transitions.Bounce.easeOut
   }).start({
               'opacity':[0,1]
   });
}
function selMember(m,origine){
    var txtdiv=$(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat'));
    if (m.maj!="false") {
       new Request.HTML({
           url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle')+'/2/'+m.getProperty('type'),
           update: txtdiv,
           method: 'get',
           onComplete: function(){showM(m,txtdiv,origine);},
           evalScripts: true
       }).send();
    }
    else  {showM(m,txtdiv,origine);}
}

function showM(m,txtdiv,origine){
   var Visu=$('VisuM');
   var Vcont=$('VMcontainer');
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
       DIVdevant(Vcont);
       new Fx.Morph(Vcont,{
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
       new Fx.Morph(Vcont,{
                   duration: 200,
                   transition: Fx.Transitions.Bounce.easeOut
       }).start({
                   'opacity':[1,0]
       });
       this.DIVderriere.bind(Vcont).pass(Vcont).delay(600);
   }
   majfromM.delay(300,this,[origine,m]);
}  */
/*function GetMore(m){
if (m.hasClass('Titre'))    // si via link et non via liste
   new Request.HTML({
       url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),
       update: $(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat')),method: 'get',
       onComplete: function(){showQO(m);},
       evalScripts: true
   }).send();
else{
 if (m.maj!="false") {
    new Request.HTML({
    url: urlbase+'index.php/navigation/more/'+m.getProperty('cat')+'/'+m.getProperty('cle'),
    update: $(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat')),
    method: 'get',
    onComplete: function(){showQO(m);}, evalScripts: true}).send();
 }
 else  {showQO(m);}
 }
}*/
/*function showQO(m){
         //if (m.hasClass('Titre')) document.write("TEST");
          var Vcont=$('VQcontainer');
          var divmore=$(m.getProperty('cle')+'more'+m.getProperty('liste')+m.getProperty('cat'));
          if (m.sel=="false" || Qsel!=m){
              if (m.maj!="false") m.maj="false";
              m.sel="true";
              m.addClass("clicked");
              if (Qsel!=null && Qsel!=m) {
                              this.Qsel.sel="false";
                              this.Qsel.removeClass("clicked");
              }
              this.Qsel=m;
              var header=divmore.getElement('div');
              $('VQheader').set('html',header.innerHTML);
              var footer=header.getNext('div');
              $('VQfooter').set('html',footer.innerHTML);
              DIVdevant(Vcont);
              new Fx.Morph(Vcont,{
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
              new Fx.Morph(Vcont,{
                          duration: 600,
                          transition: Fx.Transitions.Bounce.easeOut
              }).start({
                          'opacity':[1,0]
              });
              this.DIVderriere.bind(Vcont).pass(Vcont).delay(600);
              var plyr=$('player');
              plyr.sendEvent("STOP",null);
              //document.write($(m.getProperty('cat')+'embplayer'+m.getProperty('cle')));
          }
}*/