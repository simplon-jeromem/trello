<html>
    <head></head>
    <body>
       

<?php
 session_start();
    $_SESSION["nom"]=$_POST["nom"];
   try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }
$nom=$bdd->quote($_POST["nom"]);
$mdp=$bdd->quote($_POST["mdp"]);

   
   $requete2 = "SELECT * FROM user WHERE nom = $nom ";
    $resultats = $bdd->query($requete2);
     $users = $resultats->fetch() ;
if($users["nom"]==$_POST["nom"]){
        $id=$users["id"];
    
        echo "<div id='resultat'>".$users["nom"]." </div>";
    }else{
    echo"<div id='resultat'>1</div>";
    $requete = "INSERT INTO user(id,nom,password)VALUES(NULL,$nom,$mdp)";

    $resultats = $bdd->exec($requete);
   
}
 
?>
        <script>
            var time;
           function redirection(){
               window.location.href="index.html";
           } if(document.getElementById("resultat").textContent=="1"){
    window.location.href="projet.php";
}else{
setTimeout(redirection,5000);
}
    ;
        </script>
    </body>
</html>