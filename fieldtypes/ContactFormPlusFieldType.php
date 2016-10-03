<?php
/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlus FieldType
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

class ContactFormPlusFieldType extends BaseFieldType
{
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
		public function defineContentAttribute()
		{
				return AttributeType::Mixed;
		}

		/**
		 * @param string $name
		 * @param mixed  $value
		 * @return string
		 */
		public function getInputHtml($name, $value)
		{
				if (!$value)
						$value = new ContactFormPlusModel();

				$id = craft()->templates->formatInputId($name);
				$namespacedId = craft()->templates->namespaceInputId($id);

				craft()->templates->includeJsResource('contactformplus/js/fields/ContactFormPlusFieldType.js');

				$jsonVars = array(
						'id' => $id,
						'targetEl' => 'contactformplus__m',
						'name' => $name,
						'namespace' => $namespacedId,
						'prefix' => craft()->templates->namespaceInputId(""),
						'hideMessage' => !$value->hideMessage,
						);

				$jsonVars = json_encode($jsonVars);

				craft()->templates->includeJs('new ContactFormPlusFieldType("'.craft()->templates->namespaceInputId($id).'", ' . $jsonVars . ');');

				$variables = array(
						'id' => $id,
						'name' => $name,
						'namespaceId' => $namespacedId,
						'values' => $value
						);

				return craft()->templates->render('contactformplus/fields/ContactFormPlusFieldType.twig', $variables);
		}

		/**
		 * @param mixed $value
		 * @return mixed
		 */
		public function prepValueFromPost($value)
		{
				return $value;
		}

		/**
		 * @param mixed $value
		 * @return mixed
		 */
		public function prepValue($value)
		{
			if(!$value) return null;

			foreach ($this->element->getFieldLayout()->getFields() as $f) {
				$field = craft()->fields->getFieldById($f->fieldId);
				if($field->type == 'ContactFormPlus') $handle = $field->handle;
			}

			$value = new ContactFormPlusModel($value);
			$value['id'] = strtolower($this->element->elementType[0]) . '-' . $this->element->id;

			$value['handle'] = $handle;

			return $value;
		}
}
