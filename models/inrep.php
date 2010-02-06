<?php
define ("SelectionR","keymembre,type,reponse,importance");
define ("ChampsMajR","datecrea,keymembre,keyquestion,reponse,importance");
define ("ValeursInsR",MajDate);
define ("ValeursMajR","datemodif=".MajDate);

define ("ChampsMajA","liens,datecrea,keysujet,keyobjet,affglobal");
define ("ValeursInsA","1,".MajDate);
define ("ValeursMajA","datemodif=".MajDate.",affglobal=affglobal+");


class Inrep extends Model{
  function Getmodel(){
    parent::Model();


  }

  function UpdateAffinite ($resultat, $R,$Rinit=NULL){
  $a=$this->getCompatibilite($R,$R);
  $size=count($a);
  $O[0]=0;
  $O[1]=0;
  $O[2]=0;
  $O[3]=0;
  for ($i=0;$i<$size;$i++){//Creation compatibilite zero
               $z[$i]=$O;
  }
  if($Rinit!=NULL){
              $b=$this->getCompatibilite($Rinit,$Rinit);
              $l=0;
      }
  else {
              $b=$z;
              $l=1;
  }
  //Mise à jour Affinite Miroir
  $MajA=$this->TexteSQL($a,$b,$l);
  $keyActif=$R[0];
  $keyPassif=$keyActif;
  echo"MIRROIR KeyActif = ".$keyActif. " | KeyPassif = ".$keyPassif."\n";
  $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,true);
  //Mise à Jour Affinites
  if (count($resultat)>0){
      foreach ($resultat as $row){
          $keyPassif=$row['keymembre'];
          $Rpassif = array(0=>$keyPassif,2=>$row['type'],3=>$row['reponse'],4=>$row['importance']);// //
          $a=$this->getCompatibilite($R,$Rpassif);
    //      $size=count($a);
          if($Rinit!=NULL) $b=$this->getCompatibilite($Rinit,$Rpassif);
          else $b=$z;
          $MajA=$this->TexteSQL($a,$b,$l);
          //MàJ Sujet actif --> Sujet passif ou Sujet passif vu par Sujet actif
          echo"KeyActif = ".$keyActif. " | KeyPassif = ".$keyPassif."\n";
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,true);
          
          //MàJ Sujet passif --> Sujet actif
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,false);
          
         //Calcul Somme des Affinites des Sujets Passifs vu par autres membres ou Influence des Sujets passifs sur tous les autres membres
          $keyActif=-1;
          echo"KeyActif = ".$keyActif. " | KeyPassif = ".$keyPassif."\n";
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,true);
          
          //Calcul Somme des Affinites des Sujets Passifs vers autres membres ou Adhesion des Sujets passifs à tous les autres membres
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,false);
          
          //Calcul Adhesion global du Sujet Actif
          $keyActif=$R[0];
          $keyPassif=-1;
          echo"KeyActif = ".$keyActif. " | KeyPassif = ".$keyPassif."\n";
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,true);
          
          //Calcul Influence global du Sujet Actif
          $this->ReqSQLAffinites($MajA,$keyActif,$keyPassif,false);
      }
  }
}
function TexteSQL($a,$b,$l){ //a,b compatibilites donne le vector des txtssql pour affinités
         $Oa = $a[0];
         $Ob = $b[0];
         $size=count($a);
         $so=$Oa[2]-$Ob[2];
         $os=$Oa[3]-$Ob[3];
         $ChampsMaJ="";
         $InsertionS=",".$so;
         $InsertionO=",".$os;
         $UpdateS=$so.",liens=liens+".$l;
         $UpdateO=$os.",liens=liens+".$l;
         for ($i=0;$i<$size;$i++){
             $Oa = $a[$i];
             $Ob = $b[$i];
             $so=$Oa[2]-$Ob[2];
             $os=$Oa[3]-$Ob[3];
             $aff="aff".$Oa[1];
             $liens="liens".$Oa[1];
             echo "SQL Ajout affinité ".$Oa[1]."--> ASO:".$so." AOS:".$os." lien:".$l;
             $ChampsMaJ = $ChampsMaJ.",$aff,$liens";
             $InsertionS=$InsertionS.",".$so.",1";
             $InsertionO=$InsertionO.",".$os.",1";
             $UpdateS=$UpdateS.",".$aff."=".$aff."+".$so.",".$liens."=".$liens."+".$l;
             $UpdateO=$UpdateO.",".$aff."=".$aff."+".$os.",".$liens."=".$liens."+".$l;
         }
         $V[0]=$ChampsMaJ;
         $V[1]=$InsertionS;
         $V[2]=$InsertionO;
         $V[3]=$UpdateS;
         $V[4]=$UpdateO;
         return $V;
}
function ReqSQLAffinites($MaJA,$keyActif,$keyPassif,$Actif){
         if($Actif) $i=0;
         else {$i=$keyPassif;$keyPassif=$keyActif;$keyActif=$i;$i=1;}
         $this->Inglob->insertupdate(TableAffinites,"keysujet=$keyActif AND keyobjet=$keyPassif",ChampsMajA.$MaJA[0],
             ValeursInsA.",".$keyActif.",".$keyPassif.$MaJA[1+$i],ValeursMajA.$MaJA[3+$i]);
         
}

