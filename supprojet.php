<?php
 try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }
$nom=$bdd->quote($_POST["nom"]);
$id=$bdd->quote($_POST["id"]);
$requete="DELETE FROM  projet WHERE  id =$id";

    $resultats = $bdd->exec($requete);

?>