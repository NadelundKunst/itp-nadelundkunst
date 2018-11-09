<?php
  include_once 'config.php';
?>
		<?php
			if (isset($_POST["submitCode"])){
			  $code = mysqli_real_escape_string($conn,$_POST["code"]);
			  $sql="SELECT * from administrator WHERE code='$code'";
			  $result = mysqli_query($conn,$sql);
			  $resultCheck = mysqli_num_rows($result);

			  if ($resultCheck > 0){
			      echo '
                    <input type="button" value="Artikel verwalten" onclick="">
                    <br>
                    <br>
                    <input type="button" value="Rabattcodes verwalten">
                    <br>
                    <br>
                    <input type="button" value="Bestellungen verwalten">
				';
			  }else {
			      echo "ungültiger Code";
			  }
			}else{
				header(admin.html);
                $_POST = array();
			}
	 	?>
<?php
  include_once 'footer.php';
?>




