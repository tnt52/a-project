<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script type="text/javascript">
<!--
function compstr(a, b){
return a<b;
}
function comp(a, b){
return (a.match(/[0-9]/g))?((a*1>b*1)?true:false):((compstr(a, b))?true:false);
}
function sortH(id, arrayindex){ //Compatible IE
  //trie les lignes d'un tableau
  var tab=document.getElementById(id);
  var a = tab;
  var i =0, j, k, l, m;
  l= tab.rows.length;
  for (i=1;i<l-1;i++){
    for (j=i+1;j<l;j++){
      if (a.rows[j].cells){
        if (comp(a.rows[j].cells[arrayindex].innerHTML, a.rows[i].cells[arrayindex].innerHTML)){
          for (k=0;k<a.rows[j].cells.length;k++){
            m=a.rows[i].cells[k].innerHTML;
            a.rows[i].cells[k].innerHTML=a.rows[j].cells[k].innerHTML;
            a.rows[j].cells[k].innerHTML=m;
          }
        }
      }
    }
  }
}
/*function sortH(id, arrayindex){
//trie les lignes d'un tableau
var tab=document.getElementById(id);
var a=tab.childNodes[1];
var i=0, j, k, l, m;
l=a.childNodes.length;
for (i=1;i<l-1;i++){
for (j=i+1;j<l;j++){
if (a.childNodes[j].cells){
if (comp(a.childNodes[j].cells[arrayindex].innerHTML, a.childNodes[i].cells[arrayindex].innerHTML)){
for (k=0;k<a.childNodes[j].cells.length;k++){
m=a.childNodes[i].cells[k].innerHTML;
a.childNodes[i].cells[k].innerHTML=a.childNodes[j].cells[k].innerHTML;
a.childNodes[j].cells[k].innerHTML=m;
}
}
}
}
}
}*/

function sortV(id, arrayindex){
//trie les colones d'un tableau
var tab=document.getElementById(id);
var a=tab.childNodes[1];
var i=0, j, k, l, m;
l=a.childNodes[arrayindex].cells.length;
for (i=1;i<l-1;i++){
for (j=i+1;j<l;j++){
if (a.childNodes[j].cells){
if (comp(a.childNodes[arrayindex].cells[j].innerHTML,a.childNodes[arrayindex].cells[i].innerHTML)){
for (k=0;k<a.childNodes[arrayindex].cells.length;k++){
m=a.childNodes[k].cells[i].innerHTML;
a.childNodes[k].cells[i].innerHTML=a.childNodes[k].cells[j].innerHTML;
a.childNodes[k].cells[j].innerHTML=m;
}
}
}
}
}
}

-->
</script>
</head>
<body>
<h1>Fonction générique de tris de tableaux html</h1>
<h2>Ex : classement d'échecs dans un club</h2>
<table class="tableau" id="tableau">
<tbody><tr>
<th onclick="sortH('tableau', 0)">Concurents</th>
<th onclick="sortH('tableau', 1)">partie rapide</th>
<th onclick="sortH('tableau', 2)">partie longue</th>
<th onclick="sortH('tableau', 3)">nombre de victoires dans l'année</th>
<th onclick="sortH('tableau', 4)">nombre de défaites dans l'année</th>
</tr><tr>
<td onclick="sortV('tableau', 1)">Micheline</td>
<td>2412</td>
<td>1956</td>
<td>16</td>
<td>2</td>
</tr><tr>
<td onclick="sortV('tableau', 2)">Jaqueline</td>
<td>1199</td>
<td>1199</td>
<td>3</td>
<td>12</td>
</tr><tr>
<td onclick="sortV('tableau', 3)">Géraldine</td>
<td>1256</td>
<td>1363</td>
<td>5</td>
<td>8</td>
</tr><tr>
<td onclick="sortV('tableau', 4)">Bertran</td>
<td>1567</td>
<td>1612</td>
<td>8</td>
<td>7</td>
</tr>
</tbody>
</table>
<p>Ce fichier contient un exemple (pas forcément compliqué, de niveau disons intermédiaire), de tri de tableau html : on a un tableau html, on le relie � du javascript par un id, et des onclick qui indiquent le tableau qui doit être trié, et la référence de tri...</p>
</body>
</html>