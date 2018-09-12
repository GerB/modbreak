<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso     : nl [Dutch]
 * Lang_ver     : 1.3.1
 * Lang_author  : Ger Bruinsma
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
	'MODBREAK_HEAD'					=> 'Opmerking moderator',
	'MODBREAK_HEAD_FROM'			=> ' van: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'	=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Voeg moderator bericht in: [mod]Tekst[/mod]     Alleen bruikbaar voor moderators',
	'MODBREAK_OPT_LABEL'			=> 'Moderator message',
	'MODBREAK_OPT_MESSAGEBOX'		=> 'As a box in the post',
	'MODBREAK_OPT_FULLPOST'			=> 'As full post',
));
