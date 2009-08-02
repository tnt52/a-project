/* NAVIGATION */
function getIdMA(){
         new Request.HTML({
                url: urlbase+'index.php/navigation/idMA',
                update: $('idMA'),
                onComplete: function () {}
         }).send();
}
function switchCat(cat){
         this.cat=cat;
         this.pageQO=1;
         this.champtriCAT="";
         this.sensQO="";
         $('tobesrchcat').value="";
         $('srchtblcat').value="";
         GetHeader(cat);
         liste_page(1);
         GetPlayer(cat);
}
function clickNav(el){
         $(el).setStyles(
         {
         "color":"#FF0000",
         "font-weight":"normal"
         });
}
function pressNav(el){
         $(el).setStyles(
         {
         "color":"#FF0000",
         "font-weight":"bold"
         });
}
function hoverNav(el){
         $(el).setStyle("color","#FF0000");
}
function outNav(el){
         if (this.cat==el.cat) c="#FF0000";
         else c="#FFFFFF";
         $(el).setStyles(
         {
         "color":c,
         "font-weight":"normal"
         });
}
function liste_page(page){
         GetCatPages(page);
         GetListe(cat);
}
function GetListe(cat){
         closeVisuMS();
         new Request.HTML({
                url: urlbase+'index.php/navigation/search/'+cat+'/'+limitQO+'/'+pageQO+'/'+champtriCAT+'/'+sensQO,
                update: $('liste'),
                onComplete: function () {majfromM(Msel);}
         }).post($('LookCat'));
}
function GetHeader(cat){
         new Request.HTML({
             url: urlbase+'index.php/navigation/header/'+cat+'/'+limitQO+'/'+pageQO+"/"+champtriCAT+"/"+sensQO,
             update: $('HeadCat'),
             method: 'get',
             onComplete: function () {majfromM(Msel);},
             evalScripts: true
         }).send();
}
function GetCatPages(page){
         pageQO=page;
         new Request.HTML({
              url: urlbase+'index.php/navigation/pages/'+cat+'/'+limitQO+'/'+pageQO+'/',
              update: $('PagesCat'),
              onComplete: function () {}
         }).post($('LookCat'));
     //    new Request.HTML({url: urlbase+'index.php/navigation/pages/'+cat+'/'+limitQO+'/'+pageQO,update: $('PagesCat'),method: 'get', evalScripts: true}).send();
}
function GetPlayer(cat){
         new Request.HTML({
             url: urlbase+'index.php/navigation/player/'+cat,
             update: $('VQcadre'),
             method: 'get',
             evalScripts: true
         }).send();
}
function GetHeadM(){
         new Request.HTML({
             url: urlbase+'index.php/navigation/header/'+TM+'/'+limitM+'/'+pageM+"/"+champtriM+"/"+sensM,
             update: $('HeadLM'),
             method: 'get',
             evalScripts: true
         }).send();
}
function keyupSearch(){
	this.getParent('form').onsubmit();
}
function searchCat(form,e){
         //document.write("test"+form);
         closeVisuMS();
         $('tobesrchcat').value=$('searchtextcat').value;
	 $('srchtblcat').value=$('searchtablescat').value;
         /*chkbxs=$(form).getElements("input[type=checkbox]");         
         for(i=chkbxs.length-1;i>-1;i--){
             if (chkbxs[i].checked==true) $('srchtblcat').value+=","+chkbxs[i].value;
         }*/
         new Request.HTML({
         url: urlbase+'index.php/navigation/search/'+cat+'/'+limitQO+'/'+pageQO+'/'+champtriCAT+'/'+sensQO,
         update: $('liste'),
         onComplete: function () {}
         }).post($('LookCat'));
         GetCatPages(1);
         StopEvent(e);
}

