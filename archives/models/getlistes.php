<?php
     class Getlistes extends Model{
       function Getmodel(){
         parent::Model();
       }
       function getsons($page,$limit,$Ntot){
//        return "Test";
        $keyMA=$this->session->userdata('keyMA');
        $v=array('page'=>$page, 'limit'=>$limit);
        /*$this->db->select('oeuvres.cle','titre','artistes.cle','artistes.nom','adhesion','fichier','repoeuvres.reponse');
        $this->db->from('oeuvres');
        $this->db->join('artistes','artistes.cle=oeuvres.keymembre','right');
        $this->db->join('repoeuvres','repoeuvres.keyquestion=oeuvres.cle','left');
        $this->db->where('repoeuvres.keymembre',$keyMA);
        $this->db->order_by('titre','asc');
        $this->db->order_by('nomM','desc');
        if($Ntot==-1) $v['Ntot']=$this->db->count_all_results();//init pour la première requête
        else*/ $v['Not']=$Ntot;
        $this->db->limit($limit,($page-1)*$limit);
        $this->db->from('oeuvres');
        //$this->db->select('cle,titre,nomM,adhesion,fichier');
        $this->db->select('oeuvres.cle,oeuvres.keymembre,titre,artistes.nom,adhesion,fichier,repoeuvres.reponse');
        $this->db->join('artistes','artistes.cle=oeuvres.keymembre','left');
        $this->db->join('repoeuvres','repoeuvres.keyquestion=oeuvres.cle AND repoeuvres.keymembre='.$keyMA,'left');
        $this->db->order_by('titre','asc');
        $this->db->order_by('nom','desc');
        $r=$this->db->get();
        $v['result']=$r;
        return $v;
       }
       function getson($cle){
       $this->db->where('oeuvres.cle',$cle);
       $this->db->join('artistes','artistes.cle=oeuvres.keymembre','left');
       $r=$this->db->get('oeuvres');
       $v=array('result'=>$r->result_array());
       return $v;
       }
       function getmembres($page,$limit){
        $keyMA=$this->session->userdata('keyMA');
        $v=array('page'=>$page, 'limit'=>$limit);
        $this->db->select('membres.cle,pseudo,sexe,voix,affglobal');
        $this->db->from('membres');
        $this->db->join('affinites','affinites.keyobjet=membres.cle && affinites.keyobjet='.$keyMA,'left');
//        $this->db->where('affinites.keysujet',$keyMA);
        $this->db->order_by('voix','desc');
        $this->db->order_by('pseudo','desc');
        $this->db->limit($limit,($page-1)*$limit);
        $r=$this->db->get();
        $v['Ntot']=$this->db->count_all_results();
        $v['result']=$r;
        return $v;
       }
       function getavis($page,$limit){
        $keyMA=$this->session->userdata('keyMA');
        $v=array('page'=>$page, 'limit'=>$limit);
        $this->db->limit($limit,($page-1)*$limit);
        $this->db->from('questions');
        //$this->db->select('cle,titre,nomM,adhesion,fichier');
        $this->db->select('questions.cle,questions.keymembre,libelle,membres.pseudo,membres.sexe,adhesion,repoeuvres.reponse');
        $this->db->join('membres','membres.cle=oeuvres.keymembre','left');
        $this->db->join('repquestio','repquestio.keyquestion=questions.cle AND repquestio.keymembre='.$keyMA,'left');
        $this->db->order_by('libelle','asc');
        $this->db->order_by('pseudo','desc');
        $r=$this->db->get();
        $v['result']=$r;
        return $v;
       }
     }
?>