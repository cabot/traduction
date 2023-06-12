<?php
/**
 *
 * @package phpBB Extension - Translation modification
 * @copyright (c) 2023 cabot
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
namespace cabot\translation\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	public static function getSubscribedEvents()
	{
		return [
			'core.user_setup'	=> 'load_language_on_setup',
		];
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = [
			'ext_name'	=> 'cabot/translation',
			'lang_set'	=> 'translation',
		];
		$event['lang_set_ext'] = $lang_set_ext;
	}
}
