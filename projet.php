<?php
session_start();
$nom=$_SESSION["nom"];
?>
<html>
    <head>
        <style>
            #container{
            display:inline-flex;
            }
            .projet{
                display:block;
            }
            .reponse{
                display:block;
                background-color:red;
                height:100px;
                width:100px;
            }
            .cache{
             /* visibility: collapse;*/
                display:none;
            }
            .form{
                display:block;
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
$nom=$bdd->quote($nom);
$requete2 = "SELECT * FROM user WHERE nom = $nom ";
    $resultats2 = $bdd->query($requete2);
    while( $users = $resultats2->fetch() ){
        $id=$users["id"];
    }

$_SESSION["id"]=$id;
  $id=$bdd->quote($id);
$requete1="SELECT * FROM projet WHERE createur = $id ";
$resultats1 =$bdd->query($requete1);
while($projet=$resultats1->fetch()){
     echo"<div class=projet><button  onclick=tache(".$projet["id"].")  class=reponse >".$projet["nom"]."</button><button type=button onclick=supprojet(".$projet["id"].")>supprimer</button><form action=attribuer.php method=get><input name=id class=cache value=".$projet["id"]."><select name=user>";
    $idactivite=$projet["id"];
    $requete3="SELECT * FROM user ";
$resultats4 =$bdd->query($requete3);
while($tache=$resultats4->fetch()){
    echo "<option value=".$tache["id"]." >".$tache["nom"]."</option>";
   }
    echo"</select><br>";
    echo"<button type=submit>attribuer</button>";
    echo"</form>";
    echo"</div>";
}
?>
            <div>
                <p>nouveau projet</p>
                <form >
                    <input id="nom" ></input>
                    <br><button type="button" onclick="nouveauprojet()">nouveau projet</button>
                </form>
            </div>
        </div>
    <script>
        function nouveauprojet(){
           var nom =document.getElementById("nom").value;
        var requete2 = new XMLHttpRequest();
        requete2.open("POST","nouveauprojet.php",true);
            requete2.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
        requete2.send('nom='+nom);
            requete2.onload=window.location.reload();
        }
         function supprojet(id){
          console.log(id);
             var requete = new XMLHttpRequest();
            
            requete.open("POST","supprojet.php",true);
            requete.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
             requete.send('id='+id);
             requete.onload=window.location.reload();
        }
        function tache(id){
            console.log(id);
            window.location.href="activite.php?id="+id;
        }
        
    </script>
    </body>
</html>