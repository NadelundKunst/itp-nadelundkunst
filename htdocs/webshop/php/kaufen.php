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
        ::placeholder {
            color: white;
            font-weight: bold;
        }
        body{
            color: white;
        }

    </style>
    <?php
    include 'navbar.script.php';
    ?>
</head>
<body style="background-color: #94618E;">
<?php
include 'navbar.php';
?>
<div class="row">
    <h6 class="center" style="margin-left: 20px;margin-right: 20px"><b>Wichtiger Hinweis: Wir versenden ausschließlich in die Länder, die in den Liefer- und Zahlungsbedingungen aufgeführt sind. </b></h6>
    <h6 class="center"> * Pflichtfelder<h6>
            <div class="row">
                <form class="col s12" method="POST" action="email.php">
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s4 m4 l4 xl4">
                            <select class="browser-default">
                                <option value="" selected disabled>Anrede</option>
                                <option value="herr">Herr.</option>
                                <option value="frau">Frau.</option>
                            </select>
                        </div>
                        <div class="col s7 m8 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Vorname *" name="vorname" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Nachname *" name="nachname" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Straße, Nr *" name="nachname" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Postleitzahl *" name="postleitzahl" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Stadt *" name="stadt" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Telefon" name="telefon" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="E-Mail *" class="validate" name="email" type="email">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <input placeholder="Kundennummer" name="kundennummer" type="text">
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <select class="browser-default">
                                <option value="" selected disabled>Land *</option>
                                <option value="de">Deutschland</option>
                                <option value="oe">Österreich</option>
                            </select>
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <textarea placeholder="Anmerkung" class="materialize-textarea"></textarea>
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <label>
                                <input type="checkbox" class="filled-in" />
                                <span>DSGVO</span>
                            </label>
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                    <div class="row">
                        <div class="col s1 m2 l4 xl4"></div>
                        <div class="center input-field col s10 m8 l4 xl4">
                            <label>
                                <input type="checkbox" class="filled-in"/>
                                <span>Newsletter</span>
                            </label>
                        </div>
                        <div class="col s1 m2 l4 xl4"></div>
                    </div>
                </form>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../../materialize/js/materialize.min.js"></script>
</body>
</html>
