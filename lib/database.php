<?
	class Database{
		var $dbh;
		var $database_name = "vibori";
		var $host_name = "localhost";
		var $database_user = "root";
		var $database_password = "";

		function connect(){
			if ($this->dbh) return true;
			$this->dbh = new mysqli($this->host_name, $this->database_user, $this->database_password,$this->database_name);
			$this->dbh->set_charset("utf8");
			return true;
		}

		function Database($host_name, $database_name, $database_user, $database_password, $charset=false, $no_pconnect=false) {
			$this->host_name = $host_name;
			$this->database_name = $database_name;
			$this->database_user = $database_user;
			$this->database_password = $database_password;
			$this->charset = $charset;
			$this->no_pconnect = $no_pconnect;
		}

		

		function execRes($sql, $additional = "") {
			$this->connect();
			if ($additional){ 
				$sql .= " " . $additional;
				$sql = '/* '.$_SERVER['PHP_SELF'].' */ '.$sql;
			}
			mysqli_select_db($this->dbh,$this->database_name);
			$result = $this->RunSqlAndGetResults($sql,$this->dbh,'res');
			return $result;
		}

		function execInsert($sql, $additional = "") {
			$this->connect();
			if ($additional){ 
				$sql .= " " . $additional;
				$sql = '/* '.$_SERVER['PHP_SELF'].' */ '.$sql;
			}
			mysqli_select_db($this->dbh,$this->database_name);
			$result = $this->RunSqlAndGetResults($sql,$this->dbh,'insert');
			return $result;
		}

		function RunSqlAndGetResults($sql,$con,$type){
			$query = $con->query($sql);
			if($type == 'res'){
				$a = array();
					while ($row = $query->fetch_object()){
					array_push($a,$row);				
				}
				return $a;	
			}
			return $query;
		}
		

		function close() {
			mysqli_close($this->dbh);
		}
	}


?>