function GetListe(cat){
  new Ajax(urlbase+'index.php/navigation/liste/'+cat,{update: $('liste'),method: 'get', evalScripts: true}).request();
}

/*var menu=$$('MENU');  for(var i = 0; i <= menu.length; i++){
   menu[i].addEvent('click',GetListe(menu[i].cat));
  }*/

window.addEvent('load', function() {
  GetListe(cat);
  });

window.addEvent('domready', function() {
  /*$('Artistes').addEvent('click',function() {GetListe($('Artistes').getProperty('cat'))});
  $('Sons').addEvent('click',function() {void(window.location.reload()); GetListe($('Sons').getProperty('cat'))});*/

  /*$('compte').makeDraggable();*/
  window.addEvent('scroll',function () {repositionner($('compte'));});
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

