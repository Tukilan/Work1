 <?
 	session_start();
 	$main = '../';
 	
	if (isset($_SESSION['user_id'])){
	 	
	 	define('DB_HOST', 'localhost');
		define('DB_NAME', 'vibori');
		define('DB_USER', 'root');
		define('DB_PASSWD', '');
		//global $db;
		require $main.'lib/database.php';
		$db = new Database(DB_HOST,DB_NAME,DB_USER,DB_PASSWD);
	


 ?>
 	<link rel="stylesheet" href="../rqure/styles.css">
	<link rel="stylesheet" href="../rqure/nom.css">
 	<link rel="stylesheet" href="<?=$main?>rqure/bootstrap.css?date=<?=date('mm:hh:ss');?>">
 	<script src="<?=$main?>rqure/jquery-3.3.1.min.js?date=<?=date('mm:hh:ss');?>"></script>
 	<script src="<?=$main?>rqure/bootstrap.js?date=<?=date('mm:hh:ss');?>"></script>
	
<?
	} else {
?>
	<script>
		window.location.href = '../index.php';
	</script> 
<?
	}
?>
