<?php
session_start();
$nom=$_SESSION["nom"];
$_SESSION["projet"]=$_GET["id"];
$projet=$_SESSION["projet"];
?>
<html>
    <head>
        <style>
              #container{
            display:inline-flex;
            }
            .projet{
                display:block;
                background-color:red;
                height:100px;
                width:175px;
            }
            .tache{
                width:175px;
                background-color:green;
            }
            .cache{
                visibility: collapse;
            }
        </style>
    </head>
    <body>
        <div id="container">
<?php
try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=trello2;charset=utf8', 'root', 'passe');

    } catch ( Exception $e ){
        die('Erreur : '.$e->getMessage() );
    }


$_SESSION["id"]=$id;
  $projet=$bdd->quote($projet);
$requete1="SELECT * FROM activite WHERE projet = $projet ";
$resultats1 =$bdd->query($requete1);
while($projet=$resultats1->fetch()){
    echo"<div ><button class=projet>".$projet["nom"]."</button>";
    $idactivite=$projet["id"];
    $requete3="SELECT * FROM tache WHERE activite ='".$idactivite."'";
$resultats4 =$bdd->query($requete3);
while($tache=$resultats4->fetch()){
    echo "<button class=tache>".$tache["nom"]."</button>";
   
}
    echo"<form action=nouvelletache.php method=get>";
    echo"<input name=id class=cache value=".$projet["id"].">";
    echo"<input name=nom></input>";
    echo"<button type=submit>nouvelle tache</button>";
    echo"</form>";
    echo"</div>";
}
?>
        </div>
</div>

                <p>nouvelle activite</p>
                <form >
                    <input id="nom" ></input>
                    <br><button type="button" onclick="nouvelleactivite()">nouveau projet</button>
                </form>
            </div>
        
    <script>
        function nouvelleactivite(){
           var nom =document.getElementById("nom").value;
        var requete2 = new XMLHttpRequest();
        requete2.open("POST","nouvelleactivite.php",true);
            requete2.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
        requete2.send('nom='+nom);
            requete2.onload=window.location.reload();
        }
        function tache(id){
            console.log(id);
            window.location.href="activite.php?id="+id;
        }
        
    </script>
    </body>
</html>