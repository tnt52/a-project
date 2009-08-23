<?php
class Navigation extends Controller {
    function Navigation()
    {
        parent::Controller();
        $this->session->set_userdata(array('keyMA'=>1,'profil'=>TMmem));
    }
    
    function index()
    {
             $this->affiche(TQavis);
    }
    function test(){
             $data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-beta-1.2b2-compatible.js"></script>';//mootools-release-1.11.js
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/customlselect/CustomlSelect.js"></script>';
	     $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/flexcroll/flexcroll.js"></script>';
	     $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/js/flexcroll/flexcrollstyles.css">';	     
             $this->load->view('testflexcroll',$data);
    }
    function addflexcroll(){
	$this->load->view('addflexcroll',null);    
    }
    function compte(){
	    $this->load->view('formulaires/InfoArtiste');
    }
    function affiche($cat){
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
             //$data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/global_js.php"></script>';
	     $data['Header'].='<script>'.$this->load->view('js/global_js',null,true).'</script>';
	     $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/cockpit.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/positionnement_js.php"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/liste.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/swfobject/swfobject.js"></script>';//swfobject_1_5/
	     $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/flexcroll/flexcroll.js"></script>';
	     $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/js/flexcroll/flexcrollstyles.css">';
	     $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/global.css">';
	     $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/affimap.css">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/navigation_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/cfe_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/look_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/visuqo_css.php">';
	     
             $data['Footer']="";
             $data['cat']=$cat;
         //    $data['account']=$this->load->view('account',array('login'=>$this->load->view('login',array('page'=>'navigation'),true),'voix'=>10),true);
             $data['panelrep']=$this->load->view('PR',array('keyQ'=>null,'keyM'=>null,'keyMq'=>null,'rep'=>null),true);
             //$data['liste_v']="";//$this->liste_view($cat,true);
             //$data['test']=$this->load->view('oeuvre_v',null,true);
             $this->load->view('arty',$data);
    }
    function repmsel($cat,$keyM,$sel,$limit,$page,$champtri,$senstri){
             if ($sel=="true") $data['reps']=$this->Getlistes->getRepMsel($cat,$keyM,$limit,$page,$champtri,$senstri);
             $data['sel']=$sel;
             $this->load->view("js/majrepmsels_js",$data,false);
    }
    function getTridef($cat){
             $v=array('tri'=>"","sens"=>"ASC");
             switch (floor($cat/20)*20){
                    case TO:$v['tri']="titre";$v['sens']="ASC";break;
                    case TQ:break;
                    default:
                     switch ($cat){
                            case TMmem:$v['tri']="voix";$v['sens']="DESC";break;
                            case TMart: $v['tri']="nom";$v['sens']="ASC";break;
                     }
             }
             return $v;
    }
    function header($cat,$limit=20,$page=1,$tri="",$senstri='ASC'){
             $dir="headers/";
             switch(floor($cat/20)*20){
                    case TO:
                    $data['champs']=array('titre','nom');
                    $data['cols']=array(col_titre,col_nom);
                     switch ($cat){
                            case TOson:
                            $vue="sons_head";
			    $data['libdefO']=lang("lib_chercher")." ".lang("lib_unson");
                            break;
                            case TOimg:
                            $vue="images_head";
			    $data['libdefO']=lang("lib_chercher")." ".lang("lib_uneimage");
                            break;
                            case TOvdo:
                            $vue="videos_head";
			    $data['libdefO']=lang("lib_chercher")." ".lang("lib_unevideo");
                            break;
                            default:
                            $vue="oeuvres_head";
			    $data['libdefO']=lang("lib_chercher")." ".lang("lib_uneoeuvre");
                            break;
                     }
                     break;
                    case TQ:
                     $vue="oeuvres_head";
                     $data['champs']=array('libelle','pseudo','sexe');
                     $data['cols']=array(col_libelle,col_pseudo,col_sexe);
                     break;
                    default:
                     switch ($cat){
                            case TMmem:
                            $vue="membres_head";
                            break;
                            case TMart:
                            $vue="artistes_head";
                            break;
                     }
             }
             $data['cat']=$cat;
             $data['limit']=$limit;
             $data['page']=$page;
             $data['Ntot']=$this->Getlistes->getNtot($cat,$limit);
             $data['Ptot']=ceil($data['Ntot']/$limit);
             $v=$this->getTriDef($cat);
             $v['page']=$page;
             $data['js']=$this->load->view("js/headers_js.php",$v,true);
             $this->load->view($dir.$vue,$data,false);
    }
    function pages($cat,$limit,$page){
             $dir="headers/";
             $v=$this->srchandflds();
             $data['page']=$page;
             $data['Ntot']=$this->Getlistes->getNtot($cat,$limit,$v['search'],$v['fields']);
             $data['Ptot']=ceil($data['Ntot']/$limit);
             $this->load->view($dir."pages",$data,false);
    }
    function player($cat){
             switch ($cat){
                    case TOson:$vue="VQ";break;
                    case TMart:$vue="VA";break;
                    case TMmem:$vue="VM";break;

             }
             $this->load->view($vue,null,false);
    }
    function srchandflds(){
             $search= $this->input->post('tobesearched')==""? false:$this->input->post('tobesearched');
             $fields=explode(",",$this->input->post('searchtables'));
             array_shift($fields);
             $v=array("search"=>$search,"fields"=>$fields);
             return $v;
    }
    function search($cat,$limit,$page,$champtri="",$senstri="ASC"){
             $v=$this->srchandflds();
	     $addvars=$this->input->post('addvars'); // Type Aff pour LM, keyMsel pour liste
             $this->liste_view($cat,$limit,$page,$champtri,$senstri,$v['search'],$v['fields'],$addvars,false);
    }
    function liste_view($cat,$limit,$page,$champtri="",$senstri="ASC",$search=false,$fields=null,$addvars,$readjs=false){
	    if ($cat==null) return;
             $dir="listes/";
             $vue="";
             if ($champtri=="") $v=$this->getTriDef($cat);
             else $v=array('tri'=>$champtri,"sens"=>$senstri);
             switch(floor($cat/20)*20){
                case TO:
                     $data=$this->Getlistes->getoeuvres($cat,$page,$limit,$v['tri'],$v['sens'],$addvars,$search,$fields);$vue="oeuvres_v";
                     $data['champs']=array('titre','nom');
                     $data['cols']=array(col_titre,col_nom);
                     break;
                case TQ:
                     $data=$this->Getlistes->getquestions($cat,$page,$limit);$vue="oeuvres_v";
                     $data['champs']=array('libelle','pseudo','sexe');
                     $data['cols']=array(col_libelle,col_pseudo,col_sexe);
                     break;
                case TS:
                     $data=$this->Getlistes->getoeuvres($cat,$page,$limit,$v['tri'],$v['sens'],$addvars,$search,$fields);$vue="oeuvres_v";
                     $data['champs']=array('titre','nom');
                     $data['cols']=array(col_titre,col_nom);
                     break;
                default:
                     switch ($cat){
                            case TMmem:
                            $data=$this->Getlistes->getmembres($page,$limit,$v['tri'],$v['sens'],$search,$addvars);
                            $vue="membresdivtable_v";
                            break;
                            case TMart:
                            $data=$this->Getlistes->getartistes($page,$limit,$v['tri'],$v['sens'],$search,$fields);
                            $vue="artistes_v";
                            break;
                     }
             }
             if ($vue!=""){
                $data['script']="";//$this->load->view('js/liste.js',null,true);
                $data['page']=$page;
                $data['cat']=$cat;
                //$data['visuq']=$this->load->view('son_v',null,true);
                return $this->load->view($dir.$vue,$data,$readjs);
             }
             return "";
    }
    function affinites(){
             $data['w']=300;
             $vue="affimap";
	     $keyMA=$this->session->userdata('keyMA');
	     $typeA=TAglo;
	     $zoom=null;
             $affs=$this->Getlistes->getaffinites($keyMA,$typeA,$zoom);
             /*$affs=array(
             array("keyobjet"=>2,'affglobal'=>10,'liens'=>5),
             array("keyobjet"=>3,'affglobal'=>20,'liens'=>15),
             array("keyobjet"=>4,'affglobal'=>-40,'liens'=>25),
             array("keyobjet"=>5,'affglobal'=>99*ValBigS*ValBigS,'liens'=>100),
             array("keyobjet"=>6,'affglobal'=>-99*ValBigS*ValBigS,'liens'=>100),
             );*/
             sort($affs,SORT_NUMERIC);
             $data['affinites']=$affs;
             return $this->load->view($vue,$data,false);
    }
    function affimap($typeA,$zoom,$w){
             //$keyMA=$this->session->userdata('keyMA');
             //$keyMA=$this->session->set_userdata('keyMA');
             //$im=$this->loadimg($_GET['str']);
             //$affs=$this->Getlistes->getaffinites($keyMA,$typeA,$zoom);
             $affs=array(
             array("keyobjet"=>2,10,5),
             array("keyobjet"=>3,20,15),
             array("keyobjet"=>4,-40,25),
             array("keyobjet"=>5,99*ValBigS*ValBigS,100),
             array("keyobjet"=>6,-99*ValBigS*ValBigS,100),
             );
             sort($affs,SORT_NUMERIC);//croissant*/
             $im=$this->nuagepoints($affs,$zoom,$w);
             imagegif($im);
    }

