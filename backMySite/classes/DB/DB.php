<?php   
class DB {
		// Переменная, хранящая объект PDO
		private $db;
        
		public function __construct()
		{
		    
			// Файл dbinfo.php возвращает массив для 
			// Подключения к БД
			include_once (__DIR__."/../../configs/configDB.php");
			include_once(__DIR__."/../util.php");
			$util = new Util;
			//$util->mvd2f('Попали В БД Класс',__DIR__.'/../joomla_1/debug.log');
			// Подключение
			$this->db = new PDO('mysql:host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['dbname'], $dbconfig['user'], $dbconfig['pwd']);
		}
        
        		// Операции над БД
        
		public function query($sql, $params = [])
		{
			// Подготовка запроса
			$stmt = $this->db->prepare($sql);
			
			// Обход массива с параметрами 
			// и подставление значений
			if ( !empty($params) ) {
				foreach ($params as $key => $value) {
					$stmt->bindValue(":$key", $value);
				}
			}
			
			// Выполняем запрос
			$util = new Util;
			$util->mvd2f($stmt,'/Users/svbelykh/Sites/yeticave/mySite/backMySite/myDebug.log');
			$stmt->execute();
			// Возвращаем ответ
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

}