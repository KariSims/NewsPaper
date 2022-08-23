
<?php
// Informations d'identification

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'myspacedb');
 
// Connexion à la base de données MySQL 
$linkDb = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($linkDb === false){
    $errormessageDB = "Impossible de se connecter à la base de données" ;
    die("ERREUR : Impossible de se connecter à la base. " . mysqli_connect_error());
}
?>