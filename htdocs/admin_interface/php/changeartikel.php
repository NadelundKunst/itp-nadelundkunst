<?php
include_once '../../config.php';
session_start();
if (isset($_SESSION["True"])) {
  $anr = $_POST["change"];
  $sql="SELECT * FROM artikel WHERE anr='$anr'";
  $result = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($result);

  $aname = $row["aname"];
  $preis = $row["beschr"];
  $beschr = $row["beschr"];
  $bild = $row["bild"];
  $kat = $row["kat"];

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
    <title>Admininterface</title>
  </head>
  <body>
    <div class="container">
      <form  action="changeartikel.php" method="post" enctype="multipart/form-data">
      <h1>Artikel bearbeiten</h1>
      <tr>
      <p>Artikelnummer:</p>
      <input type="text" name="anr" value="<?php echo $anr ?>">
      <p>Artikelname:</p>
      <input type="text" name="aname" value="<?php echo $aname; ?>">
      <p>Preis:</p>
      <input type="text" name="preis" value="<?php echo $aname; ?>">
      <p>Beschreibung:</p>
      <input type="text" name="beschr" value="<?php echo $beschr; ?>">
      <br>
      <p>Kategorie:</p>
      <input type="text" name="kat" value="<?php echo $kat; ?>">
      <button type="submit" name="submitChanges">Bestätigen</button>
      </form>
    </div>
  </body>
</html>
<?php
}
?>
