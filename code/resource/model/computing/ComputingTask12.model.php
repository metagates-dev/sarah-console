<?php
/**
 * Default description, create by Syrian artisan.
 *
 * 
 * @date   2019/01/28 18:26:15
 */

import('model.C_Model');

class ComputingTask12Model extends C_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->db    = self::getDatabase('Mysql', 'computing_db');
		$this->table = 'sarah_computing_task_12';
		$this->primary_key = 'Id';
	}

}
