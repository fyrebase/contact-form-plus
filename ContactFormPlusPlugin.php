<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * Power up the Pixel &amp; Tonic Contact Form plugin!
 *
 * @author    Fyrebase
 * @copyright Copyright (c) 2016 Fyrebase
 * @link      fyrebase.com
 * @package   ContactFormPlus
 * @since     0.0.1
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      https://github.com/fyrebase/contact-form-plus
 */

namespace Craft;

class ContactFormPlusPlugin extends BasePlugin
{
		/**
		 * @return mixed
		 */
		public function init()
		{
				craft()->on('contactForm.beforeSend', function(ContactFormEvent $event) {
						craft()->contactFormPlus->prep($event);
				});
		}

		/**
		 * @return mixed
		 */
		public function getName()
		{
				 return Craft::t('Contact Form Plus');
		}

		/**
		 * @return mixed
		 */
		public function getDescription()
		{
				return Craft::t('Power up the Pixel & Tonic Contact Form plugin!');
		}

		/**
		 * @return string
		 */
		public function getDocumentationUrl()
		{
				return 'https://github.com/fyrebase/contact-form-plus/blob/master/README.md';
		}

		/**
		 * @return string
		 */
		public function getReleaseFeedUrl()
		{
				return 'https://raw.githubusercontent.com/fyrebase/contact-form-plus/master/releases.json';
		}

		/**
		 * @return string
		 */
		public function getVersion()
		{
				return '0.0.1';
		}

		/**
		 * @return string
		 */
		public function getSchemaVersion()
		{
				return '0.0.1';
		}

		/**
		 * @return string
		 */
		public function getDeveloper()
		{
				return 'Fyrebase';
		}

		/**
		 * @return string
		 */
		public function getDeveloperUrl()
		{
				return 'http://fyrebase.com';
		}

		/**
		 * @return bool
		 */
		public function hasCpSection()
		{
				return false;
		}

		/**
		 */
		public function onBeforeInstall()
		{
		}

		/**
		 */
		public function onAfterInstall()
		{
		}

		/**
		 */
		public function onBeforeUninstall()
		{
		}

		/**
		 */
		public function onAfterUninstall()
		{
		}
}
