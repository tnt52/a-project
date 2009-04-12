<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
/*var s2 = new CustomSelect($('select_2'), {
      theme : 'simplifica',
      
      onSelect: function(el) {
        NewLimQO(this)
      },
      onChange: function(el) {
        $('onchange_2').set('text', el.get('text'))
      },
      onShow: function(el) {
        $('onshow_2').set('text', el.get('text'))
      },
      onHide: function(el) {
        $('onhide_2').set('text', el.get('text'))
      }
    });*/

var cfePage = new cfe.base();
//cfePage.registerModules([cfeSelect]);
cfePage.setModuleOptions('select',{scrolling:true, scrollSteps: 5});
//cfePage.addEvent('change',function (){NewLimQO(this)});
$('limitQO').addEvent('change',function (){NewLimQO(this)});
window.addEvent('domready', function(){
    cfePage.init({scope:$('pages') ,spacer: "<?=base_url()?>system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
    var span=$('limitQO').getParent().getElements('span .jsOption');
//    document.write(span);
    span.change=function (){NewLimQO(this)};
});

function NewLimQO(sel){
         document.write("test");
         limitQO=$('limitQO').getPrevious;
         liste_page(<?=$page?>);
}
</SCRIPT>
</head>
<body ="#FFFFFF">
<div id="pages">
<TABLE BORDER=0 width="100%" CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
<TR>
<TD COLSPAN=2></TD>
<TD ALIGN="center"><strong>Page</strong></TD>
<TD COLSPAN=2><label for="limitQO">résultats par page</label>
<select id="limitQO" name="limitQO" size="1" onselect="NewLimQO(this)">
<option >20</option>
<option>50</option>
<option>100</option>
</select>
</TD>
</TR>
<TR>
<TD ALIGN="RIGHT"><? if ($page>1):?><a href="javascript:liste_page(<?=$page-1?>)" target="_self">&lt;</a><?endif?></TD>
<TD ALIGN="RIGHT"><?for ($i=1; $i<$page; $i++) :?>
    <a href="javascript:liste_page(<?=$i?>)" target="_self"><?=$i?></a>
    <?endfor?>
</TD>
<TD ALIGN="CENTER"><strong><a href="javascript:liste_page(<?=$page?>)" target="_self"><?=$page?></a></strong>
</TD>
<TD ALIGN="LEFT"><?for ($i=$page+1; $i<$Ptot+1; $i++) :?>
    <a href="javascript:liste_page(<?=$i?>)" target="_self"><?=$i?></a>
    <?endfor?>
</TD>
<TD ALIGN="LEFT"><? if ($page<$Ptot):?><a href="javascript:liste_page(<?=$page+1?>)" target="_self">&gt;</a><?endif?></TD>
</div>
</body>
</html>