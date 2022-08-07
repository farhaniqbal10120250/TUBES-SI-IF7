<?php 

require_once '../_config/config.php';

if(isset($_SESSION['admin'])) {
	echo "<script>document.location = '" . base_url('') . "';</script>";
}

// login
if(isset($_POST['login'])) {
	
	$username = strtolower(trim(mysqli_real_escape_string($conn, $_POST['username'])));
	$password = sha1(trim(mysqli_real_escape_string($conn, $_POST['password'])));
	$result_login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));

	$akun = mysqli_fetch_assoc($result_login);

	if(mysqli_num_rows($result_login)) {

		$_SESSION['admin'] = $akun['username'];

		echo "<script>document.location = '" . base_url() . "';</script>";

	} else {

		$error = true;

	}

}

?>


<!DOCTYPE html>
<html>
<title> Form Login </title>
<meta name="viewport" content="width=device-width, initial scale=1">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<style>
	* {
		font-family: 'Quicksand', sans-serif;
	}

	body {
		background: -webkit-linear-gradient(to right, #082A3A, #1f6cab);
		background: linear-gradient(to right, #082A3A, #1f6cab);
		height: 100vh;
	}

	.global-container {
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #DFF6FF !important;
	}

	.card-title {
		margin-bottom: 25px;
	}

	.form-login {
		background: #06283D !important;
		width: 380px;
		height: auto;
		padding: 20px;
		border-radius: 20px;
	}

	input[type="text"],
	input[type="password"] {
		background: #06283D !important;
		color: #DFF6FF !important;
		border: 1px solid #816797 !important;
		outline: none;
		border-radius: 20px;
		margin-bottom: 25px;
	}

	input[type="text"]:focus,
	input[type="password"]:focus {
		outline: none;
		border: none;
		background: #06283D !important;
		box-shadow: none !important;
	}

	input[type="text"]:root,
	input[type="password"]:root {
		background: none;
		outline: none;
		border: none;
	}

	::placeholder {
		color: #DFF6FF !important;
		opacity: 1;
		/* Firefox */
	}

	:-ms-input-placeholder {
		/* Internet Explorer 10-11 */
		color: #DFF6FF !important;
	}

	::-ms-input-placeholder {
		/* Microsoft Edge */
		color: #DFF6FF !important;
	}

	.card-title {
		font-weight: bold;
		padding-top: 15px;
	}

	.btn-first {
		border-radius: 20px;
		border: 2px solid #1F4690 !important;
		background: #1F4690 !important;
		outline: none;
		color: #DFF6FF !important;
		padding: 8px;
		transition: all 0.3s ease-in-out !important;
	}

	.btn-first:hover {
		/* color: #76BA99 !important; */
		background: none !important;
		box-shadow: none !important;
	}
</style>


</head>

<body>

<div class="wrapper mt-5">
	<div class="container">
		<div class="card p-5 w-70">
			<div class="row justify-content-sm-center">
				<div class="col-md-5">
					<h2 class="text-center">Login</h2>
					<form action="" method="POST" class="mt-2">
						<div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Masukkan Username" required autocomplete autofocus>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block" name="login">Login</button>
						</div>
					</form>
				</div>
			</div>

			<!-- jika error -->
			<?php if(isset($error)) : ?>
				<div class="row justify-content-sm-center">
					<div class="col-md-5">
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <strong>Username / Password Salah!</strong> Pastikan anda memasukkan username / password yang tepat.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url(); ?>/_assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/_assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>