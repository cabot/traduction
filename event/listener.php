<?php
/**
 *
 * @package phpBB Extension - Modification de la traduction
 * @copyright (c) 2023 cabot
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */
namespace cabot\traduction\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	protected $template;
	protected $language;

	public function __construct(
		\phpbb\language\language $language,
		\phpbb\template\template $template)
	{
		$this->language = $language;
		$this->template = $template;
	}

	static public function getSubscribedEvents ()
	{
		return [
			'core.user_setup_after'	=> 'load_language_setup_after',
		];
	}

	/**
	 * @param array $event
	 */
	public function load_language_setup_after($event)
	{
		$this->language->add_lang ('traduction', 'cabot/traduction');
	}
}
