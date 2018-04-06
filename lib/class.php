<?
	

	class Get_from_base{
		
		function Get_Candidate(){
			global $db;
			$sql = 'SELECT * FROM `candidates` ';
			//$candidates = '1';
			$candidates = $db->execRes($sql);
			return $candidates;
		}

		function Get_Regions($page){
			global $db;
			$sql = 'SELECT COUNT(DISTINCT(s_region)) as count  FROM `static`';
			$count_regions = $db->execRes($sql);
			$count_regions = ceil($count_regions[0]->count / 6); 
			$inc = ($page - 1) * 6;
			$sql = 'SELECT DISTINCT(s_region),r_id  FROM `static` LEFT JOIN `regions` on s_region = r_name  order by s_region ASC LIMIT '.$inc.',6';

			$regions = $db->execRes($sql);

			return array($regions,$count_regions);
		}


		function Get_all_point($object,$region){
			global $db;
			$sql = 'SELECT SUM('.$object.') as t FROM `static` WHERE s_region = "'.$region.'" ';
			$points = $db->execRes($sql);

			return $points[0]->t;
		}




		function Get_region_name($id){
			global $db;
			$sql = 'SELECT r_name FROM `regions` WHERE r_id = '.$id.' ';
			$region_name = $db->execRes($sql);
			return $region_name[0]->r_name;
		}

		function Get_uik_regions($name,$page){
			global $db;
			$sql = 'SELECT COUNT(s_id) as count FROM `static` WHERE s_region = "'.$name.'" ORDER BY s_uik ASC';
			$count_regions = $db->execRes($sql);
			$count_regions = ceil($count_regions[0]->count / 6);
			$inc = ($page - 1)  * 6;
			$sql = 'SELECT * FROM `static` WHERE s_region = "'.$name.'" ORDER BY s_uik ASC LIMIT '.$inc.',6 ';
			//
			$uik = $db->execRes($sql);
			
			return array($uik,$count_regions);
		}

		function Get_region_info($id){
			global $db;
			$sql = 'SELECT * FROM `static` WHERE s_id = '.$id.' ';
			$info = $db->execRes($sql);

			return $info[0];
		}
	}
?>