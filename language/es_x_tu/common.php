<?php

/**
 *
 * Modbreak
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @copyright (c) 2018 LukeWCS
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * Lang_iso   : es_x_tu (Casual Honorifics - TÚ)
 * Lang_ver   : 1.2.0
 * Lang_author: ThE KuKa - http://www.phpbb-es.com
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
	'MODBREAK_HEAD'						=> 'Mensaje de Moderador',
	'MODBREAK_HEAD_FROM'				=> ' de: ',
	'MODBREAK_HEAD_DATE_SEPARATOR'		=> ' » ',
	'MODBREAK_BUTTON_TOOLTIP'			=> 'Insertar mensaje de Moderador en mensaje: [mod]Texto[/mod] Puede ser usado sólo por Moderadores',
));
