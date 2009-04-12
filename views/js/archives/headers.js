var cfeHead = new cfe.base();
cfeHead.setModuleOptions('select',{scrolling:true, scrollSteps: 5});
$('limitQO').addEvent('change',function (){NewLimQO(this)});
window.addEvent('domready', function(){
    init();
    cfeHead.init({scope:$('header') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
    var span=$('limitQO').getParent().getElements('span .jsOption');
//    document.write(span);
    span.change=function (){NewLimQO(this)};
});
var lastTriCat=null;
var img;
function triCat(el){
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
              if (lastTriCat!=null && lastTriCat.hasClass('A')) {
                 lastTriCat.removeClass('A');
              }
              img.addClass('A');
              lastTriCat=img;
         }
         triQO=el.getProperty('champ');
         if (img.hasClass('asc')) sensQO='ASC'; else sensQO='DESC';
         if (Msel==null) keyMsel=-1; else keyMsel=Msel.getProperty('cle');
         new Request.HTML({url: urlbase+'index.php/navigation/liste/'+cat+'/'+limitQO+'/'+pageQO+'/'+triQO+'/'+sensQO+'/'+keyMsel,update: $('liste'),method: 'get', evalScripts: true}).send();
}
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
function searchCat(e){
         new Request.HTML({
         url: urlbase+'index.php/navigation/search_liste/'+cat+'/'+limitQO+'/'+pageQO+'/'+triQO+'/'+sensQO,
         update: $('liste'),
         onComplete: function () {endSearchCat();}}).post($('LookCat'));
         StopEvent(e);
}
function endSearchCat(){

}

function init(){
         if (Msel==null) $$('.repMselCol').setStyle('opacity',0);
}
function NewLimQO(sel){
         document.write("test");
         limitQO=$('limitQO').getPrevious;
         liste_page(<?=$page?>);
}