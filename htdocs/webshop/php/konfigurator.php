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

    <script type = "text/javascript">
      $( document ).ready(function() {
        $(".carousel").carousel({onCycleTo: function(slide){}});
         });

      $(document).ready(function(){
        $('select').formSelect();
      });
    </script>

    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        });
    </script>

    <script type="text/javascript">
      function Gurt() {
        var selectedWidth = document.getElementById("gurt").value;
        //alert(selectedWidth);
        switch (selectedWidth) {
          case "15":
          alert ("15");
          document.getElementById("gurt15").style.display = "";

            break;
          case "20":

            break;
          case "25":

            break;
          case "40":

            break;
          default:
            alert("default");
            break;
        }
      }
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
<div class="container">
  <div class='input-field col s12'>
    <select name='gurt' onchange='Gurt()' id='gurt'>
      <option value='none' disabled selected>Gurt</option>
      <option value='15'>15mm</option>
      <option value='20'>20mm</option>
      <option value='25'>25mm</option>
      <option value='40'>40mm</option>
    </select>
  </div>
  <div class='row'>
    <div class='carousel'>
      <a class='carousel-item' href='#15-01'><img src='../images/rot15.jpg'></a>
      <a class='carousel-item' href='#15-02'><img src='../images/gruen15.jpg'></a>
      <a class='carousel-item' href='#15-03'><img src='../images/blau15.jpg'></a>
    </div>
  </div>
  <div id="konfigurator">

    <div>
       <form action='' method='post'>
         <div class='row' style="display: none;" id="gurt15">
           <div class='carousel'>
             <a class='carousel-item' href='#15-01'><img src='../images/rot15.jpg'></a>
             <a class='carousel-item' href='#15-02'><img src='../images/gruen15.jpg'></a>
             <a class='carousel-item' href='#15-03'><img src='../images/blau15.jpg'></a>
           </div>
         </div>

         <div class='input-field col s12'>
           <select name='gurtband'>
             <option value='none' disabled selected>Gurtband</option>
             <option value='15-01'>15-01</option>
             <option value='15-02'>15-02</option>
             <option value='15-03'>15-03</option>
           </select>
         </div>

       <div class='input-field col s12'>
         <select name='neopren'>
           <option value='none' disabled selected>Neopren</option>
           <option value='N-01'>N-01</option>
           <option value='N-02'>N-02</option>
           <option value='N-03'>N-03</option>
           <option value='N-04'>N-04</option>
           <option value='N-05'>N-05</option>
           <option value='N-06'>N-06</option>
           <option value='N-07'>N-07</option>
           <option value='N-08'>N-08</option>
           <option value='N-09'>N-09</option>
           <option value='N-10'>N-10</option>
           <option value='N-11'>N-11</option>
           <option value='N-12'>N-12</option>
           <option value='N-13'>N-13</option>
           <option value='N-14'>N-14</option>
           <option value='N-15'>N-15</option>
           <option value='N-16'>N-16</option>
         </select>
       </div>
       <div class='input-field col s12'>
           <select name='symbol'>
           <option value='none' disabled selected>Symbol</option>
           <option value='S-01'>Hund</option>
           <option value='S-02'>Hund mit Leine im Maul</option>
           <option value='S-03'>Knochen</option>
           <option value='S-04'>Pfote</option>
           <option value='S-05'>Krone</option>
           <option value='S-06'>Hundehütte</option>
         </select>
       </div>
       <button name='konfigurator' type='submit' value=''>Bestellen</button>
     </form>
   </div>


  </div>
</div>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
