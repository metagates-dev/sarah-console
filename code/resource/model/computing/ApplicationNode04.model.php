<?php
/**
 * Default description, create by Syrian artisan.
 *
 * 
 * @date   2019/03/08 14:50:33
 */

import('model.C_Model');

class ApplicationNode04Model extends C_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->db    = self::getDatabase('Mysql', 'computing_db');
		$this->table = 'sarah_application_node_04';
		$this->primary_key = 'Id';
	}

}
