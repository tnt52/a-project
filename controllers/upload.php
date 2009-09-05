<?
class Upload extends Controller {
    function Upload()
    {
        parent::Controller();
        $this->session->set_userdata(array('keyMA'=>1,'profil'=>TMart));
    }
    
    function index()
    {	
	$keyM=$this->session->userdata('keyMA');
	$champs=$this->input->post('champs');
	$file="fichier";
	echo var_dump($_FILES);
	if ($champs=="imageart") {
		$conn_id=conFTP();		
		$dir="www/system/application/catalogue/5";//DirBaseFTP.DirCatalogue.$keyM."/";
		if(!is_dir($dir)){
			//echo "$dir test".var_dump(is_dir($dir));
		    ftp_mkdir ($conn_id,$dir);
		}
		$Filtre = array('jpg', 'jpeg','gif','tif','tiff','png','bmp');// //		
		$erreur=upload($_FILES[$file],$Filtre,$conn_id,$dir);// A placer avant en Prod!!-->Alim DB après load		
		//$this->load->view('formulaires/InfoArtiste',$data);	
	}
	if ($champs=='Oson'){
		if(!is_dir(DirBase.DirCatalogue.$keyM."/")){// Modifier pour ne créer que les DirOeuvres et DirAgenda
		    ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/");
		    ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/".DirOeuvres);
		    while (list($key, $val) = each(getDirOeuvres()))
			  ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/".$val);
		}
	}
	/*$keyM= $this->session->userdata();//$_SESSION['keyM'];
	//$keyM=3;
	//$typeDir=TypeQson;
	$titre=$this->input->post('InpTitreO');
	$nomM=$this->input->post('nomM');
	$joeuvre=$this->input->post('JJoeuvre');
	$moeuvre=$this->input->post('MMoeuvre');
	$aoeuvre=$this->input->post('AAAAoeuvre');
	$mn=$this->input->post('mn');// //
	$sec=$this->input->post('sec');// //
	$typeoeuvre=$this->input->post('selectart');
	$genre=$this->input->post('selectgenre');
	$descr=$this->input->post('description');
	$parmax=$this->input->post('parmax');
	$par=array();
	for ($i=0;$i<$parmax;$i++){
	    if ($this->input->post('par'.$i)!="" || $this->input->post('role'.$i)!=""){
		echo "par:$i";
		$par[$i]=array($this->input->post('par'.$i),$this->input->post('role'.$i));
	    }
	}
	$file='fichier';
	$file2='image';
	$queryString="INSERT INTO ".TableOeuvres." (titre,keymembre,nomM,typeM,type,dateoeuvre,dimensions,keygenre,description,par,image,fichier,
	datecrea) VALUES ('".echap($titre)."',$keyM,'".echap($nomM)."',".TypeMart.",$typeoeuvre,'".formatSQLdate($joeuvre,$moeuvre,$aoeuvre)."','".
	formatSQLduree($mn,$sec)."',$genre,'".echap($descr)."','".parseDataInSQL($par)."','".
	renameFile(basename($_FILES[$file]['name']))."','".renameFile(basename($_FILES[$file2]['name']))."',".MajDate.")";
	echo $queryString;
	$connexion=ConDB();
	echo mysql_query($queryString,$connexion);
	mysql_close($connexion);
	$conn_id=conFTP();
	if(!is_dir(DirBase.DirCatalogue.$keyM."/")){// Modifier pour ne créer que les DirOeuvres et DirAgenda
	    ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/");
	    ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/".DirOeuvres);
	    while (list($key, $val) = each(getDirOeuvres()))
		  ftp_mkdir ($conn_id,DirBaseFTP.DirCatalogue.$keyM."/".$val);
	}
	$dir=DirBase.DirCatalogue.$keyM."/".DirSon.echap($titre);
	if(!is_dir($dir){
	    ftp_mkdir ($dir);
	}
	$Filtre = array('mp3', 'avi','ram');// //
	$_FILES[$file2]['name']="minie_".$_FILES[$file2]['name'];
	$erreur=upload($_FILES[$file],$Filtre,$conn_id,$dir);// A placer avant en Prod!!-->Alim DB après load
	$erreur2=upload($_FILES[$file2],array('gif', 'jpg','jpeg'),$dir);
	$this->load->view('formulaires/InfoArtiste',$data);*/
    }
}
?>
