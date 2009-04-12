<?class Inglob extends Model{


  function Getmodel(){
    parent::Model();


  }

  function insertupdate($table,$conditions,$champsins,$valins,$champvalmaj){// Pour gerer MySQL avant 4.1 sans DUPLICATE
           $this->db->where($conditions);
           echo $conditions;
           if ($this->db->count_all_results($table)>0){
              $querystr="UPDATE $table SET $champvalmaj WHERE $conditions";
           }
           else {
              $querystr="INSERT INTO $table ($champsins) VALUES ($valins)";
           }
           $query = $this->db->query($querystr);
  }
}
?>