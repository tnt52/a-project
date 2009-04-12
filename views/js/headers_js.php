<?header("Content-Type: text/javascript");?>
function initHeadCat(){
         if (Msel==null || !repMsel) $$('.repMselCol').setStyle('opacity',0);
         el=$('head_<?=$tri?>');
         img=el.getChildren()[0];
         img.addClass('C');
         img.addClass('A');
         img.addClass('<?=strtolower($sens)?>');
         lastTriCat=img;
         triQO=el.getProperty('champ');
         sensQO='<?=$sens?>';
}
window.addEvent('domready', function(){
var s2 = new CustomSelect($('limitQO'), {
      theme : 'aqua',
      
      onSelect: function(el) {

      },
      onChange: function(el) {

      },
      onShow: function(el) {

      },
      onHide: function(el) {

      }
    });
    /*s1=$('limitQO').getPrevious(".jsSelectorCWrapper");
    s2=s1.getElement(".jsSelectorC");
    s2.addEvent('click',function (){NewLimQO()});*/
    initHeadCat();
    cfeHead.init({scope:$('header') ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
    GetCatPages(1);
});