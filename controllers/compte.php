<?
class Compte extends Controller {
    function Compte()
    {
        parent::Controller();
        $this->session->set_userdata(array('keyMA'=>1,'profil'=>TMmem));
    }
    
    function index()
    {
            $data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/basics.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/constantes_js.php"></script>';
             /*$data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-beta-1.2b2-compatible.js"></script>';*/
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-1.2.1-core.js"></script>';//mootools-release-1.11.js
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-1.2-more.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/custom_select/js/custom_select.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/custom_select/js/custom_select_text.js"></script>';
//             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/js/mooplugs/custom_select/themes/simplifica/custom-select-simplifica.css">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/custom-select-artyst.php">';
//             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/customlselect/CustomlSelect.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.base.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.checkbox.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.fieldset.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.file.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.image.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.password.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.radio.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.reset.js"></script>';
//             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.select.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.submit.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.text.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/cfe/cfe.module.textarea.js"></script>';
             $data['Header'].='<!--[if IE]> <link rel="stylesheet" type="text/css" href="'.base_url().'system/application/views/js/mooplugs/cfe/fixPrematureIE.css" /> <![endif]-->';       
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/swfobject/swfobject.js"></script>';//swfobject_1_5/
	     $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/global.css">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/cfe_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/look_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/visuqo_css.php">';
	     //$data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/global_js.php"></script>';
	     $data['Header'].='<script>'.$this->load->view('js/global_js',null,true).'</script>';
	     $this->load->view('formulaires/InfoArtiste',$data);
    }
}
?>
