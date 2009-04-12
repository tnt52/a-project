<?
class Membre extends Controller {
    function Membre()
    {
        parent::Controller();
        $this->load->model('Getmembre');
    }
    
    function index()
    {
      $this->Checkid->check(array(TMmem,TMart),"navigation");
      $keyMA=$this->session->userdata('keyMA');
      $profil=$this->session->userdata('profil');
      $data=$this->Getmembre->infos($keyMA,$profil);
      //foreach($data as $key=>$value) echo "$key=>$value";
      $this->load->view('membre_v',$data);
    }
}
?>