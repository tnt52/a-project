<?header("Content-Type: text/javascript");?>
function initHeadCat(){
         if (Msel==null || !repMsel) $$('.repMselCol').setStyle('opacity',0);
         el=$('head_<?=$tri?>');
         img=el.getChildren()[0];
         img.addClass('C');
         img.addClass('A');
         img.addClass('<?=strtolower($sens)?>');
         lastTriCat=img;
         champtriCAT=el.getProperty('champ');
         sensQO='<?=$sens?>';
}
window.addEvent('domready', function(){
var s1 = new CustomSelect($('selavis'), {
      theme : 'lines',
      
      onSelect: function(el) {

      },
      onChange: function(el) {
	      //SelTA();
      },
      onShow: function(el) {

      },
      onHide: function(el) {

      }
    });
    initHeadCat();
    cfeHead.init({scope:$('header') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
    
    /*s1=$('limitQO').getPrevious(".jsSelectorCWrapper");
    s2=s1.getElement(".jsSelectorC");
    s2.addEvent('click',function (){NewLimQO()});*/
    /*GetCatPages(1);*/
});