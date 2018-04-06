<?
	session_start();
	require '../pages/config.php';
	require 'class.php';
	$data = $_POST;
	if($data['type'] == 1){

?>
	<div class="report">
		<div class="r__title">
			<h2>Статистика по протоколам</h2>
		</div>
		
		<div class="report__table" style="overflow: auto;">
			
			<table  class="table" border="3" style="text-align: center;">
				<thead class="thead">
					<tr>
						<th class="table__lock table__lock--left">Субьект РФ</th>
					<? 	
						$cls = new Get_from_base();
						$regions = $cls->Get_Regions($data['page']);
						//var_dump($regions);
						$max_pages = (int)$regions[1] ;
						$regions = $regions[0];
						$candidates = $cls->Get_Candidate();
						//var_dump($candidates);
						//var_dump($regions);
						foreach ($candidates as $k => $v) {
							echo '<th>'.$v->c_fio.'</th>';	
						}	
					?>
					</tr>
				</thead>
				<tbody class="tbody">
					<?		
						foreach ($regions as $k1 => $v1) {
							echo '<tr>';
							echo '<th class="point table__lock table__lock--left" style="width:200px;" onclick="Get_Region('.$v1->r_id.',1);"><u>'.$v1->s_region.'</u></th>';
							foreach ($candidates as $k => $v) {
								$All_point = $cls->Get_all_point($v->c_field,$v1->s_region);
								echo '<th>'.$All_point.'</th>';
							}	
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
			<div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center;">
<?
				if ($data['page'] > 1){
?>					
					<label class="point-label" onclick="Get_Page(1);"><<</label>
					<label class="point-label" onclick="Get_Page(<?=$data['page'] - 1?>);"><</label>
<?
					if ($data['page'] > 4){
						echo '<label class="point-label" onclick="Get_Page('.($data['page'] - 3).');">...</label>';
					}
?>
					<label class="point-label " onclick="Get_Page(<?=$data['page'] - 1?>);"><? echo $data['page'] - 1 ; ?></label>
<?
				}

?>
				
<?
				$active_tab = 0;
				for($i=$data['page']; $i <= $data['page'] + 3;  $i++) { 
					//var_dump('1');
					if (($i == $max_pages)){
						if ($active_tab == 1){
							echo '<label class="point-label" onclick="Get_Page('.$i.');">'.$i.'</label>';
						} else {
							echo '<label class="point-label point-active" onclick="Get_Page('.$i.');">'.$i.'</label>';
						}
						
						break;	
					} 
					if ($i == $data['page']){
						echo '<label class="point-label point-active" onclick="Get_Page('.$i.');">'.$i.'</label>';	
						$active_tab = 1;
					} else {
						echo '<label class="point-label" onclick="Get_Page('.$i.');">'.$i.'</label>';	 
					}
				}
				if ($data['page'] + 3 < $max_pages){
					
					echo '<label class="point-label" onclick="Get_Page('.($data['page'] + 3).');">...</label>';
				
					echo '<label class="point-label" onclick="Get_Page('.($data['page'] + 1).');"> > </label>';
					echo '<label class="point-label" onclick="Get_Page('.$max_pages.');"> >> </label>';
				}
?>
			</div>

			
		</div>
	</div>

<?
	} 

	if($data['type'] == 2){
		$cls = new Get_from_base();
		$candidates = $cls->Get_Candidate();
		$uik = $cls->Get_region_name($data['id']);

?>	
		
		<div class="report">
			<button class="btn btn-info" onclick="Get_Page(1)" style="float: right;cursor: pointer;">Назад</button>
			<div class="r__title">
				<h2>Статистика <?=$uik?></h2>
			</div>
			<div class="report__table" style="overflow: auto;">
				
				<table class="table" border="3" style="text-align: center;">
					<thead class="thead">
						<tr>
								<th class="table__lock table__lock--left">УИК</th>
							
							<? 	
								
								//var_dump($uik);
								$uik = $cls->Get_uik_regions($uik,$data['page']);
								
								$max_pages = $uik[1];
								$uik = $uik[0];
								foreach ($candidates as $k => $v) {
									echo '<th>'.$v->c_fio.'</th>';	
								}	
							?>
						</tr>
					</thead>
					<tbody class="tbody">
							<?		
								foreach ($uik as $k1 => $v1) {
									
									$name_uik = str_replace("Участковая избирательная комиссия", "УиК",$v1->s_uik);

									echo '<tr>';
									echo '<th class="table__lock table__lock--left"><span>'.$name_uik.'</span><form style="float:right;" action="protocol_gen.php" method="post" target="_blank"><input type="hidden" name="id_reg" value="'.$v1->s_id.'"><button style="background-color: white;color:#006fc0;
    border: solid 0px;" type="submit"><span class="glyphicon glyphicon-file"></span></button></form></th>';
									foreach ($candidates as $k => $v) {
										$field = $v->c_field;
										//$All_point = $cls->Get_all_point($v->c_field,$v1->s_region);
										echo '<th>'.$v1->$field.'</th>';
									}	
									echo '</tr>';
								}
							?>
					</tbody>
				</table>
				<div class="col-md-12 col-sm-12 col-lg-12" style="text-align: center;">

<?

				if ($data['page'] > 1){
?>					
					<label class="point-label" onclick="Get_Region(<?=$data['id']?>,1);"><<</label>
					<label class="point-label" onclick="Get_Region(<?=$data['id']?>,<?=$data['page'] - 1?>);"><</label>
<?
					if ($data['page'] > 4){
						echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.($data['page'] - 3).');">...</label>';
					}
?>
					<label class="point-label " onclick="Get_Region(<?=$data['id']?>,<?=$data['page'] - 1?>);"><? echo $data['page'] - 1 ; ?></label>
<?
				}

?>
				
<?
				$active_tab = 0;
				for($i=$data['page']; $i <= $data['page'] + 3;  $i++) { 
					//var_dump('1');
					if (($i == $max_pages)){
						if ($active_tab == 1){
							echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.$i.');">'.$i.'</label>';
						} else {
							echo '<label class="point-label point-active" onclick="Get_Region('.$data['id'].','.$i.');">'.$i.'</label>';
						}
						
						break;	
					} 
					if ($i == $data['page']){
						echo '<label class="point-label point-active" onclick="Get_Region('.$data['id'].','.$i.');">'.$i.'</label>';	
						$active_tab = 1;
					} else {
						echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.$i.');">'.$i.'</label>';	 
					}
				}
				if ($data['page'] + 3 < $max_pages){
					
					echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.($data['page'] + 3).');">...</label>';
				
					echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.($data['page'] + 1).');"> > </label>';
					echo '<label class="point-label" onclick="Get_Region('.$data['id'].','.$max_pages.');"> >> </label>';
				}
				
?>
			</div>
<?

	}
?>