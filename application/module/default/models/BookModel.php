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
	public function categoryName($params) {
		$query	= "SELECT `name` FROM `".TBL_CATEGORY."` WHERE `id` = '" . $params['catID'] . "'";
		return $this->rawQueryOne($query);
	}
	public function bookInfo($params) {
		$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` WHERE `b`.`id` = '" . $params['bookID'] . "' AND `c`.`id` = `b`.`category_id`";
		return $this->rawQueryOne($query);
	}
	public function bookRelate($params) {
		$bookID		= $params['bookID'];
		$id  = $this->rawQueryOne('select category_id from '.TBL_BOOK.' where id ='.$bookID);
		$catID = $id['category_id'];
		$query	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `c`.`name` AS `category_name` ";
		$query	.= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` ";
		$query	.= "WHERE `b`.`status`  = 'active'  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$catID' ";
		$query .= "ORDER BY `b`.`ordering` ASC";
		return $this->rawQuery($query);
	}
}