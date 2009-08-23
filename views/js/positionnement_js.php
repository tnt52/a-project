<?header("Content-Type: text/javascript");require("../../helpers/dimensions_helper.php");?>
window.addEvent('domready', function() {
               //window.addEvent('scroll',function () {repositionner($('cockpit'));});
               $('VQcontainer').makeDraggable({
                   handle: 'VQhandle'
                   });
               $('VQcontainer').makeResizable({handle: 'VQsizehand'});
               $('VQcadre').makeResizable({handle: 'VQsizehand',modifiers:{x: false, y:'height'}});
               $('VQcontainer').setStyles({
                left:<?=-wVQ?>,
                top:<?=hHaut?>
               });
                $('VAcontainer').makeDraggable({
                   handle: 'VAhandle'
                   });
               $('VAcontainer').makeResizable({handle: 'VAsizehand'});
               $('VAcadre').makeResizable({handle: 'VAsizehand',modifiers:{x: false, y:'height'}});
               $('VAcontainer').setStyles({
                left:<?=0?>,
                top:<?=hHaut?>
               });
               $('VMcontainer').makeDraggable({
                   handle: 'VMhandle'
                   });
               $('VMcontainer').makeResizable({handle: 'VMsizehand'});
               $('VMcadre').makeResizable({handle: 'VMsizehand',modifiers:{x: false, y:'height'}});
               $('VMcontainer').setStyles({
                left:<?=0?>,
                top:<?=hHaut?>
               });
});