<?php
// DB SQL //
define("MajDate","now()");

define ("TableRepQue","repquestio");
define ("TableRepOeu","repoeuvres");
define ("TableAvis","avis");
define ("TableQuestions","questions");
define ("TableMembres","membres");
define ("TableMembresSuivis","memsuiv");
define ("TableAffinites","affinites");
define ("TableTribus","tribus");
define ("TableThemes","themes");
define ("TableGrQuestions","groupquestions");
define ("TableOeuvres","oeuvres");
define ("TableGrOeuvres","groupoeuvres");
define ("TablePar","listpar");
define ("TableArtistes","artistes");
define ("TableDoLists","artdolists");
define ("TableGrArtistes","groupartistes");
define ("TablePartenaires","partenaires");
define ("TableAdministration","administration");
define ("TableAuthentif","authentification");

define ("images_url","images/");

//REPONSES//

define ("Val_BigS",-3);
define ("Val_LittleS",-1);
define ("ValNoF",0);
define ("ValLittleS",1);
define ("ValBigS",3);

define ("ValBigKO",-3);
define ("ValLittleKO",-1);
define ("ValOKKO",0);
define ("ValLittleOK",1);
define ("ValBigOK",3);
define ("ValOK",2);
define ("ValKO",-2);

//CHOIX//
define ("ALL",0);
define ("SSavis",1);
define ("AVavis",2);

//LIMITES//
define("limitQO",20);
define("limitM",20);

function DatefromDB($ts){
	 if ($ts=="") return "date inconnue";
         $date=explode(" ",(string)$ts);
         $d=explode("-",$date[0]);
         return $d[2]."/".$d[1]."/".$d[0];
}
?>