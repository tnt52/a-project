function hover(el){
         $(el).addClass('H');
}
function unhover(el){
         el=$(el);
         el.removeClass('H');
         el.removeClass('C');
}
function DIVdevant(div){
         div.removeClass("derriere");
         div.addClass("devant");
}
function DIVderriere(div){
         div.removeClass("devant");
         div.addClass("derriere");
}
function switchDiv(show,hide){
         DIVderriere(hide);
         DIVdevant(show);
//         hide.setStyle('display','none');
//         show.setStyle('display','block');
}
function membres_page(page){
  pageM=page;
  GetMembres();
}
function GetMembres(){
  rangs=triM_rg[0];
  sens=triM_ss[0];
  for (i=1; i<triM_rg.length; i++) {
      rangs+="-"+triM_rg[i];
      sens+="-"+triM_ss[i];
  }
  new Ajax(urlbase+'index.php/navigation/liste/'+TM+'/'+limitM+'/'+pageM+'/'+rangs+'/'+sens,{update: $('membres'),method: 'get', evalScripts: true}).request();
}
function GetHeader(cat){
    new Ajax(urlbase+'index.php/navigation/header/'+cat+'/'+limitQO+'/'+pageQO+"/"+triQO+"/"+sensQO,{update: $('header'),method: 'get', evalScripts: true}).request();
}
function GetPlayer(cat){
    new Ajax(urlbase+'index.php/navigation/player/'+cat,{update: $('VisuQ'),method: 'get', evalScripts: true}).request();
}
function liste_page(page){
  pageQO=page;
  GetHeader(cat);
  GetListe(cat);
  GetPlayer(cat);
}
function GetListe(cat){
  if (Qsel!=null && Qsel.sel=="true") showQO(Qsel);
  Qsel=null;
  new Ajax(urlbase+'index.php/navigation/liste/'+cat+'/'+limitQO+'/'+pageQO+"/"+triQO+"/"+sensQO,{update: $('liste'),method: 'get', evalScripts: true}).request();
  this.cat=cat;
  this.repMsel=true;
}
function showAffinites(){
         new Ajax(urlbase+'index.php/navigation/affinites',{update: $('liste'),method: 'get', evalScripts: true}).request();
         this.repMsel=false;
}
function majPR(QMsel){
//         document.write($('NewQ'));
         var NewQ=$('NewQ');
         var spanR;
         var PR=$('PanelRep');
         var cle="";
         if (QMsel!=null){
            cle=$('keyQpoR').value=QMsel.getProperty('cle');
            $('keyMQpoR').value=QMsel.getProperty('keyM');
            var cat=$('typeQpoR').value=QMsel.getProperty('cat');
            var LibNQ="";
            if (cle=="") LibNQ=$('LibNewQ').value;
            libelleQ=$('LibelleQ');
            libQavis=$('LibQavis');
            libQgout=$('LibQgout');
            PRgout=$('panelgout');
            PRavis=$('panelavis');
            switchDiv(PR,NewQ);
            switch(parseInt(cat)){
                case TQavis:
                     libelleQ.setHTML(LibNQ==""? $(cle+"libelle").innerHTML : LibNQ);
                     libQavis.setStyle('display','block');
                     libQgout.setStyle('display','none');
                     PRavis.setStyle('display','block');
                     PRgout.setStyle('display','none');
                     break;
                default:
                     libelleQ.setHTML(LibNQ==""? $(cle+"titre").innerHTML + "?": LibNQ + "?");
                     libQavis.setStyle('display','none');
                     libQgout.setStyle('display','block');
                     PRavis.setStyle('display','none');
                     PRgout.setStyle('display','block');
                     switch (QMsel.getProperty('repM')){
                            case $('BigS').value:$('BigS').cfe.clicked();spanR=$('BigS').getParent();break;
                            case $('LittleS').value:$('LittleS').cfe.clicked();spanR=$('LittleS').getParent();break;
                            case $('NoF').value:$('NoF').cfe.clicked();spanR=$('NoF').getParent();break;
                            case $('_LittleS').value:$('_LittleS').cfe.clicked();spanR=$('_LittleS').getParent();break;
                            case $('_BigS').value:$('_BigS').cfe.clicked();spanR=$('_BigS').getParent();break;
                            default:$('NoGout').cfe.clicked();spanR=null;break;
                     }
                     majLibPR(spanR);
                     LibR(spanR);break;
            }
            DIVdevant($('retourPR'));
         }
         else {
            switchDiv(NewQ,PR);
            $('typeQpoR').value=$('keyMQpoR').value=$('keyQpoR').value="";
         }
}
function centrer(el,w,h){
         el.setStyle('top',el.getStyle('top')-h/2);
         el.setStyle('left',el.getStyle('left')-w/2);
}
window.addEvent('domready', function() {
  /*$('Artistes').addEvent('click',function() {GetListe($('Artistes').getProperty('cat'))});
  $('Sons').addEvent('click',function() {void(window.location.reload()); GetListe($('Sons').getProperty('cat'))});*/
  /*$('compte').makeDraggable();*/
  //centrer($('VisuQ'),400,400);
  majPR(null);
  majNewQ();
  liste_page(1);;
  GetMembres();
  MM_preloadImages(urlbase+'system/application/images/boutons/OKrol.gif');
});

function repositionner(el) {
   setTimeout(function (){
   var effetTop = new Fx.Style(el, 'top', {duration : 500,transition: Fx.Transitions.Elastic.easeOut}) ;
   var position_actuelle = el.getStyle('top');
   //NB : document.documentElement.scrollTop est un variable javascript de base, c'est pas du Mootools
   //NB2 : C'est start(valeur depart, valeur arrive) et non plus custom() comme dans la version 0.83 de Mootools   Math.max(document.body.scrollTop document.documentElement.scrollTop+window.getScrollTop()+position_actuelle
   effetTop.start(position_actuelle,Math.max(document.body.scrollTop,window.getScrollTop()));
   }
   ,500);
}