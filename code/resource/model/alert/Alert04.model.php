<?php
/**
 * Default description, create by Syrian artisan.
 *
 * 
 * @date   2019/01/08 17:16:16
 */

import('model.C_Model');

class Alert04Model extends C_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->db    = self::getDatabase('Mysql', 'core_db');
		$this->table = 'sarah_alert_04';
		$this->primary_key = 'Id';
	}

}
