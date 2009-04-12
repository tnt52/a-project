<?php
     class Parseurs extends Model{
       function Parseurs(){
         parent::Model();
       }

       // $Data = String sous la forme $cols.MarqSQLDebData.$data.MarqSQLFinData.MarqSQLDebData...
       // retourne array
       function simpleparseDBout($Data){
                if ($Data==null) return null;
                $v=explode(MarqSQLDebData,$Data);
                return $v;
       }
       function parseDBout($Data){
                if ($Data==null) return null;
                $v=explode(MarqSQLDebData,$Data);
                $v2=array();
                foreach ($v as $value){
                        $v2[]=explode(MarqSQLIntData,$value);
                }
                return $v2;
       }
       function formatInDBduree($min,$sec){
       if ($min=="") $min=0;
       return $min.":".$sec;
       }
       function formatInDBdate($j,$m,$a){
       return $a."-".$m."-".$j;
       }
       function formatOutDBdate($date){
       return $date;
       }
     }
?>