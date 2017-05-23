<?php
/*
Template Name: Grabber
*/
get_header(); ?>

<h1>Grabber page</h1>

<?php

	/**
	* Класс для работы с БД MySQL
	*/
	class Link
	{
		public static $mysqli;

		public static function connect($server, $login, $pass, $dbname) {
			self::$mysqli = new mysqli($server, $login, $pass, $dbname);
		
			if (self::$mysqli->connect_error) {
			  die('Connect Error (' . self::$mysqli->connect_errno . ') ' . self::$mysqli->connect_error);
			}
		}

		public static function select($query) {
			if ($result = self::$mysqli->query($query)) {
				
				$array = [];

		    /* извлечение ассоциативного массива */
		    while ($row = $result->fetch_assoc()) {
		      array_push($array, $row); 
		    }

		    /* удаление выборки */
		    $result->free();
		    
		    return $array;
			
			} else {
				return false;
			}
		}

		public static function insert($query) {
			return self::$mysqli->query($query);
		}

		public static function update($query) {
			return self::$mysqli->query($query);
		}
	}


	Link::connect('kresloka.mysql.ukraine.com.ua', 'kresloka_il1', '9gu64q3b', 'kresloka_il1');

	$query = 	"SELECT id, `timestamp`, email, ".
						"first_name, last_name, ".
						"birth_country, country_resid, ".
						"prefix_phone, phone, ".
						"prefix_mobil, mobile ".
						"FROM grabber;";

	$data = Link::select($query);

	/* закрытие соединения */
	// Link::mysqli->close();
	?>
<table>
	<tr>
		<th>#</th>
		<th>Дата</th>
		<th>Email</th>
		<th>Имя</th>
		<th>Фамилия</th>
		<th>Страна происхождения</th>
		<th>Страна регистрации</th>
		<th>Код страны</th>
		<th>Номер телефона</th>
		<th>Код2</th>
		<th>Номер2</th>
	</tr>

	<?php	

	$i = 1;

	foreach ($data as $row) {
		echo "<tr data-id=\"".$row["id"]."\">";
		echo 	"<td>$i<br>".
					"<button class='delete-row'><img src='/wp-content/themes/greencard/assets/images/no-icon.png'></button>".
					"</td>";
		
		foreach ($row as $key => $value) {
			if($key !== 'id') {
				echo "<td>";
				echo $value;
				echo "</td>";
			}
		}
		
		echo "</tr>";
		$i++;
	}


	
	echo($data[0]['uniqueID']);

?>

</table>

<?php get_footer();
