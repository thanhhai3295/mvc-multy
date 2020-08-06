<?php
class BookModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_BOOK);
	}
	public function listItems($params) {
		$catID		= $params['catID'];
		$query	= "SELECT `id`, `name`, `picture`, `description`, `category_id`";
		$query	.= "FROM `$this->table`";
		$query	.= "WHERE `status`  = 'active' AND `category_id` = '$catID'";
		$query	.= " ORDER BY `ordering` ASC";
		
		
		$pagination					= $params['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if($totalItemsPerPage > 0){
			$position	= ($pagination['currentPage']-1)*$totalItemsPerPage;
			$query.= " LIMIT $position, $totalItemsPerPage";
		}
		
		$result = $this->rawQuery($query);
		return $result;
	}

	public function countItem($params) {
		$catID		= $params['catID'];
		$query	= "SELECT count(id) ";
		$query	.= "FROM $this->table ";
		$query	.= "WHERE status  = 'active' AND category_id = '$catID'";
		$count = $this->rawQueryOne ($query);
		return $count['count(id)'];
	}
	public function infoItem($params) {
		$query	= "SELECT `name` FROM `".TBL_CATEGORY."` WHERE `id` = '" . $params['catID'] . "'";
		return $this->rawQueryOne($query);
	}
}