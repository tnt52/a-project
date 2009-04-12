<?php
class Inmem extends Model{


  function Getmodel(){
    parent::Model();


  }
  function majmem($keyM,$profil,$mailpri,$mailpub,$texte,$cp,$visucp){
        $table="";
        switch ($profil){
               case TMmem: $table="membres";break;
               case TMart: $table="artistes";break;
        }
        $this->db->set(array(
                'mailpri'=>$mailpri,
                'mailpub'=>$mailpub,
                'texte'=>$texte,
                'cp'=>$cp,
                'visucp'=>$visucp
        ));
        $this->db->where('cle',$keyM);
        $this->db->update($table);
  }

}
?>