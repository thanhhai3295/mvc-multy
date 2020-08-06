<?php
class IndexModel extends Model{
	public function __construct(){
		parent::__construct();
	
	}
	public function featureBook($params) {
		$query	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`description`, `b`.`category_id`, `c`.`name` AS `category_name` ";
		$query	.= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` ";
		$query	.= "WHERE `b`.`status`  = 'active' AND `b`.`special` = 1 AND `c`.`id` = `b`.`category_id` ";
		$query	.= "ORDER BY `b`.`ordering` ASC ";
		$query	.= "LIMIT 0, 2";
		$result = $this->rawQuery($query);
		return $result;
	}
	public function newBook($params) {
		$query	= "SELECT `b`.`id`, `b`.`name`, `b`.`picture`, `b`.`description`, `b`.`category_id`, `c`.`name` AS `category_name` ";
		$query	.= "FROM `".TBL_BOOK."` AS `b`, `".TBL_CATEGORY."` AS `c` ";
		$query	.= "WHERE `b`.`status`  = 'active' AND `c`.`id` = `b`.`category_id` ";
		$query	.= "ORDER BY `id` DESC ";
		$query	.= "LIMIT 0, 3";
		$result = $this->rawQuery($query);
		return $result;
	}
}