<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso     : de_x_sie
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
	'MODBREAK_HEAD'					=> 'Moderator-Nachricht',
	'MODBREAK_HEAD_FROM'			=> ' von: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'	=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Moderator-Nachricht in Beitrag einfügen: [mod]Text[/mod]     Kann nur von Moderatoren benutzt werden',
	'MODBREAK_OPT_LABEL'			=> 'Moderator-Nachricht',
	'MODBREAK_OPT_MESSAGEBOX'		=> 'Als Kasten im Beitrag',
	'MODBREAK_OPT_FULLPOST'			=> 'Als Beitrag',
));
