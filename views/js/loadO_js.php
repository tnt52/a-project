<?header("Content-Type: text/javascript");
foreach($result as $row):?>
$('titreVQ').set('html',"<?=$row['titre']?>");
$('nomVQ').set('html',"<?=$row['nom']?>");
var partxt="<?$v=$this->Parseurs->parseSQLout($row['par']);
           foreach ($v as $value){
            if (count($value)>1)
            echo htmlentities($value[0]).":".htmlentities($value[1])."<br>";
           }?>";
$('parVQ').set('html',partxt);
$('descrVQ').set('html',"<?=$row['description']?>");
$('dimensionsVQ').set('html',"durée "+"<?=$row['dimensions']?>");
$('dateoVQ').set('html',"crée le "+"<?=$row['dateoeuvre']?>");
$('datecVQ').set('html',"mise en ligne le "+"<?=$row['datecrea']?>");
<? endforeach;?>