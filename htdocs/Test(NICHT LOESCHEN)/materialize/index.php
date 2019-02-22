<?php
    include_once 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        .mysidenav_item{
            background-color: white;
            color: #7e57c2;
            font-size: 15px;


        }

        .mysidenav_item:hover{
            background-color: #7e57c2;
            color: white;
            transition: all ease 0.15s;
        }
    </style>
</head>

<body class="orange lighten-5">

<nav>
    <div class="nav-wrapper deep-purple lighten-1">
        <a href="#" class="brand-logo center"><img style="margin-top: 2px;" height="55px" src="images/logo.png"></a>
    </div>
</nav>
<div class="row">
    <div style="padding:0px 0px 0px 0px;" class="col s12 m4 l2 xl2 card">
        <ul class="collection">
            <li style="background-color: #7e57c2;color: white;text-align: center;font-size: 30px;" class="collection-item mysidenav_header">Kategorien</li>
            <li class="collection-item mysidenav_item">Baby</li>
            <li class="collection-item mysidenav_item">Accessoires</li>
            <li class="collection-item mysidenav_item">Engel</li>
            <li class="collection-item mysidenav_item">Hund</li>
            <li class="collection-item mysidenav_item">Hund gemalt</li>
            <li class="collection-item mysidenav_item">Kaffee-Kapseln</li>
            <li class="collection-item mysidenav_item">Kissen</li>
            <li class="collection-item mysidenav_item">Modeschmuck</li>
            <li class="collection-item mysidenav_item">Stoff</li>
            <li class="collection-item mysidenav_item">Strickwaren</li>
        </ul>
    </div>
    <div class="col s12 m8 l10 xl10">
        <div class="row">
            <?php
            $sql = 'SELECT * from artikel';
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            while ($row=mysqli_fetch_row($result))
            {
                echo'<div class="col s6 m4 l3 xl3">';
                echo'<div class="card">';
                    echo'<div class="card-image">';
                      echo'<img src="'.$row[4].'">';
                       echo'</div>';
                       echo'<div class="card-content">';
                       echo'<p>'.$row[1].' - '.$row[2].'€</p>';
                    echo'</div>';
                echo'</div>';
            echo'</div>';
            }
            ?>
        </div>
    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>