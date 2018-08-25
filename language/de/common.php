<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso   : de
 * Lang_ver   : 1.2.0
 * Lang_author: LukeWCS
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
	'MODBREAK_HEAD'				=> 'Moderator-Nachricht',
	'MODBREAK_HEAD_FROM'			=> ' von: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'		=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Moderator-Nachricht in Beitrag einfügen: [mod]Text[/mod]     Kann nur von Moderatoren benutzt werden',
));
