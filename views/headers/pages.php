<?//=lang("lib_page")?>
        <? if ($page>1):?>
                <a href="javascript:liste_page(<?=$page-1?>)" target="_self">&lt;</a>
        <?endif?>
        <?for ($i=1; $i<$page; $i++) :?>
                <a style="font-size:8px;" href="javascript:liste_page(<?=$i?>)" target="_self"><?=$i?></a>
        <?endfor?>
                <strong><a style="font-size:8px;" href="javascript:liste_page(<?=$page?>)" target="_self"><?=$page?></a></strong>
        <?for ($i=$page+1; $i<$Ptot+1; $i++) :?>
                <a style="font-size:8px;" href="javascript:liste_page(<?=$i?>)" target="_self"><?=$i?></a>
        <?endfor?>
        <? if ($page<$Ptot):?>
                <a href="javascript:liste_page(<?=$page+1?>)" target="_self">&gt;</a>
        <?endif?>

<!--
<div>
<TABLE BORDER=0 width="50px" CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid">
    <TR>
    <TD COLSPAN=2></TD>
    <TD ALIGN="center"><strong>Page</strong></TD>
    <TD COLSPAN=2></TD>
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
    </TR>
    </TABLE>
</div>
<div id="ResultsCat"><?=//$Ntot." ".lang("lib_correspondances")?>
</div>-->