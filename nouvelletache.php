<?php
session_start();
$id=$_SESSION["id"];
 try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }
$nom=$bdd->quote($_GET["nom"]);
$id=$bdd->quote($_GET["id"]);
$requete = "INSERT INTO tache(id,nom,activite)VALUES(NULL,$nom,$id)";

    $resultats = $bdd->exec($requete);
header("location:activite.php?id=".$_SESSION["projet"]);
?>