<?php
     class Parseurs extends Model{
       function Parseurs(){
         parent::Model();
       }
       function parseSQLout($Data){
                if ($Data==null) return null;
                $v=explode(MarqSQLDeb,$Data);
                $v2=array();
                foreach ($v as $value){
                        $v2[]=explode(MarqSQLInt,$value);
                }
                return $v2;
       }
       function formatSQLduree($min,$sec){
       if ($min=="") $min=0;
       return $min.":".$sec;
       }
       function formatSQLdate($j,$m,$a){
       return $a."-".$m."-".$j;
       }
     }
?>