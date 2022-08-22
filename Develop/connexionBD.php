<?php
    include_once ("configBD.php");

class linkDB{
    public function connexionBD(){

        global $host, $user, $passwd;

        try{
            $connex = new PDO($host, $user, $passwd);
            $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $connex;
        }
        catch(PDOException $error){
            die('Erreur de connexion : '.$error->getMessage());
        }
    }
    
    /*require_once "configBD.php";

    $dbh = new PDO($host, $user, $passwd);
    // echo $dbh;
    
    // use the connection here
    $sth = $dbh->query('SELECT * FROM categorie');
    
    // fetch all rows into array, by default PDO::FETCH_BOTH is used
    $rows = $sth->fetchAll();
    
    // iterate over array by index and by name
    foreach($rows as $row) {
        printf("$row['libelle']");
    }*/
}
/*?>*/