function endR($keyQ,$keyM,$profil,$R,$Rinit,$n,$keyMq,$TableR,$TableQ,$SelectionR,$statsRepM,$ChampsMajR,$ValeursInsR,$ValeursMajR){
         $array=array('keyquestion'=>$keyQ,'keymembre !='=>$keyM);
         $this->db->where($array);
         $this->db->select($SelectionR);
         $query=$this->db->get($TableR);
         $resultat=$query->result_array();
         $this->UpdateAffinite ($resultat,$R,$Rinit);
         $p=$this->getContribPortee($R)-$this->getContribPortee($Rinit);//portee
         $v=$p;//voix
         $a=$this->getContribAdhesion($R)-$this->getContribAdhesion($Rinit);//adhesion
         $queryString= "UPDATE ".$TableQ." SET portee=portee+".$p.",nbrerep=nbrerep+".$n.",adhesion=adhesion+".$a." where cle=".$keyQ;
         $this->db->query($queryString);
         $tableM="";
         switch($profil){
             case TMano:break;
             case TMmem:$tableM=TableMembres;break;
             case TMart:$tableM=TableArtistes;break;
             case TMpro:break;
         }
         $majstats="";
         foreach($statsRepM as $value){
          $majstats.=",$value=$value+$n";
         }
         $queryString= "UPDATE ".$tableM." SET voix=voix+".$v.$majstats." where cle=".$keyM;
         $this->db->query($queryString);
         /*if ($keyM!=$keyMq) {
            $queryString= "UPDATE ".$tableM." SET voix=voix+".$v." where cle=".$keyMq;
            if(mysql_query($queryString,$connection)){echo"Voix Membre Question(".$keyMq.") MaJ : ".$v."\n";}
         } */
         if ($Rinit==NULL) {
            $this->db->query("INSERT INTO $TableR ($ChampsMajR) VALUES ($ValeursInsR)");
         }
         else {
            $this->db->query("UPDATE $TableR SET $ValeursMajR WHERE keymembre=$keyM && keyquestion=$keyQ");
         }
}

function affGout($reponse1=0,$reponse2=0){//
    $aff=0;
    $r2 = $reponse1*$reponse2;

    if ($r2>0){
        switch ($r2){
            case (ValLittleS*ValLittleS):
                $aff=3;
                break;
            case (ValLittleS*ValBigS):
                $aff=1;
                break;
            case (ValBigS*ValBigS):
                $aff=9;
        }
    }
    else{
        $aff=$r2;
        }
    return $aff;
}

