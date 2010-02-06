<script type="text/javascript">
<?=$script?>
window.addEvent('domready', function() {
  this.repMsel=true;
  var mores=$$("div#liste<?=$page?> tr");
  mores.each(function(m){
      m.addEvent('mouseout',function (){unhoverQO(m)});
      m.addEvent('mouseover',function (){hoverQO(m)});
      m.addEvent('click',function (event){More(this);StopEvent(event);});
  });
});
</script>
<input type="hidden" id="Catnumrows<?=$page?>" value="<?=$numrows?>"/>
<?if ($result->num_rows() > 0):
  $l=($page-1)*limitQO;
  foreach ($result->result_array() as $indice=>$row): ?>
<DIV nowrap ALIGN="LEFT" STYLE="height:<?=hLListe?>px;overflow:hidden">
<TABLE class="wListe"  border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;" align="left">
  <? foreach($cols as $value):?>
  <COL WIDTH=<?=$value?>>
  <?endforeach;?>
  <COL WIDTH=<?=col_avis?>>
  <COL WIDTH=<?=col_avis?>>
  <COL WIDTH=<?=col_avis?>>
  <COL WIDTH=<?=col_avis?>>
  
  <TR CLASS="listitem" id="LO<?=$l?>" ligne="<?=$l?>" cle="<?=$row['cle']?>" liste="LO" cat="<?=$row['type']?>" visu="0" majpr="true" keyM="<?=$row['keymembre']?>" repM="<?=$row['repMA']?>" sel="false" maj="true">
    <? foreach($champs as $key=>$value):?>
    <TD nowrap <? if ($value!="sexe"):?>STYLE="padding:0px 5px 0px 0px;"<?endif;?>>
        <DIV id="<?=$row['cle'].$value.'LO'?>" CLASS="<?=$value?>" style="width:<?=$cols[$key]?>px;overflow: hidden"><?=htmlentities($row[$value])?>
	</DIV>
    </TD>
    <? endforeach;?>
    <TD><DIV id="<?=$row['cle']."portee"?>" CLASS="portee" style="width:<?=col_avis?>px;overflow: hidden"><?=$row["portee"]?></DIV></TD>
    <TD><DIV id="<?=$row['cle']."adhesion"?>" CLASS="adhesion" style="width:<?=col_avis?>px;overflow: hidden"><?=$row["adhesion"]?></DIV></TD>
    <TD >
        <DIV id="<?=$row['cle']."reponse"?>" CLASS="reponse" style="width:<?=col_avis?>px;overflow: hidden"><?=$row['repMA']?></DIV>
    </TD>
    <TD><DIV id="<?=$row['cle']."repMsel"?>" class="repMselCol" style="width:<?=col_avis?>px;overflow: hidden">test<?=$row['repMsel']?></DIV>
        <DIV STYLE="Display:none" ID="<?=$row['cle']."moreLO".$row['type']?>">
	</DIV>
        <INPUT ID="<?=$row['cle']."fichier"?>" TYPE="HIDDEN" VALUE="<?=isset($row['fichier'])? $row['fichier']:""?>">
	<INPUT ID="<?=$row['cle']."datecreation"?>" TYPE="HIDDEN" VALUE="<?=isset($row['datecreation'])? $row['datecreation']:""?>">
    </TD>
  </TR>
  </TABLE>
</DIV>
<? $l++; endforeach; endif;?>