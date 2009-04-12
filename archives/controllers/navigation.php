<?php

class Navigation extends Controller {
    function Navigation()
    {
        parent::Controller();
        $this->session->set_userdata(array('keyMA'=>1,'profil'=>TMmem));
    }
    
    function index()
    {                                                                                                           //mootools-beta-1.2b2-compatible.js
             /*$data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-release-1.11.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooforms.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/navigation.js"></script>';
             $data['Header'].='<script type="text/css" src="'.base_url().'system/application/views/css/navigation.css"></script>';
             $data['cat']=TOson;
             $this->load->view('arty',$data);*/
             $this->affiche(TOson);
    }
    function affiche($cat){
             $data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-release-1.11.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooforms.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/navigation.js"></script>';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/navigation.css">';
             $data['cat']=$cat;
             $data['account']=$this->load->view('account',array('login'=>$this->load->view('login',array('page'=>'navigation'),true),'voix'=>10),true);
             $data['liste_v']="";//$this->liste_view($cat,true);
             $this->load->view('arty',$data);
    }
    function liste($cat){
             $this->liste_view($cat,false);
    }
    function liste_view($cat,$string){
             if ($cat==null) return;
             $vue="";
             switch($cat){
                case TOson: $data=$this->Getlistes->getsons(1,20,-1);$vue="sons_v";break;
                case TMmem: $data=$this->Getlistes->getmembres(1,20);$vue="membres_v";break;
                case TQ: $data=$this->Getlistes->getavis(1,20);$vue="questions_v";break;
             }
             if ($vue!=""){
                $data['script']=$this->load->view('js/liste.js',null,true);
                return $this->load->view($vue,$data,$string);
             }
             return "";
    }

    function more($cat,$cle){
             // echo "test";
              $vue="son_v";
              $data=$this->Getlistes->getson($cle);
             // $data['pr']=$this->load->view("PR",array('keyQ'=>$cle,'keyM'=>1,'keyMq'=>2),true);
              $this->load->view($vue,$data);
    }
    function viewPR($keyQ,$keyMq,$rep){
             return $this->load->view("PR",array('keyQ'=>$keyQ,'keyMq'=>$keyMq,'rep'=>$rep),true);
    }

    function panelreponse(){
    $this->load->view("PR");
    }
    function deconnexion(){
             $this->Checkid->logout();
    }
}
?>