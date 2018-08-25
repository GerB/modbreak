<?php
/**
 *
 * Simple moderator-only BBcode to add remarks
 *
 * @copyright (c) 2017, Ger, https://github.com/GerB
 * @copyright (c) 2018, LukeWCS, https://www.wcsaga.org
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace ger\modbreak\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
	protected $auth;
	protected $request;
	protected $user;
	protected $php_ext;
	protected $language;
	protected $template; 	
	
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'				=> 'load_lang',
			'core.text_formatter_s9e_parse_before'		=> 'set_permissions',
			'core.modify_format_display_text_before'	=> 'create_variables_for_display',
			'core.modify_text_for_display_before'		=> 'create_variables_for_display',
			'core.modify_format_display_text_after'		=> 'parse_variables_for_display',
			'core.modify_text_for_display_after'		=> 'parse_variables_for_display',
			'core.modify_posting_parameters'		=> 'create_script_variables',
		);
	}
	public function __construct(\phpbb\auth\auth $auth, \phpbb\request\request_interface $request, \phpbb\user $user, $php_ext, \phpbb\language\language $language, \phpbb\template\template $template)
	{
		$this->auth = $auth;
		$this->request = $request;
		$this->user = $user;
		$this->php_ext = $php_ext;
		$this->language = $language;
		$this->template = $template;
	}

	/**
	 * Load language string for heading
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_lang($event) {
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name'	 => 'ger/modbreak',
			'lang_set'	 => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Check if user is moderator. If not, ditch moderator BBcode.
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function set_permissions($event)
	{
		if (!$this->auth->acl_get('m_', $this->request->variable('f', 0)))
		{
			$event['parser']->disable_bbcode('mod');
		}
	}
	
	// Parse BBcode from post and convert parameters into masked values. (LukeWCS)
	public function create_variables_for_display($event)
	{
		if (!preg_match('/<MOD(?s).*?<\/MOD>/i', $event['text'])) { return; }
		$text = $event['text'];
		$text = preg_replace_callback('/(<MOD.*?=")(.+?)("(?s).*?<\/MOD>)/i', function ($regex_a) 
			{
				$username_var = '{@mod_break_username@'.$regex_a[2].'@}';
				return $regex_a[1].$username_var.$regex_a[3];
			}, $text);
		$text = preg_replace_callback('/(<MOD.*?=")(.*?)(".*?time=)([0-9]*)(.*?user_id=)([0-9]*)(.*?\](?s).*?<\/MOD>)/i', function ($regex_a) 
			{
				$timestamp_var = '{@mod_break_timestamp@'.$regex_a[4].'@}';
				$userid_var = '{@mod_break_userid@'.$regex_a[6].'@}';
				return $regex_a[1].$regex_a[2].$timestamp_var.$userid_var.$regex_a[3].$regex_a[4].$regex_a[5].$regex_a[6].$regex_a[7];
			}, $text);
		$event['text'] = $text;
	}
	
	// Parse HTML and convert masked values into their final state. (LukeWCS)
	public function parse_variables_for_display($event)
	{
		if (!preg_match('/\{@mod_break.*?@\}/', $event['text'])) { return; }
		$text = $event['text'];
		$text = preg_replace_callback('/\{@mod_break_username@(.*?)@\}.*?\{@mod_break_timestamp@(.*?)@\}.*?\{@mod_break_userid@(.*?)@\}/', function ($regex_a) 
			{
				$username = $regex_a[1];
				$formatted_date = $this->user->format_date($regex_a[2], false, false);
				$profile_url = generate_board_url().'/memberlist.'.$this->php_ext.'?mode=viewprofile&u='.$regex_a[3];
				$from = $this->language->lang('MODBREAK_HEAD_FROM');
				$separator = $this->language->lang('MODBREAK_HEAD_DATE_SEPARATOR');
				return $from.'<a href="'.$profile_url.'">'.$username.'</a>'.$separator.$formatted_date;
			}, $text);
		$text = preg_replace_callback('/\{@mod_break_username@(.*?)@\}/', function ($regex_a) 
			{
				$username = $regex_a[1];
				$from = $this->language->lang('MODBREAK_HEAD_FROM');
				return $from.$username;
			}, $text);
		$event['text'] = $text;
	}
	
	// Create some variables for use in JS. (LukeWCS)
	public function create_script_variables($event)
	{
		$template_data = array(
			'S_USER_ID'		=> $this->user->data['user_id'],
			'S_MODBREAK_ALLOWED'	=> $this->auth->acl_get('m_', $this->request->variable('f', 0)),
		);	
		$this->template->assign_vars($template_data);
	}
}
