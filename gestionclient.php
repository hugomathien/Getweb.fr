<?
session_start();
include('db_connect.php');

if (empty($_GET['page'])) 
	{ 
	$page = 1;
	}
	else
	{
	$page = $_GET['page'];
	}


// ---------------------------------- SUPPRIMER UN CLIENT ------------------------------- //

if(!empty($_GET['suppr'])) // 
		{
	mysql_query ('DELETE FROM client  WHERE id=' . $_GET['suppr']) or die ('EREUR'.mysql_error() ); //
	$suppr_client_ok = 1;
	}

// ---------------------------------- VALIDATION D'UN CLIENT -------------------------------- //

if(!empty($_GET['idvalid'])) // 
		{
		
			mysql_query("UPDATE client SET valid='1' WHERE id=".$_GET['idvalid'])or die ('EREUR'.mysql_error() );
		}

// ---------------------------------- FIN VALIDATION D'UN CLIENT -------------------------------- //
	
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
  <div class="disabled"><img src="template/default/image/delete_disabled.png" alt="Delete" class="png" />Suppr.</div>

  <div class="enabled"><img src="template/default/image/save_enabled.png" alt="Save" class="png" />Sauveg.</div>
 
</div>
<div class="heading">Clients</div>
<div class="description">Vous pouvez visualiser et éditer les clients de Getweb.<? if ($suppr_client_ok == 1) { ?><br/><font color="#37AC31"><strong>Le client a bien été supprimé</strong></font><? } ?></div>
<div id="list">
  <table class="a">
    <tr>
      <td class="c" width="24%">Résultats <? echo $limite_selection_client + 1; ?> - <? if ($page != ($nb_de_pages + 1)) { echo $limite_selection_client + 5; } else { echo $total_clients; } ?> sur <? echo $total_clients; ?></td>

      <td class="d" width="36%"><form action="gestionclient.php" method="get" enctype="multipart/form-data">
          Page          <select name="page" onchange="this.form.submit();">
<?php
for ($num_page = 0; ($num_page + 1) <= $nb_de_pages; $num_page++)
{
?>
                                    <option value="<? echo $num_page + 1; ?>" <? if (($num_page +1) == $page) { ?>selected="selected"<? } ?>><? echo $num_page + 1; ?> de <? echo $nb_de_pages + 1; ?></option>
<? } ?>
                                  </select>
        </form></td>
      <td class="e" width="40%"><form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data">
          Rechercher           
              <input type="input" name="search" value="" />

        </form></td>
    </tr>
  </table>
  <table class="list">
    <tr>
            <th class="center" width="3%">                      </th>
            <th class="left" width="18%">                <form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data" onclick="this.submit();">
          Nom / Prénom               
              <input type="hidden" name="sort" value="pd.name" />

        </form>
                      </th>
            <th class="left" width="17%">                <form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data" onclick="this.submit();">
          PACK OFFRE                
              <input type="hidden" name="sort" value="p.model" />
        </form>
                      </th>
                           <th class="left" width="20%">                <form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data" onclick="this.submit();">
        PACK HEBERGEMENT                 
              <input type="hidden" name="sort" value="p.model" />
        </form>
                      </th>
            <th class="center" width="15%">                <form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data" onclick="this.submit();">

          Statut                    
              <input type="hidden" name="sort" value="p.status" />
        </form>
                      </th>
            <th class="right" width="15%">                <form action="http://demo.opensourcecms.com/opencart/admin/index.php?controller=product&action=page" method="post" enctype="multipart/form-data" onclick="this.submit();">
              Date de commande
              <input type="hidden" name="sort" value="p.sort_order" />
        </form>
                      </th>

            <th class="right" width="14%">Action</th>
       				 </tr>
                  
<?php // -----------------  LISTING CLIENTS --------------
	
$class_clients = mysql_query ('SELECT * FROM client ORDER BY id DESC LIMIT '.$limite_selection_client.', 5') or die ('EREUR'.mysql_error() ); 
while ($donnees_du_client = mysql_fetch_array($class_clients))
{
 
?>
                  
                    <tr class="row1" onmouseover="this.className='highlight'" onmouseout="this.className='row1'">
                  <td width="30" class="center"><a href="visuclient.php?idclient=<? echo $donnees_du_client['id']; ?>&page=<? echo $page; ?>"><img src="template/default/image/folder.png" class="png" /></a></td>
                        <td class="left"><? echo $donnees_du_client['prenom']." ".$donnees_du_client['nom']; ?> </td>
                        <td class="left">PACK <? echo strtoupper($donnees_du_client['pack']); ?></td>
                        <td class="left">HEBERGEMENT <? echo strtoupper($donnees_du_client['hebergement']); ?> </td>
                        <td class="center"><?php  if ($donnees_du_client['valid'] != 0) { ?><img src="template/default/image/enabled.png" class="png" /><?php } else { ?><a href="gestionclient.php?idvalid=<? echo $donnees_du_client['id']; ?>&page=<? echo $_GET['page']; ?>" onclick="return confirm('Souhaitez vous valider ce client ?')"><img src="template/default/image/disabled.png" class="png" /></a><? } ?>

              </td>
                        <td class="right"><? echo $date_commande['prenom']; ?>        </td>
                        <td class="right"><a href="gestionclient.php?suppr=<? echo $donnees_du_client['id']; ?>&page=<? echo $page; ?>" onclick="return confirm('Souhaitez vous supprimer ce client ?')"><img src="template/default/image/delete.png" alt="Delete" title="Delete" class="png" /></a>        </td>
    </tr>
                
<?
}
?>
          
      </table>
</div>
</body>
</html>