<?php
class BookModel extends Model{
	public function __construct(){
		parent::__construct();
		$this->setTable(TBL_BOOK);
	}
	public function listItems($params,$options) {
		$catID		= $params['catID'];
		$query	= "SELECT `id`, `name`, `picture`, `description`, `category_id`";
		$query	.= "FROM `$this->table`";
		$query	.= "WHERE `status`  = 'active' AND `category_id` = '$catID'";
		if(isset($params['filter'])) {
			if($params['filter'] != 'new') {
				$filter = $params['filter'];
				$query .= "ORDER BY ".$filter." DESC ";
			} else {
				$query .= "ORDER BY ID DESC ";
			}
		} else {
			$query .= "ORDER BY ID DESC ";
		}
		
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

	public function getItemRelate($params) {
		$bookID		= $params['bookID'];
		$id  = $this->rawQueryOne('select category_id from '.TBL_BOOK.' where id ='.$bookID);
		$catID = $id['category_id'];
		$query	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`category_id`, `c`.`name` AS `category_name` ";
		$query	.= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` ";
		$query	.= "WHERE `b`.`status`  = 'active'  AND `c`.`id` = `b`.`category_id` AND `b`.`id` <> '$bookID' AND `c`.`id`  = '$catID' ";
		$query .= "ORDER BY `b`.`ordering` ASC";
		return $this->rawQuery($query);
	}
	public function infoItem($params,$options) {
		if($options['task'] == 'category-name') {
			$query	= "SELECT `name` FROM `".TBL_CATEGORY."` WHERE `id` = '" . $params['catID'] . "'";
		}
		if($options['task'] == 'detail-book') {
			$query	= "SELECT `b`.`id`, `b`.`name`, `c`.`name` AS `category_name`, `b`.`price`, `b`.`sale_off`, `b`.`picture`, `b`.`description`, `b`.`category_id` FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` WHERE `b`.`id` = '" . $params['bookID'] . "' AND `c`.`id` = `b`.`category_id`";
		}
		return $this->rawQueryOne($query);
	}
}