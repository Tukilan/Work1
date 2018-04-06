<?
	require 'config.php';
	if (isset($_SESSION['user_id'])){
?>
	<script>
		window.location.href = 'all.php';
	</script>
<?
	}
?>