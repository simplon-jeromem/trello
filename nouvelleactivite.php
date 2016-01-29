<?php
session_start();
$id=$_SESSION["projet"];
 try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }
$nom=$bdd->quote($_POST["nom"]);
$id=$bdd->quote($id);
$requete = "INSERT INTO activite(id,nom,projet)VALUES(NULL,$nom,$id)";

    $resultats = $bdd->exec($requete);
?>