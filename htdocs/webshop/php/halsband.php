<?php
    include_once 'config.php';
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
                color: #7e57c2;
                font-size: 15px;

            }

            .mysidenav_item:hover{
                background-color: #7e57c2;
                color: white;
                transition: all ease 0.15s;
            }
        }
    </style>
    <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js">
    </script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js">
    </script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('select').formSelect();
    });
    </script>

    <script type="text/javascript">
    $( document ).ready(function() {
      $(".carousel").carousel({onCycleTo: function(slide){}});
       });
    </script>
</head>
<body  class="orange lighten-5">
<nav>
    <div class="nav-wrapper deep-purple lighten-1">
        <a href="webshop.php" class="brand-logo center"><img style="margin-top: 2px;" height="55px" src="../../admin_interface/images/logo.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li>Zum Warenkorb<a href="warenkorb.php" class="right"><i style="font-size: 40px;margin-right: 10px;" class="material-icons">shopping_cart</i></a></li>
            <li><a href="../../index.html">Über uns</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="../../index.html">Über uns</a></li>
    <li><a href="warenkorb.php">Zum Warenkorb<i style="font-size: 40px;" class="material-icons">shopping_cart</i></a></li>
</ul>
<div class="container" id="halsband">
  <div class="col s12 m8 l10 xl10">
      <div class="row">

        <div class="col s6 m4 l3 xl3">
          <div class="card">
            <div class="card-image">
              <img id="bild" src="../images/zugstopp.jpg">
            </div>
            <div style="height: 150px;" class="card-content">
               <p class="center">Hundehalsband mit Zugstopp individuell bestickt 20,00 €</p>
               <br>
               <center>
               <form action="konfigurator.php" method="post">
                 <button type="submit" name="typ" value="zugstopp">Konfigurieren</button>
               </form>
              </center>
            </div>
          </div>
        </div>

        <div class="col s6 m4 l3 xl3">
          <div class="card">
            <div class="card-image">
              <img id="bild" src="../images/metallschliesse.jpg">
            </div>
            <div style="height: 150px;" class="card-content">
               <p class="center">Hundehalsband mit Zugstopp individuell bestickt 20,00 €</p>
               <br>
               <center>
               <form action="konfigurator.php" method="post">
                 <button type="submit" name="typ" value="zugstopp">Konfigurieren</button>
               </form>
              </center>
            </div>
          </div>
        </div>


        <div class="col s6 m4 l3 xl3">
          <div class="card">
            <div class="card-image">
              <img id="bild" src="../images/kunststoffschliesse.jpg">
            </div>
            <div style="height: 150px;" class="card-content">
               <p class="center">Hundehalsband mit Zugstopp individuell bestickt 20,00 €</p>
               <br>
               <center>
               <form action="konfigurator.php" method="post">
                 <button type="submit" name="typ" value="zugstopp">Konfigurieren</button>
               </form>
              </center>
            </div>
          </div>
        </div>

      </div>
  </div>
</div>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
