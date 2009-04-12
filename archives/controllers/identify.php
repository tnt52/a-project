<?php

class Identify extends Controller {
    function Identify()
    {
        parent::Controller();
    }
    
    function index()
    {
       $pseudo=$this->input->post('pseudo');
       $psw=$this->input->post('psw');
       $page=$this->input->post('page');
       $this->Checkid->login($pseudo,$psw);
       redirect($page);
    }
}
?>