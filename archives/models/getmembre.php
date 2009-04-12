<?php
class Getmembre extends Model{
       function Getmodel(){
         parent::Model();
       }
       function infos($keyMA,$profil){
        $table="";
        switch ($profil){
               case TMmem: $table='membres';break;
               case TMart: $table='artistes';break;
        }
        $this->db->from($table);
        $this->db->where('cle',$keyMA);
        $r=$this->db->get();
        $a=$r->first_row('array');
        $a['mailpri']='mailprivearty.st';
        $a['mailpub']='mailpublic@arty.st';
        return $a;
       }
}
?>