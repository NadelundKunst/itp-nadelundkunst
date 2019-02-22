<?php
include_once 'config.php';
session_start();
error_reporting(0);
?>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta charset="utf-8">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        table,tr {
            margin-right: 10%;
            margin-left: 10%;
            width: 80%;
            background-color: white;
            border: 3px solid #94618E;
            font-size:18px;
        }
        #buy{
            margin-top:30px;
            align:center;
        }
    </style>
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>
    <script>
        function add(v,p) {
            var x = document.getElementById(v).innerText;
            x = new Number(x);
            var summe = document.getElementById("summe").innerText;
            if(x<100){
                x = x+1;
                var summe = new Number(summe)+p;
            }
            console.log(summe);
            document.getElementById("summe").innerText = summe;
            document.getElementById(v).innerText = x;
        }
        function remove(v,p) {
            var x = document.getElementById(v).innerText;
            x = new Number(x);
            var summe = document.getElementById("summe").innerText;
            if(x>1){
                x = x-1;
                summe = new Number(summe)-p;
            }
            console.log(summe);
            document.getElementById("summe").innerText = summe;
            document.getElementById(v).innerText = x;
        }
    </script>
    <?php
    function removeFromWarenkorb() {
        $id = strstr($_SERVER['REQUEST_URI'], 'id=');
        $id = substr($id, 3);
        $str = $_SESSION['warenkorb'];

        $i = strpos($str, $id);
        $i2 =strpos(substr($str,$i),"-");
        $o = substr($str,$i,$i2+1);

        $end= str_replace($o, "", $str);

        $_SESSION['warenkorb'] = $end;
    }

    if (isset($_GET['del'])) {
        removeFromWarenkorb();
    }
    ?>
    <?php
    include 'navbar.script.php';
    ?>
</head>
<body>
<?php
include 'navbar.php';
?>
<?php
echo $_SESSION['warenkorb'];
if($_SESSION['warenkorb']==""){
    echo "<h3 class='center' style='background-color:white;padding-top: 5px;padding-bottom: 5px;'>Ihr Warenkorb ist leer!</h3>";
}else{
    $liste = $_SESSION['warenkorb'];
    $teile = explode("-", $liste);
    echo '<table style="margin-top: 50px;width: 90%;margin-right: 5%;margin-left: 5%;">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Nr</th>';
    echo '<th> </th>';
    echo '<th>Artikelname</th>';
    echo '<th class="center">Artikel entfernen</th>';
    echo '<th style="text-align: center;">Menge</th>';
    echo '<th>Artikelpreis</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $summe = 0;
    foreach ($teile as &$value) {
        $v = $value;
        $value = substr($value, 0,strpos($value, "*"));
        $menge = substr($v, strpos($v, "*")+1,strlen($v));
        $sql = 'SELECT anr,aname,preis,bild from artikel WHERE anr='.$value.';';

        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if ($row = mysqli_fetch_assoc($result)) {
            $id = $row['anr'];
            echo '<tr>';
            echo '<td>' . $row['anr'] . '</td>';
            echo '<td><img width="80px" src="../../admin_interface/images/'. $row['bild'] .'"></td>';
            echo '<td>' . $row['aname'] . '</td>';
            echo '<td class="center"><a href=\'warenkorb.php?del=true?id='.$id.'\' class="btn-floating red" ><i class="material-icons">remove</i></a></td>';
            echo '<td style="text-align: center;">';
            echo '<a class="btn-floating btn-small green" onclick="add('.$value.','.$row['preis'].')"><i class="material-icons small">add</i></a>';
            echo '<p id="'.$value.'">'.$menge.'</p>';
            echo '<a class="btn-floating btn-small red" onclick="remove('.$value.','.$row['preis'].')"><i class="material-icons small">remove</i></a><br>';
            echo '</td>';
            echo '<td>' . $row['preis'] . '€</td>';
            echo '</tr>';
            $summe += (float)$row['preis']*$menge;
        }
    }
    echo '<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td style="font-weight: bold;" class="right">Gesamtpreis:</td>
        <td style="font-weight: bold;"><p style="display:inline;" id="summe">'.$summe.'</p>.00 €</td>
     </tr>';
    echo '</tbody>';
    echo '</table>';
    echo '<p class="center-align">
<a on id="buy" href="kaufen.php" style="text-align:center;" class="waves-effect waves-light btn"><i class="material-icons left">shopping_cart</i>Kaufen</a>
 </p>';
}
?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
