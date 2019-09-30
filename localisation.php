<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<?php
echo("<?xml version=\"1.0\" encoding=\"iso-8859-1\"?>\n");
/* Variables de connexion : ajustez ces paramètres selon votre propre environnement */
$serveur = "localhost";
$admin   = "root";
$mdp     = "";
$base    = "getweb";
?>
<script type="text/javascript" src="./arrayPHP2JS.js" charset="iso_8859-1"></script>
<script type="text/javascript" src="./changeDept.js" charset="iso_8859-1"></script>
<?php
/* Requête SQL de récupération des données */
$sql = "SELECT id_departement AS idd, departement AS dept, region.id_region AS idr, region ".
"FROM departement, region ".
"WHERE departement.id_region = region.id_region ".
"ORDER BY region.id_region;";
/* Connexion et exécution de la requête */
$connexion = mysql_pconnect($serveur, $admin, $mdp);
if($connexion != false)
{
    $choixbase = mysql_select_db($base, $connexion);
    $recherche = mysql_query($sql, $connexion);
    /* Pour ne pas écraser mes tableaux, je crée un témoin */
    $temoin_r = 0;
    /* Création du tableau PHP des valeurs récupérées */
    $regions = array();
    /* Index du département par tableau régional */
    $id = 0;
    while($ligne = mysql_fetch_assoc($recherche))
    {
        $r = $ligne['idr'];
        $d = $ligne['idd'];
        /* Je vérifie si je suis toujours dans la même région, sinon je crée les tableaux nécessaires */
        if($temoin_r != $r)
        {
            $regions[$r] = array();
            /* J'ajoute laa région */
            $regions[$r][0] = $ligne['region'];
            $regions[$r][1] = array();
            $regions[$r][2] = array();
            $temoin_r = $r;
            $id = 0;
        }
        /* J'ajoute les départements */
        $regions[$r][1][$id] = $d;
        $regions[$r][2][$id] = $ligne['dept'];
        $id++;
    }
    /* On sérialise le tableau obtenu pour traitement par JavaScript */
    $chaine = htmlspecialchars(serialize($regions), ENT_QUOTES);
?>
<script type="text/javascript">
/* <![CDATA[ */
<!--
/*
* Ici, on transmets la chaîne sérialisée à JavaScript 
* pour la transformer en tableau indexé JavaScript 
*/
var tableau = new PhpArray2Js('<?php echo $chaine; ?>');
var tab = tableau.retour();
// -->
/* ]]> */
</script>
</head>
<body>

<?php
if(isset($_POST['ok']) && isset($_POST['departement']) && $_POST['departement'] != "")
{
    $region_selectionnee = $_POST['region'];
    $dept_selectionne = $_POST['departement'];
?>

<?php
}
?>
<form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post" id="chgdept">

    <label><strong>Votre région:</strong></label> <select name="region" id="region" onChange="changeDept(tab,this.value);">
      <option value="vide">Choisissez une région </option>
    <?php
    /* Construction de la première liste : on se sert du tableau PHP */
    $nbr = count($regions);
    foreach($regions as $nr => $nom)
    {
        ?>
    <option value="<?php echo($nr); ?>"><?php echo($nom[0]); ?></option>
<?php
    }
    ?>
    </select>
    <!-- ICI, le secret : on met un bloc avec un id ou va s'insérer le code de
         la seconde liste déroulande -->
  <span id="blocDepartements"></span>
 
</form>
<?php
    
}
else
{
    /*  Si vous arrivez ici, vous avez un gros problème avec la connexion au serveur de base de données */
?>
</head>
<body>
<p>Désolé le site n'est momentanément pas disponible, veuillez nous en excuser, nous allons remédier très prochainement à ce disfonctionnement.<br/>
Merci pour votre compréhension</p>
<?php
}
?>
</body>
</html>