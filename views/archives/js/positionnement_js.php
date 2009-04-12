<?header("Content-Type: text/javascript");require("../../helpers/dimensions_helper.php");?>
window.addEvent('domready', function() {
               window.addEvent('scroll',function () {repositionner($('cockpit'));});
               $('VQcontainer').makeDraggable({
                   handle: 'VQhandle'
                   });
               $('VQcontainer').makeResizable({handle: 'VQsizehand'});
               $('VQcadre').makeResizable({handle: 'VQsizehand',modifiers:{x: false, y:'height'}});
               $('VQcontainer').setStyles({
                left:<?=-wVQ/2?>,
                top:<?=hHaut?>
               });
});