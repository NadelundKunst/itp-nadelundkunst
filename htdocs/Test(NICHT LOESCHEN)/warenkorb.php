<?php
    include_once 'config.php';
    session_start();
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        table,tr {
            margin-right: 10%;
            margin-left: 10%;
            width: 80%;
            background-color: white;
            border: 2px solid black;
        }
    </style>
</head>

<body class="orange lighten-5">

<nav>
    <div class="nav-wrapper deep-purple lighten-1">
        <a href="index.php" class="brand-logo center"><img style="margin-top: 2px;" height="55px" src="images/logo.png"></a>
    </div>
</nav>
<?php
$liste = $_SESSION['warenkorb'];
$teile = explode("-", $liste);
echo '<table style="margin-top: 50px;width: 90%;margin-right: 5%;margin-left: 5%;">';
echo '<thead>';
          echo '<tr>';
                echo '<th>Nr</th>';
                echo '<th> </th>';
                echo '<th>Artikelname</th>';
                echo '<th>Artikelpreis</th>';
          echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
foreach ($teile as &$value) {
    $sql = 'SELECT anr,aname,preis from artikel WHERE anr='.$value.';';
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['anr'] . '</td>';
        echo '<td><img width="50px" src="images/'. $row['bild'] .'"></td>';
        echo '<td>' . $row['aname'] . '</td>';
        echo '<td>' . $row['preis'] . '€</td>';
        echo '</tr>';
    }
}
echo '</tbody>';
echo '</table>';
?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>