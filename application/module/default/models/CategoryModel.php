<?php
class CategoryModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_CATEGORY);
	}
	public function listItems($params) {
		$totalItemsPerPage = $params['pagination']['totalItemsPerPage'];
		$currentPage 			 = $params['pagination']['currentPage'];
	
		$this->pageLimit   = $totalItemsPerPage;
		$this->where('status','active');
		$result = $this->arraybuilder()->paginate("`$this->table`", $currentPage);

		return $result;
	}

	public function countItem($params) {
		$sql = "SELECT count(id) as `count` FROM `$this->table` WHERE id > 0";
		$count = $this->rawQueryOne ($sql);
		return $count['count'];
	}
}