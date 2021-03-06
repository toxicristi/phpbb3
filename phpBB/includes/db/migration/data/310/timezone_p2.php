<?php
/**
*
* @package migration
* @copyright (c) 2012 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License v2
*
*/

class phpbb_db_migration_data_310_timezone_p2 extends phpbb_db_migration
{
	public function effectively_installed()
	{
		return !$this->db_tools->sql_column_exists($this->table_prefix . 'users', 'user_dst');
	}

	static public function depends_on()
	{
		return array('phpbb_db_migration_data_310_timezone');
	}

	public function update_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_dst',
				),
			),
		);
	}

	public function revert_schema()
	{
		return array(
			'add_columns'	=> array(
				$this->table_prefix . 'users'			=> array(
					'user_dst'		=> array('BOOL', 0),
				),
			),
		);
	}
}
