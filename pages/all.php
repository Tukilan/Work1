<?
	session_start();
	
	require 'config.php';
	
	if ($_POST['exit']){
		unset($_SESSION['user_id']);
?>
	<script>
		window.location.href = '../index.php';
	</script>
<?


	}
?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<div class="container-fluid" style="height: 100px;">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<form action="all.php" method="post">
				<button class="btn btn-success" style="float: right;" type="submit" name="exit" value="1">Выход</button>
			</form> 
		</div>
	</div>

	<div class="container-fluid">
		<div class="" id="table" style="owerflow:auto">
			
		</div>
	</div>	
	<style>

		th{
			width: 300px;
			max-width: 400px;
			height: 50px;
			text-align: center;	
			font-size: 15px;
		}
		.point-label{
			cursor: pointer;
			background-color: white;
		    border-radius: 50%;
		    width: 34px;
		    font-size: 25px;
		}
		.point-label:hover{
			background-color: grey;
		}
		.point-active{
			background-color: #716aca;
		}
		.point{
			cursor: pointer;
		}
		ul.pager-nav{
			font-size: 20px;
		}
	</style>

	<script>
		function Get_Page(page){
			var page = page;
			$("#table").append('Загрузка данных');
			$.post('../lib/generate_table.php',{page:page,type:1},function(data){
				$("#table").empty();
				$("#table").append(data);
			});
		}
		Get_Page(1);

		function Get_Region(id,page){
			var id = id;
			var page = page;
			$("#table").append('Загрузка данных');
			$.post('../lib/generate_table.php',{id:id,page:page,type:2},function(data){
				$("#table").empty();
				$("#table").append(data);
			});
		}

		function Show_protocol(id){
			var id = id;

		}
		
	</script>





