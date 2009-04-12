<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  var mores=$$("div#liste tr");
  mores.each(function(m){
      m.sel="false";
      m.maj="true";
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (){GetMore(m)});
  });
});
</script>
<!--<DIV id="VQcontainer" class="derriere">
       <DIV id="VQhandle">handle</DIV>
       <DIV id="VisuQ" >
         <?=$visuq?>
       </DIV>
       <DIV id="VQsizehand" >resize</DIV>
  </DIV>-->
  <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;" align="center">
  <? foreach($cols as $value):?>
  <COL WIDTH=<?=$value?>>
  <?endforeach;?>
  <COL WIDTH=<?=col_avis?>>
  <COL WIDTH=<?=col_avis?>>
  <COL WIDTH=<?=col_avis?>>
  <COL class="repMselCol" WIDTH=<?=col_avis?>>
  <?if ($result->num_rows() > 0):
  foreach ($result->result_array() as $indice=>$row): ?>
  <TR cle="<?=$row['cle']?>" cat="<?=$row['type']?>" keyM="<?=$row['keymembre']?>" repM="<?=$row['repMA']?>" >
    <? foreach($champs as $value):?>
    <TD nowrap>
        <DIV id="<?=$row['cle'].$value?>" CLASS="<?=$value?>"><?=htmlentities($row[$value])?></DIV>
    </TD>
    <? endforeach?>
    <TD><DIV id="<?=$row['cle']."portee"?>" CLASS="portee"><?=$row["portee"]?></DIV></TD>
    <TD><DIV id="<?=$row['cle']."adhesion"?>" CLASS="adhesion"><?=$row["adhesion"]?></DIV></TD>
    <TD >
        <DIV id="<?=$row['cle']."reponse"?>" CLASS="reponse"><?=$row['repMA']?></DIV>
    </TD>
    <TD><DIV id="<?=$row['cle']."repMsel"?>" class="repMsel" ><?=$row['repMsel']?></DIV>
        <DIV STYLE="Display:none" ID="<?=$row['cle']."more".$row['type']?>"></DIV>
        <INPUT ID="<?=$row['cle']."fichier"?>" TYPE="HIDDEN" VALUE="<?=isset($row['fichier'])? $row['fichier']:""?>">
    </TD>
  </TR>
  <? endforeach; endif?>
  </TABLE>