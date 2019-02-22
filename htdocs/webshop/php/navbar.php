<?php
echo '
<style>
  .nav-wrapper {
    background-color: #f8eee7 !important;
  }
  body{
    background-color:#94618E;
  }
  .btn{
  background-color: #f8eee7;
  color: #94618E;
  font-weight: bold;
  border-style: none;
}
.btn:visited{
  background-color: #f8eee7;
}
.btn:hover {
  background-color: #f8eec1;
}
.btn:active{
  background-color: #f8eee7;
}
.btn:focus{
  background-color: #f8eec1;
}
</style>
<title>Nadel und Kunst</title>
<link rel="icon" href="../../admin_interface/images/icon.PNG">
<nav>
    <div class="nav-wrapper">
        <a href="webshop.php" class="brand-logo center"><img style="margin-top: 2px;" height="55px" src="../../admin_interface/images/logo.png"></a>
        <a style="color: #94618E;" href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li style="color: #94618E;" ><a style="color: #94618E;" href="warenkorb.php" >Zum Warenkorb</a></li>
            <li><a style="color: #94618E;" href="../../index.html">Über uns</a></li>
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li><a href="../../index.html">Über uns</a></li>
    <li><a href="warenkorb.php">Zum Warenkorb</a></li>
</ul>';
?>