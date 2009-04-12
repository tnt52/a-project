<?class Recmember extends Controller {
    function Recmember()
    {
        parent::Controller();
        $this->load->model('Inglob','',true);
        $this->load->model('Inmem','',true);
    }
    
    function index()
    {
             $keyM=$this->session->userdata('keyMA');
             $profil=$this->session->userdata('profil');
             $mailpri=$this->input->post('mailprive');
             $mailpub=$this->input->post('mailpublic');
             $texte=$this->input->post('texte');
             $cp=$this->input->post('cp');
             $visucp=$this->input->post('visucp');
             $this->Inmem->majmem($keyM,$profil,$mailpri,$mailpub,$texte,$cp,$visucp);
             //echo "finish";
    }
}
?>