<?php
class Checkid extends Model{
       function Getmodel(){
         parent::Model();
       }
       function login($pseudo,$psw){
        $table="authentification";
        $this->db->where('pseudo',$pseudo);
        $q=$this->db->get($table);
        if ($q->num_rows()>0){
           $r=$q->first_row('array');
           if ($r['psw']==$psw) $this->session->set_userdata(array('keyMA'=>$r['cle'],'profil'=>$r['profil']));
        }
        if (!$this->session->userdata('profil')) {
           $this->session->set_userdata('logmss','pseudo/mot de passe erron�');
           //$this->session->userdata('logmss');
           return false;
        }
        else return true;
       }
       function check ($profils){ // array des profils autoris�s     ,$page
         if ($profils!=NULL){
            if (isset($this->session->userdata['profil'])){
              if (in_array($this->session->userdata['profil'], $profils)) return TRUE;
          else {
         $this->session->set_userdata('logmss',"acc�s non autoris�");
         return false;
          }
            }
            else {
               $this->session->set_userdata('logmss',"merci de vous identifiez");
               return false;
               //redirect($page);
            }
         }
         else return TRUE;
       }
       function logout(){
         $this->session->sess_destroy();
         redirect("navigation");
       }
}
?>