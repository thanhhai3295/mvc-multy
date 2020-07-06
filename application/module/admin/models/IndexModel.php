<?php
class IndexModel extends Model{

	public function infoItem($arrParam){

		$username	= $arrParam['form']['username'];
		$password	= md5($arrParam['form']['password']);
		$query = "SELECT `u`.`id`, `u`.`fullname`, `u`.`email`, `u`.`username`, `u`.`group_id`, `g`.`group_acp`, `g`.`privilege_id`";
		$query .= "FROM `user` AS `u` LEFT JOIN `group` AS g ON `u`.`group_id` = `g`.`id`";
		$query .= "WHERE `username` = '$username' AND `password` = '$password'";
		$result = $this->rawQueryOne($query);
		return $result;
		
	}

	public function countItem($tableName){
		$sql = "SELECT count(id) as `count` FROM `$tableName`";
		$count = $this->rawQueryOne ($sql);
		return $count['count'];
	}
}