<? require("../ConDB/global/globalDB.php");require("../Sessions/Secure.php");require("../Constantes/Profils.php");
$connection=mysql_connect(hostDB,userDB, pswDB) or die("Unable to connect!");
echo "connection:".$connection."\n";
mysql_select_db(DBase);
$queryString="INSERT INTO ".TableAuthentif." (pseudo,psw,profil) VALUES ('Al','sesame',".profArtiste.");";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 1', 0,0,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 2',0,0,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Bob','QUESTION 3',0,0,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Dave','QUESTION 4',0,0,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 5',0,0,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 6',0,1,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryStrsing="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 7',0,1,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 8',0,1,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 9',0,1,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableQuestions." (nomM,libelle,type,typerep,keymembre) VALUES ('Al','QUESTION 10',0,1,1);";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (2,'Olé1',1,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé2',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé3',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé4',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé5',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé6',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé7',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé8',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé9',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé10',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé11',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé12',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé13',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé14',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé15',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé16',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé17',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé18',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé19',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé20',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé21',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé22',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé23',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé24',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé25',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé26',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé27',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé28',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé29',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé30',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé31',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé32',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé33',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé34',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé35',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Olé36',2,'John Coltrane','18:5','1961-01-01','¨John Coltrane:saxophone soprano¨Georges Lane:flûte¨Freddie Hubbard:trompette¨Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,pseudo,typesart,mailpri,mailart,tel,autrecont,link,texte,textearti,avatar,imageart) VALUES (2,'John Coltrane','Joe','¨10','membre@gmail.com','artiste@gmail.com','062364545','msn: toto','www.myspace.com','Le texte blablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla','blublu','IconeDef.gif','test.jpg');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,pseudo,typesart) VALUES (6,'Georges Lane','Georges','¨10¨20');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,typesart) VALUES (7,'Freddie Hubbard','¨20¨10');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,typesart) VALUES (8,'Mccoy Tyner','¨50¨99');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
/*$queryString="INSERT INTO ".TableGrOeuvres." (type,titre,groupcount,dimensions,description) VALUES ('0','Olé Coltrane',1,'36:17/3','This album is one of the 50 titles that are being reissued to commemorate Atlantic\'s 50th Anniversary.');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());*/
//$queryString="INSERT INTO ".TableGrQuestions." (keyoeuvre,titre,keyediteur,editeur,dimensions,dateedition,description)
//VALUES ('QUESTION 11','Oeuvre1',1,0,1);";
//echo"Query : ".$queryString."\n";
//$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableMembres." (cle,pseudo,mailpri,texte) VALUES (1,'Al','alhappy.days','Fonzie\'s so cool !');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableMembres." (cle,pseudo,autrecont,texte) VALUES (4,'Bob','Call me Robert','Tea is fun');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableMembres." (cle,pseudo,autrecont,texte) VALUES (5,'Carl','the running Cox on MSN','I can run a 100m');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableMembres." (cle,pseudo,mailpri,texte) VALUES (3,'Dave','','');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
// CLOSE
mysql_close($connection);
function SQLfromFile($file){
$SQL=file_get_contents("initSQL.txt");
$liste=split($SQL);
for ($i=0;$i<count($liste);$i++){
$queryString=$liste[$i];
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
}}
?>