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
VALUES (2,'Ol�1',1,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�2',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�3',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�4',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�5',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�6',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�7',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�8',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�9',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�10',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�11',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�12',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�13',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�14',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�15',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�16',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�17',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�18',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�19',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�20',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�21',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�22',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�23',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�24',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�25',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�26',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�27',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�28',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�29',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�30',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�31',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�32',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�33',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�34',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�35',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableOeuvres." (type,titre,keymembre,nomM,dimensions,dateoeuvre,par,description)
VALUES (10,'Ol�36',2,'John Coltrane','18:5','1961-01-01','�John Coltrane:saxophone soprano�Georges Lane:fl�te�Freddie Hubbard:trompette�Macc Toy Tuner:piano','Une perle');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,pseudo,typesart,mailpri,mailart,tel,autrecont,link,texte,textearti,avatar,imageart) VALUES (2,'John Coltrane','Joe','�10','membre@gmail.com','artiste@gmail.com','062364545','msn: toto','www.myspace.com','Le texte blablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablabla blablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablablabla','blublu','IconeDef.gif','test.jpg');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,pseudo,typesart) VALUES (6,'Georges Lane','Georges','�10�20');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,typesart) VALUES (7,'Freddie Hubbard','�20�10');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
$queryString="INSERT INTO ".TableArtistes." (cle,nom,typesart) VALUES (8,'Mccoy Tyner','�50�99');";
echo"Query : ".$queryString."\n";
$result=mysql_query($queryString) or die('Erreur connexion MySQL: ' . mysql_error());
/*$queryString="INSERT INTO ".TableGrOeuvres." (type,titre,groupcount,dimensions,description) VALUES ('0','Ol� Coltrane',1,'36:17/3','This album is one of the 50 titles that are being reissued to commemorate Atlantic\'s 50th Anniversary.');";
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