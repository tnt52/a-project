<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
<SCRIPT>
var cfePage = new customFormElements(true);
cfePage.registerModules([cfeSelect]);
cfePage.setModuleOptions(cfeSelect,{scrolling:true, scrollSteps: 5});
window.addEvent('domready', function(){
    cfePage.init({scope:$('pages') ,spacer: "<?=base_url()?>system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});
});
</SCRIPT>
</head>
<body id="pages" bgcolor="#FFFFFF">
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
<TR>
<TD COLSPAN=2></TD>
<TD ALIGN="center"><strong>Page</strong></TD>
<TD COLSPAN=2><label for="sel-norm">résultats par page</label><select name="limitQO" size="1">
<option>20</option>
<option>50</option>
<option>100</option>
</select>
<input type="text" name="test" id="test" />
          <label for="test"></label>
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
</body>
</html>