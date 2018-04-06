<?
	require '../pages/config.php';
	if (isset($_SESSION['user_id'])){
?>
	<script>
		window.location.href = '../pages/all.php';
	</script>
<?
	}
?>