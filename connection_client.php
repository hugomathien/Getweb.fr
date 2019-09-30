<?php
session_start();
include('db_connect.php');

if ($_GET['logout'] == "on")
{
session_destroy();
}

if (!empty($_SESSION['idconnect']) AND $_GET['logout'] != "on")
	{
	$class_client = mysql_query ("SELECT * FROM client WHERE id='".$_SESSION['idconnect']."'") or die ('EREUR'.mysql_error() );
	$donnees_client = mysql_fetch_array($class_client);
	
	if ($_GET['page'] == "ma_commande")
	{
	$page = $_GET['page'];
	}
	elseif ($_GET['page'] == "mon_site")
	{
	$page = $_GET['page'];
	$class_realisation = mysql_query ("SELECT * FROM realisation WHERE idclient='".$_SESSION['idconnect']."'") or die ('EREUR'.mysql_error() );
	$donnees_realisation = mysql_fetch_array($class_realisation);
	}
	elseif ($_GET['page'] == "cahier_des_charges")
	{
	$page = $_GET['page'];
		$class_realisation = mysql_query ("SELECT * FROM realisation WHERE idclient='".$_SESSION['idconnect']."'") or die ('EREUR'.mysql_error() );
	$donnees_realisation = mysql_fetch_array($class_realisation);
	}	
	else
	{
	$page = "ma_commande";
	}
	
	}
else
	{
	if (!empty($_POST['login']) AND !empty($_POST['password']))
	{
	
$class_client = mysql_query ("SELECT * FROM client WHERE login='".$_POST['login']."' AND  password='".$_POST['password']."'") or die ('EREUR'.mysql_error() );

if (mysql_num_rows($class_client) > 0)
		{
		$donnees_client = mysql_fetch_array($class_client);
		$_SESSION['idconnect'] = $donnees_client['id'];
		$page = "ma_commande";		
		}
		else
		{
		$page = "connection";
		}
	}
	else
	{
	$page = "connection";
	}
	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Création de site Internet, Agence Multimédia : GetWeb</title>

<META NAME="Description" CONTENT="Nous réalisons votre site Internet clef en main et sur mesure, à partir de 500€. Une solution économique et performante, adaptée à toutes les entreprises, associations ou particuliers.">
<meta name="keywords" content="création, creation, site, internet, projet, entreprise, particulier, association, pme, réalisation, realisation, agence, multimedia, lyon, paris, rhones, alpes, commerce, e-commerce, e commerce, vitrine, clef, en, main, solution">
<!-- BANNIERE -->

<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<!-- ///////////////////////////// -->
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-4187190-1";
urchinTracker();
</script>

<style type="text/css">
<!--
.style1 {
	color: #009900;
	font-weight: bold;
}
.style2 {color: #0000FF}

#lien_cliquez_ici a {font-size: 14px;
color: #009900;
	font-weight: bold;}

label { display:block;
font-size:12px;
width:200px;
height:15px;
float:left;}
.style3 {font-size: 14px}
.style12 {font-size: 14px; color: #FF9933; }

.task {
	height: 61px;  
	clear: both;
	border-top: 1px solid #FFFFFF; 
	border-bottom: 1px solid #D5D5D5; 
	background: #F1F3F5;  
	padding-left: 2px;
	padding-left: 0px;
	font-family:Arial, Geneva, Helvetica, sans-serif;
	font-size:11px;	
}

.task div {
	padding: 1px; 
}

.task div img {
	display: block;
	margin: 2px;
	margin-left: auto;
	margin-right: auto;
	clear: both;
}

.task .enabled, .task .disabled, .hover {
	float: left;
	width: 100px;
	height: 50px;
	margin: 3px 2px;
	text-align: center;
}

.task .enabled {
	cursor: pointer;
	border: 1px solid #D5D5D5;
	color: #333333;
}

.task .disabled {
	border: 1px solid #D5D5D5;
	color: #999999;
}

.task .hover {
	cursor: pointer;
	border: 1px solid #30559C;
	background-color: #EBF1FC;
	color: #333333;
}

-->
</style>
</head>


<body>

<!-- EN TETE -->
<div id="top"> 
<?php include("top.php"); ?>
</div>

<!-- TEXTES DU CENTRE -->

<div id="centre" style="background-color:#202031">




<div class="indice_top"><img src="images/espace_client.gif" alt="nos_services"/></div>
<!-- IMAGES TITRES -->

<?php
if ($page == "connection")
{
?>
<div class="nos_solutions" style="background-color:#202031"><!-- CONNECTION ESPACE CLIENT -->
<table cellspacing="1" cellpadding="6" id="login" align="center" style="color:#cdcfcd;background-color:#3e71ae;border-top:1px solid #fed661;border-left:1px solid #fed661;border-bottom:1px solid #fed661;border-right:1px solid #fed661;">
  <tr>
    <td><img src="images/login2.png" /></td>
    <td id="login_form"><form action="<?php echo $PHP_SELF?>" method="post" enctype="multipart/form-data">
        <table cellpadding="1" style="font-size:13px;">
          <tr>

            <td>Nom d'utilisateur</td>
          </tr>
          <tr>
            <td><input type="text" name="login" /></td>
          </tr>
          <tr>
            <td>Mot de passe</td>
          </tr>

          <tr>
            <td><input type="password" name="password" /></td>
          </tr>
          <tr>
            <td><input type="submit" value="Connection" id="login_button" style="border: 1px solid #FECD38;"/></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
</div>
<div class="nos_offres" style="clear:both;"><!-- NOS OFFRES -->

<img src="images/nos_offres.gif" alt="nos_offres" /><br/>
<a href="images/plaquette_identite.pdf"><img src="images/pack_identite.gif" width="270" alt="pack_identité" border="0"/></a><a href="images/plaquette_interactif.pdf"><img src="images/pack_interactif.gif" width="269" alt="pack_interactif" border="0"/></a><a href="images/plaquette_flash.pdf"><img src="images/pack_flash.gif" width="261" alt="pack_flash" border="0"/></a>

</div>
<!-- PIED DE PAGE -->


<?php
}
elseif ($page == "ma_commande")
{
include ("ma_commande.php");
}
elseif ($page == "mon_site")
{
include ("mon_site.php");
}
elseif ($page == "cahier_des_charges")
{
include ("cahier_des_charges.php");
}
?>


</div>
<div id="bas" align="center"><?php include("bottom.php"); ?></div>

</body>

</html>
