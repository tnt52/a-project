<?class Inquest extends Model{
  function Getmodel(){
    parent::Model();


  }

  function newQ($keyMq,$typeQ,$libelle){
           $table=TableQuestions;
           $data = array(
               'keymembre' => $keyMq ,
               'type' => $typeQ ,
               'libelle' => $libelle
            );
           $query = $this->db->insert($table,$data);
           return $this->db->insert_id(); //retourne keyQ
  }
}
?>