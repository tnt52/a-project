<? require("../helpers/global_helper.php");require("../helpers/types_helper.php");
define("hostDB","127.0.0.1:3306");
define("userDB","root");
define ("pswDB","");
define ("DBase","psparty2");
function conDB(){
    $connection=mysql_connect(hostDB,userDB, pswDB) or die("Unable to connect!");
    /*echo "connection:".$connection."\n";echo "DB:".*/
    mysql_select_db(DBase);
    return $connection;
}

$connection=conDB();
// TINY INT pour BOOLEAN!!
//DEFAULT CHARACTER SET latin1 COLLATE latin1_bin  ENGINE = MYISAM;
$queryString="CREATE TABLE `".TableDoLists."` (
`cle` INT NOT NULL,
`sonore` TINYINT DEFAULT 0,
`visuel` TINYINT DEFAULT 0,
`anime` TINYINT DEFAULT 0,
`ecrit` TINYINT DEFAULT 0,
`anibar` TINYINT DEFAULT 0,
`anires` TINYINT DEFAULT 0,
`animar` TINYINT DEFAULT 0,
`aninoe` TINYINT DEFAULT 0,
`anifet` TINYINT DEFAULT 0,
`cdeson` TINYINT DEFAULT 0,
`trfhrani` INT DEFAULT 0,
`trfftani` INT DEFAULT 0,
`trfcdeson` INT DEFAULT 0,
`cdeimg` TINYINT DEFAULT 0,
`expo` TINYINT DEFAULT 0,
`trfcdeimg` INT DEFAULT 0,
`trfhrimg` INT DEFAULT 0,
`trfftimg` INT DEFAULT 0,
`cdevdo` TINYINT DEFAULT 0,
`proj` TINYINT DEFAULT 0,
`trfcdevdo` INT DEFAULT 0,
`trfhrvdo` INT DEFAULT 0,
`trfftvdo` INT DEFAULT 0,
`cdetxt` TINYINT DEFAULT 0,
`lect` TINYINT DEFAULT 0,
`trfcdetxt` INT DEFAULT 0,
`trfhrtxt` INT DEFAULT 0,
`trffttxt` INT DEFAULT 0,
`atel` TINYINT DEFAULT 0,
`trfhratel` INT DEFAULT 0,
`trfftatel` INT DEFAULT 0,
`cour` TINYINT DEFAULT 0,
`intitcour` VARCHAR(50),
`formlcour` TEXT,
`depscour` VARCHAR(30),
`periodecour` INT,
`autresacts` TEXT DEFAULT NULL,
`typeautreacts` INT DEFAULT NULL,
`mobilite` VARCHAR(100),
`horsfr` TINYINT DEFAULT 0,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
`compteur` INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( `cle` ) ,
INDEX (`depscour`,`mobilite`,`compteur`) )
;";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableAuthentif."` (
`pseudo` VARCHAR (20) NOT NULL,
`cle` INT NOT NULL AUTO_INCREMENT,
`psw` VARCHAR (20) NOT NULL ,
`profil` INT NOT NULL,
`dateinscription` TIMESTAMP DEFAULT 00000000000000,
PRIMARY KEY (`cle`),
INDEX (`pseudo`,`psw` ,`profil`))
;";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur auth connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableAdministration."` (
`cle` VARCHAR(24) NOT NULL ,
`valeur` INT NOT NULL ,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`compteur` INT NOT NULL AUTO_INCREMENT,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ),
INDEX (`compteur` ) )";
echo"Query : ".$queryString."\n";
//echo "Test".mysql_query($queryString);
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

function initIndic($nom){
$queryString="INSERT INTO `".TableAdministration."` (cle,valeur,datecrea) VALUES (
'$nom',0,now())";
echo"Query : ".$queryString."\n";
//echo "Test".mysql_query($queryString);
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
}
initIndic("NQtot");// indicateurs globaaux
initIndic("Navis");
initIndic("Noeuvres");
initIndic("Ndates");
initIndic("Nmembres");
initIndic("Nartistes");

