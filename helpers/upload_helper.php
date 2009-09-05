<?
define("DirBase","D://0 - PlebiSite/www/arty.st/");
define("DirBaseFTP","http://www/arty.st/");
define("DirCatalogue","system/application/catalogue/");
define("DirMinies","Minies/");
define("DirOeuvres","Oeuvres/");
function getDirOeuvres(){// en cas de besoin inclure Types.php dans appelant
      return array("TXT/","SON/","VDO/","IMG/");
}
function conFTP(){
         $ftp_server='ftp.arty.st';
         $ftp_user_name='arty_st';
         $ftp_user_pass='HYIHcvq';
         $conn_id = ftp_connect($ftp_server);
         $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
         return $conn_id;
}
function renameFile($file){
         // formatage nom fichier
         // enlever les accents
         $file = strtr($file,
         'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
         'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
         // remplacer les caracteres autres que lettres, chiffres et point par _
         $file = preg_replace('/([^.a-z0-9]+)/i', '_', $file);
         if (strlen($file)>50) $file=substr_replace($file, '--',35,strlen($file)-48);
         return $file;
}
function echap($string){
  $repl=array("'"=>"''");
  return strtr($string,$repl);
}
function upload($input,$filtre,$destdir){
  $erreur="";
  if(isset($input)){
         //echo "\n Files[".$input."][name] : ";
         //echo $input['name'];
         //echo "\n Files[".$input."][tmp_name] : ";
         $tmpfile=$input['tmp_name'];//echo
         //echo "\n Files[".$input."][type] : ";
         //echo $input['type'];
         //echo "\n Files[".$input."][size] : ";
         //echo $input['size'];
         //echo "\n Files[".$input."][error] : ";
         if ($input['error']) {
                   switch ($input['error']){
                            case 0: break;//OK
                            case 1: // UPLOAD_ERR_INI_SIZE
                            echo"Le fichier dépasse la limite autorisée par le serveur (fichier php.ini) !";
                            break;
                            case 2: // UPLOAD_ERR_FORM_SIZE
                            echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !";
                            break;
                            case 3: // UPLOAD_ERR_PARTIAL
                            echo "L'envoi du fichier a été interrompu pendant le transfert !";
                            break;
                            case 4: // UPLOAD_ERR_NO_FILE
                            echo "Le fichier que vous avez envoyé a une taille nulle !";
                            break;
                   }
         }
         $fileinit=$input['name'];
         $ext = substr(strrchr($fileinit, '.'), 1);
         if (!(in_array( $ext, $filtre))){
            $erreur .="Seuls les fichiers ";
            while (list($key, $val) = each($filtre)) $erreur.=$val." ";
            $erreur .="sont supportés";
         }
         $taille_max = MaxUpload;
         if( file_exists($tmpfile) and filesize($tmpfile) > $taille_max)
             $erreur .= 'Votre fichier doit faire moins de'.$taille_max;
         // copie du fichier
         //echo "COPIE";
         if($erreur=="") {//A MODIF
         $dest_dossier = $destdir;
         $dest_fichier=renameFile(basename($fileinit));
         //echo"depart:".$tmpfile;
         //echo "destination:".$dest_dossier.$dest_fichier;
         if (is_uploaded_file($tmpfile)) {
            $conn_id=conFTP();
      //      move_uploaded_file($input['tmp_name'],$dest_dossier.$dest_fichier);
            if (ftp_put($conn_id,$dest_dossier.$dest_fichier,$tmpfile,FTP_BINARY)) {
            echo "Le fichier $fileinit a été chargé avec succès\n";
            } else echo "Il y a eu un problème lors du transfert sur le serveur de $fileinit\n";
            // Fermeture de la connexion
            ftp_close($conn_id);
         } else {
                echo "Attaque possible par téléchargement de fichier : ";
                echo "Nom du fichier init: $fileinit |temp: $tmpfile ";
           }
         }
  } else echo "Pas de param file";
  return $erreur;
}
?>