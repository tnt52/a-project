<?php

class Answer extends Controller {
    function answer()
    {
        parent::Controller();
        $this->load->model('Inglob','',true);
        $this->load->model('Inrep','',true);
    }
    
    function index()
    {
       $keyM=$this->session->userdata('keyMA');
       $keyQ=$this->input->post('keyquestion');
       $keyMq=$this->input->post('keymembreq');
       $TR=$this->input->post('TR');
       $TQ=$this->input->post('TQ');
       $TMA=$this->input->post('TMA');
       $reponse=$this->input->post('rep'.$this->input->post('keyquestion'));
       $importance=$this->input->post('importance');$theme=$this->input->post('theme');
       $tribu=$this->input->post('tribu');
       $this->Inrep->majrep($keyM,$keyMq,$keyQ,$reponse,$importance,$tribu,$theme,$TMA,$TQ,$TR);
    }

}
?>