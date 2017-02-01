<?php
/**
 *
 * Simple moderator-only BBcode to add remarks
 *
 * @copyright (c) 2017, Ger, https://github.com/GerB
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
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'						=> 'load_lang',
			'core.text_formatter_s9e_parse_before'	=> 'set_persmissions',
		);
	}
	protected $auth;
	protected $request;

	public function __construct(\phpbb\auth\auth $auth, \phpbb\request\request_interface $request)
	{
		$this->auth = $auth;
		$this->request = $request;
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
	public function set_persmissions($event)
	{
		if (!$this->auth->acl_get('m_', $this->request->variable('f', 0)))
		{
			$event['parser']->disable_bbcode('mod');
		}
	}
}
