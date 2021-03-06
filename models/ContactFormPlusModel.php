<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus Model
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

class ContactFormPlusModel extends BaseModel
{
		/**
		 * @return array
		 */
		protected function defineAttributes()
		{
				return array_merge(parent::defineAttributes(), array(
						'toEmails' => array(AttributeType::String),
						'subject' => array(AttributeType::String),
						'message' => array(AttributeType::String),
						'hideMessage' => array(AttributeType::Bool),
						'id' => array(AttributeType::Number),
						'handle' => array(AttributeType::String),
				));
		}

		public function __toString()
		{
				return $this->id . '-' . $this->handle;
		}

		public function getHideMessage()
		{
			return $this->hideMessage;
		}

		public function getHiddens()
		{
				$str = '<input type="hidden" name="cf" value="' .$this->id . '-' . $this->handle . '">';
				if ($this->hideMessage) {
						$str .= '<input type="hidden" name="message" value="*">';
				}

				return TemplateHelper::getRaw($str);
		}

}
