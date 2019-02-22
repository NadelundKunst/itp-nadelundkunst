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
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta charset="utf-8"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .titel{
            text-align: center;
        }
        .bild{
            padding-left: 5%;
            padding-right: 5%;
            margin-top: 10px;
        }
        .text{
            padding-left: 5%;
            padding-right: 5%;
            text-align: center;
            font-size: 20px;
        }
        .over{
            margin-left: auto;
            margin-right: auto;
            display: block;
            max-width: 600px;
            width: 100%;
            border:2px solid #f8eee7;
        }
        #menge{
            text-align: center;
            width: 30px;
			color: white;
			font-weight: bold;
        }
    </style>
    <?php
        function addToWarenkorb() {
            $id = strstr($_SERVER['REQUEST_URI'], 'id=');
            $id = substr($id, 3);
            $pos = strpos($id, "?");
            if ($pos === false) {
            } else {
                $id = substr($id,0,$pos);
            }
            $menge = strstr($_SERVER['REQUEST_URI'], 'menge=');
            $menge = substr($menge, 6);
            $pos = strpos($menge, "?");
            if ($pos === false) {
            } else {
                $menge = substr($menge,0,$pos);
            }

            if (isset($_SESSION['warenkorb'])) {
                $_SESSION['warenkorb'] .= $id."*".$menge."-";
            }else{
               $_SESSION['warenkorb'] = $id."*".$menge."-";
            }

        }

        if (isset($_GET['hello'])) {
            addToWarenkorb();
        }
    ?>
    <?php
    include 'navbar.script.php';
    ?>
    <script>
        $(document).ready(function(){
            $('.materialboxed').materialbox();
        });
        function toast() {
            var str1 = window.location.search.substr(1);
            var n = str1.includes("hello=true");
            if (n){
                Materialize.toast('Artikel zum Warenkorb hinzugefügt', 2000)
            }
        }
        function add() {
           var x = document.getElementById("menge").value;
           x = new Number(x);
			if(x<100){
				x = x+1;
			}

           document.getElementById("menge").value = x;
        }
        function remove() {
            var x = document.getElementById("menge").value;
            x = new Number(x);

			if(x>1){
				x = x-1;
			}
            document.getElementById("menge").value = x;
        }
        </script>
</head>
<body style="color: white;" onload="toast()">
<?php
include 'navbar.php';
?>

<?php
$id = strstr($_SERVER['REQUEST_URI'], 'id=');
$id = substr($id, 3);
$pos = strpos($id, "?");
if ($pos === false) {
} else {
    $id = substr($id,0,$pos);
}

$sql = 'SELECT * from artikel WHERE anr='.$id.';';
$result = mysqli_query($conn,$sql);
$resultCheck = mysqli_num_rows($result);
if($row = mysqli_fetch_assoc($result)){
    echo '<div class="row">';
    echo '<div class="titel col s12">';
    echo '<h3>'.$row['aname'].'</h3>';
    echo '</div>';
    echo '<div class="bild col s12 m6 l6 xl6">';
    echo '<img class="materialboxed over" style="position:absolute;" src="../../admin_interface/images/'.$row["bild"].'">';
    echo '</div>';
    echo '<div style="margin-top: 15px;" class="text col s12 m6 l6 xl6">';
    echo '<h4><b>'.$row['preis'].' Euro</b></h4>';
    echo '<h4><p>Endpreis, zzgl. Versandkosten</p></h4>';
    echo '<h4><p>verfügbar</p></h4>';
    echo '<h4><p>1 - 3 Tage Lieferzeit</p></h4>';
    echo '<h5><p>Menge</p></h5>';
    echo '<p>';
	echo '<form method="post" action="menge.php/?id='.$id.'">';
    echo'<a class="btn-floating red" onclick="remove()"><i class="material-icons">remove</i></a>
            <input id="menge" type="text" readonly value="1" name="menge">
			<a class="btn-floating green" onclick="add()"><i class="material-icons">add</i></a>
            </p>';
    # echo '<a href=\'artikel.php?hello=true?id='.$id.'\' class="waves-effect btn"><i style="margin-right: 10px;" class="material-icons">add</i>In den Warenkorb</a>';
    echo ' <input type="submit" class="btn" value="In den Warenkorb">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
}
?>





<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
