<?
	session_start();
	if ($_POST['id_reg']){

	
	require 'config.php';
	require '../lib/class.php';
	$data = $_POST;
	$cls = new Get_from_base();
	$info = $cls->Get_region_info($data['id_reg']);

?>
<link rel="stylesheet" href="../rqure/styles.css">
<link rel="stylesheet" href="../rqure/nom.css">
<div class="container">
	<div class="protocol">
		<div class="t-content">
			<div class="t-body">
				<p class="t-text">Выборы Президента Российской Федерации<br> 18 марта 2018 года<br> <strong>ПРОТОКОЛ</strong><br>  участковой избирательной комиссии об итогах голосования</p> 
				<p class="t-text"><strong><?=$info->s_uik?></strong></p>
				<p class="t-text">Участковая избирательная комиссия установила:</p>
				<table class="t-table">
						<tbody>
							<tr>
								<td><strong>1</strong></td>
								<td><strong>Число избирателей, включенных в список избирателей  на момент окончания голосования</strong></td>
								<td><strong><span class="n_cnt" id="data-9"><?=$info->s_reg_user?></span></strong></td>
							</tr>
							<tr>
								<td><strong>2</strong></td>
								<td><strong>Число избирательных бюллетеней, полученных участковой избирательной комиссией</strong></td>
								<td><strong><span class="n_cnt" id="data-10">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>3</strong></td>
								<td><strong>Число избирательных бюллетеней, выданных избирателям, проголосовавшим досрочно</strong></td>
								<td><strong><span class="n_cnt" id="data-11">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>4</strong></td>
								<td><strong>Число избирательных бюллетеней, выданных участковой избирательной комиссией избирателям в помещении для голосования в день голосования</strong></td>
								<td><strong><span class="n_cnt" id="data-12">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>5</strong></td>
								<td><strong>Число избирательных бюллетеней, выданных избирателям, проголосовавшим вне помещения для голосования в день голосования</strong></td>
								<td><strong><span class="n_cnt" id="data-13">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>6</strong></td>
								<td><strong>Число погашенных избирательных бюллетеней</strong></td>
								<td><strong><span class="n_cnt" id="data-14">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>7</strong></td>
								<td><strong>Число избирательных бюллетеней, содержащихся  в переносных ящиках для голосования</strong></td>
								<td><strong><span class="n_cnt" id="data-15">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>8</strong></td>
								<td><strong>Число избирательных бюллетеней, содержащихся  в стационарных ящиках для голосования</strong></td>
								<td><strong><span class="n_cnt" id="data-16">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>9</strong></td>
								<td><strong>Число недействительных избирательных бюллетеней</strong></td>
								<td><strong><span class="n_cnt" id="data-17"></span></strong></td>
							</tr>
							<tr>
								<td><strong>10</strong></td>
								<td><strong>Число действительных избирательных бюллетеней</strong></td>
								<td><strong><span class="n_cnt" id="data-18"><?=$info->s_curr_user?></span></strong></td>
							</tr>
							<tr>
								<td><strong>11</strong></td>
								<td><strong>Число утраченных избирательных бюллетеней</strong></td>
								<td><strong><span class="n_cnt" id="data-20">0</span></strong></td>
							</tr>
							<tr>
								<td><strong>12</strong></td>
								<td><strong>Число избирательных бюллетеней, не учтенных при получении</strong></td>
								<td><strong><span class="n_cnt" id="data-21">0</span></strong></td>
							</tr>
							<tr>
								<td colspan="2" class="m--align-center m--font-normal">Фамилии, имена, отчества внесенных в избирательный бюллетень зарегистрированных кандидатов</td>
								<td class="m--align-center m--font-normal">Число голосов избирателей, поданных  за каждого зарегистрированного кандидата</td>
							</tr>
							<tr>
								<td><strong>13</strong></td>
								<td ><img src="../img/сandidates/baburin.png" alt=""><strong>БАБУРИН  Сергей Николаевич</strong></td>
								<td><strong><span class="n_cnt" id="data-1"><?=$info->s_baburin?></span></strong></td>
							</tr>
							<tr>
								<td><strong>14</strong></td>
								<td ><img src="..//img/сandidates/grudinin.png" alt=""><strong>ГРУДИНИН  Павел Николаевич</strong></td>
								<td><strong><span class="n_cnt" id="data-2"><?=$info->s_grudinin?></span></strong></td>
							</tr>
							<tr>
								<td><strong>15</strong></td>
								<td ><img src="../img/сandidates/zhirinovski.png" alt=""><strong>ЖИРИНОВСКИЙ  Владимир Вольфович</strong></td>
								<td><strong><span class="n_cnt" id="data-3"><?=$info->s_jirik?></span></strong></td>
							</tr>
							<tr>
								<td><strong>16</strong></td>
								<td ><img src="../img/сandidates/putin.png" alt=""><strong>ПУТИН  Владимир Владимирович</strong></td>
								<td><strong><span class="n_cnt" id="data-4"><?=$info->s_putin?></span></strong></td>
							</tr>
							<tr>
								<td><strong>17</strong></td>
								<td ><img src="../img/сandidates/sobchak.png" alt=""><strong>СОБЧАК  Ксения Анатольевна</strong></td>
								<td><strong><span class="n_cnt" id="data-5"><?=$info->s_sobchak?></span></strong></td>
							</tr>
							<tr>
								<td><strong>18</strong></td>
								<td ><img src="../img/сandidates/suraykin.png" alt=""><strong>СУРАЙКИН  Максим Александрович</strong></td>
								<td><strong><span class="n_cnt" id="data-6"><?=$info->s_suraikin?></span></strong></td>
							</tr>
							<tr>
								<td><strong>19</strong></td>
								<td ><img src="../img/сandidates/titov.png" alt=""><strong>ТИТОВ  Борис Юрьевич</strong></td>
								<td><strong><span class="n_cnt" id="data-7"><?=$info->s_titov?></span></strong></td>
							</tr>
							<tr>
								<td><strong>20</strong></td>
								<td ><img src="../img/сandidates/yavlinski.png" alt=""><strong>ЯВЛИНСКИЙ  Григорий Алексеевич</strong></td>
								<td><strong><span class="n_cnt" id="data-8"><?=$info->s_yavlinskii?></span></strong></td>
							</tr>
						</tbody>
					</table>
				<p class="t-text">
					<a href="<?=$info->s_image?>" target="_blank" class="btn" title="">Смотреть протокол</a>
				</p>
			</div>
		</div>
	</div>
</div>

<?
	} else {
		echo 'Ошибка данных!';
	}
?>

