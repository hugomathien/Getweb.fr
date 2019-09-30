<?php session_start();
include('db_connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Commandez dès maintenant un site internet "clef en main" : Getweb</title>
<meta name="keywords" content="création, creation, site, internet, projet, entreprise, particulier, association, pme, réalisation, realisation, agence, multimedia, lyon, paris, rhones, alpes, commerce, e-commerce, e commerce, vitrine, clef, en, main, solution">
<META NAME="Description" CONTENT="Commandez dès maintenant et obtenez un site clef en main répondant à toutes vos attentes.">
<!-- BANNIERE -->

<script type="text/javascript">AC_FL_RunContent = 0;</script>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>

<!-- ///////////////////////////// -->

<!-- GALERIE DERNIERES CREATIONS -->

<script src="scripts/mootools.v1.11.js" type="text/javascript"></script>
<script src="scripts/jd.gallery.js" type="text/javascript"></script>
<script src="scripts/jd.gallery.set.js" type="text/javascript"></script> 

<!-- //////////////////////////// -->

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-4187190-1";
urchinTracker();
</script>

<script>

function affiche_formulaire(){

var choix = document.commander.activite.selectedIndex;

document.getElementById('spanEntreprise').style.visibility  = 'hidden';
 document.getElementById('spanTYPE').style.visibility  = 'hidden';
 
if (choix==2)
{
document.getElementById('spanEntreprise').style.visibility = 'visible';
document.getElementById("nom_activite").innerHTML ="Nom de l'association"; 
}
if (choix==3)
{
document.getElementById('spanEntreprise').style.visibility = 'visible';
document.getElementById('spanTYPE').style.visibility = 'visible';
document.getElementById("nom_activite").innerHTML ="Nom de la société"; 
}
}
 
 
 
function autreType(numChoix, idType, divName, label){

	var choix = document.commander.activite.selectedIndex;
	
	if (choix == numChoix){
		elemDiv = document.getElementById(divName);
		if (document.getElementById(idType).selectedIndex == numChoix){
			elemDiv.innerHTML = label+" <input type='text name='autre_"+idType+"'/>";
		}
		else
			elemDiv.innerHTML = "";
	}
}

</script>



<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<link rel="stylesheet" href="css/jd.gallery.css" type="text/css" media="screen" />
<style type="text/css">
<!--
.style1 {
	font-size: 14px;
	color: #C870D1;
}
.style2 {font-size: 14px; color: #607dbe; }
.style5 {
	font-size: 14px;
	color: #6FB077;
}
.style7 {font-size: 14px; color: #c46e3e; }
.style8 {
	font-size: 14px;
	color: #c102ae;
}
.style9 {
	color: #E4AFE4
}
.style10 {color: #7C9EC5;}
.style11 { padding-left:10px;
	color: #e36c0a;
	font-style: italic;	font-family:Arial, Geneva, Helvetica, sans-serif;
font-size:14px;
font-weight:bol
}
.style12 {
	padding-left:10px;
	color: #D50000;
	font-style: italic;
	font-family:Arial, Geneva, Helvetica, sans-serif;
	font-size:14px;
}
.style13 {
	padding-left:10px;
	color: #4584D1;
	font-style: italic;
	font-family:Arial, Geneva, Helvetica, sans-serif;
	font-size:14px;
}
.style14 {
	padding-left:10px;
	color: #27B82B;
	font-style: italic;
	font-family:Arial, Geneva, Helvetica, sans-serif;
	font-size:14px;
}
.style15 {color: #b3d3ec}
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



<div class="indice_top"><img src="images/commander_votre_site.gif" alt="nos_services"/></div>
<!-- IMAGES TITRES -->

<form action="valid_commande.php" method="post" name="commander">
<div class="commander" >

<p><img src="images/commander1.gif"/></p>


<div class="entreprise" style="width:400px;">


	
     <label for="activite" style="width:210px;"><strong>Quelle est votre activité ?</strong></label> 
    
       <select name="activite" id="activite" OnChange="affiche_formulaire();"> <option value="" selected>Choisissez votre activité</option>
        
		      <option value="particulier" <?php if ($_SESSION['activite'] == "particulier") { ?> selected="selected"<?php } ?>>Particulier</option>
		      <option value="association" <?php if ($_SESSION['activite'] == "association") { ?> selected="selected"<?php } ?>>Association</option>
		      <option value="entreprise" <?php if ($_SESSION['activite'] == "entreprise") { ?> selected="selected" <?php } ?>>Entreprise</option>
              <option value="autre" <?php if ($_SESSION['activite'] == "autre") { ?> selected="selected"<?php } ?>>Autre</option>
	   </select>
          <br/>
       <br/>
        <?php if (($_SESSION['activite'] == "entreprise") OR($_SESSION['activite'] == "association")){ ?> 
      <span id="spanEntreprise" style="visibility:visible;">
<?php } 
else
{ echo '<span id="spanEntreprise" style="visibility:hidden;">'; } ?>
        <label for="nom_entreprise" style="width:210px;"><strong id="nom_activite">Nom de la société </strong></label> <input type="text" name="nom_entreprise" id="nom_entreprise" size="15px" value="<?php echo stripslashes($_SESSION['nom_entreprise']); ?>"/>
                  <br/>
                  <br/>
	    <label for="secteur_activite" style="width:210px;"><strong>Secteur(s) d'activité(s)</strong></label> <input type="text" name="secteur_activite" id="secteur_activite" size="15px"  value="<?php echo stripslashes($_SESSION['secteur_activite']); ?>"/>
                  <br/>
       			 <br/>
                  <?php if ($_SESSION['activite'] == "entreprise"){ ?> 
        <span id="spanTYPE" style="visibility:visible;"> 
       <? } else
{ echo '<span id="spanTYPE" style="visibility:hidden;">'; }?>
        <label for="type_entreprise" style="width:210px;"><strong>Statut Juridique</strong></label>
                  
		              <select id="type_entreprise" name="type_entreprise">
                      
			                        <option name="ei">E.I</option>
			                        <option name="eurl">E.U.R.L</option>
                                    <option name="snc">S.N.C</option>
                                    <option name="sa">S.A</option>
			                        <option name="sarl">S.A.R.L</option>
                                    <option name="sas">S.A.S</option>
			                        <option name="sca">S.C.A</option>
			                        <option name="sc">S.C.</option>
                                    <option name="gie">G.I.E</option>
                                    <option name="autre">Autre</option>
		             </select>
        </span>
    
    </span>


      </div>
      
      
<label for="nom" width>Nom</label>
<input type="text" name="nom" id="nom" value="<?php echo stripslashes($_SESSION['nom']); ?>"/>
<span class="style15">*</span><br />
<br/>
<label for="prenom">Prénom</label> <input type="text" name="prenom" id="prenom" value="<?php echo stripslashes($_SESSION['prenom']); ?>"/>
<span class="style15">*</span><br />
<br/>
<label for="email">Email</label> <input type="text" name="email" id="email" value="<?php echo stripslashes($_SESSION['email']); ?>"/>
<span class="style15">*</span><br />
<br/>
<label for="telephone">Téléphone</label> <input type="text" name="telephone" id="telephone" value="<?php echo stripslashes($_SESSION['telephone']); ?>"/> <span class="style15">*</span>
</div>




<div class="commander">
  <div style="float:right;width:242px;"><img src="images/woman.jpg" />
</div>
<p><img src="images/commander2.gif" alt="commanderphoto"/></p>


<label style="width:260px;">Avez vous déjà choisi votre pack ? <span class="style15">*</span><br />
<br />
</label> 
<br />
<br />
<span class="style2 style10" style="margin-left:10px;">

Pack Identité (500€)</span>
<input type="radio" value="identite" name="offre" id="identite" class="radio" style="margin-right:15px;" <?php if ($_SESSION['offre'] == "identite") { ?> checked="checked"<?php } ?>/> 

<span class="style5">Pack PackInteractif (700€)</span>
<input type="radio" value="interactif" name="offre" id="interactif" class="radio" style="margin-right:15px;" <?php if ($_SESSION['offre'] == "interactif") { ?> checked="checked"<?php } ?>/>

 <span class="style7">Pack Flash (900€)</span>
 <input type="radio" value="flash" name="offre" id="flash" class="radio" <?php if ($_SESSION['offre'] == "flash") { ?> checked="checked"<?php } ?>/>
  <br/>
 <br/>
<label style="width:350px;">Avez vous choisi votre formule hébergement ? <span class="style15">*</span></label>
<br /><br />
<span class="style8 style9" style="margin-left:10px;">
Hébergement Start (50€/an)</span>
<input type="radio" value="start" name="hebergement" id="start" class="radio" style="margin-right:15px;" <?php if ($_SESSION['hebergement'] == "start") { ?> checked="checked"<?php } ?>/> 

<span class="style1">Hébergement Performance (120€/an)</span>
<input type="radio" value="performance" name="hebergement" id="performance" class="radio" <?php if ($_SESSION['hebergement'] == "performance") { ?> checked="checked"<?php } ?>/>
<br/><br/>
<label for="but_projet" style="width:250px;">But et description de votre projet</label><br/><br/>
<textarea name="but_projet" id="but_projet" cols="60" rows="8"><?php echo stripslashes($_SESSION['but_projet']); ?></textarea>
<br/><br/>
<label for="adresse_site"  style="width:260px;">Une idée d'adresse pour votre site ?</label>
<br />
<br />
<input type="text" name="adresse_site" id="adresse_site" size="40" value="<?php if (!empty($_SESSION['adresse_site'])) {  echo stripslashes($_SESSION['adresse_site']); } else { echo "http://www."; } ?>"/>


</div>

<div class="commander">

<p><img src="images/commander3.gif"/></p>

<label for="assistance" style="width:300px;font-weight:normal;">Assistance PREMIUM</label> 
<input type="checkbox" name="assistance" id="assistance" class="radio" <?php if ($_SESSION['assistance'] == "on") {  ?>  checked="checked"<?php } elseif ($_SESSION['assistance'] == 0) { }?>/>
<span class="style11">150€ / an</span><br/><br/>
<label for="introflash" style="width:300px;font-weight:normal;">Une introduction animée en FLASH<sup>TM</sup><br />
 </label >
<input type="checkbox" name="introflash" id="introflash" class="radio" <?php if ($_SESSION['introflash'] == "on") { ?> checked="checked"<?php } ?>/><span class="style12">
100€</span>


<br/><br/>

<label for="referencement" style="width:300px;font-weight:normal;">Le référencement sur Google, Yahoo et MSN <br />
</label> 
<input type="checkbox" name="referencement" id="referencement" class="radio" <?php if ($_SESSION['referencement'] == "on") { ?> checked="checked"<?php } ?>/>
<span class="style13">50€</span><br/><br/>
<label for="redaction"  style="width:300px;font-weight:normal;">La rédaction de votre contenu</label >
<input type="checkbox" name="redaction" id="redaction" class="radio" <?php if ($_SESSION['redaction'] == "on") { ?> checked="checked"<?php } ?>/><span class="style14">
50€</span></div>
<p align="right">
  <input type="image" src="images/commander_submit.gif" alt="commander_envoi"  style="margin-right:180px;"/>
  <em style="font-family:Arial, Helvetica, sans-serif;font-size:14px;padding-right:10px;color:#b3d3ec;">* Champs obligatoires</em></p>
</form>

<div class="nos_offres" style="clear:both;"><!-- NOS OFFRES -->

<img src="images/nos_offres.gif" alt="nos_offres" /><br/>
<a href="images/plaquette_identite.pdf"><img src="images/pack_identite.gif" width="270" alt="pack_identité" border="0"/></a><a href="images/plaquette_interactif.pdf"><img src="images/pack_interactif.gif" width="269" alt="pack_interactif" border="0"/></a><a href="images/plaquette_flash.pdf"><img src="images/pack_flash.gif" width="261" alt="pack_flash" border="0"/></a>

</div>


</div>


<!-- PIED DE PAGE -->
<div id="bas" align="center"><?php include("bottom.php"); ?></div>

</body>
</html>
