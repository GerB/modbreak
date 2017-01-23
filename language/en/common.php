<?php

/**
 *
 * Modbreak [English]
 *
 * @copyright (c) 2017 Ger Bruinsma
 * @license GNU General Public License, version 2 (GPL-2.0)
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

$lang = array_merge($lang, array(
	'MODBREAK_HEAD'	=> 'Message from moderator ',
));