$queryString="CREATE TABLE `".TableRepQue."` (
`cle` INT NOT NULL AUTO_INCREMENT,
`keymembre` INT NOT NULL ,
`keyquestion` INT NOT NULL ,
`groupe` INT DEFAULT NULL,
`rang` INT DEFAULT NULL,
`type`TINYINT NOT NULL DEFAULT 0,
`keytribu` TINYINT NOT NULL DEFAULT -1,
`importance` TINYINT NOT NULL,
`reponse` TINYINT NOT NULL,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ),
INDEX (`keymembre` ,`keyquestion`) )";
//echo"Query : ".$queryString."\n";
//echo "Test".mysql_query($queryString);
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableRepOeu."` (
`cle` INT NOT NULL AUTO_INCREMENT,
`keymembre` INT NOT NULL ,
`keyquestion` INT NOT NULL ,
`groupe` INT DEFAULT NULL,
`rang` INT DEFAULT NULL,
`type`TINYINT NOT NULL DEFAULT 0,
`keytribu` TINYINT NOT NULL DEFAULT -1,
`importance` TINYINT NOT NULL,
`reponse` TINYINT NOT NULL,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ),
INDEX (`keymembre` ,`keyquestion`) )";
echo"Query : ".$queryString."\n";
//echo "Test".mysql_query($queryString);
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableMembres."` (
`actif` TINYINT DEFAULT 1,
`cle` INT NOT NULL,
`type` TINYINT UNSIGNED NOT NULL DEFAULT ".TMmem.",
`voix` INT NOT NULL DEFAULT 0,
`pseudo` VARCHAR (20) NOT NULL,
`sexe` TINYINT DEFAULT 0,
`avatar` VARCHAR (30) NOT NULL,
`tel` VARCHAR(35),
`mailpri` VARCHAR(50),
`mailpub` VARCHAR(50),
`autrecont` VARCHAR(50),
`link` VARCHAR(50),
`texte` TEXT,
`cp` INTEGER,
`visucp` TINYINT DEFAULT 0,
`visutel` TINYINT DEFAULT 0,
`visumail` TINYINT DEFAULT 0,
`visuautre` TINYINT DEFAULT 0,
`cpitinit` TINYINT DEFAULT 0,
`ongqinit` TINYINT DEFAULT 0,
`ongminit` TINYINT DEFAULT 0,
`cntrlminit` TINYINT DEFAULT 0,
`cntrlqinit` TINYINT DEFAULT 0,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`datelastaction` TIMESTAMP DEFAULT 00000000000000,
`nblienstot` INT NOT NULL  DEFAULT 0,
`nbmemlies` INT NOT NULL  DEFAULT 0,
`nbreptot` INT NOT NULL  DEFAULT 0,
`nbrepoeutot` INT NOT NULL  DEFAULT 0,
`nbrepson` INT NOT NULL  DEFAULT 0,
`nbrepvdo` INT NOT NULL  DEFAULT 0,
`nbreptxt` INT NOT NULL  DEFAULT 0,
`nbrepimg` INT NOT NULL  DEFAULT 0,
`nbrepthe1` INT NOT NULL  DEFAULT 0,
`nbrepthe2` INT NOT NULL  DEFAULT 0,
`nbrepthe3` INT NOT NULL  DEFAULT 0,
`nbrepthe4` INT NOT NULL  DEFAULT 0,
`nbrepthe5` INT NOT NULL  DEFAULT 0,
`nbreptri1` INT NOT NULL  DEFAULT 0,
`nbreptri2` INT NOT NULL  DEFAULT 0,
`nbreptri3` INT NOT NULL  DEFAULT 0,
`nbreptri4` INT NOT NULL  DEFAULT 0,
`nbreptri5` INT NOT NULL  DEFAULT 0,
`nbrepinteret` INT NOT NULL  DEFAULT 0,
`nbrepquetot` INT NOT NULL  DEFAULT 0,
`nbrepqgout` INT NOT NULL  DEFAULT 0,
`nbrepqonat` INT NOT NULL  DEFAULT 0,
`nbqtot` INT NOT NULL  DEFAULT 0,
`nbqgout` INT NOT NULL  DEFAULT 0,
`nbqonat` INT NOT NULL  DEFAULT 0,
`compteur` INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( `cle` ) ,
INDEX ( `compteur`))
;";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableArtistes."` (
`actif` TINYINT DEFAULT 1,
`cle` INT NOT NULL,
`type` TINYINT UNSIGNED NOT NULL DEFAULT ".TMart.",
`voix` INT NOT NULL DEFAULT 0,
`pseudo` VARCHAR (20) NOT NULL,
`sexe` TINYINT DEFAULT 0,
`avatar` VARCHAR (30) NOT NULL,
`tel` VARCHAR(35),
`mailpri` VARCHAR(50),
`mailpub` VARCHAR(50),
`mailart` VARCHAR(50),
`autrecont` VARCHAR(50),
`link` VARCHAR(50),
`texte` TEXT,
`textearti` TEXT,
`cp` INTEGER,
`visucp` TINYINT DEFAULT 0,
`nom` VARCHAR (35) NOT NULL,
`imageart` VARCHAR (50),
`typesart` VARCHAR(30),
`autretype` VARCHAR(25),
`visutel` TINYINT DEFAULT 0,
`visumail` TINYINT DEFAULT 0,
`visuautre` TINYINT DEFAULT 0,
`visuptel` TINYINT DEFAULT 0,
`visupmail` TINYINT DEFAULT 0,
`visupautre` TINYINT DEFAULT 0,
`cpitinit` TINYINT DEFAULT 0,
`ongqinit` TINYINT DEFAULT 0,
`ongminit` TINYINT DEFAULT 0,
`cntrlminit` TINYINT DEFAULT 0,
`cntrlqinit` TINYINT DEFAULT 0,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`datelastaction` TIMESTAMP DEFAULT 00000000000000,
`nbreptot` INT NOT NULL  DEFAULT 0,
`nbrepoeutot` INT NOT NULL  DEFAULT 0,
`nbrepson` INT NOT NULL  DEFAULT 0,
`nbrepvdo` INT NOT NULL  DEFAULT 0,
`nbreptxt` INT NOT NULL  DEFAULT 0,
`nbrepimg` INT NOT NULL  DEFAULT 0,
`nbrepthe1` INT NOT NULL  DEFAULT 0,
`nbrepthe2` INT NOT NULL  DEFAULT 0,
`nbrepthe3` INT NOT NULL  DEFAULT 0,
`nbrepthe4` INT NOT NULL  DEFAULT 0,
`nbrepthe5` INT NOT NULL  DEFAULT 0,
`nbreptri1` INT NOT NULL  DEFAULT 0,
`nbreptri2` INT NOT NULL  DEFAULT 0,
`nbreptri3` INT NOT NULL  DEFAULT 0,
`nbreptri4` INT NOT NULL  DEFAULT 0,
`nbreptri5` INT NOT NULL  DEFAULT 0,
`nbrepinteret` INT NOT NULL  DEFAULT 0,
`nbrepquetot` INT NOT NULL  DEFAULT 0,
`nbrepqgout` INT NOT NULL  DEFAULT 0,
`nbrepqonat` INT NOT NULL  DEFAULT 0,
`nbqtot` INT NOT NULL  DEFAULT 0,
`nbqgout` INT NOT NULL  DEFAULT 0,
`nbqonat` INT NOT NULL  DEFAULT 0,
`nboeutot` INT NOT NULL  DEFAULT 0,
`nbtxt` INT NOT NULL  DEFAULT 0,
`nbson` INT NOT NULL  DEFAULT 0,
`nbimg` INT NOT NULL  DEFAULT 0,
`nbvdo` INT NOT NULL  DEFAULT 0,
`nbeve` INT NOT NULL  DEFAULT 0,
`contrat` VARCHAR(50),
`debcontrat`  DATE,
`fincontrat`  DATE,
`compteur` INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( `cle` ) ,
INDEX (`compteur`) )
;";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur artis connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableQuestions."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keygroup` INT,
`type` TINYINT UNSIGNED NOT NULL,
`keymembre` INT NOT NULL,
`poidsaff` TINYINT NOT NULL DEFAULT 1,
`typerep` TINYINT NOT NULL ,
`portee` INT NOT NULL DEFAULT 0,
`adhesion` INT NOT NULL DEFAULT 0,
`nbrerep` INT NOT NULL DEFAULT 0,
`keytheme` INT NOT NULL DEFAULT -1,
`libelle` VARCHAR (100),
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`datefin` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX (`keymembre`,`type`) );";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur quest connexion MySQL: ' . mysql_error());

