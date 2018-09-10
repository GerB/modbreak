<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso     : en
 * Lang_ver     : 1.2.0
 * Lang_author  : LukeWCS
 * Lang_tab_size: 4
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Some characters you may want to copy&paste:
// ’ » „ “ — …
$lang = array_merge($lang, array(
	'MODBREAK_HEAD'					=> 'Moderator message',
	'MODBREAK_HEAD_FROM'			=> ' from: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'	=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Insert moderator message in post: [mod]Text[/mod]     Can only be used by moderators',
	'MODBREAK_OPT_LABEL'			=> 'Moderator message',
	'MODBREAK_OPT_MESSAGEBOX'		=> 'As a box in the post',
	'MODBREAK_OPT_FULLPOST'			=> 'As full post',
));
