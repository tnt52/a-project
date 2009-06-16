<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
// TYPES //
define ("TM",100);
define ("TMart",101);// pas de doublon avec $typesart!!
define ("TMmem",102);
define ("TMpro",103);
define ("TMano",104);
define ("TO",200);
define ("TOson",201);
define ("TR",300);
define ("TRgou",301);
define ("TRint",302);
define ("TRona",303);
define ("TQ",400);
define ("TQtheme",410);
define ("TQtheme1",411);
define ("TQtheme2",412);
define ("TQtheme3",413);
define ("TQtheme4",414);
define ("TQtribu",450);
define ("TQtribu1",451);

// DB SQL //
define("MajDate","now()");

define ("TableRepQue","repquestio");
define ("TableRepOeu","repoeuvres");
define ("TableAvis","avis");
define ("TableQuestions","questions");
define ("TableMembres","membres");
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

//MARQUEURS//
define ("MarqJavaDebut",'|');
define ("MarqJavaFin","\r");
define ("MarqJavaDebData",'<');
define ("MarqJavaFinData",'>');

define ("MarqSQLDeb",'¨');
define ("MarqSQLInt",':');
define ("MarqSQLFin",'^');
?>