<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus Service
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

class ContactFormPlusService extends BaseApplicationComponent
{
		public function prep($event)
		{
				$settings = $event->params['settings'];
				$message = $event->params['message'];

				list($oType, $oId, $handle) = explode('-', craft()->request->getPost('cf'));

				switch ($oType) {
						case 'n':
								$criteria = craft()->elements->getCriteria(Neo_ElementType::NeoBlock);
								break;

						case 'm':
								$criteria = craft()->elements->getCriteria(ElementType::MatrixBlock);
								break;

						case 'e':
								$criteria = craft()->elements->getCriteria(ElementType::Entry);
								break;
				}

				$criteria->id = $oId;
				$block = $criteria->find();
				$field = $block[0][$handle];

				if ($message['message'] == '*') {
						$str = preg_replace('/\{fromName\}/i', $message['fromName'], $field->message);
						$str = preg_replace('/\{fromEmail\}/i', $message['fromEmail'], $str);
						$str = str_replace(chr(0xC2).chr(0xA0), ' ', $str);
						$str = str_replace('&nbsp;', ' ', $str);
						$message['message'] = strip_tags($str);
						$message->htmlMessage = $str;
				}

				if(!empty($field->toEmails)) $settings['toEmail'] .= ', ' . $field->toEmails;
				if(!empty($field->subject)) $settings['prependSubject'] = $field->subject;
		}

}