function searchM(form,e){
	if ($('searchtextm').value==libdefSM) $('tobesrchm').value="";
	else $('tobesrchm').value=$('searchtextm').value;
	$('srchtblm').value=$('searchtablesm').value;	
	GetMembres();
	StopEvent(e);
}
function SelTA(){
	$('varsm').value=$('typeaff').options[$('typeaff').options.selectedIndex].value;
	GetMembres();
}
function GetMembres(){
	pageM=1;
	$('ResultsM').getFirst().set('html',"");
	$('ResultsM').getLast().set('html',"");
	i=1;
	while($('membres'+i)!=null){
	     $('membres'+i).set('html',"");
	     i++;
	     
	}
	GetAllMembres();
}
function GetAllMembres(){
	if ($('membres'+pageM)==null) new Element('div',{id:'membres'+pageM}).inject($('membres'+(pageM-1)),"after");
	new Request.HTML({
             url: urlbase+'index.php/navigation/search/'+TM+'/'+limitM+'/'+pageM+'/'+champtriM+'/'+sensM,
             update: $('membres'+pageM),
             method: 'get',
	     onComplete:function(){
		     //document.write(pageM);
		     n=parseInt($('Mnumrows'+pageM).value);		     
		     DivN=$('ResultsM').getFirst();
		     if (DivN.get('html')=="") m=0;
		     else m=parseInt(DivN.get('html'));
		     DivN.set('html', m+n);
		     if (m+n>1) $('ResultsM').getLast().set('html',lib_lignes);
		     else $('ResultsM').getLast().set('html',lib_ligne);
		     if (n<limitM){
			     i=pageM+1;
			     while($('membres'+i)!=null){
				     $('membres'+i).set('html',"");
				     i++;
			     }
			     return;
		     }
		     pageM++;
		     GetAllMembres();
	     },
             evalScripts: true
         }).post($('LookM'));	 
}
var lastTriCat=null;
var img;
function tri(el,divupdate,categ,limit,page,lastTri){
	el=$(el);
	img=el.getChildren()[0];
	img.addClass('C');
	if (img.hasClass('A')) {
		if (img.hasClass('asc')){
			img.removeClass('asc');
			img.addClass('desc');
		}
		else if (img.hasClass('desc')){
			img.removeClass('desc');
			img.addClass('asc');
		}
	}
	else {
		if (lastTri!=null && lastTri.hasClass('A')) {
		 lastTri.removeClass('A');
	}
	img.addClass('A');
	lastTri=img;
	}
	champtri=el.getProperty('champ');
	if (img.hasClass('asc')) sens='ASC'; else sens='DESC';
	if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
	$('varscat').value=keyMsel;
	//GetAllMembres();
	new Request.HTML({
		url: urlbase+'index.php/navigation/search/'+categ+'/'+limit+'/'+page+'/'+champtri+'/'+sens,
		update: divupdate,
		method: 'get',
		evalScripts: true
	}).send();
}
var lastTriM=null;
function triM(el){
	categ=TM;
	limit=limitM;page=pageM;
	el=$(el);
	img=el.getChildren()[0];
	img.addClass('C');
	if (img.hasClass('A')) {
		if (img.hasClass('asc')){
			img.removeClass('asc');
			img.addClass('desc');
		}
		else if (img.hasClass('desc')){
			img.removeClass('desc');
			img.addClass('asc');
		}
	}
	else {
		if (lastTriM!=null && lastTriM.hasClass('A')) {
		 lastTriM.removeClass('A');
	}
	img.addClass('A');
	lastTriM=img;
	}
	champtriM=el.getProperty('champ');
	if (img.hasClass('asc')) sensM='ASC'; else sensM='DESC';
	//if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
	GetMembres();
	/*new Request.HTML({
		url: urlbase+'index.php/navigation/search/'+categ+'/'+limit+'/'+page+'/'+champtri+'/'+sens+'/'+keyMsel,
		update: divupdate,
		method: 'get',
		evalScripts: true
	}).send();
	/*tri(el,$('membres'),TM,limitM,pageM,this.lastTriM);*/
}
function triCat(el){
	tri(el,$('liste'),cat,limitQO,pageQO,lastTriCat);
        /* el=$(el);
         img=el.getChildren()[0];
         img.addClass('C');
         if (img.hasClass('A')) {
            if (img.hasClass('asc')){
               img.removeClass('asc');
               img.addClass('desc');
            }
            else if (img.hasClass('desc')){
               img.removeClass('desc');
               img.addClass('asc');
            }
         }
         else {
              if (lastTriCat!=null && lastTriCat.hasClass('A')) {
                 lastTriCat.removeClass('A');
              }
              img.addClass('A');
              lastTriCat=img;
         }
         triQO=el.getProperty('champ');
         if (img.hasClass('asc')) sensQO='ASC'; else sensQO='DESC';
         if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
         new Request.HTML({
             url: urlbase+'index.php/navigation/search/'+cat+'/'+limitQO+'/'+pageQO+'/'+triQO+'/'+sensQO+'/'+keyMsel,
             update: $('liste'),
             method: 'get',
             evalScripts: true
         }).send();*/
}
function showAffinites(){
         new Request.HTML({
             url: urlbase+'index.php/navigation/affinites',
             update: $('visuaff'),
             method: 'get',
             evalScripts: true
         }).send();
         this.repMsel=false;
	 DIVdevant($('visuaff'));
}
/* MAJ PR */
function majPR(Qsel){
         var NewQ=$('NewQ');
         var spanR;
         var PR=$('PanelRep');
         var cle="";
         if (Qsel!=null){
            var cle=$('keyQpoR').value=Qsel.getProperty('cle');
            $('keyMQpoR').value=Qsel.getProperty('keyM');
            var cat=$('typeQpoR').value=Qsel.getProperty('cat');
            var LibNQ="";
            if (cle=="" || cle==null) LibNQ=$('LibNewQ').value;
            libelleQ=$('LibelleQ');
            libQavis=$('LibQavis');
            libQgout=$('LibQgout');
            PRgout=$('panelgout');
            PRavis=$('panelavis');
            switchDiv(PR,NewQ);
            switch(parseInt(cat)){
                case TQavis:
                     libelleQ.set('html',LibNQ==""? $(cle+"libelle"+Qsel.getProperty('liste')).innerHTML : LibNQ);
                     libQavis.setStyle('display','block');
                     libQgout.setStyle('display','none');
                     PRavis.setStyle('display','block');
                     PRgout.setStyle('display','none');
                     break;
                default:
                     libelleQ.set('html',LibNQ==""? $(cle+"titre"+Qsel.getProperty('liste')).innerHTML + "?": LibNQ + "?");
                     libQavis.setStyle('display','none');
                     libQgout.setStyle('display','block');
                     PRavis.setStyle('display','none');
                     PRgout.setStyle('display','block');
                     switch (Qsel.getProperty('repM')){
                            case $('BigS').value:$('BigS').retrieve('cfe').clicked();spanR=$('BigS').getParent();break;
                            case $('LittleS').value:$('LittleS').retrieve('cfe').clicked();spanR=$('LittleS').getParent();break;
                            case $('NoF').value:$('NoF').retrieve('cfe').clicked();spanR=$('NoF').getParent();break;
                            case $('_LittleS').value:$('_LittleS').retrieve('cfe').clicked();spanR=$('_LittleS').getParent();break;
                            case $('_BigS').value:$('_BigS').retrieve('cfe').clicked();spanR=$('_BigS').getParent();break;
                            default:$('NoGout').retrieve('cfe').clicked();spanR=null;break;
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
/* HEADER JS */
function hoverTri(el){
         el=$(el);
         el.getChildren()[0].addClass('H');
}
function unhoverTri(el){
         el=$(el);
         img=el.getChildren()[0];
         if (img.hasClass('C')) img.removeClass('C');
         img.removeClass('H');
}
var cfeHeadM = new cfe.base();
var cfeHead = new cfe.base();
//cfeHeadM.setModuleOptions('text',{onBlur: document.write("test")});
/*cfeHeadM.setModuleOptions('select',{defaultSelect: 1, scrolling:true, scrollSteps: 7});
cfeHead.setModuleOptions('select',{defaultSelect: defsel, scrolling:true, scrollSteps: 3});*/

var defsel=1;
switch (limitQO){
       case 20: defsel=1;break;
       case 50: defsel=2;break;
       case 100: defsel=3;break;
}
function NewLimQO(){
         limitQO=$('limitQO').options[$('limitQO').options.selectedIndex].text;
         liste_page(1);
}


/* Visu navigation */
function closeVisuMS(){
         if (MainSel!=null && MainSel.getProperty("sel")=="true") showMore(MainSel);
         MainSel=null;
         if (SubSel!=null && SubSel.getProperty("sel")=="true") showMore(SubSel);
         SubSel=null;
}
function closeVisuS(){
         if (SubSel!=null && SubSel.getProperty("sel")=="true") showMore(SubSel);
         SubSel=null;
}
function next(Sel){
         var nxt=Sel.getNext('.listitem');
         nxt==null? showMore(Sel):More(nxt);
}
function prev(Sel){
         var prv=Sel.getPrevious('.listitem');
         prv==null? showMore(Sel):More(prv);
}
function nextM(Sel){
         var nxt=Sel.getNext('.listitem');
         nxt==null? showID(Sel):showID(nxt);
}
function prevM(Sel){
         var prv=Sel.getPrevious('.listitem');
         prv==null? showID(Sel):showID(prv);
}

function hover(el){
         $(el).addClass('H');
}
function unhover(el){
         el=$(el);
         el.removeClass('H');
         el.removeClass('C');
}

/* Positionning */
function repositionner(el) {
         setTimeout(function (){
         var effetTop = new Fx.Tween(el, {duration : 500,transition: Fx.Transitions.Elastic.easeOut}) ;
         var position_actuelle = el.getStyle('top');
         //NB : document.documentElement.scrollTop est un variable javascript de base, c'est pas du Mootools
         //NB2 : C'est start(valeur depart, valeur arrive) et non plus custom() comme dans la version 0.83 de Mootools   Math.max(document.body.scrollTop document.documentElement.scrollTop+window.getScrollTop()+position_actuelle
         effetTop.start('top',position_actuelle,Math.max(document.body.scrollTop,window.getScrollTop()));
         }
         ,500);
}
function centrer(el,w,h){
         el.setStyle('top',el.getStyle('top')-h/2);
         el.setStyle('left',el.getStyle('left')-w/2);
}
/* INITIALISATION */
window.addEvent('domready', function() {
                            /*$('Artistes').addEvent('click',function() {GetListe($('Artistes').getProperty('cat'))});
                            $('Sons').addEvent('click',function() {void(window.location.reload()); GetListe($('Sons').getProperty('cat'))});*/
                            /*$('compte').makeDraggable();*/
                            //centrer($('VisuQ'),400,400);
                            majPR(null);
                            majNewQ();
                            liste_page(1);;                            
			    GetHeadM();
			    GetMembres();
                            getIdMA();
                          //  GetMembres();
                            MM_preloadImages(urlbase+'system/application/images/boutons/OKrol.gif');
});