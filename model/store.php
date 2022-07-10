<?php

	class Store 
	{

		public static function getStores()
		{

			global $db;
			$sql = 'SELECT * FROM stores';
			$result = $db->query($sql);
			$result = $db->executeS();
			if($result){
				return $result;
			}else{
				return false;
			}
		}

		public static function getStoresByPostalCode($postal_code_id)
		{
			global $db;

			$sql = 'SELECT range_start, range_end FROM postal_codes WHERE id = :id';
        	$result_postal_code = $db->query($sql);
        	$result_postal_code = $db->bind(':id', $postal_code_id);
			$result_postal_code = $db->getRow();


			$sql = 'SELECT * FROM stores WHERE postal_code >= :postal_start AND postal_code <= :postal_end';
			$result = $db->query($sql);
			$result = $db->bind(':postal_start', $result_postal_code->range_start);
			$result = $db->bind(':postal_end', $result_postal_code->range_end);
			$result = $db->executeS();

			if($result){
				return $result;
			}
		}

	}

?>