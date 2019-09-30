<?
session_start();
include('db_connect.php');
include('class.mail.php');

function formate_texte($chaine)
	{
	$new_chaine = utf8_decode($chaine);
	return $new_chaine;
	}
	

if (empty($_GET['page'])) 
	{ 
	$page = 1;
	}
	else
	{
	$page = $_GET['page'];
	}

if (!empty($_GET['idclient']))
{
$class_client = mysql_query ("SELECT * FROM client WHERE id='".$_GET['idclient']."'") or die ('EREUR'.mysql_error() );
$donnees_client = mysql_fetch_array($class_client);
}

if (!empty($_POST['email_contact']) AND !empty($_POST['text_contact']) AND !empty($_POST['sujet_contact']))
{
// EMAIL AU CLIENT
$mail_client = new simplemail;
$mail_client -> addrecipient($_POST['email_contact'],($donnees_client['nom']." ".$donnees_client['prenom']));
$mail_client -> addreplyto('guillaumebonnier@getweb.fr','GetWeb.fr');
$mail_client -> addfrom('guillaumebonnier@getweb.fr','GetWeb.fr');
$mail_client -> addsubject($_POST['sujet_contact']);


// le message format html
$mail_client -> html =formate_texte($_POST['text_contact']);


$mail_client -> sendmail();

$email_send_ok = 1;
}
	
$limite_selection_client = (($page*5) - 5);


$compter_nombre_de_clients = mysql_query('SELECT COUNT(*) AS nbclients FROM client');
   
$nbclients = mysql_fetch_array($compter_nombre_de_clients);

$total_clients = $nbclients['nbclients']; 
$nb_de_pages =  bcdiv($total_clients,5);


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
<title>Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">


