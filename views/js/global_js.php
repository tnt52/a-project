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
var lib_ligne='<?=lang("lib_ligne")?>';
var lib_lignes='<?=lang("lib_lignes")?>';
var libdefSSon='<?=lang("lib_chercher")." ".lang("lib_unson")?>';
var libdefSM='<?=lang("lib_chercher")." ".lang("lib_unmembre")?>';
function focusDef(field,def){
    if (field.value==def) field.value='';
}
function blurDef(field,def){
    if (field.value=='') field.value=def;
}
