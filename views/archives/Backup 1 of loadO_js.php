<?header("Content-Type: text/javascript");
foreach($result as $row):?>
$('titreVQ').setHTML("<?=$row['titre']?>");
$('nomVQ').setHTML("<?=$row['nom']?>");
var partxt="<?$v=$this->Parseurs->parseSQLout($row['par']);
           foreach ($v as $value){
            if (count($value)>1)
            echo htmlentities($value[0]).":".htmlentities($value[1])."<br>";
           }?>";
$('parVQ').setHTML(partxt);
$('descrVQ').setHTML("<?=$row['description']?>");
$('dimensionsVQ').setHTML("durée "+"<?=$row['dimensions']?>");
$('dateoVQ').setHTML("crée le "+"<?=$row['dateoeuvre']?>");
$('datecVQ').setHTML("mise en ligne le "+"<?=$row['datecrea']?>");
<? endforeach;?>