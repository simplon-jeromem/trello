<?php

session_start();
echo $_GET["id"];
echo $_GET["user"];
 try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }
$nom=$bdd->quote($_GET["user"]);
$id=$bdd->quote($_GET["id"]);
$requete = "INSERT INTO userprojet(idU,idP) VALUES ($nom,$id)";

    $resultats = $bdd->exec($requete);
?>