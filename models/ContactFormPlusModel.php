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

		public function hiddens()
		{
				$str = '<input type="hidden" name="cf" value="' .$this->id . '-' . $this->handle . '">';
				if ($this->hideMessage) {
						$str .= '<input type="hidden" name="message" value="*">';
				}

				return TemplateHelper::getRaw($str);
		}

}
