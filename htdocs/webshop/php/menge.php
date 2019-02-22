<?php
$menge = $_POST["menge"];
$id = strstr($_SERVER['REQUEST_URI'], 'id=');
$id = substr($id, 3);
$url = "artikel.php?hello=true?id=$id?menge=$menge";
echo $url;
echo "<br>";
echo $menge;
header("Location:../".$url);
exit();
?>
