<?php
    include_once '../../config.php';
    session_start();
    if (isset($_SESSION["True"])) {
      if (isset($_POST["delete"])) {
        $code = $_POST["delete"];
        $sql="DELETE FROM rabatt WHERE rcode='$code'";
        $result = mysqli_query($conn,$sql);
        header("Location:rabatt.php");
      }

      if (isset($_POST["newCodeForm"])) {
        $code = $_POST["newCode"];
        $sql="INSERT INTO rabatt (rcode) VALUES ('$code')";
        $result = mysqli_query($conn,$sql);
        header("Location:rabatt.php");
      }
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
      <style>
          .btn{
              background-color: #7e57c2;
              border-radius: 8px;
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
    <center>
    <h1>Rabatt-Codes</h1>
    <div class="col s12">
    <table class="striped">
    <thead>
      <tr>
        <th>Codes</th>
        <th>Löschen</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql="SELECT * FROM rabatt";
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      while($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>".$row["rcode"]."</td>";
        echo "<form method='post' action='rabatt.php'>";
        echo "<td><button class='btn red' name='delete' value='".$row["rcode"]."'>X</button></td>";
        echo "</form>";
        echo "<tr>";
      }
      ?>
    </tbody>
    </table>
  </div>
    <hr>
    <form method="post" action="rabatt.php" class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">control_point</i>
          <input placeholder="Code" id="icon_prefix" type="text" class="validate" name="newCode">
        </div>
        <button class="btn" name="newCodeForm">Neuen Code hinzufügen</button>
      </div>
    </form>
  </center>
</div>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
<?php
  } else {
      echo "Diese Website ist für Sie nicht verfügbar";
  }
?>
