<?php
	class Map
	{
		private $stores; 

		public function loadStores($postal_code_id = null)
		{
			if($postal_code_id){
				$this->stores = Store::getStoresByPostalCode($postal_code_id);
			}else{
				$this->stores = Store::getStores();
			}
		}

		private function renderSidebar()
		{
			$count_stores = 0;
			if ($this->stores) {
				foreach ($this->stores as $store) {

					//Pass data to View
					$number_of_item = $count_stores++;
					$name 	 		= $store['name'];
					$address 		= $store['address'];
					$phone 	 		= $store['phone'];

					//Render View
					include './view/sidebar.php'; 
				}
			}
		}

		private function getFilters()
		{
			global $db;
			$sql = 'SELECT * FROM postal_codes';
	  		$postal_codes = $db->query($sql);
	  		$postal_codes = $db->executeS();
	  		if($postal_codes){
	  			$array = array(array("perioxi"=>"All Cities","range_start"=>"0","range_end"=>"99999","id"=>"0"));
	  			$postal_codes = array_merge($array, $postal_codes);
	  			return $postal_codes;
	  		}else{
				return false;
			}
		}

		private function renderFilters()
		{
			$filters = $this->getFilters();
			if ($filters) {
				include './view/filters.php';
			}
		}

		public function renderMap()
		{		
			include './view/map.php';
		}
		
	}

?>