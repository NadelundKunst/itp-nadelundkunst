<?php
    include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../../materialize/css/materialize.min.css"  media="screen,projection"/>
    <meta charset="utf-8"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style>
        #bild {
            min-height: 100px;
            max-height: 250px;
            max-width: 100%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .card{
            height: 300px;
        }



        .mysidenav_item{
            background-color: white;
            color: #94618E;
            font-size: 15px;
        }

        .mysidenav_item:hover{
            background-color: #94618E;
            color: white;
            transition: all ease 0.15s;
        }
        #drop{
            visibility: hidden;
            height: 0px;
            margin-top: 0px;
        }
        @media screen and (max-width: 600px) {
            #kat{
                visibility: hidden;
                height: 0;
            }
            #drop{
                visibility: visible;
                height: auto;
                width: 100%;
            }
            .mysidenav_item{
                color: #94618E;
                font-size: 15px;

            }

            .mysidenav_item:hover{
                background-color: #94618E;
                color: white;
                transition: all ease 0.15s;
            }
        }
        .card{
            cursor: pointer;
        }
    </style>
    <?php
        include 'navbar.script.php';
    ?>
</head>
<body>
<?php
    include 'navbar.php';
?>
<div class="row">
    <div style="padding:0px 0px 0px 0px;" class="col s12 m4 l2 xl2">
        <ul id="kat" class="collection">
            <li style="background-color:#94618E;color: white;text-align: center;font-size: 30px;" class="collection-item mysidenav_header">Kategorien</li>
            <a href="webshop.php?kategorie=baby"><li class="collection-item mysidenav_item">Baby</li></a>
            <a href="webshop.php?kategorie=accessoires"><li class="collection-item mysidenav_item">Accessoires</li></a>
            <a href="webshop.php?kategorie=engel"><li class="collection-item mysidenav_item">Engel</li></a>
            <a href="webshop.php?kategorie=hund"><li class="collection-item mysidenav_item">Hund</li></a>
            <a href="webshop.php?kategorie=hund gemalt"><li class="collection-item mysidenav_item">Hund gemalt</li></a>
            <a href="webshop.php?kategorie=kaffee-kapseln"> <li class="collection-item mysidenav_item">Kaffee-Kapseln</li></a>
            <a href="webshop.php?kategorie=kissen"><li class="collection-item mysidenav_item">Kissen</li></a>
            <a href="webshop.php?kategorie=modeschmuck"><li class="collection-item mysidenav_item">Modeschmuck</li></a>
            <a href="webshop.php?kategorie=stoff"><li class="collection-item mysidenav_item">Stoff</li></a>
            <a href="webshop.php?kategorie=strickwaren"><li class="collection-item mysidenav_item">Strickwaren</li></a>
        </ul>
        <div id="drop">
            <ul class = "collapsible" data-collapsible = "accordion">
                <li>
                    <div style="background-color:#94618E;color: white;font-size: 20px;border-style: none;" class = "collapsible-header"><i class = "material-icons">filter_list</i>Kategorie</div>
                    <div style="background-color: white;" class = "collapsible-body">
                        <ul class="collection">
                            <a href="webshop.php?kategorie=baby"><li class="collection-item mysidenav_item">Baby</li></a>
                            <a href="webshop.php?kategorie=accessoires"><li class="collection-item mysidenav_item">Accessoires</li></a>
                            <a href="webshop.php?kategorie=engel"><li class="collection-item mysidenav_item">Engel</li></a>
                            <a href="webshop.php?kategorie=hund"><li class="collection-item mysidenav_item">Hund</li></a>
                            <a href="webshop.php?kategorie=hund gemalt"><li class="collection-item mysidenav_item">Hund gemalt</li></a>
                            <a href="webshop.php?kategorie=kaffee-Kapseln"><li class="collection-item mysidenav_item">Kaffee-Kapseln</li></a>
                            <a href="webshop.php?kategorie=kissen"><li class="collection-item mysidenav_item">Kissen</li></a>
                            <a href="webshop.php?kategorie=modeschmuck"><li class="collection-item mysidenav_item">Modeschmuck</li></a>
                            <a href="webshop.php?kategorie=stoff"><li class="collection-item mysidenav_item">Stoff</li></a>
                            <a href="webshop.php?kategorie=strickwaren"><li class="collection-item mysidenav_item">Strickwaren</li></a>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="col s12 m8 l10 xl10">
        <div class="row">
            <?php
            if(isset($_GET["kategorie"])){
                $sql = "SELECT * FROM artikel WHERE kat='".$_GET["kategorie"]."'";
            }else{
                $sql = 'SELECT * FROM artikel';
            }
            $result = mysqli_query($conn,$sql);
            $resultCheck = mysqli_num_rows($result);
            while ($row=mysqli_fetch_row($result))
            {
                echo'<div onclick="location.href = \'artikel.php?id='.$row[0].'\';" class="col s6 m4 l3 xl3">';
                echo'<div class="card artikel">';
                    echo'<div class="card-image">';
                      echo'<img id="bild" src="../../admin_interface/images/'.$row[4].'">';
                       echo'</div>';
                       echo'<div style="height: 150px;" class="card-content">';
                       echo'<p class="center">'.$row[1].'</p>';
                    echo'</div>';
                echo'</div>';
            echo'</div>';
            }
            ?>
        </div>
    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
