<?foreach($result as $row):?>
<DIV id="<?=$row['type']?>header<?=$row['cle']?>">
     <DIV CLASS="Titre"><?=htmlentities($row['titre'])?></DIV>
           de
     <DIV CLASS="Nom"><?=htmlentities($row['nom'])?></DIV>
     <TABLE width="100%" border="0" cellpadding="0" cellspacing="0" style="page-break-before: always; page-break-inside: avoid; white-space: nowrap;">
     <TR>
     <TD width="48%" ALIGN="RIGHT"><DIV CLASS="DateO">réalisé le <?=$row['dateoeuvre']?></DIV></TD>
     <TD width="4%"></TD>
     <TD width="48%%" ALIGN="LEFT"><DIV CLASS="DateC">en ligne depuis le <?=$row['datecrea']?></DIV></TD>
     </TR></TABLE>
</DIV>
<DIV id="<?=$row['type']?>footer<?=$row['cle']?>">
     <DIV CLASS="Dim">durée: <?=$row['dimensions']?></DIV>
     <DIV CLASS="Par"><?$v=$this->Parseurs->parseSQLout($row['par']);
          foreach ($v as $value){
           if (count($value)>1)
           echo htmlentities($value[0]).":".htmlentities($value[1])."\n<br>";
          }?></DIV>
     <DIV CLASS="Descr">
     <?=$row['description']?>
     </DIV>
</DIV>
<?endforeach?>
</body>
</html>