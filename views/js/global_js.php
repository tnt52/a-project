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
function StopEvent(pE)
{
   if (!pE)
     if (window.event)
  pE = window.event;
     else
  return;
   if (pE.cancelBubble != null)
      pE.cancelBubble = true;
   if (pE.stopPropagation)
      pE.stopPropagation();
   if (pE.preventDefault)
      pE.preventDefault();
   if (window.event)
      pE.returnValue = false;
   if (pE.cancel != null)
      pE.cancel = true;
}
var urlbase='<?=base_url()?>';
