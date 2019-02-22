<?php
    include_once 'config.php';
    session_start();
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
        .titel{
            text-align: center;
            border-bottom: 2px solid black;

        }
        .bild{
            padding-left: 5%;
            padding-right: 5%;
            border-bottom: 2px solid black;
            margin-top: 10px;
        }
        .text{
            padding-left: 5%;
            padding-right: 5%;
            text-align: center;
            font-size: 20px;
            border-bottom: 2px solid black;
        }
    </style>
    <?php
        function addToWarenkorb() {
            $id = strstr($_SERVER['REQUEST_URI'], 'id=');
            $id = substr($id, 3);
            if (isset($_SESSION['warenkorb'])) {
                $_SESSION['warenkorb'] .= $id."-";
            }else{
                $_SESSION['warenkorb'] = $id."-";
            }

        }

        if (isset($_GET['hello'])) {
            addToWarenkorb();
        }
    ?>
</head>

<body class="orange lighten-5">

<nav>
    <div class="nav-wrapper deep-purple lighten-1">
        <a href="index.php" class="brand-logo center"><img style="margin-top: 2px;" height="55px" src="images/logo.png"></a>
        <a href="warenkorb.php" class="right"><i style="font-size: 40px;margin-right: 10px;" class="material-icons">shopping_cart</i></a>
    </div>
</nav>

<?php
$id = strstr($_SERVER['REQUEST_URI'], 'id=');
$id = substr($id, 3);

$sql = 'SELECT * from artikel WHERE anr='.$id.';';
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)){
    echo '<div class="row">';
    echo '<div class="titel col s12">';
    echo '<h1>'.$row['aname'].'</h1>';
    echo '</div>';
    echo '<div class="bild col s12 m6 l6 xl6">';
    echo '<img style="display: block;margin-left: auto;margin-right: auto;width: 50%max-width: 100%;height: auto;" src="images/sample-1.jpg">';
    echo '</div>';
    echo '<div class="text col s12 m6 l6 xl6">';
    echo '<b>'.$row['preis'].'</b><br>';
    echo '<p>Endpreis, zzgl. Versandkosten</p>';
    echo '<p>verfügbar</p>';
    echo '<p>1 - 3 Tage Lieferzeit</p>';
    echo '<a href=\'artikel.php?hello=true?id='.$id.'\' class="waves-effect waves-light btn-small"><i style="margin-right: 10px;" class="material-icons">add</i>In den Warenkorb</a>';
    echo '</div>';
    echo '</div>';
}
?>





<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>