<?php

class Sons extends Controller {

    function Sons()
    {
        parent::Controller();
        $data['extraHeadContent']='<script type="text/javascript" src="'.base_url().'js/mootools/mootools-release-1.11.js"></script>';
        $data['extraHeadContent']='<script type="text/javascript" src="'.base_url().'js/navigation.js"></script>';
    }
    
    function index()
    {
        $data['titres']=array('Titre 1','Titre 2','Titre 3');
        $data['artistes']=array('Artiste 1','Artiste 2','Artiste 3');
        $data['avisgene']=array('Avis 1','Avis 2','Avis 3');
        $data['tonavis']=array('Ton Avis 1','Ton Avis 2','Ton Avis 3');
        $this->load->view('sons_view',$data);
    }
}
?>