$queryString="CREATE TABLE `".TableOeuvres."` (
`cle` INT NOT NULL AUTO_INCREMENT,
`keygroup` INT,
`type` TINYINT UNSIGNED NOT NULL,
`keymembre` INT NOT NULL,
`typerep` TINYINT NOT NULL DEFAULT ".TRgout.",
`nbrerep` INT NOT NULL DEFAULT 0,
`portee` INT,
`adhesion` INT,
`keygenre` INT DEFAULT -1,
`image` VARCHAR(50),
`fichier` VARCHAR (50),
`titre` VARCHAR (35),
`dimensions` VARCHAR (25),
`dateoeuvre` DATE,
`par` TEXT,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`datefin` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `type`,`keymembre` ) )
;";
echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur oeuvre connexion MySQL: ' . mysql_error());
// ANALYSER AFFMAXPOT
$queryString="CREATE TABLE `".TableAffinites."` (
`cle` INT NOT NULL AUTO_INCREMENT,
`keysujet` INT NOT NULL ,
`keyobjet` INT NOT NULL ,
`affglobal` INT NOT NULL,
`liens` INT NOT NULL,
`affpotmax` INT NOT NULL,
`affarti` INT NOT NULL,
`liensarti` INT NOT NULL,
`affgout` INT NOT NULL,
`liensgout` INT NOT NULL,
`affavis` INT NOT NULL,
`liensavis` INT NOT NULL,
`affinteret` INT NOT NULL,
`liensinteret` INT NOT NULL,
`affquestions` INT NOT NULL,
`liensquestions` INT NOT NULL,
`affoeuvres` INT NOT NULL,
`liensoeuvres` INT NOT NULL,
`affson` INT NOT NULL,
`liensson` INT NOT NULL,
`affimg` INT NOT NULL,
`liensimg` INT NOT NULL,
`affvdo` INT NOT NULL,
`liensvdo` INT NOT NULL,
`afftxt` INT NOT NULL,
`lienstxt` INT NOT NULL,
`adhson` INT NOT NULL,
`viseson` INT NOT NULL,
`adhimg` INT NOT NULL,
`viseimg` INT NOT NULL,
`adhvdo` INT NOT NULL,
`visevdo` INT NOT NULL,
`adhtxt` INT NOT NULL,
`visetxt` INT NOT NULL,
`affdat` INT NOT NULL,
`liensdat` INT NOT NULL,
`afftheme1` INT NOT NULL,
`lienstheme1` INT NOT NULL,
`afftheme2` INT NOT NULL,
`lienstheme2` INT NOT NULL,
`afftheme3` INT NOT NULL,
`lienstheme3` INT NOT NULL,
`afftheme4` INT NOT NULL,
`lienstheme4` INT NOT NULL,
`afftheme5` INT NOT NULL,
`lienstheme5` INT NOT NULL,
`afftribu1` INT NOT NULL,
`lienstribu1` INT NOT NULL,
`afftribu2` INT NOT NULL,
`lienstribu2` INT NOT NULL,
`afftribu3` INT NOT NULL,
`lienstribu3` INT NOT NULL,
`afftribu4` INT NOT NULL,
`lienstribu4` INT NOT NULL,
`afftribu5` INT NOT NULL,
`lienstribu5` INT NOT NULL,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keysujet`,`keyobjet`,`cle` ) )
;";
//echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
// CLOSE
mysql_close($connection);

/*$queryString="CREATE TABLE `".TableAvis."` (
`cle` VARCHAR(24) NOT NULL ,
`keymembre` INT NOT NULL ,
`keyquestion` INT NOT NULL ,
`groupe` INT DEFAULT NULL,
`rang` INT DEFAULT NULL,
`type` TINYINT NOT NULL DEFAULT 1,
`keytribu` TINYINT NOT NULL DEFAULT -1,
`importance` TINYINT NOT NULL,
`reponse` TINYINT NOT NULL ,
`interet` TINYINT NOT NULL ,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`compteur` INT NOT NULL AUTO_INCREMENT ,
`actif` TINYINT DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keymembre` , `keyquestion`,`compteur` ) ) 
;
";*/
//echo"Query : ".$queryString."\n";
//$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

//echo"Query : ".$queryString."\n";
//$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());

/* $queryString="CREATE TABLE `".TableSessions."` (
`keymembre` INT NOT NULL,
`navsess` VARCHAR(50) ,
`appsess` VARCHAR(50),
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datelastaction` TIMESTAMP DEFAULT 00000000000000,
`compteur` INT NOT NULL AUTO_INCREMENT ,
PRIMARY KEY ( `keymembre` ),
INDEX ( `navsess` ,`appsess`,`compteur`))
;
";
//echo"Query : ".$queryString."\n";
$result=@mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());*/
?>