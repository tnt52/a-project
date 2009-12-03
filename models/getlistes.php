<?php
     class Getlistes extends Model{
       function Getmodel(){
         parent::Model();
       }
       function getRepMsel($cat,$keyM,$limit,$page,$champtri,$senstri){
                switch (floor($cat/20)*20){
                       case TO:$tableM="artistes";$tableQ="oeuvres";$tableR="repoeuvres";break;
                       case TQ:$tableM="membres";$tableQ="questions";$tableR="repquestio";break;
                       default:exit();
                }
                $this->db->limit($limit,($page-1)*$limit);
                $this->db->select("$tableQ.cle,$tableR.reponse");
                $this->db->from($tableQ);
                $this->db->join($tableM,"$tableM.cle=$tableQ.keymembre",'left');
                $this->db->join($tableR,"$tableR.keyquestion=$tableQ.cle AND $tableR.keymembre=$keyM",'left');
                $this->db->order_by('titre','asc');
                $this->db->order_by('nom','desc');
                return $this->db->get();
                //return $this->db->last_query();
       }
      /* function getNtot($cat,$limit,$search="",$fields=null){
                $table="";
                if ($cat==TMmem){
                     $this->db->from('membres');
                     $this->db->where('actif',1);
                     $Ntot=$this->db->count_all_results();
                     $this->db->from('artistes');
                     $this->db->where('actif',1);
                     $Ntot+=$this->db->count_all_results();
                }
                else {
                     switch (floor($cat/20)*20){
                            case TO: $table="oeuvres";$this->db->where($table.'.type',$cat);$this->db->join('artistes','artistes.cle=oeuvres.keymembre','left');break;
                            case TQ: $table="questions";$this->db->where($table.'.type',$cat);break;
                            default:
                                switch($cat){
                                     case TMart: $table="artistes";break;
                                }
                }
                $this->db->from($table);
                $this->docSQLsearch($search,$fields);
                $this->db->where($table.'.actif',1);
                $Ntot=$this->db->count_all_results();
                }
                return $Ntot;
       }*/
       function getmembres($page,$limit,$champtri,$senstri,$search,$TA=null){	       
	       switch ($TA){
		case TAglo:$champaff="affglobal";$liens="liens";break;
		case TAson:$champaff="affson";$liens="liensson";break;
		case TAson:$champaff="affson";$liens="liensson";break;
		case TAson:$champaff="affson";$liens="liensson";break;
		default:$champaff="affglobal";$liens="liens";break;
		}		
	        $select="cle,type,pseudo,sexe,voix,texte,nblienstot,nbmemlies,$liens as liens,$champaff as affinite,avatar";
                $keyMA=$this->session->userdata('keyMA');
                $v=array('page'=>$page, 'limit'=>$limit);
                $where="TRUE";
                if ($search) {
                       $where="";
                       $search=strtoupper($search);
                       $ormatchs=explode("+",$search);
                       $andmatchs=explode(" ",$ormatchs[0]);
                       $where="UPPER(pseudo) LIKE '%".$andmatchs[0]."%'";
                       for ($i=1;$i<count($andmatchs);$i++){
                           $where.=" AND UPPER(pseudo) LIKE '%".$andmatchs[$i]."%'";
                       }
                       for ($i=1;$i<count($ormatchs);$i++){
                               $andmatchs=explode("+",$ormatchs[$i]);
                               $where.=" OR UPPER(pseudo) LIKE '%".$andmatchs[0]."%'";
                               for ($i=1;$i<count($andmatchs);$i++){
                                         $where.=" AND UPPER(pseudo) LIKE '%".$andmatchs[$i]."%'";
                                 }
                       }
                }
                $qstring="(SELECT membres.$select,membres.datecrea
                FROM membres
                LEFT JOIN affinites
                     ON (affinites.keyobjet=membres.cle && affinites.keysujet=$keyMA)
                WHERE membres.actif=1 AND ($where))
		ORDER BY $champtri $senstri
                LIMIT ".($page-1)*$limit.",$limit";
                /*UNION
                (SELECT artistes.$select,artistes.datecrea
                FROM artistes
                LEFT JOIN affinites
                     ON (affinites.keyobjet=artistes.cle && affinites.keysujet=$keyMA)
                WHERE artistes.actif=1 AND ($where))
                ORDER BY $champtri $senstri
                LIMIT ".($page-1)*$limit.",$limit";*/
                $r=$this->db->query($qstring);
                /*$this->db->from('membres');
                $this->db->where('actif',1);
                $v['Ntot']=$this->db->count_all_results();
                $this->db->from('artistes');
                $this->db->where('actif',1);
                $v['Ntot']+=$this->db->count_all_results();
                $v['Ptot']=ceil($v['Ntot']/$limit);*/
		$v['page']=$page;
		$v['numrows']=$r->num_rows();
                $v['result']=$r->result_array();
                return $v;
       }
       function getartistes($page,$limit,$champtri,$senstri,$search,$fields){
                $this->db->limit($limit,($page-1)*$limit);
                $this->db->from('artistes');
                $this->db->order_by($champtri,$senstri);
                $this->docSQLsearch($search,$fields);
                $this->db->where('artistes.actif',1);
                $r=$this->db->get();
                $v['result']=$r;
                return $v;

       }
       function docSQLsearch($search,$fields){
                if ($search) {
                  $search=strtoupper($search);
                  $ormatchs=explode("+",$search);
                  $where="";
                  foreach ($fields as $field){
                          foreach ($ormatchs as $val){
                             $andmatchs=explode(" ",$val);
                             $this->db->or_like("UPPER($field)",$andmatchs[0]);
                             for ($i=1;$i<count($andmatchs);$i++){
                                       $this->db->like("UPPER($field)",$andmatchs[$i]);
                             }
                          }
                  }
               }
       }
       function getoeuvres($type,$page,$limit,$champtri,$senstri,$keyMsel,$search,$fields){
                $keyMA=$this->session->userdata('keyMA');
                $this->db->limit($limit,($page-1)*$limit);
                $this->db->from('oeuvres');
                $this->db->select('oeuvres.cle,oeuvres.keymembre,oeuvres.type,titre,artistes.nom,portee,adhesion,fichier,rep1.reponse as repMA,rep2.reponse as repMsel');
                $this->db->join('artistes','artistes.cle=oeuvres.keymembre','left');
                $this->db->join('repoeuvres as rep1','rep1.keyquestion=oeuvres.cle AND rep1.keymembre='.$keyMA,'left');
                $this->db->join('repoeuvres as rep2','rep2.keyquestion=oeuvres.cle AND rep2.keymembre='.$keyMsel,'left');
                $this->db->order_by($champtri,$senstri);
                $this->docSQLsearch($search,$fields);
                $this->db->where('oeuvres.type',$type);
                $this->db->where('oeuvres.actif',1);
                $r=$this->db->get();
		$v['page']=$page;
		$v['numrows']=$r->num_rows();
                $v['result']=$r;
                return $v;
       }
       function getquestions($type,$page,$limit,$champtri,$senstri,$keyMsel,$search,$fields){
                $keyMA=$this->session->userdata('keyMA');
                $v=array('page'=>$page, 'limit'=>$limit);
                $this->db->limit($limit,($page-1)*$limit);
                $this->db->from('questions');
                $this->db->select('questions.cle,questions.keymembre,questions.type,libelle,membres.pseudo,membres.sexe,portee,adhesion,rep1.reponse as repMA,rep2.reponse as repMsel');
                $this->db->join('membres','membres.cle=questions.keymembre','left');
                $this->db->join('repquestio as rep1','rep1.keyquestion=questions.cle AND rep1.keymembre='.$keyMA,'left');
		$this->db->join('repquestio as rep2','rep2.keyquestion=questions.cle AND rep2.keymembre='.$keyMsel,'left');
                $this->db->order_by($champtri,$senstri);
                $this->docSQLsearch($search,$fields);
                //$this->db->where('questions.type',$type);
                $this->db->where('questions.actif',1);
                $r=$this->db->get();
		//echo $this->db->last_query();
		$v['page']=$page;
		$v['numrows']=$r->num_rows();
                $v['result']=$r;
                return $v;

       }
       function getmore($cat,$cle,$type){
                switch (floor($cat/10)*10){
                       case TO:return $this->getoeuvre($cle);
                       case TQ: return $this->getquestion($cle);
                }
                switch ($cat){
                       case TMmem: return $this->getmembre($cle,$type);
                       case TMart: return $this->getartiste($cle);
                       default: return $this->getoeuvre($cle);
                }
       }
       function getoeuvre($cle){
                $this->db->select('oeuvres.cle as keyO,oeuvres.type as typeO,titre,artistes.nom,oeuvres.keymembre,dateoeuvre,oeuvres.datecrea,fichier,dimensions,par,description');
                $this->db->where('oeuvres.cle',$cle);
                $this->db->join('artistes','artistes.cle=oeuvres.keymembre','left');
                $r=$this->db->get('oeuvres');
                $v=array('result'=>$r->result_array());
                return $v;
       }
       function getquestion($cle){
                $this->db->where('questions.cle',$cle);
                $this->db->join('membres','membres.cle=questions.keymembre','left');          
                $r=$this->db->get('questions');
                $v=array('result'=>$r->result_array());
                return $v;
       }
       function getmembre($cle,$type){
                $keyMA=$this->session->userdata('keyMA');
                switch($type){
                      case TMart:$table="artistes";break;
                      default:$table="membres";break;
                }
                $this->db->where($table.'.cle',$cle);
                $this->db->join('affinites','affinites.keyobjet='.$table.'.cle && affinites.keysujet='.$keyMA,'left');
                $r=$this->db->get($table);
                $v=array('result'=>$r->result_array());
                return $v;                
       }
       function getartiste($cle){
                $keyMA=$this->session->userdata('keyMA');
                $this->db->where('artistes.cle',$cle);
                $r=$this->db->get('artistes');
                $v['artiste']=$r->result_array();
                $this->db->select('oeuvres.cle,oeuvres.type,oeuvres.keymembre,titre,reponse');
                $this->db->where('oeuvres.keymembre',$cle);
                $this->db->where('oeuvres.actif',1);
                $this->db->where('oeuvres.type',TOson);
                $this->db->join('repoeuvres','repoeuvres.keyquestion=oeuvres.cle AND repoeuvres.keymembre='.$keyMA,'left');
                $r=$this->db->get('oeuvres');
                $v['sons']=$r->result_array();
                $this->db->where('oeuvres.keymembre',$cle);
                $this->db->where('oeuvres.actif',1);
                $this->db->where('oeuvres.type',TOtxt);
                $v['textes']=$r->result_array();
                $this->db->where('oeuvres.keymembre',$cle);
                $this->db->where('oeuvres.actif',1);
                $this->db->where('oeuvres.type',TOimg);
                $v['images']=$r->result_array();
                $this->db->where('oeuvres.keymembre',$cle);
                $this->db->where('oeuvres.actif',1);
                $this->db->where('oeuvres.type',TOvdo);
                $v['videos']=$r->result_array();
                return $v;
       }
       function getaffinites($keyMA,$typeA,$zoom=null){
               $this->db->from('affinites');
               $this->db->where(array('keysujet'=>$keyMA,'actif'=>1));
               switch ($typeA){
                case TAglo: $aff="affglobal";$lie="liens";break;

               }
               $this->db->select("keyobjet,$aff,$lie");
               $this->db->order_by($aff,'desc');
               $this->db->order_by($lie,'desc');
               $r=$this->db->get();
               $affs=$r->result_array();
               return $affs;
       }
     }
?>