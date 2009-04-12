<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
    <META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=iso-8859-1">
    <TITLE></TITLE>

<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  this.repMsel=false;
  var mores=$$("div#liste tr");
  mores.each(function(m){
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (event){More(m);StopEvent(event);});
  });
});
</script>
</HEAD>
<BODY>
<TABLE WIDTH=100% BORDER=0 CELLPADDING=0 CELLSPACING=0 STYLE="page-break-before: always; page-break-inside: avoid;">
    <COL WIDTH=<?=col_nom?>>
    <COL WIDTH=<?=col_arts?>>
    <COL WIDTH=<?=col_count?>>
    <COL WIDTH=<?=col_count?>>
    <COL WIDTH=<?=col_count?>>
    <COL WIDTH=<?=col_count?>>
    <?php
    if ($result->num_rows() > 0):
           foreach ($result->result_array() as $row): ?>

    <TR VALIGN=TOP CLASS="listitem" cle="<?=$row['cle']?>" cat="<?=TMart?>" liste="LA" visu="0" type="<?=$row['type']?>" sel="false" maj="true">
        <TD>
            <DIV nowrap style="width:<?=col_nom?>px;overflow: hidden"><?=$row['nom']?></DIV>
            <DIV STYLE="Display:none" ID="<?=$row['cle']."moreLA".$row['type']?>"></DIV>
        </TD>
        <TD><DIV nowrap style="width:<?=col_arts?>px;overflow: hidden">
        <? $arts=simpleparseDBout($row['typesart']);
        echo htmlentities($arts[0]); for ($i=1;$i<count($arts);$i++) echo ", ".$arts[$i];?>
        </DIV></TD>
        <TD>
           <?=$row['nbimg']?>
        </TD>
        <TD>
           <?=$row['nbson']?>
        </TD>
        <TD>
           <?=$row['nbtxt']?>
        </TD>
        <TD>
           <?=$row['nbvdo']?>
        </TD>
    </TR>
    <? endforeach; endif?>
</TABLE>
</BODY>
<STYLE>

</STYLE>
</HTML>