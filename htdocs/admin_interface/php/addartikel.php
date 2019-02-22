<?php
include_once '../../config.php';
session_start();
if (isset($_SESSION["True"])) {
  if (isset($_POST["submitAddArticle"])) {
      $anr = mysqli_real_escape_string($conn,$_POST["anr"]);
      $aname = mysqli_real_escape_string($conn,$_POST["aname"]);
      $preis = mysqli_real_escape_string($conn,$_POST["preis"]);
      $beschr = mysqli_real_escape_string($conn,$_POST["beschr"]);
      $kat = mysqli_real_escape_string($conn,$_POST["kat"]);


      $allowed = array("jpg", "jpeg", "png");

      //Bearbeiten des Titelbildes
      $file = $_FILES["titelbild"];

      //Abspeichern der einzelnen Informationen des Bildes
      $fileName = $file["name"];
      $fileTmpName = $file["tmp_name"];
      $fileSize = $file["size"];
      $fileError = $file["error"];
      $fileType = $file["type"];

      //Speichern der Extention
      $fileExt = explode(".", $fileName);
      $fileActualExt = strtolower(end($fileExt));

      //Ueberprüfen ob ein File hochgeladen wurde
      if($file["size"] != 0) {
        //Ueberpruefen ob der Filetyp erlaubt ist
        if (in_array($fileActualExt,$allowed)) {
          //Ueberpruefen ob ein Error vorliegt
          if ($fileError === 0) {
            //Bildgroeße pruefen
            if ($fileSize < 1000000) {
              //Uniquename fuer das Bild vergeben
              $fileNameNewTitelbild = uniqid('', true).".".$fileActualExt;
              //Setzen des Directorys
              $fileDestination = "../images/".$fileNameNewTitelbild;
              //Abspeichern des Files
              move_uploaded_file($fileTmpName, $fileDestination);
              //header("Location: artikel.php");
              $sql="INSERT INTO artikel (anr,aname,preis,beschr,bild,kat) VALUES ('$anr','$aname','$preis','$beschr','$fileNameNewTitelbild','$kat')";
              $result = mysqli_query($conn,$sql);
            } else {
              echo "Das Bild ist zu groß!";
            }
          } else {
            echo "Es gab einen unerwarteten Fehler beim Upload";
          }
        } else {
          echo "Falscher Filetyp!";
        }
      }


      //Iterieren durch die sonstigen Bilder
      $total = count($_FILES["bilder"]["name"]);
      $file = $_FILES["bilder"];
      for( $i=0 ; $i < $total ; $i++ ) {
        $fileName = $file["name"][$i];
        $fileTmpName = $file["tmp_name"][$i];
        $fileSize = $file["size"][$i];
        $fileError = $file["error"][$i];
        $fileType = $file["type"][$i];

        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if($fileSize != 0) {
          if (in_array($fileActualExt,$allowed)) {
            if ($fileError === 0) {
              if ($fileSize < 1000000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                echo $fileNameNew."<br>";
                $fileDestination = "../images/".$fileNameNew;
                echo $fileDestination;
                //echo $fileTmpName;
                move_uploaded_file($fileTmpName, $fileDestination);
                //header("Location: artikel.php?sucess");
                $sql="INSERT INTO bild (bname,anr) VALUES ('$fileNameNew', '$anr')";
                if($conn->query($sql) == TRUE) {
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
              } else {
                echo "Das Bild ist zu groß!";
              }
            } else {
              echo "Es gab einen unerwarteten Fehler beim Upload";
            }
          } else {
            echo "Falscher Filetyp!";
          }
      }
    }
  }
  else{
      echo "nicht verfügbar";
  }
}
?>
