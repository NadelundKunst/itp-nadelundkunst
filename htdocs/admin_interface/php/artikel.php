<?php
include_once '../../config.php';
session_start();
$_POST["submitCode"] = " ";
if (isset($_SESSION["True"])) {
?>
<!DOCTYPE html>
<html lang="de">
  <head>
    <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
       <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>

       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

       <meta charset="utf-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />

       <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js">
       </script>
       <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
       </script>

       <script type="text/javascript">
       $(document).ready(function(){
         $('select').formSelect();
       });
       </script>

       <title>Admininterface</title>
      <style>
          .btn{
              background-color: #7e57c2;
          }
          .btn:visited{
              background-color: #7e57c2;
          }
          .btn:hover {
              background-color: #9575cd;
          }
          .btn:active{
              background-color: #7e57c2;
          }
          .btn:focus{
              background-color: #9575cd;
          }
          </style>
  </head>
  <body>

    <div class="container">
    <h1>Artikelübersicht</h1>
    <table>
      <thead>
        <tr>
            <th>Artikelnummer</th>
            <th>Artikelname</th>
            <th>Preis</th>
            <!-- <th>Beschreibung</th> -->
            <th></th>
        </tr>
      </thead>

<?php
        $sql="SELECT * FROM artikel";
        $result = mysqli_query($conn,$sql);
        $resultCheck = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<tr data-href="linkToFile.pdf">';
            echo '<a><td>'.$row["anr"].'</td></a>';
            echo "<td>".$row["aname"]."</td>";
            echo "<td>".$row["preis"]."€</td>";
            //echo "<td>".$row["beschr"]."</td>";
            //echo "<img src='".$row["bild"]."' width='50px' width='50px'>";
            echo '<td><form method="post" action="changeartikel.php"><button class="btn" type="submit" name="change" value=""'. $row["anr"] .'">bearbeiten</button></form></td>';
            echo "</tr><br>";
        }
        ?>
        </table>
        <h1>Artikel hinzufügen</h1>
        <form  action="addartikel.php" method="post" enctype="multipart/form-data">
        <tr>
        <p>Artikelnummer:</p>
        <input type="text" name="anr">
        <p>Artikelname:</p>
        <input type="text" name="aname">
        <p>Preis:</p>
        <input type="text" name="preis">
        <p>Beschreibung:</p>
        <input type="text" name="beschr">
        <br>
        <p>Kategorie:</p>
        <!-- <input type="text" name="kat"> -->
        <div class="input-field col s12">
          <select name="kat">
            <option value="none" disabled selected>Kategorie</option>
            <option value="baby">Baby</option>
            <option value="accessoires">Accessoires</option>
            <option value="engel">Engel</option>
            <option value="hund">Hund</option>
            <option value="hund gemalt">Hund gemalt</option>
            <option value="kaffee-kapseln">Kaffee-Kapseln</option>
            <option value="kissen">Kissen</option>
            <option value="modeschmuck">Modeschmuck</option>
            <option value="stoff">Stoff</option>
            <option value="strickwaren">Strickwaren</option>
          </select>
        </div>


        <br>
        <p>Titelbild:</p>
        <input type="file" name="titelbild">
        <br>
        <p>Zusätzliche Bilder:</p>
        <input type="file" name="bilder[]" multiple>
        <br>
        <br>
        <input type="submit" value="Artikel hinzufügen" name="submitAddArticle">
        </form>
        <br>
        <br>


<?php
    }
    else{
        echo "nicht verfügbar";
    }
?>
    </div>
      <!--JavaScript at end of body for optimized loading -->
      <script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>

      </body>
    </html>

<?php
if (isset($_POST["submit"])) {
    $anr = mysqli_real_escape_string($conn,$_POST["anr"]);
    $aname = mysqli_real_escape_string($conn,$_POST["aname"]);
    $preis = mysqli_real_escape_string($conn,$_POST["preis"]);
    $beschr = mysqli_real_escape_string($conn,$_POST["beschr"]);
    $kat = mysqli_real_escape_string($conn,$_POST["kat"]);

    // $bild = mysqli_real_escape_string($conn,$_POST["bild"]);
    $sql="INSERT INTO artikel (anr,aname,preis,beschr,bild) VALUES ('$anr','$aname','$preis','$beschr','$kat')";
    $result = mysqli_query($conn,$sql);
}
?>
