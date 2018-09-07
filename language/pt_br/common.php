<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso     : pt_br
 * Lang_ver     : 1.2.0
 * Lang_author  : eunaumtenhoid 2018 (https://github.com/phpBBTraducoes)
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
	'MODBREAK_HEAD'					=> 'Mensagem do moderador',
	'MODBREAK_HEAD_FROM'			=> ' de: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'	=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Insira a mensagem do moderador no post: [mod]Texto[/mod]     Só pode ser usado por moderadores',
	'MODBREAK_OPT_LABEL'			=> 'Moderator message',
	'MODBREAK_OPT_MESSAGEBOX'		=> '&bull; as message box',
	'MODBREAK_OPT_FULLPOST'			=> '&bull; as full post',
));
