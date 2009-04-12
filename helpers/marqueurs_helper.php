<?
define ("MarqJavaDebut",'|');
define ("MarqJavaFin","\r");
define ("MarqJavaDebData",'<');
define ("MarqJavaFinData",'>');

define ("MarqSQLDebData",'¨');
define ("MarqSQLIntData",':');
define ("MarqSQLFinData",'^');

//define ("MarqPHPDebut",MarqJavaDebut);
//define ("MarqPHPFin",MarqJavaFin);

function checkForbidCar($string){
$mess=false;
if (strpos($string,MarqJavaDebut)||strpos($string,MarqJavaFin)||
strpos($string,MarqJavaDebData)||strpos($string,MarqJavaFinData)||
strpos($string,MarqSQLDebData)||strpos($string,MarqSQLInterData)||strpos($string,MarqSQLFinData)){
    $mess="Les caractères suivants ne peuvent être utilisés:\n";
    $mess.=MarqJavaDebut." ".MarqJavaFin." ".MarqJavaDebData." ".MarqJavaFinData.
    " ".MarqSQLDebData." ".MarqSQLInterData." ".MarqSQLFinData;
}
return $mess;
}
?>