function getCompatibilite($R,$Rpassif){//
    echo "R 2 : ".$R[2];
    echo "Rpassif 2 : ". $Rpassif[2];
    if ($Rpassif[2]==$R[2]){
        $Gout[0] = TRgout;
        $Gout[1] = "gout";
        $Gout[2] = $R[4]*$this->affGout($R[3],$Rpassif[3]);
        $Gout[3] = $Rpassif[4]*$this->affGout($Rpassif[3],$R[3]);
        $V[0]=$Gout;
    }
    else {echo"Tentative de test compatibilité entre incompatibles:";
          echo"Type Ractif: ".$R[2];
          echo"Type Rpassif: ".$Rpassif[2];
          $V=NULL;
          }
    return $V;
}

function getContribPortee($R){
   if ($R!=NULL){
   echo "Portée:".($R[4]*$R[3]);
   return $R[4]*Abs($R[3]);//
   }
   else return 0;
}
function getContribAdhesion($R){
   if ($R!=NULL){
   /*if ($R[3]>0) $signe=1; else $signe=-1;
   return $signe*$R[3]*$R[3];*/
   return $R[3];
   }
   else return 0;
}
function initR($keyQ,$keyM,$Table,$SelectionR){
         $array=array('keyquestion'=>$keyQ,'keymembre'=>$keyM);
         echo $this->db->get('oeuvres');
         $this->db->where($array);
         $this->db->select($SelectionR);
         $query=$this->db->get($Table);
         return $query->result_array();
}

function majrep($keyM,$keyMq,$keyQ,$reponse,$importance,$tribu,$theme,$TMact,$TQ,$TR){
    $profil=$TMact;
    $Rinit=NULL;
    $n=1;// 1 si New Rep 0 si MaJ
    $ValeursInsR=ValeursInsR.",".$keyM.",".$keyQ.",".$reponse.",$importance";//
    $ValeursMajR=ValeursMajR.",reponse=".$reponse.",importance=$importance";//
    $statsMR=array(0=>"nbreptot");//
    $SelectionR=SelectionR;//
    $ChampsMajR=ChampsMajR;//
    $R = array(0=>$keyM,1=>$keyQ,2=>$TR,3=>$reponse,4=>$importance);//
    switch (floor($TQ/10)*10){
     case TO:
          $TableR=TableRepOeu;
          $TableQ=TableOeuvres;
          $statsMR[]="nbrepoeutot";
          switch ($TQ){
                 case TOson:$statsMR[]="nbrepson";break;
                 case TOimg:$statsMR[]="nbrepimg";break;
                 case TOvdo:$statsMR[]="nbrepvdo";break;
                 case TOtxt:$statsMR[]="nbreptxt";break;
          }
          break;
     case TQ:
          $TableR=TableRepQue;
          $TableQ=TableQuestions;
          $statsMR[]="nbrepquetot";
          switch ($TR){
                 case TRgout:$statsMR[]="nbrepqgout";break;
                 case TRonat:$statsMR[]="nbrepqonat";break;
                 //case TRinteret:$statsMR[]="nbrepinteret";break;
          }
          break;               
    }
    echo "TQ:$TQ";
    $resultat=$this->initR($keyQ,$keyM,$TableR,$SelectionR);
    foreach ($resultat as $row){
         $keyMinit=$row['keymembre'];
         $keyQinit=$keyQ;
         $typeinit=$row['type'];
         $reponseinit=$row['reponse'];
         $impinit=$row['importance'];
         $Rinit = array(0=>$keyMinit,1=>$keyQinit,2=>$typeinit,3=>$reponseinit,4=>$impinit); //
         $n=0;
   }
   $this->endR($keyQ,$keyM,$profil,$R,$Rinit,$n,$keyMq,$TableR,$TableQ,$SelectionR,$statsMR,$ChampsMajR,$ValeursInsR,$ValeursMajR);
  }
}
?>