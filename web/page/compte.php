<?php
require_once '../session/session.php';

if (!isLoggedIn()) {
    header('Location: ../page/signin.php');
    exit;
}
?>

<h2>Mon Compte</h2>
<p>Gérez vos informations personnelles, paramètres et préférences ici.</p><br/>
<p>Visualisez egalement la liste de vos commandes actuelles et passées.</p><br/>

<?php
echo 'Bienvenue '.getNom().' '.getPrenom();
?>