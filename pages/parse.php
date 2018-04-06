<?
 	session_start();
 	require 'config.php';
 	/*
		Парсер CSV файла и заливка в базу 
		Необходимо , что бы файл находился в той же дирректории что и файл-парсер и имет название test.csv
		

		Формат вывода информации 
		[0]=> string(5) "13371" 
		[1]=> string(16) "18.03.2018 11:53" 
		[2]=> string(37) "Цыплакова Валентина" 
		[3]=> string(29) "Камчатский край" 
		[4]=> string(70) "Участковая избирательная комиссия №61" 
		[5]=> string(4) "1736" 
		[6]=> string(4) "1715" 
		[7]=> string(1) "Y" 
		[8]=> string(71) "https://nom24.ru/upload/iblock/033/033e43815b4c7d8cf41f2c391795216d.JPG" 
		[9]=> string(1) "8"
		[10]=> string(3) "325" 
		[11]=> string(2) "95" 
		[12]=> string(4) "1228" 
		[13]=> string(2) "20" 
		[14]=> string(1) "9" 
		[15]=> string(2) "16" 
		[16]=> string(2) "14"
 	*/
	if($_POST['start'] == 1 and isset($_SESSION['user_id'])){
		// Для предотвращения дубля базы очищаем таблицу
		$sql = 'TRUNCATE TABLE `static`';
		$sb->execInsert($sql);
		// Стандартный PHP парсер CSV файлов http://php.net/manual/ru/function.fgetcsv.php
		$handle = fopen("test.csv", "r");
		$i = 0;
		while (($data = fgetcsv($handle)) !== FALSE) {
	    	if (count($data) > 1){ // Игнор первой строки, которая заполнена в 2х столбцах для описания полей БД
	    		//echo 'За границы массива<br>';
		   	} else {
		   		
		   		$stroka = explode(';',$data[0]);
		   		//var_dump($stroka);
		   		//echo '<br>';
		   		$date = date_parse($stroka[1]);
		   		
		   		$date = $date['year'].'-'.$date['month'].'-'.$date['day'].' '.$date['hour'].':'.$date['minute'].':00';
		   		$sql = 'INSERT INTO `static` ( `s_id_id`, `s_user`, `s_region`, `s_uik`, `s_reg_user`, `s_curr_user`, `s_active`, `s_image`, `s_baburin`, `s_grudinin`, `s_jirik`, `s_putin`, `s_sobchak`, `s_suraikin`, `s_titov`, `s_yavlinskii`, `s_date`) VALUES('.$stroka[0].',"'.$stroka[2].'","'.$stroka[3].'","'.$stroka[4].'",'.$stroka[5].','.$stroka[6].',"'.$stroka[7].'","'.$stroka[8].'",'.$stroka[9].','.$stroka[10].','.$stroka[11].','.$stroka[12].','.$stroka[13].','.$stroka[14].','.$stroka[15].','.$stroka[16].',"'.$date.'")';
		   		$db->execInsert($sql);
		   		
		   		echo $sql;
		   		echo '<br>';
		  	}

		  	
		  	
		}

	}

	if($_POST['fill'] == 2 and isset($_SESSION['user_id'])){
		$sql = 'TRUNCATE TABLE `regions`';
		$db->execInsert($sql);
		$sql = 'SELECT DISTINCT(s_region) FROM `static` ';
		$regions = $db->execRes($sql);
		foreach ($regions as $k => $v) {
			$sql = 'INSERT INTO `regions`(r_name) VALUES("'.$v->s_region.'")';
			$db->execInsert($sql);
		}
	}


?>

	<form action="parse.php" method="post">
		<button type="submit" name="start" value="1">Начать парсер</button>
	</form>

	<form action="parse.php" method="post">
		<button type="submit" name="fill" value="2">Заполнить базу регионов</button>
	</form>

