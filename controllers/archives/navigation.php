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
             $this->affiche(TQavis);
    }
    function affiche($cat){
             $data['Header']='<script type="text/javascript" src="'.base_url().'system/application/views/js/basics.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/constantes_js.php"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mootools/mootools-release-1.11.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/mooplugs/customFormElements.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/cockpit.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/positionnement_js.php"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/liste.js"></script>';
             $data['Header'].='<script type="text/javascript" src="'.base_url().'system/application/views/js/swfobject/swfobject.js"></script>';//swfobject_1_5/
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/navigation_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/customFormElements_css.php">';
             $data['Header'].='<link rel="stylesheet" type="text/css" media="screen" href="'.base_url().'system/application/views/css/visuqo_css.php">';
             $data['Footer']="";
             $data['cat']=$cat;
             $data['account']=$this->load->view('account',array('login'=>$this->load->view('login',array('page'=>'navigation'),true),'voix'=>10),true);
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
    function header($cat,$limit=20,$page=1,$rangtris=0,$senstris='asc'){
             $dir="headers/";
             switch(floor($cat/10)*10){
                    case TO:
                     $vue="oeuvres_head";
                     $data['champs']=array('titre','nom');
                     $data['cols']=array(col_titre,col_artiste);
                     break;
                    case TQ:
                     $vue="oeuvres_head";
                     $data['champs']=array('libelle','pseudo','sexe');
                     $data['cols']=array(col_libelle,col_pseudo,col_sexe);
                     break;
             }
             $this->load->view($dir.$vue,$data,false);
             $data['cat']=$cat;
             $data['limit']=$limit;
             $data['page']=$page;
             $data['Ptot']=$this->Getlistes->getPtot($cat,$limit);
             $this->load->view($dir."pages",$data,false);
    }
    function player($cat){
             switch ($cat){
                    case TOson:
                         $vue="VQ";break;
             }
             $this->load->view($vue,null,false);
    }
    function search_liste($cat,$limit,$page,$champtri,$senstri,$keyMsel=-1){
             $search=$this->input->post('tobesearched');
             $search= $search=""? false:$search;
             $inQO=true;$inAM=true;
             if ($search!=false){
                $inQO= $this->input->post('inQO')=="on"? true:false;
                $inAM= $this->input->post('inAM')=="on"? true:false;
             }
             //echo "search:$search inQO:$inQO  inAM:$inAM";
             $this->liste($cat,$limit,$page,$champtri,$senstri,$keyMsel,$search,$inQO,$inAM);
    }
    function liste($cat,$limit,$page,$champtri,$senstri,$keyMsel=-1,$search=false,$inQO=true,$inAM=true){
             //$champtri=explode('-',$champtri);
             //$senstris=explode('-',$senstris);
             $this->liste_view($cat,$limit,$page,$champtri,$senstri,$keyMsel,false,$search,$inQO,$inAM);
    }
    function liste_view($cat,$limit,$page,$champtri,$senstri,$keyMsel,$readjs,$search,$inQO,$inAM){
             if ($cat==null) return;
             $dir="listes/";
             $vue="";
             switch(floor($cat/10)*10){
                case TO:
                     $data=$this->Getlistes->getoeuvres($cat,$page,$limit,$champtri,$senstri,$keyMsel,$search,$inQO,$inAM);$vue="oeuvres_v";
                     $data['champs']=array('titre','nom');
                     $data['cols']=array(col_titre,col_artiste);
                     break;
                case TM:
                     $data=$this->Getlistes->getmembres($page,$limit,$champtri,$senstri);
                     $vue="membres_v";break;
                case TQ:
                     $data=$this->Getlistes->getquestions($cat,$page,$limit);$vue="oeuvres_v";
                     $data['champs']=array('libelle','pseudo','sexe');
                     $data['cols']=array(col_libelle,col_pseudo,col_sexe);
                     break;
                case TS:
                     $data=$this->Getlistes->getsons($page,$limit,-1);$vue="oeuvres_v";
                     $data['champs']=array('titre','nom');
                     $data['cols']=array(col_titre,col_artiste);
                     break;

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
             //$affs=$this->Getlistes->getaffinites($keyMA,$typeA,$zoom);
             $affs=array(
             array("keyobjet"=>2,'affglobal'=>10,'liens'=>5),
             array("keyobjet"=>3,'affglobal'=>20,'liens'=>15),
             array("keyobjet"=>4,'affglobal'=>-40,'liens'=>25),
             array("keyobjet"=>5,'affglobal'=>99*ValBigS*ValBigS,'liens'=>100),
             array("keyobjet"=>6,'affglobal'=>-99*ValBigS*ValBigS,'liens'=>100),
             );
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

    function more($cat,$cle){
              $data=$this->Getlistes->getmore($cat,$cle);
              switch ($cat){
                     case TOson:$vue="oeuvre_v";break;
                     case TQavis:$vue="avis_v";break;
                     case TQgout:$vue="avis_v";break;
                     case TMmem:$vue="membre_v";break;
                     default:$vue="oeuvre_v";break;
              }
              $this->load->view($vue,$data);
    }
    function viewPR($keyQ,$keyMq,$rep){
             return "";
             return $this->load->view("PR",array('keyQ'=>$keyQ,'keyMq'=>$keyMq,'rep'=>$rep),true);
    }

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