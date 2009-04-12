<?php

class Answer extends Controller {
    function answer()
    {
        parent::Controller();
        $this->load->model('Inglob','',true);
        $this->load->model('Inquest','',true);
        $this->load->model('Inrep','',true);
    }
    
    function index()
    {
       $keyM=$this->session->userdata('keyMA');
       $TMact=$this->session->userdata('profil');
       $keyQ=$this->input->post('keyquestion');
       $keyMq=$this->input->post('keyMq');
       $TQ=$this->input->post('typequestion');
       if ($keyQ=="") {
          switch ($TQ){
                 case TQavis:$libQ=$this->input->post('Qavis');break;
                 case TQgout:$libQ=$this->input->post('Qgout');break;
                 default:$libQ="Type Q inconnu:$TQ";break;
          }
          $keyQ=$this->Inquest->newQ($keyM,$TQ,$libQ);
       }
       if ($TQ==TQavis) {
          $TR=TRonat;
          $r='Ravis';
          }
       else {
            $TR=TRgout;
            $r='Rgout';
            }
       $reponse=$this->input->post($r);
       $importance=$this->input->post('importance');
       $theme=$this->input->post('theme');
       $tribu=$this->input->post('tribu');
       $this->Inrep->majrep($keyM,$keyMq,$keyQ,$reponse,$importance,$tribu,$theme,$TMact,$TQ,$TR);
       echo ("Rep RECU!!: TQ:$TQ,  Rep:$reponse,   keyM:$keyM,   keyQ:$keyQ");
    }

}
?>