<?php
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
       $mois="";
       switch (date('n',$date)){
              case 2:$mois="fév";break;
              case 3:$mois="avr";break;
              case 5:$mois="mai";break;
              case 6:$mois="juin";break;
              case 7:$mois="juil";break;
              case 8:$mois="août";break;
              default: $mois=strtolower(date('M',$date));break;
       }
       $j=date('j',$date);
       //$j= $j==1? "1er":$j;
       return $j." $mois ".date('Y',$date);
       }
?>