<?
	session_start();
	require 'config.php';
	if (isset($_SESSION['user_id'])){
?>
	<script>
		window.location.href = 'pages/all.php';
	</script>
<?
	}
	if ($_POST['login'] == 'test' and $_POST['passw'] == "work1"){
		$_SESSION['user_id'] = 1;
?>
	<script>
		window.location.href = 'pages/all.php';
	</script>
<?
	}
?>

	<div class="container-fluid">
		<form action="index.php" method="post">
			<div class="col-md-12 col-sm-12">
				<label>Логин</label>
				<input placeholder="Login" name="login">
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12">
				<label>Пароль</label>
				<input placeholder="pass" name="passw">
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12">
				<button type="submit">Войти</button>
			</div>
		</form>
	</div>

	
	