    function more($cat,$cle,$visu=0,$type=null){//$type=>artiste ou membre
              $data=$this->Getlistes->getmore($cat,$cle,$type);
              if ($visu==1) $data['vmore']=0;
              else $data['vmore']=1;
              switch ($cat){
                     case TOson:$vue="oeuvre_v";break;
                     case TQavis:$vue="avis_v";break;
                     case TQgout:$vue="avis_v";break;
                     case TMart:$vue="artiste_v";break;
                     case TMmem:$vue="membre_v";break;
                     default:$vue="oeuvre_v";break;
              }
              $this->load->view($vue,$data);
    }
    function idMA(){
             $this->Checkid->check(null); // A modif par profil array(profmembre,profartiste)
             $data=$this->Getlistes->getmore(TMmem,1,TMart); // A modif par user_data cle et user_data type
             $this->load->view("idma",$data);
    }
    function viewPR($keyQ,$keyMq,$rep){
             return "";
             return $this->load->view("PR",array('keyQ'=>$keyQ,'keyMq'=>$keyMq,'rep'=>$rep),true);
    }
    /*function artiste($cle){
             $this->more(TMart,$cle);
    } */
    function deconnexion(){
             $this->Checkid->logout();
    }
}
/*function panelreponse(){
      $data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-release-1.11.js"></script>';
      $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/customFormElements.js"></script>';
      $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/customFormElements.css">';
      $this->load->view('PR',array('keyQ'=>null,'keyM'=>null,'keyMq'=>null,'rep'=>null,'header'=>$data['Header']),false);
    } */