<link rel="stylesheet" type="text/css" href="template/default/css/default.css">
<style type="text/css">
<!--
.style1 {
	color: #009900;
	font-weight: bold;
}
.style2 {color: #0000FF}
label { display:block;
width:200px;
height:15px;
float:left;}
.style3 {font-size: 14px}
.style12 {font-size: 14px; color: #FF9933; }
-->
</style>
</head>
<body>

<div id="header"><h1>Administration</h1>
<div class="a">Vous êtes connecté en tant qu'<strong>administrateur</strong></div>
</div>

<link rel="stylesheet" href="javascript/JSCookMenu/default/theme.css" type="text/css" />

<script type="text/javascript" src="javascript/JSCookMenu/JSCookMenu.js"></script>

<script type="text/javascript" src="javascript/JSCookMenu/default/theme.js"></script>

<div id="myMenuID"></div>

<script language="JavaScript"><!--  

  var myMenu = [ 

    [null, 'Admin', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/home.png" />', 'Accueil', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],

	   

	    ['<img src="javascript/JSCookMenu/default/configuration.png" />', 'Configuration', null, null, null,

			['<img src="javascript/JSCookMenu/default/setting.png" />', 'Info GetWeb', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=setting', null, null],

		    ['<img src="javascript/JSCookMenu/default/url_alias.png" />', 'Agenda', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=url_alias', null, null],

			['<img src="javascript/JSCookMenu/default/backup.png" />', 'Sauvegarde', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=backup', null, null],

			],			
['<img src="javascript/JSCookMenu/default/currency.png" />', 'Budget', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
['<img src="javascript/JSCookMenu/default/report.png" />', 'Statistiques', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
['<img src="javascript/JSCookMenu/default/review.png" />', 'Marketing', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],
	    ['<img src="javascript/JSCookMenu/default/logout.png" />', 'Logout', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null]

	  ],
    [null, 'Clients', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/users.png" />', 'Gestion Clients', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],
	   

	    ['<img src="javascript/JSCookMenu/default/order.png" />', 'Réalisations', null, null, null,

			['<img src="javascript/JSCookMenu/default/module.png" />', 'Voir', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=setting', null, null],

		    ['<img src="javascript/JSCookMenu/default/url_alias.png" />', 'Ajouter', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=url_alias', null, null],


			],			
['<img src="javascript/JSCookMenu/default/order_status.png" />', 'Assistance', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=logout', null, null],


	  ],
	  
	  [null, 'Options', null, null, null,

	    ['<img src="javascript/JSCookMenu/default/newsletter.png" />', 'Email', 'http://demo.opensourcecms.com/opencart/admin/index.php?controller=home', null, null],
	    ['<img src="javascript/JSCookMenu/default/information.png" />', 'Boite à outils', null, null, null],			

	  ],

  ]
  

//--></script>

<script language="JavaScript"><!--

  cmDraw('myMenuID', myMenu, 'hbr', cmThemeDefault, 'ThemeDefault');

//--></script><div class="task">
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='gestionclient.php?page=<? echo $page; ?>'"><img src="template/default/image/list_enabled.png" alt="List" class="png" />Liste</div>
    <div class="disabled"><img src="template/default/image/insert_disabled.png" alt="Insert" class="png" />Insérer</div>
    <div class="disabled"><img src="template/default/image/update_disabled.png" alt="Update" class="png" />Modifier</div>
  <div class="enabled" onmouseover="className='hover'" onmouseout="className='enabled'" onclick="location='gestionclient.php?suppr=<? echo $donnees_client['id']; ?>&page=<? echo $page; ?>'" onclick="return confirm('Souhaitez vous supprimer ce client ?')"><img src="template/default/image/delete_enabled.png" alt="Delete" class="png" />Suppr.</div>

  <div class="enabled"><img src="template/default/image/save_enabled.png" alt="Save" class="png" />Sauveg.</div>
 
</div>
<div class="heading">Clients</div>
<div class="description">Vous pouvez visualiser et éditer les clients de Getweb. <? if ($email_send_ok == 1) { ?><br/><font color="#37AC31"><strong>L'email a bien été envoyé</strong></font><? } ?></div>
<script type="text/javascript" src="javascript/tab/tab.js"></script>
<link rel="stylesheet" type="text/css" href="javascript/tab/tab.css" />
<script type="text/javascript" src="javascript/ajax/jquery.js"></script>

  <div class="tab" id="tab">
    <div class="tabs"><a>Global</a><a>Projet</a><a>Email</a></div>
    <div class="pages">
      <div class="page">

        <div class="pad">
<div>
  <p class="style1"><span class="style3" style="margin-right:90px;"><? echo $donnees_client['nom']." ".$donnees_client['prenom']; ?></span><span class="style12"> PACK <? echo strtoupper($donnees_client['pack']); ?> / HEBERGEMENT <? echo strtoupper($donnees_client['hebergement']); ?> </span></p>
  <p></span></p>
  <p>
  
    <label class="style2">Telephone</label>  
    <? echo $donnees_client['telephone']; ?><br>
    <br/>
    <label class="style2">Email</label>
      <? echo $donnees_client['email']; ?><br>
     <br>
      <label class="style2">Activité</label>
      <? echo $donnees_client['activite']; ?><br>
     <br>
      <label class="style2" width>Nom de l'entreprise / association</label>
      <? echo $donnees_client['nom_activite']; ?><br><br>
      <label class="style2">Secteur(s) d'activité(s)</label>
      <? echo $donnees_client['secteur_activite']; ?><br><br>
      <label class="style2">Statut juridique</label>
      <? echo $donnees_client['statut_juridique']; ?><br><br>
    
    </p> 
</div>
        </div>
      </div>
      <div class="page">
        <div class="pad">
<div>
 <p class="style1"><span class="style3" style="margin-right:90px;"><? echo $donnees_client['nom']." ".$donnees_client['prenom']; ?></span><span class="style12"> PACK <? echo strtoupper($donnees_client['pack']); ?> / HEBERGEMENT <? echo strtoupper($donnees_client['hebergement']); ?> </span></p>
  <p></span></p>

  
    <label class="style2">Description du projet</label>
  <p><br>
  </p>

  <p style="width:300px;"><? echo $donnees_client['descripion_projet']; ?></p>
  
    <label class="style2">Idée d'adresse</label>
    <p>&nbsp;</p>
    <p><? echo $donnees_client['adresse_site']; ?><br>
    </p>
    <label class="style2">Options choisies</label>
 <p>&nbsp;</p>
 <p>
 <?php 
 if ($donnees_client['assistance'] == "on") 
 echo "Assistance Premium<br/>";
 if ($donnees_client['introflash'] == "on") 
 echo "Introduction en Flash<br/>";
 if ($donnees_client['referencement'] == "on") 
 echo "Référencement Google, Yahoo, MSN<br/>";
 if ($donnees_client['redaction'] == "on") 
 echo "Rédaction du contenu<br/>";
 ?>

 </p>
 </p>
</div>
        </div>
      </div>
      <div class="page"><form action="visuclient.php?page=<? echo $page; ?>&idclient=<? echo $donnees_client['id']; ?>" method="post" enctype="multipart/form-data" id="form">
        <div class="pad">
          <table>
            <tr>
              <td width="185">E-Mail:</td>
              <td width="232"><input type="text" name="email_contact" value="<? echo $donnees_client['email']; ?>" /></td>
            </tr>
<tr>
              <td width="185">Sujet</td>
              <td width="232"><input type="text" name="sujet_contact" /></td>
            </tr>
            <tr>
              <td>Texte: (html autorisé)</td>
              <td><textarea name="text_contact" cols="40" rows="8"></textarea></td>
            </tr>
                 <tr>
              <td></td>
              <td><input type="submit" value="Envoyer le mail"/></td>
            </tr>
          </table>

        </div></form>
      </div>

    </div>
  </div>
  <script type="text/javascript"><!--
  tabview_initialize('tab');
  //--></script>

  <script type="text/javascript"><!--
  $('#zone').load('index.php?controller=setting&action=zone&country_id=222&zone_id=3563');
  //--></script>
</form>
</body>
</html>