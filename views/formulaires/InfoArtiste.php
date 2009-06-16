<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Mon compte</title>
	<?=$Header?>
	<SCRIPT>
	
	var cfe = new cfe.base();
	window.addEvent('domready', function(){
	    //cfe.init({scope:null ,spacer: "http://127.0.0.1/system/application/images/spacer.gif", toolTips: true, toolTipsStyle: "normal"});    
	});
	/*
	types {0=>imageArtiste,1=>Oson,2=>Oimg=>,3=>Otxt,4=>Ovdo
	*/
	function upload(champs){
		var libelle="";
		switch (champs){
		case 0:
			$('champs').value="imageart";
			libelle="S�lectionner un fichier image (jpeg,gif,png,tiff,bmp) < 1 MO";
			break;
		case 1:
			break;
		case 2:
			break;
		case 3:
			break;
		case 4:
			break;		
		}
		$('libUPL').set('hmtl',libelle);
		DIVdevant($('uploader'));
	}
	
	function load(form){
		document.write("test");
		new Request.HTML({
		 url: urlbase+'index.php/upload',
		 update: $('libUPL'),
		 onComplete: function () {}
		 }).post($(form));
	}	
	</SCRIPT>
</head>
<body>
<DIV id="uploader" class="derriere">
	<form id="formUPL" name="formUPL" enctype="multipart/form-data" method="post" action="#" onsubmit="new Request.HTML({
		 url: urlbase+'index.php/upload',
		 update: $('libUPL'),
		 onComplete: function () {}
		 }).post(this);StopEvent(event);">
		<input type="hidden" name="champs" id="champs" value=""/>
		<input type="file" name="fichier" id="fichier"/>
		<input type="submit" />
	</form>
	<DIV id="libUPL"></DIV>
</DIV>
Ludo228 <a>se déconnecter</a>
raymond@yesterday.tv
<a href="PUMMP.php">modifier les infos de connexion</a>
<!--<form id="form1" name="form1" enctype="multipart/form-data" method="post" action="">-->
  <label for="avatar"></label><p><img src="<?=base_url()?>system/application/images/AvatarDef.gif" width="70" height="70" />
  <a href="javascript:upload(0);">Modifier l'image</a>
  <!--<input type="file" name="imageArtiste" id="imageArtiste" style="" size=2 />-->
  <p>Les Coeurs de Barbarie
    <label for="Nom"></label>
    <input type="text" name="Nom" id="Nom" />
  </p>
  <p>site: http://
    <label for="website"></label>
    <input type="text" name="website" id="website" />
</p>
  <a>ajouter site</a>
  <a>supprimer site</a>
  <p>
    raymond@chez.toi 
    <input type="text" name="mailAnnuaire" id="mailAnnuaire" />
    <label for="mailartiste"></label>
    <select name="mailartiste" id="mailartiste">
    <option value="none">none</option>
    <option width="" value="idem">idem1</option>
    <option width="" value="idem">idem2</option>
    </select>
  </p>
  <a>ajouter mail</a>
  <a>supprimer mail</a>
  <p>    
    <label for="texteA"></label>
    <textarea name="texteA" id="texteA" cols="45" rows="5"></textarea>
  </p>
  <p>
    <input type="submit" name="Valid" id="Valid" value="Submit" />
  </p>
  <p>Mes Oeuvres</p>
  <p>Gérer</p>
  <p>X  sons</p>
  <p>
    <?
  foreach($artistson as $key=>$val) {		  
					  echo"\n";
					  echo '<div class="checkbox">';// onChange="selecArt('.$key.');"
					  echo '<input type="checkbox" name="'.$val.'" value="'.$key.'" onChange="clickArt(this);" onClick="selecArt(this);"><label for="#">'.$val.'</label>';
					  echo '</div>';
				  }
   ?>
  </p>
  <p><a href="NewSon.php">
    <label for="ajoutson">ajouter</label>
    <input type="file" name="ajoutson" id="ajoutson" />
  </a></p>
  <p>X types d'Images</p>
  <p>
    <? //echo'<div class="block">';
			  foreach($artistimg as $key=>$val) {		  
				  echo"\n";
				  echo '<div class="checkbox">';// onChange="selecArt('.$key.');"
				  echo '<input type="checkbox" name="'.$val.'" value="'.$key.'" onChange="clickArt(this);" onClick="selecArt(this);"><label for="#">'.$val.'</label>';
				  echo '</div>';
			  }
  ?>
  </p>
  <p>X types de Textes</p>
  <p>
    <? //echo'<div class="block">';
			  foreach($artisttxt as $key=>$val) {		  
				  echo"\n";
				  echo '<div class="checkbox">';// onChange="selecArt('.$key.');"
				  echo '<input type="checkbox" name="'.$val.'" value="'.$key.'" onChange="clickArt(this);" onClick="selecArt(this);"><label for="#">'.$val.'</label>';
				  echo '</div>';
			  }
  ?>
  </p>
  <p>X types de Videos</p>
  <p><font color="#FFFFFF">
    <? //echo'<div class="block">';
			  foreach($artistvdo as $key=>$val) {		  
				  echo"\n";
				  echo '<div class="checkbox">';// onChange="selecArt('.$key.');"
				  echo '<input type="checkbox" name="'.$val.'" value="'.$key.'" onChange="clickArt(this);" onClick="selecArt(this);"><label for="#">'.$val.'</label>';
				  echo '</div>';
			  }?>
  </font></p>
  <p>X autres types</p>
  <p><font color="#FFFFFF"><? echo '<table cellspacing="0" cellpadding="0"><tr><td><div class="checkbox"><font color="#FFFFFF">';
			  echo '<input type="checkbox" name="artistes" value="99" onClick="selecArt(this);"><label for="#"></label></font></div></td>';	
			  echo '<td><input class="disabled" name="autreart" type="text" id="autreart" readonly="true" value="Un autre artiste?" size="15" maxlength="25" onFocus="javascript:this.select();"></td></tr></table>';
			  echo "\n";?></font></p>
  <p>Mes Critères</p>
  <p>ajouter</p>
  <p><a href="Activities.php"><em>Vous avez ciblé dans 152 offres</em></a></p>
  <p>Animation bar, restaurant</p>
  <p>tarif horaire &gt;50€ et total &gt;300€</p>
  <p>modifier supprimer</p>
  <p>Mobile sur la France</p>
  <p>modifier</p>
  <p>Mes cours</p>
  <p>ajouter</p>
  <p>Cours de guitare<br />
  100 €/8heures<br />
  Paris + petite couronne</p>
  <p>&nbsp;</p>
  <p>inscrit le 12/01/2009</p>
<!--</form>-->
</body>
</html>
