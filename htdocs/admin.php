<?php
  include_once 'config.php';
  session_start();
?>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admininterface</title>

    <style>
        .btn{
            background-color: #7e57c2;
            width: 250px;
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



<?php
if (isset($_POST["submitCode"])){
    $code = mysqli_real_escape_string($conn,$_POST["code"]);
    $sql="SELECT * from administrator WHERE code='$code'";
    $result = mysqli_query($conn,$sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0){
        $_SESSION["True"]="true";
        header("Location: admin.php");
      }else {
          echo "ungültiger Code";
      }
}


if (isset($_SESSION["True"])) {
?>

<body style="background-color: #f8eee7;" class="center-align">
  <h1 style="text-align: center">Admininterface</h1>
  <a href="admin_interface/php/artikel.php"><input class="btn waves-effect" type="button" value="Artikel verwalten"></a>
  <br>
  <br>
  <a href="admin_interface/php/rabatt.php"><input class="btn waves-effect" type="button" value="Rabattcodes verwalten"></a>
  <br>
  <br>
  <a><input class="btn waves-effect" type="button" value="Bestellungen verwalten"></a>
  <br>
  <br>
  <br>
  <br>
  <form action="logout.php" method="get">
    <input style="background-color: brown;width: 150px;" class="btn" type="submit" value="Logout">
  </form>
</body>

<?php
} else {
?>

  <body>
    <image style="display: block;margin-left: auto;margin-right: auto;" src="admin_interface/images/logo.png" width="500px" height="108px">
    <h3 class="center">Zugangscode:</h3>
    <form class="center" action="admin.php" method="post">
      <input style="text-align: center;width: 50%;" type="text" name="code"><br>
      <button class="waves-effect btn" type="submit" name="submitCode">Einloggen</button>
    </form>

    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>

<?php
}
include_once 'footer.php';
?>
</html>
