<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sans Titre</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="HAPedit 3.1">
</head>
<body bgcolor="#FFFFFF">
<form id="login" action="<?=base_url()?>index.php/identify" method="post">
<input type="hidden" name="page" value="<?=$page?>">
<input type="text" id="login">
<input type="password" id="psw">
<?=$this->session->userdata('logmss')?>
<input type="submit">
</form>
<?=anchor('navigation/deconnexion/', 'se déconnecter')?>
</body>
</html>