/**
 * Contact Form Plus plugin for Craft CMS
 *
 * ContactFormPlusFieldType JS
 *
 * @author    Fyrebase
 * @copyright Copyright (c) 2016 Fyrebase
 * @link      fyrebase.com
 * @package   ContactFormPlus
 * @since     0.0.1
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @link      https://github.com/fyrebase/contact-form-plus
 */

;(function($){
	ContactFormPlusFieldType = Garnish.Base.extend({
		container: null,
		init: function(id, options)
		{
			var self = this;

			this.container = $("#" + id + '-field')

			;(function() {
				self.$message = $(self.container).find('.' + options.targetEl).not('.redacted').addClass('redacted')

				self.$message.redactor({
					buttons: ['bold', 'italic'],
					plugins: ['source']
				})

				if(options.hideMessage) $('#' + options.namespace + 'message-field').addClass('hidden');

			})()
		}

	})
})(jQuery);
