<?php
	session_start();
	include "koneksi.php";

	if(empty($_SESSION['email'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Masuk Akun - goSKUL</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
	<div class="kotak-login">
		<form method="POST" action="masuk-proses.php">
			<h4>Masuk</h4>
		  <!-- Email input -->
		  	<?php
            	if (empty($_GET['pesan'])){
            		echo "";
            	} else {
            		echo "<h6 align='center'><font color='red'>Username atau Password Anda salah!</font></h6>";
            	}
            ?>
		  <div class="form-outline mb-4">
		    <input type="text" name="email" id="form2Example1" class="form-control" / required="">
		    <label class="form-label" for="form2Example1">Email</label>
		  </div>

		  <!-- Password input -->
		  <div class="form-outline mb-2">
		    <input type="password" name="password" id="form2Example2" class="form-control" / required="">
		    <label class="form-label" for="form2Example2">Password</label>
		  </div>

		  <!-- 2 column grid layout for inline styling -->
		  <div class="row mb-2">
		    <div class="col">
		      <!-- Simple link -->
		      <a href="#!">Lupa password?</a>
		    </div>
		  </div>

		  <!-- Submit button -->
		  <button type="submit" name="masuk" class="btn btn-primary btn-block mb-4">Masuk</button>

		</form>
		
	</div>
</body>
</html>
<?php
	}else{
		header("location:akun/index.php");
	}
?>