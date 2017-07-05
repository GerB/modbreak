<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2016 Ger Bruinsma
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace ger\modbreak\migrations;

use phpbb\db\migration\container_aware_migration;

class install_modbreak extends container_aware_migration
{

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v320\v320');
	}

	public function update_data()
	{
		return array(
			array('custom', array(array($this, 'install_modbreak'))),
		);
	}
	
	/**
	 * Installs modbreak BBcode, used by migrations to perform add/updates
	 *
	 * @param array $bbcode_data Array of BBCode data to install
	 * @return null
	 * @access public
	 */
	public function install_modbreak($bbcode_data)
	{
		// Load the acp_bbcode class
		if (!class_exists('acp_bbcodes'))
		{
			include($this->phpbb_root_path . 'includes/acp/acp_bbcodes.' . $this->php_ext);
		}
		$bbcode_tool = new \acp_bbcodes();

		$bbcode_data = array(
			'mod=' => array(
				'bbcode_match'		=> '[mod={TEXT1;optional;defaultValue=}]{TEXT2}[/mod]',
				'bbcode_tpl'		=> '<p class="bbc_mod_head">{L_MODBREAK_HEAD}{TEXT1}</p><div class="bbc_mod_text">{TEXT2}</div>',
				'bbcode_helpline'	=> '',
				'display_on_posting'=> 0,
			),
		);

		foreach ($bbcode_data as $bbcode_name => $bbcode_array)
		{
			// Build the BBCodes
			$data = $bbcode_tool->build_regexp($bbcode_array['bbcode_match'], $bbcode_array['bbcode_tpl'], $bbcode_array['bbcode_helpline']);
			$bbcode_array += array(
				'bbcode_tag'			=> $data['bbcode_tag'],
				'first_pass_match'		=> $data['first_pass_match'],
				'first_pass_replace'	=> $data['first_pass_replace'],
				'second_pass_match'		=> $data['second_pass_match'],
				'second_pass_replace'	=> $data['second_pass_replace']
			);
			$sql = 'SELECT bbcode_id
				FROM ' . BBCODES_TABLE . "
				WHERE LOWER(bbcode_tag) = '" . strtolower($bbcode_name) . "'
				OR LOWER(bbcode_tag) = '" . strtolower($bbcode_array['bbcode_tag']) . "'";
			$result = $this->db->sql_query($sql);
			$row_exists = $this->db->sql_fetchrow($result);
			$this->db->sql_freeresult($result);
			if ($row_exists)
			{
				// Update existing BBCode
				$bbcode_id = $row_exists['bbcode_id'];
				$sql = 'UPDATE ' . BBCODES_TABLE . '
					SET ' . $this->db->sql_build_array('UPDATE', $bbcode_array) . '
					WHERE bbcode_id = ' . $bbcode_id;
				$this->db->sql_query($sql);
			}
			else
			{
				// Create new BBCode
				$sql = 'SELECT MAX(bbcode_id) AS max_bbcode_id
					FROM ' . BBCODES_TABLE;
				$result = $this->db->sql_query($sql);
				$max_bbcode_id = $this->db->sql_fetchfield('max_bbcode_id');
				$this->db->sql_freeresult($result);
				if ($max_bbcode_id)
				{
					$bbcode_id = $max_bbcode_id + 1;
					// Make sure it is greater than the core BBCode ids...
					if ($bbcode_id <= NUM_CORE_BBCODES)
					{
						$bbcode_id = NUM_CORE_BBCODES + 1;
					}
				}
				else
				{
					$bbcode_id = NUM_CORE_BBCODES + 1;
				}
				if ($bbcode_id <= BBCODE_LIMIT)
				{
					$bbcode_array['bbcode_id'] = (int) $bbcode_id;
					$bbcode_array['display_on_posting'] = ((int) $bbcode_array['display_on_posting']);
					$this->db->sql_query('INSERT INTO ' . BBCODES_TABLE . ' ' . $this->db->sql_build_array('INSERT', $bbcode_array));
				}
			}
		}
	}
	
	
	/**
	 * Revert by removing the BBcode
	 */	
	public function revert_data()
	{	
		return array(
			array('custom', array(array($this, 'remove_bbcode'))),
		);
	}
	
	public function remove_bbcode()
	{
		$this->db->sql_query('DELETE FROM ' . BBCODES_TABLE . " WHERE LOWER(bbcode_tag) = 'mod='");
	}
	
} // EoF
