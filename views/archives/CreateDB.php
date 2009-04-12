<? require("../ConDB/global/globalDB.php");
$connection=mysql_connect(hostDB,userDB, pswDB) or die("Unable to connect!");
echo "connection:".$connection."\n";
$queryString="CREATE DATABASE `".DBase."` CHARACTER SET latin1 COLLATE latin1_bin;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
mysql_select_db(DBase);
$queryString="CREATE TABLE `".TableGout."` (
`cle` VARCHAR(24) NOT NULL ,
`keymembre` INT NOT NULL ,
`keyquestion` INT NOT NULL ,
`groupe` INT DEFAULT NULL,
`rang` INT DEFAULT NULL,
`type`TINYINT NOT NULL DEFAULT 0,
`keytribu` TINYINT NOT NULL DEFAULT -1,
`reponse` TINYINT NOT NULL ,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`compteur` INT NOT NULL AUTO_INCREMENT ,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keymembre` , `keyquestion`,`compteur` ) )
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
 ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableAvis."` (
`cle` VARCHAR(24) NOT NULL ,
`keymembre` INT NOT NULL ,
`keyquestion` INT NOT NULL ,
`groupe` INT DEFAULT NULL,
`rang` INT DEFAULT NULL,
`type` TINYINT NOT NULL DEFAULT 1,
`keytribu` TINYINT NOT NULL DEFAULT -1,
`reponse` TINYINT NOT NULL ,
`interet` TINYINT NOT NULL ,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`compteur` INT NOT NULL AUTO_INCREMENT ,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keymembre` , `keyquestion`,`compteur` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE= MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableMembres."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`voix` INT NOT NULL DEFAULT 0,
`nom` VARCHAR (26) NOT NULL ,
`contact` VARCHAR(50),
`texte` TEXT,
`nbregout` INT NOT NULL  DEFAULT 0,
`nbreavis` INT NOT NULL  DEFAULT 0,
`nbreqgout` INT NOT NULL  DEFAULT 0,
`nbreqavis` INT NOT NULL  DEFAULT 0,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datelastaction` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `voix` ,`nom`)) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableTribus."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`poidsaff` TINYINT NOT NULL DEFAULT 1,
`keymembre` INT NOT NULL,
`nom` VARCHAR (26) NOT NULL ,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keymembre`, `nom`)) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableQuestions."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`type` TINYINT NOT NULL DEFAULT 0,
`poidsaff` TINYINT NOT NULL DEFAULT 1,
`keygroup` INT,
`keymembre` INT NOT NULL ,
`typereponse` TINYINT NOT NULL DEFAULT 0,
`portee` INT NOT NULL DEFAULT 0,
`adhesion` INT NOT NULL DEFAULT 0,
`nbrereponses` INT NOT NULL DEFAULT 0,
`keytheme` INT NOT NULL DEFAULT -1,
`libelle` TEXT,
`fichier` VARCHAR (25) ,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datefin` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX (`keymembre`,`portee`,`poidsaff`, `type`,`keygroup` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableThemes."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`poidsaff` TINYINT NOT NULL DEFAULT 1,
`nom` VARCHAR (26) NOT NULL ,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX (`poidsaff`, `nom`)) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableGrQuestions."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keygroup` INT,
`type` TINYINT NOT NULL DEFAULT -1,
`libelle` VARCHAR (25),
`groupcount` INT,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif`  TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `type` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableOeuvres."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keyquestion` INT NOT NULL,
`keytheme` INT,
`keymembre` INT NOT NULL,
`keygroupq` INT,
`keygroupo` INT,
`typequestion` TINYINT NOT NULL DEFAULT -1,
`typereponse` TINYINT NOT NULL DEFAULT -1,
`typeoeuvre` TINYINT NOT NULL DEFAULT -1,
`portee` INT NOT NULL DEFAULT 0,
`adhesion` INT NOT NULL DEFAULT 0,
`nbrereponses` INT NOT NULL DEFAULT 0,
`poidsaff` INT NOT NULL DEFAULT 1,
`libelle` VARCHAR (50),
`fichier` VARCHAR (25),
`titre` VARCHAR (25),
`keyartiste` INT NOT NULL DEFAULT 0,
`artiste` VARCHAR (25),
`dimensions` VARCHAR (25),
`dateoeuvre` DATE,
`inclusdans` VARCHAR (25),
`par` TEXT,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keyquestion`,`typequestion`,`typeoeuvre`,`typereponse`,`keyartiste` ) )
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableGrOeuvres."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keyquestion` INT NOT NULL,
`type` TINYINT NOT NULL DEFAULT 0,
`titre` VARCHAR (25),
`groupcount` INT,
`keyediteur` INT NOT NULL DEFAULT 0,
`editeur` VARCHAR (25),
`dimensions` VARCHAR (25),
`dateedition` DATE,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif`  TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `type`,`keyquestion` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TablePar."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keyoeuvre` INT NOT NULL,
`keyartiste` INT NOT NULL,
`role` VARCHAR (25),
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keyoeuvre`,`keyartiste`,`role` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableArtistes."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keyquestion` INT NOT NULL,
`keygroup` INT,
`type` TINYINT NOT NULL DEFAULT 0,
`nom` VARCHAR (25),
`partenaire` BOOLEAN DEFAULT 0,
`keypartenaire` INT,
`nbreoeuvresref` INT,
`membrede` VARCHAR (25),
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif` TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keypartenaire`, `type`,`keyquestion`,`keygroup`) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableGrArtistes."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`keyquestion` INT NOT NULL,
`type` TINYINT NOT NULL DEFAULT 0,
`nom` VARCHAR (25),
`groupcount` INT,
`description` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif`  TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `type` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TablePartenaires."` (
`cle` INT NOT NULL AUTO_INCREMENT ,
`type` TINYINT NOT NULL DEFAULT 0,
`nom` VARCHAR (25),
`datefirstcontrat` TIMESTAMP DEFAULT 00000000000000,
`datestartcontrat` TIMESTAMP DEFAULT 00000000000000,
`dateendcontrat` TIMESTAMP DEFAULT 00000000000000,
`IPcontrat` VARCHAR (25),
`mail` VARCHAR (25),
`tel` TINYINT,
`adresse` VARCHAR (25),
`zipcode` TINYINT,
`ville` VARCHAR (25),
`pays` VARCHAR (25),
`equilibrepartenariat` INT,
`commentaires` TEXT,
`datecrea` TIMESTAMP DEFAULT 00000000000000,
`datemodif`  TIMESTAMP DEFAULT 00000000000000,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `type`, `dateendcontrat`,`zipcode`) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `".TableAffinites."` (
`cle` VARCHAR(24) NOT NULL ,
`keysujet` INT NOT NULL ,
`keyobjet` INT NOT NULL ,
`affglobal` INT NOT NULL,
`liens` INT NOT NULL,
`affgout` INT NOT NULL,
`liensgout` INT NOT NULL,
`affavis` INT NOT NULL,
`liensavis` INT NOT NULL,
`affinteret` INT NOT NULL,
`liensinteret` INT NOT NULL,
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
`compteur` INT NOT NULL AUTO_INCREMENT ,
`actif` BOOLEAN DEFAULT 1,
PRIMARY KEY ( `cle` ) ,
INDEX ( `keysujet`,`keyobjet`,`compteur` ) ) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
$queryString="CREATE TABLE `adminM` (
`cle` INT NOT NULL,
`knock` BIGINT NOT NULL,
`keyrole` INT,
`role` VARCHAR (20) DEFAULT 'Pas de rôle défini',
PRIMARY KEY ( `cle` ) ,
INDEX ( `keyrole` ,`role`)) 
DEFAULT CHARACTER SET latin1 COLLATE latin1_bin
ENGINE = MYISAM ;
";
echo"Query : ".$queryString."\n";
if(mysql_query($queryString)){echo $queryString."True";}
// CLOSE
mysql_close($connection);
?>