/*function nuagepoints($affs,$zoom,$w){
        /*$im=imageCreate($w,$w);
        $bg=imagecolorallocate($im,0,0,0);
        $red=imagecolorallocate($im,255,0,0);
        $spots=$red;//imagecolorallocate($im,0,0,0);
        $CoulZones[0]=imagecolorallocate($im,255,255,255);
        $CoulZones[1]=imagecolorallocate($im,156,156,156);
        $CoulZones[2]=imagecolorallocate($im,104,104,52);
        $CoulZones[3]=imagecolorallocate($im,52,104,104);
        $CoulZones[4]=imagecolorallocate($im,26,52,52);
        $CoulZones[5]=imagecolorallocate($im,0,26,26);
        //$Diam=array(6);
        for ($i=5;$i>-1;$i--){
            ImageFilledEllipse($im,$w/2,$w/2,$w*(1+$i)/6,$w*(1+$i)/6,$CoulZones[$i]);
        }
        imageellipse($im,$w/2,$w/2,$w/3,$w/3,$red);

        $im=$this->loadimg("system/application/images/7zones.gif");
        $image_src=$this->loadimg("system/application/images/spot.gif");
        $taux=100;
        $size= getimagesize("system/application/images/spot.gif");//list($width, $height, $type, $attr)
        $Amax = 99*ValBigS*ValBigS;     //Vérif nbre de reponse de MA pour augmenter eventuellement.
        $i=0;
        //imagecopymerge($im, $image_src, 50, 50, 0, 0,20, 20, 100);
        //echo print_r($affs);
        foreach($affs as $A){
                      $A=array_values($A);
                      //echo "w:$w  A:".$A[1];
                      $d=$w*(1-$A[1]/$Amax)/2;
                      //echo "d:$d";
                      //$CoulZones[floor(6-$d/$w)];
                      $x=($w-$d*sin(2*pi()*$d/20))/2;   //spirale
                      $y=($w-$d*cos(2*pi()*$d/20))/2;
                      //echo "x:$x   y:$y<br>";                     //width    height
                      imagecopymerge($im, $image_src, $x, $y, 0, 0, $size[1], $size[2], $taux);
                      imagestring($im, 1, 5, 5, "Erreur de chargement de l'image $imgname", $tc);
                      //ImageFilledEllipse($im,$x,$y,10,10,$spots);
                      $i++;
        }
        return $im;
    }
    function loadimg($imgname) {
             //echo $imgname;
             $im = imagecreatefromgif($imgname);
             if (!$im) {
               $im = imagecreatruecolor(150, 30);
               $bgc = imagecolorallocate($im, 255, 255, 255);
               $tc  = imagecolorallocate($im, 0, 0, 0);
               imagefilledrectangle($im, 0, 0, 150, 30, $bgc);
           // Affichage d'un message d'erreur
               imagestring($im, 1, 5, 5, "Erreur de chargement de l'image $imgname", $tc);
             }
             return $im;
    }*/
?>