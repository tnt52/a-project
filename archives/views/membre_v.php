<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"><html>
<head>
  <meta http-equiv="CONTENT-TYPE"
 content="text/html; charset=windows-1252">
  <title>Sans Titre</title>
  <meta name="GENERATOR" content="OpenOffice.org 2.3 (Win32)">
  <meta name="CREATED" content="0;0">
  <meta name="CHANGED" content="20080326;21395655">
<script type="text/javascript" src="<?=base_url()?>system/application/views/js/mootools/mootools-release-1.11.js"></script>
<script type="text/javascript" src="<?=base_url()?>system/application/views/js/forms.js"></script>
<script type="text/javascript" src="<?=base_url()?>system/application/views/js/controles.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?=base_url()?>system/application/views/css/forms.css">
<SCRIPT language="JavaScript" type="text/JavaScript">
function send() {
    $('ajaxstatus').className='fondRouge';
    $('ajaxstatus').setText('recording...');
    $('infos_membre').send({onComplete: recfinish});

}
function recfinish(){
     $('ajaxstatus').className='fondVert';
     $('ajaxstatus').setText(this.response.text);
}
function init(){
         var f=$$('input');         //
         $$('div.mail input').each(function(e){
               if (e.name.substr(0,4)=="mail") {
                  e.addEvents({
                    blur: function() {Blur_inpt(this,'yeye@yuyu.yo',testMail.pass(this.value))},
                    focus: function() {Focus_inpt(this,'yeye@yuyu.yo')}
                  });
               }
               e.fireEvent('blur');
         });
         var e=$('cp');
         e.addEvents({
                    blur: function() {Blur_inpt(this,'75552',testCP.pass(this))},
                    focus: function() {Focus_inpt(this,'75552')}
         });
         e.fireEvent('blur');

                  
}
window.addEvent('domready',function(){
        init();
});
</SCRIPT>
</head>
<body>
<div id="ajaxstatus"></div>
<form action="<?=base_url().'index.php/recmember'?>" id="infos_membre" method="post">
<a id="liens"><?echo anchor(base_url().'index.php/password/', 'modifier mon mot de passe', array('target'=>'_self'));?></a>
<div class=pseudo><?=$pseudo?></div><img
 style="border: 0px solid ; width: 32px; height: 128px; float: left;"
 alt="Mon image" src="<?=base_url().images_url.'checkbox2.png'?>"
 name="Image1"><br clear="left">
<br>
voix:<?=$voix?></p>
depuis le <?=$datecrea?>
<p><textarea name="texte" rows="10" cols="50"
 wrap="soft"><?=$texte?></textarea></p>
<p><div class=mail>mail privé:
<input maxlength="50" size="25" name="mailprive" class="oblig" value="<?=$mailpri?>">
(confidentiel, adresse de contact pour arty.st)<span class="mss_oblig"></span>
<br>
mail public:
<input maxlength="50" size="25" name="mailpublic" class="facul" value="<?=$mailpub?>">
(visible par tous les visiteurs)<span class="mss_facul"></span></div>
<br>
</p>
<table style="text-align: left;" border="0"
 cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td width="150">code postal:
        <input maxlength="5" size="5" name="cp" id="cp" value="<?=$cp?>">
      </td>
      <td>
        <input checked="checked" name="visucp" value="1" type="radio">
        <label for="#">public</label><br>
        <input name="visucp" value="0" type="radio">
        <label for="#">privé</label>
      </td>
    </tr>
  </tbody>
</table>
<a href="javascript:send()"><img
 style="border: 0px solid ; width: 32px; height: 128px; float: left;"
 alt="enregister" src="<?=base_url().images_url.'checkbox2.png'?>"
 name="submit"></a>
<p></p>
<div align="right">J'ai exprimé mon gout sur oeuvres<br>
et mon avis sur affirmations
</div>
<p>Répartition des membres selon mes affinités<br>
<br>
<br>
</p>
<table style="page-break-inside: avoid;" border="0"
 cellpadding="0" cellspacing="0" width="275">
  <col width="87">
  <col width="161"><tbody>
    <tr>
      <td bgcolor="#ffffff" width="87">
      <p align="center">En phase</p>
      </td>
      <td bgcolor="#ffffff" width="161">
      <p
 style="background: rgb(255, 255, 255) none repeat scroll 0% 50%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"
 align="center">12 <font style="font-size: 8pt;"
 size="1">membres<br>
(basé
sur 10 échange en moyenne</font></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#ffff99" width="87">
      <p align="center"><br>
      </p>
      </td>
      <td bgcolor="#ffff99" width="161">
      <p align="center">10 <font
 style="font-size: 8pt;" size="1">avec 100
liens</font></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#ff6633" width="87">
      <p align="center"><br>
      </p>
      </td>
      <td bgcolor="#ff6633" width="161">
      <p align="center">5</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#ff0000" width="87">
      <p align="center"><br>
      </p>
      </td>
      <td bgcolor="#ff0000" width="161">
      <p align="center">56</p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#800000" width="87">
      <p align="center"><br>
      </p>
      </td>
      <td bgcolor="#800000" width="161">
      <p align="center"><font color="#ffffff">54</font></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#4c1900" width="87">
      <p align="center"><br>
      </p>
      </td>
      <td bgcolor="#4c1900" width="161">
      <p align="center"><font color="#ffffff">52</font></p>
      </td>
    </tr>
    <tr>
      <td bgcolor="#000000" width="87">
      <p align="center"><font color="#ffffff">Opposé</font></p>
      </td>
      <td bgcolor="#000000" width="161">
      <p align="center"><font color="#ffffff">1</font></p>
      </td>
    </tr>
  </tbody>
</table>
</form>
<p><br>
<br>
</p>
</body>
</html>