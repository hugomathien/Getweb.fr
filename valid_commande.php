<?php
session_start();
include('db_connect.php');
include_once('fpdf.php');
include('class.mail.php');

function formate_texte($chaine)
	{
	$new_chaine = utf8_decode($chaine);
	return $new_chaine;
	}
	
	
if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['telephone']) AND !empty($_POST['hebergement']))

	{
	$_SESSION['nom'] = htmlspecialchars($_POST['nom']);
	$_SESSION['prenom'] = htmlspecialchars($_POST['prenom']);
	$_SESSION['activite'] = $_POST['activite'];
	$_SESSION['nom_entreprise'] = htmlspecialchars($_POST['nom_entreprise']);
	$_SESSION['secteur_activite'] = htmlspecialchars($_POST['secteur_activite']);
	$_SESSION['type_entreprise'] = htmlspecialchars($_POST['type_entreprise']);
	$_SESSION['offre'] = htmlspecialchars($_POST['offre']);
	$_SESSION['hebergement'] = htmlspecialchars($_POST['hebergement']);
	$_SESSION['but_projet'] = htmlspecialchars($_POST['but_projet']);
	$_SESSION['adresse_site'] = htmlspecialchars($_POST['adresse_site']);
	$_SESSION['assistance'] = htmlspecialchars($_POST['assistance']);
	$_SESSION['introflash'] = htmlspecialchars($_POST['introflash']);
	$_SESSION['referencement'] =htmlspecialchars( $_POST['referencement']);
	$_SESSION['redaction'] = htmlspecialchars($_POST['redaction']);
	
   if (preg_match("#^0[0-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
	{
	$_SESSION['telephone'] = htmlspecialchars($_POST['telephone']);
	}
	else
	{
	}

	if ( preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email']))
	{

	$_SESSION['email'] = htmlspecialchars($_POST['email']);
	}
	else
	{
	}
   

	if ($_SESSION['offre'] == 'identite') 
	{
	$_SESSION['prix_offre_ttc'] = 500;
	}
	elseif ($_SESSION['offre'] == 'interactif') 
	{
	$_SESSION['prix_offre_ttc'] = 700;
	}
	elseif ($_SESSION['offre'] == 'flash') 
	{
	$_SESSION['prix_offre_ttc'] = 900;
	}
	
	$_SESSION['prix_offre_ht'] = $_SESSION['prix_offre_ttc'] * 0.804; 
	
	if ($_SESSION['hebergement'] == 'start') 
	{
	$_SESSION['prix_hebergement_ttc'] = 50;
	}
	elseif ($_SESSION['hebergement'] == 'performance') 
	{
	$_SESSION['prix_hebergement_ttc'] = 120;
	}
	
	$_SESSION['prix_hebergement_ht'] = $_SESSION['prix_hebergement_ttc'] * 0.804; 
	
	$_SESSION['tva_total'] = 19.6*2;
	}
	
elseif (!empty($_SESSION['nom']) AND !empty($_SESSION['telephone']) AND !empty($_SESSION['email']) AND empty($_POST['valider_la_commande']))
	{

	if ($_GET['suppr'] == "assistance")
		{
		$_SESSION['assistance'] = 0;
		$_SESSION['prix_assistance_ttc'] = 0;
		$_SESSION['tva_total'] = $_SESSION['tva_total'] - 19.6;
		}
	elseif ($_GET['suppr'] == "introflash")
		{
		$_SESSION['introflash'] = 0;
		$_SESSION['prix_introflash_ttc'] = 0;
		$_SESSION['tva_total'] = $_SESSION['tva_total'] - 19.6;
		}
	elseif ($_GET['suppr'] == "referencement")
		{
		$_SESSION['referencement'] = 0;
		$_SESSION['prix_referencement_ttc'] = 0;
		$_SESSION['tva_total'] = $_SESSION['tva_total'] - 19.6;
		}
	elseif ($_GET['suppr'] == "redaction")
		{
		$_SESSION['redaction'] = 0;
		$_SESSION['prix_redaction_ttc'] = 0;
		$_SESSION['tva_total'] = $_SESSION['tva_total'] - 19.6;
		}
		else { }
		
	}
	elseif(!empty($_SESSION['nom']) AND !empty($_POST['valider_la_commande']))
	{
	$validation_commande = 1;
	$prix_a_payer = ($_SESSION['prix_offre_ttc'] + $_SESSION['prix_hebergement_ttc'] + $_SESSION['prix_assistance_ttc'] + $_SESSION['prix_introflash_ttc'] + $_SESSION['prix_referencement_ttc'] + $_SESSION['prix_redaction_ttc']);
	}
else
	{
	$champs_vides = 1;
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GetWeb : Agence multimédia, Création de site Internet</title>

<!-- BANNIERE -->

<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>

<!-- ///////////////////////////// -->

<!-- GALERIE DERNIERES CREATIONS -->

<script src="scripts/mootools.v1.11.js" type="text/javascript"></script>
<script src="scripts/jd.gallery.js" type="text/javascript"></script>
<script src="scripts/jd.gallery.set.js" type="text/javascript"></script> 

<!-- //////////////////////////// -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style5 {color: #006699; font-size:12px;}
-->
</style>
</head>

<body>

<!-- EN TETE -->
<div id="top"> 
<?php include("top.php"); ?>
</div>

<!-- TEXTES DU CENTRE -->

<div id="centre">




<div class="indice_top"><img src="images/nos_solutions.gif" alt="nos_services"/></div>
<!-- IMAGES TITRES -->

<div class="nos_solutions"><!-- VALIDATION DE LA COMMANDE -->
<?php 
if (($champs_vides != 1) AND ($validation_commande != 1)  AND !empty($_SESSION['telephone']) AND !empty($_SESSION['email']))
{
?>
<table width='100%' cellspacing='0' cellpadding='3' style='border-collapse:collapse;border: 1px dotted #FECD38;font-size:10px;font-family:Arial;'>

<tr style='background-color:#FFCC66;color:#FFFFFF;font-size: 10px;'>

<th width='25%' class='line_left line_top line_bottom' scope='col' style="border-bottom:1px solid black;"><br>
  <span class="style5">NOM DU PRODUIT</span><br>
  <br></th>


<th width='25%' class='line_top line_bottom' scope='col' align=center style="border-bottom:1px solid black;"> <span class="style5">PRIX HORS TAXE</span></th>

<th class='line_top line_bottom' scope='col' align=center style="border-bottom:1px solid black;"> <span class="style5">TAUX DE TVA</span></th>


<th width='25%' class=' line_top line_bottom' scope='col' style='border-bottom:1px solid black;' align='center'> <span class="style5">TOTAL TTC</span></th>

<th class='line_right line_top line_bottom' scope='col'style="border-bottom:1px solid black;">&nbsp;</th>
</tr>

<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	

<td class='line_left line_bottom'><strong>PACK <?php echo strtoupper($_SESSION['offre']); ?></strong></td>	

<td class='line_bottom' align=center><?php echo $_SESSION['prix_offre_ht']; ?> €</td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><?php echo $_SESSION['prix_offre_ttc']; ?> €</td>
<td class='line_bottom line_right' align=center>&nbsp;</td>
</tr>

<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	

<td class='line_left line_bottom'><strong>HEBERGEMENT <?php echo strtoupper($_SESSION['hebergement']); ?></strong></td>	

<td class='line_bottom' align=center><?php echo $_SESSION['prix_hebergement_ht']; ?> €</td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><span class=" line_bottom"><?php echo $_SESSION['prix_hebergement_ttc']; ?> €</span></td>
<td class='line_bottom line_right' align=center>&nbsp;</td>
</tr>

<?php if (!empty($_SESSION['assistance']))
{
$_SESSION['tva_total'] = $_SESSION['tva_total'] + 19.6;
$_SESSION['prix_assistance_ttc'] = 150;
?>
<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	
<td class='line_left line_bottom'><strong>ASSISTANCE PREMIUM</strong></td>	

<td class='line_bottom' align=center>120.6 € </td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><span class=" line_bottom">150 € </span></td>
<td class='line_bottom line_right' align=center><a href='valid_commande.php?suppr=assistance' ><img src='http://cianeo.fr/asolution_systeme/images/cart_remove.gif' border=0 alt='Enlever article'></a></td>
</tr>

<?php
}
?>
<?php if (!empty($_SESSION['introflash']))
{
$tva_total = $tva_total + 19.6;
$_SESSION['prix_introflash_ttc'] = 100;
?>
<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	
<td class='line_left line_bottom'><strong>INTRODUCTION FLASH<sup>TM</sup></strong></td>	

<td class='line_bottom' align=center>80.4 €</td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><span class=" line_bottom">100 €</span></td>
<td class='line_bottom line_right' align=center><a href='valid_commande.php?suppr=introflash' ><img src='http://cianeo.fr/asolution_systeme/images/cart_remove.gif' border=0 alt='Enlever article'></a></td>
</tr>

<?php
}
?>
<?php if (!empty($_SESSION['referencement']))
{
$tva_total = $tva_total + 19.6;
$_SESSION['prix_referencement_ttc'] = 50;
?>
<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	
<td class='line_left line_bottom'><strong>REFERENCEMENT</strong></td>	

<td class='line_bottom' align=center>40.2 €</td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><span class=" line_bottom">50 €</span></td>
<td class='line_bottom line_right' align=center><a href='valid_commande.php?suppr=referencement'><img src='http://cianeo.fr/asolution_systeme/images/cart_remove.gif' border=0 alt='Enlever article'></a></td>
</tr>

<?php
}
?>
<?php if (!empty($_SESSION['redaction']))
{
$tva_total = $tva_total + 19.6;
$_SESSION['prix_redaction_ttc'] = 50;
?>
<tr class='line_bottom' style='background-color:#B3D3EC;color:black;'>	
<td class='line_left line_bottom'><strong>REDACTION DU CONTENU</strong></td>	

<td class='line_bottom' align=center>40.2 €</td>	
<td class='line_bottom' align=center>19.6%	</td>

<td class=' line_bottom' align='center'><span class=" line_bottom">50 €</span></td>
<td class='line_bottom line_right' align=center><a href='valid_commande.php?suppr=redaction'><img src='http://cianeo.fr/asolution_systeme/images/cart_remove.gif' border=0 alt='Enlever article'></a></td>
</tr>

<?php
}
?>
</table>
<p></p>

<table width="35%" style="float:right;border: 1px dotted #FECD38;background-color:#B3D3EC;">
<td colspan='2' valign=top class='line_top line_bottom line_left' style='padding-left:10px;color:#000066'><br>
<b> Total&nbsp;HT</b><br>
<br><b>Total TVA</b><br><br><b>Total&nbsp;TTC</b><br><br>
  <br>
  <b>Montant final</b><br>
  <br></td>
<td align=right valign=top class='line_top line_bottom line_right' style='padding-right:30px;color:#006699'><br><b><?php echo 0.804*($_SESSION['prix_offre_ttc'] + $_SESSION['prix_hebergement_ttc'] + $_SESSION['prix_assistance_ttc'] + $_SESSION['prix_introflash_ttc'] + $_SESSION['prix_referencement_ttc'] + $_SESSION['prix_redaction_ttc'])." €"; ?>
</b><br><br>
<b><?php echo ((19.6*($_SESSION['prix_offre_ttc'] + $_SESSION['prix_hebergement_ttc'] + $_SESSION['prix_assistance_ttc'] + $_SESSION['prix_introflash_ttc'] + $_SESSION['prix_referencement_ttc'] + $_SESSION['prix_redaction_ttc'])) / 100)." €"; ?></b><br>
<br>
<b><?php echo ($_SESSION['prix_offre_ttc'] + $_SESSION['prix_hebergement_ttc'] + $_SESSION['prix_assistance_ttc'] + $_SESSION['prix_introflash_ttc'] + $_SESSION['prix_referencement_ttc'] + $_SESSION['prix_redaction_ttc'])." €"; ?></b><br>
<br><br>
  <strong><?php echo ($_SESSION['prix_offre_ttc'] + $_SESSION['prix_hebergement_ttc'] + $_SESSION['prix_assistance_ttc'] + $_SESSION['prix_introflash_ttc'] + $_SESSION['prix_referencement_ttc'] + $_SESSION['prix_redaction_ttc'])." €"; ?></strong></td>

</table>

<div style="width:60%">En cliquant sur le bouton &quot;valider votre commande&quot; vous recevrez un <span class="mot_important">récapitulatif de votre commande</span> au format PDF. Un email vous sera adressé afin de vous confirmer la <span class="mot_important">prise en charge et le début de l'audit</span> de votre projet par notre équipe.<br />
    <br />
  Le paiement ne s'effectuera qu'à l'issu de l'attestation par votre part de la mise en ligne de votre site Internet. Getweb vous enverra alors la facture dont vous pourrez vous même vérifier la conformité en la comparant au récapitulatif de votre commande.<br />
</div>

<p>&nbsp;</p>
<div align="center">
  
  <form method="post" name="valider_la_commande">
    <input type="image" src="images/valider.gif" /><input type="hidden" name="valider_la_commande" value="1"/>
	</form>
  </p>
</div>
<?php
} 
elseif ($validation_commande == 1)
{

// -------------------- 1/ GENERATION DU PDF ----------------------


$en_tete = formate_texte("Récapitulatif de votre commande sur GetWeb.fr");
$nom_prenom = formate_texte(html_entity_decode($_SESSION['nom']." ".$_SESSION['prenom']));
$declaration_commande = formate_texte("A effectué en date du ".date('d/m/Y')." la commande des éléments suivants :");


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',18);
$pdf->Cell(190,10,$en_tete,0,1,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',14);

$pdf->Cell(100,5,$nom_prenom,0,1);


if ($_SESSION['activite'] == "particulier")
$pdf_activite = formate_texte("Pour le compte d'un particulier");
elseif ($_SESSION['activite'] == "association")
$pdf_activite = formate_texte("Pour le compte de l'association : ".$_SESSION['nom_entreprise']);
elseif ($_SESSION['activite'] == "entreprise")
$pdf_activite = formate_texte("Pour le compte de l'entreprise : ".$_SESSION['nom_entreprise']);
elseif ($_SESSION['activite'] == "autre")
$pdf_activite = NULL;
else
$pdf_activite = NULL;


$pdf->MultiCell(100,5,html_entity_decode($pdf_activite),0,1);
$pdf->Ln(10);
$pdf->MultiCell(0,5,$declaration_commande,0,1);
$pdf->Ln(5);

$pdf->Cell(0,10,'- PACK '.strtoupper($_SESSION['offre']).' '.$_SESSION['prix_offre_ttc'].' euros TTC' ,0,1, 'L');
$pdf->Cell(0,10,formate_texte('- HEBERGEMENT '.strtoupper($_SESSION['hebergement']).' '.$_SESSION['prix_hebergement_ttc'].' euros TTC (renouvelable chaque année)') ,0,1, 'L');


if (!empty($_SESSION['assistance']))
$pdf->Cell(0,10,formate_texte('- ASSISTANCE PREMIUM '.$_SESSION['prix_assistance_ttc'].' euros TTC (renouvelable chaque année)') ,0,1, 'L');

if (!empty($_SESSION['introflash']))
$pdf->Cell(0,10,'- INTRODUCTION EN FLASH '.$_SESSION['prix_introflash_ttc'].' euros TTC' ,0,1, 'L');

if (!empty($_SESSION['referencement']))
$pdf->Cell(0,10,'- REFERENCEMENT SUR GOOGLE, YAHOO et MSN '.$_SESSION['prix_referencement_ttc'].' euros TTC' ,0,1, 'L');

if (!empty($_SESSION['redaction']))
$pdf->Cell(0,10,'- REDACTION DU CONTENU '.$_SESSION['prix_redaction_ttc'].' euros TTC' ,0,1, 'L');


$pdf->Ln(5);
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(0,5,'Total : '.$prix_a_payer.' euros TTC',0,1);
$pdf->SetFont('Arial','',14);
$pdf->Ln(5);
$pdf->MultiCell(0,5,formate_texte("Ce document est à titre indicatif et ne constitue pas la facture de votre commande. Celle ci vous sera adressée par GetWeb lorsque vous aurez attesté de la mise en ligne du site Internet et de sa conformité à vos attentes."),0,1);


$pdf->Output("pdf/recapitulatif_commande_".$_SESSION['nom']."_".$_SESSION['prenom'].".pdf", "F");

$lienpdf = "pdf/recapitulatif_commande_".$_SESSION['nom']."_".$_SESSION['prenom'].".pdf";


//  ------------- FIN DE LA GENERATION DU PDF -------- //


// -------------- 2/ ENVOI DE L'EMAIL AU CLIENT ET L'ADMINISTRATEUR --------------- //

// EMAIL AU CLIENT
$mail_client = new simplemail;
$mail_client -> addrecipient($_SESSION['email'],$nom_prenom);
$mail_client -> addreplyto('guillaumebonnier@getweb.fr','GetWeb.fr');
$mail_client -> addfrom('guillaumebonnier@getweb.fr','GetWeb.fr');
$mail_client -> addsubject('Votre commande sur GetWeb.fr');


// le message format html
$mail_client -> html =formate_texte("<p>Vous avez effectué récemment une commande auprès de notre site <a href=\"http://www.getweb.fr\">GetWeb.fr</a> et nous vous en remercions.</p><p>Vous pouvez trouver ci-joint à cet email le récapitulatif de votre commande. Notre équipe va rapidement prendre en charge votre projet et vous communiquer par email vos identifiants personnels. Ils vous seront nécéssaires pour accéder à votre espace client et ainsi suivre l'avancée de votre site Internet.</p><p>Cordialement,</p><p>L'équipe de GetWeb.</p>");


// une piece jointe.
$mail_client -> addattachement ( $lienpdf );

$mail_client -> sendmail();

// EMAIL AUX ADMINISTRATEURS

$mail_admin = new simplemail;
$mail_admin -> addrecipient('guillaumebonnier@getweb.fr','Guillaume Bonnier');
$mail_admin -> addbcc('hugomathien@getweb.fr','Hugo Mathien');
$mail_admin -> addfrom('commande@getweb.fr','Getweb.fr');
$mail_admin -> addsubject('Nouvelle commande sur Getweb.fr');


// le message format html
$mail_admin -> html =formate_texte("<p>Une nouvelle commande vien d'être effectuée sur GetWeb.fr Le récapitulatif de la commande est disponible en pièce jointe à cet email. Pour plus de renseignements sur la commande, rendez vous dans le pannel administration du site, partie clients.</p>");


// une piece jointe.
$mail_admin -> addattachement ( $lienpdf );

$mail_admin -> sendmail();

// ---------------- FIN DE L'ENVOI DES EMAILS -------------------


// ---------------- 3/ INSCRIPTION EN BASE DE DONNEES -----------------

mysql_query("INSERT INTO client  VALUES('', '".$_SESSION['nom']."', '" . $_SESSION['prenom'] . "', '" . $_SESSION['email'] . "', '" . $_SESSION['telephone'] . "', '" . $_SESSION['activite'] . "','" . $_SESSION['nom_entreprise'] . "','" . $_SESSION['secteur_activite'] . "', '" . $_SESSION['type_entreprise'] . "', '" . $_SESSION['offre'] . "', '" . $_SESSION['hebergement'] . "', '" . $_SESSION['but_projet'] . "', '" . $_SESSION['adresse_site'] . "', '" . $_SESSION['assistance'] . "', '" . $_SESSION['introflash'] . "', '" . $_SESSION['referencement'] . "', '" . $_SESSION['redaction'] . "',  '" . date('d/m/Y') . "', '" . $prix_a_payer . "','0')") or die ('EREUR'.mysql_error() );

// ---------------- FIN DE L'INSCRIPTION EN BASE DE DONNEES --------

?>
<p align="center" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;margin-top:40px;" class="mot_important"><strong>Votre commande a bien été validée.</strong><br/><a href="<? echo $lienpdf; ?>"><img src="images/telecharger_recap.gif" border="0"/></a></p>
<p style="margin-bottom:40px;">Vous recevrez d'içi peu un courrier éléctronique contenant vos identifiants d'accès à <span class="mot_important">l'éspace client du site.</span> Notre directeur commercial prendra alors contact avec vous pour <span class="mot_important">l'audit de votre projet.</span></p>
<?
session_destroy();
}
elseif ($champs_vides == 1)
{
?>
<p align="center" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;margin-top:40px;margin-bottom:40px;" class="mot_important"><strong>Vous n'avez pas rempli tous les champs obligatoires du formulaire de commande.<br />
  <br/><a href="commander.php" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;text-decoration:underline;" class="mot_important">Cliquez ici pour recommencer</a></strong></p>
<?php } 
elseif (empty($_SESSION['telephone']) AND !empty($_SESSION['email']))
{
?>
<p align="center" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;margin-top:40px;margin-bottom:40px;" class="mot_important"><strong>Le numéro de téléphone indiqué est incorrect.<br />
  <br/><a href="commander.php" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;text-decoration:underline;" class="mot_important">Cliquez ici pour recommencer</a></strong></p>
<?php
} 
elseif (!empty($_SESSION['telephone']) AND empty($_SESSION['email']))
{
?>
<p align="center" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;margin-top:40px;margin-bottom:40px;" class="mot_important"><strong>L'adresse email indiquée est incorrecte.<br />
  <br/><a href="commander.php" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;text-decoration:underline;" class="mot_important">Cliquez ici pour recommencer</a></strong></p>

<?php
}
elseif (empty($_SESSION['telephone']) AND empty($_SESSION['email']))
{
?>
<p align="center" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;margin-top:40px;margin-bottom:40px;" class="mot_important"><strong>L'adresse email indiquée ainsi que le numéro de téléphone sont incorrects.<br />
  <br/><a href="commander.php" style="font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;font-weight:bold;text-decoration:underline;" class="mot_important">Cliquez ici pour recommencer</a></strong></p>

<?php
}
?>

</div>


<div class="nos_offres" style="clear:both;"><!-- NOS OFFRES -->

<img src="images/nos_offres.gif" alt="nos_offres" /><br/>
<a href="images/plaquette_identite.pdf"><img src="images/pack_identite.gif" width="270" alt="pack_identité" border="0"/></a><img src="images/pack_interactif.gif" width="269" alt="pack_interactif" border="0"/><img src="images/pack_flash.gif" width="261" alt="pack_flash" border="0"/>

</div>


</div>


<!-- PIED DE PAGE -->
<div id="bas" align="center"><?php include("bottom.php"); ?></div>

</body>
</html>
