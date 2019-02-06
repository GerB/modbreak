<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2019 Jim_Di
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso     : ru
 * Lang_ver     : 1.0
 * Lang_author  : Jim_Di
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
	'MODBREAK_HEAD'					=> 'Сообщение модератора',
	'MODBREAK_HEAD_FROM'			=> ' от: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'	=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'		=> 'Добавление сообщения модератора в пост: [mod]Текст[/mod]     Может быть использовано только модераторами',
	'MODBREAK_OPT_LABEL'			=> 'Сообщение модератора',
	'MODBREAK_OPT_MESSAGEBOX'		=> 'Внутри поста',
	'MODBREAK_OPT_FULLPOST'			=> 'Отдельным постом',
));
