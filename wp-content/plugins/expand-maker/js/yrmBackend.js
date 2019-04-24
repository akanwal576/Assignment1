function yrmBackend() {
	
}

yrmBackend.prototype.init = function() {
	
	this.deleteAjaxRequest();
	this.accordionContent();
	this.proOptionsWrapper();
	this.select2();
	this.changeEasings();
	this.changeSwitch();
	this.changeContentGradientColor();
	this.changeButtonBorderColor();
	this.changeButtonBorderWidth();
	this.changeButtonBoxShadow();
	this.changeButtonTitle();
	this.support();

	this.changeContentGradientHeight();
	this.changeContentGradientPosition();
	this.switchContentGradientColor();
	this.switchInlineButton();
	this.swicthEnableIcon();
	this.changeIconDimension();

	this.export();
	this.importData();

	/*copy to clipboard*/
	this.copySortCode();

	this.multipleChoiceButton();
	this.chnageDimensionsMode();
	this.chnageAutoModePadding();
	this.livePreviewDraggble();
	this.promotionalVideo();
	this.livePreviewToggle();
};

yrmBackend.prototype.livePreviewDraggble = function() {
    jQuery('#yrm-live-preview').draggable({
        stop: function(e, ui) {
            jQuery('.yrm-live-preview').css({'height': 'auto'});
        }
    });
};

yrmBackend.prototype.promotionalVideo = function() {
    var target = jQuery('.yrm-play-promotion-video');

    if(!target.length) {
        return false;
    }

    target.bind('click', function(e) {
        e.preventDefault();
        var href = jQuery(this).data('href');
        window.open(href);
    });
};

yrmBackend.prototype.livePreviewToggle = function() {
    var livePreviewText = jQuery('.yrm-toggle-icon');

    if (!livePreviewText.length) {
        return false;
    }
    livePreviewText.attr('checked', true);
    livePreviewText.bind('click', function() {
        var isChecked = jQuery(this).attr('checked');

        if(isChecked) {
            jQuery('.yrm-toggle-icon').removeClass('yrm-toggle-icon-open').addClass('yrm-toggle-icon-close');
        }
        else {
            jQuery('.yrm-toggle-icon').removeClass('yrm-toggle-icon-close').addClass('yrm-toggle-icon-open');
        }
        jQuery('.yrm-livew-preview-content').slideToggle(1000, 'swing', function () {
        });
        livePreviewText.attr('checked', !isChecked);
    });
};

yrmBackend.prototype.support = function() {
	var submit = jQuery('#yrm-support-request-button');

	if(!submit.length) {
		return false;
	}
	jQuery('#yrm-form').submit(function(e) {
		e.preventDefault();
		var isValid = true;
		var emailError = jQuery('.yrm-validate-email-error');
		emailError.addClass('yrm-hide');
		jQuery('.yrm-required-fields').each(function() {
			var currentVal = jQuery(this).val();
			jQuery('.'+jQuery(this).data('error')).addClass('yrm-hide');

			if(!currentVal) {
				isValid = false;
				jQuery('.'+jQuery(this).data('error')).removeClass('yrm-hide');
			}
		});

		if(!isValid) {
			return false;
		}

		var validateEmail = function(email) {
			var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return re.test(String(email).toLowerCase());
		}

		if(!validateEmail(jQuery('#yrm-email').val())) {
			emailError.removeClass('yrm-hide');
			return false;
		}
		var data = {
			action: 'yrm_support',
			ajaxNonce: yrmBackendData.nonce,
			formData: jQuery(this).serialize(),
			beforeSend: function() {
				submit.prop('disabled', true);
				jQuery('.yrm-support-spinner').removeClass('yrm-hide')
			}
		};

		jQuery.post(ajaxurl, data, function(result) {
			submit.prop('disabled', false);
			jQuery('.yrm-support-spinner').addClass('yrm-hide');
			jQuery('#yrm-form').remove();
			jQuery('.yrm-support-success').removeClass('yrm-hide');
		});
	});
};

yrmBackend.prototype.changeIconDimension = function() {
	var widthDimension = jQuery('#arrow-icon-width');

	if(!widthDimension.length) {
		return false;
	}

	widthDimension.bind('change', function() {
		var val = jQuery(this).val();
		var width = parseInt(val)+'px';
		jQuery('.yrm-arrow-img').css({'width': width})
	});

	var heightDimension = jQuery('#arrow-icon-height');
	heightDimension.bind('change', function() {
		var val = jQuery(this).val();
		var height = parseInt(val)+'px';
		jQuery('.yrm-arrow-img').css({'height': height})
	});
};

yrmBackend.prototype.swicthEnableIcon = function() {
	var enableButtonIcon = jQuery('#enable-button-icon');

	if(!enableButtonIcon.length) {
		return false;
	}

	enableButtonIcon.bind('change', function() {
		var isChecked = jQuery(this).is(':checked');

		if(!isChecked) {
			jQuery('.yrm-arrow-img').remove();
		}
		else {
			var wrapper = jQuery('.yrm-text-wrapper');
			if(!wrapper.length) {
				wrapper = jQuery('.yrm-toggle-expand');
			}
			wrapper.prepend('<span class="yrm-arrow-img"></span>');
		}
	});
};

yrmBackend.prototype.switchInlineButton = function() {
	var inlineCheckbox = jQuery('#addButtonOfTheNext');

	inlineCheckbox.bind('change', function() {
		var isChecked = jQuery(this).is(':checked');

		if(isChecked) {
			jQuery('.yrm-inline-wrapper').addClass('yrm-btn-inline');
		}
		else {
			jQuery('.yrm-inline-wrapper').removeClass('yrm-btn-inline');
		}
	});
};

yrmBackend.prototype.switchContentGradientColor = function() {
	var switchGradient = jQuery('#showContentGradient');

	if(!switchGradient.length) {
		return false;
	}

	switchGradient.bind('change', function() {
		var isChecked = jQuery(this).is(':checked');
		var gradientTarget = jQuery('.yrm-content-gradient');
		if(isChecked) {
			if(!gradientTarget.length) {
				jQuery('.yrm-btn-wrapper').prepend('<div class="yrm-content-gradient"></div>');
				jQuery('#showContentGradientPosition').trigger('change');
				jQuery('#showContentGradientHeight').trigger('change');
				jQuery('.show-content-gradient-color').trigger('change');
			}
			gradientTarget.show();
		}
		else {
			gradientTarget.hide();
		}
	})
};

yrmBackend.prototype.changeContentGradientPosition = function() {
	var position = jQuery('#showContentGradientPosition');

	if(!position.length) {
		return false;
	}

	position.bind('change', function() {
		jQuery('.yrm-content-gradient').css({'top': jQuery(this).val()+'px'});
	});
};

yrmBackend.prototype.changeContentGradientHeight = function() {
	var height = jQuery('#showContentGradientHeight');

	if(!height.length) {
		return false;
	}

	height.bind('change', function() {
		jQuery('.yrm-content-gradient').css({'padding': jQuery(this).val()+'px 0'});
	});
};

yrmBackend.prototype.changeContentGradientColor = function() {
	jQuery('.show-content-gradient-color').wpColorPicker({
		change: function() {
			jQuery('#gradineg-color-style').remove();
			jQuery('body').append('<style id="gradineg-color-style">.yrm-content-gradient {background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, transparent),color-stop(1, '+jQuery(this).val()+')) !important; }</style>');
		
		}
	});
};

yrmBackend.prototype.chnageAutoModePadding = function() {
	var padding = jQuery('.button-padding');

	if(!padding.length) {
		return false;
	}

	padding.bind('change', function(e) {
		e.preventDefault();
		var autoModeButton = jQuery('.yrm-button-auto-mode');

		if(!autoModeButton.length) {
			return false;
		}

		var paddingDirection = jQuery(this).data('direction');
		var val = jQuery(this).val();
		var styleObj = {};
		styleObj['padding-'+paddingDirection] = parseInt(val)+'px';
		autoModeButton.css(styleObj);
	});
}

yrmBackend.prototype.chnageDimensionsMode = function() {
	var dimensions = jQuery('.dimension-mode');

	if(!dimensions.length) {
		return false;
	}

	dimensions.bind('change', function(e) {
		e.preventDefault();
		var val = jQuery(this).val();
		var expandButton = jQuery('.yrm-toggle-expand');
		if(val == 'autoMode') {
			expandButton.addClass('yrm-button-auto-mode');
		}
		else {
			expandButton.removeClass('yrm-button-auto-mode');
		}
	});
};

yrmBackend.prototype.multipleChoiceButton = function() {
	var choiceOptions = jQuery('.yrm-choice-option-wrapper input');
	if(!choiceOptions.length) {
		return false;
	}

	var that = this;

	choiceOptions.each(function() {

		if(jQuery(this).is(':checked')) {
			that.buildChoiceShowOption(jQuery(this));
		}

		jQuery(this).on('change', function() {
			that.hideAllChoiceWrapper(jQuery(this).parents('.yrm-multichoice-wrapper').first());
			that.buildChoiceShowOption(jQuery(this));
		});
	})
};

yrmBackend.prototype.hideAllChoiceWrapper = function(choiceOptionsWrapper) {
	choiceOptionsWrapper.find('input').each(function() {
		var choiceInputWrapperId = jQuery(this).attr('data-attr-href');
		jQuery('#'+choiceInputWrapperId).addClass('yrm-hide-content');
	})
};

yrmBackend.prototype.buildChoiceShowOption = function(currentRadioButton)  {
	var choiceOptions = currentRadioButton.attr('data-attr-href');
	var currentOptionWrapper = currentRadioButton.parents('.yrm-choice-wrapper').first();
	var choiceOptionWrapper = jQuery('#'+choiceOptions).removeClass('yrm-hide-content');
	currentOptionWrapper.after(choiceOptionWrapper);
};

yrmBackend.prototype.copySortCode = function() {
	jQuery('#expm-shortcode-info-div').bind('click', function() {
		var copyText = document.getElementById('expm-shortcode-info-div');
		copyText.select();
		document.execCommand('copy');

		var tooltip = document.getElementById('yrm-tooltip');
		tooltip.innerHTML = yrmBackendData.copied;
	});

	jQuery(document).on('focusout', '#expm-shortcode-info-div',function() {
		var tooltip = document.getElementById('yrm-tooltip');
		tooltip.innerHTML = yrmBackendData.copyToClipboard;
	});
};

yrmBackend.prototype.importData = function() {
	var custom_uploader;
	jQuery('.yrm-import-button').click(function(e) {
		e.preventDefault();
		var ajaxNonce = jQuery(this).attr('data-ajaxNonce');

		/* If the uploader object has already been created, reopen the dialog */
		if (custom_uploader) {
			custom_uploader.open();
			return;
		}

		/* Extend the wp.media object */
		custom_uploader = wp.media.frames.file_frame = wp.media({
			titleFF: 'Select Export File',
			button: {
				text: 'Select Export File'
			},
			multiple: false,
			library : {type : 'text/csv'}
		});
		/* When a file is selected, grab the URL and set it as the text field's value */
		custom_uploader.on('select', function() {
			var attachment = custom_uploader.state().get('selection').first().toJSON();

			var data = {
				action: 'yrm_import_data',
				ajaxNonce: ajaxNonce,
				attachmentUrl: attachment.url
			};
			jQuery('.yrm-spinner').removeClass('yrm-hide-content');
			jQuery.post(ajaxurl, data, function(response,d) {
				window.location.reload();
				jQuery('.yrm-spinner').removeClass('yrm-hide-content');
			});
		});
		/* Open the uploader dialog */
		custom_uploader.open();
	});
};

yrmBackend.prototype.export = function() {
	var exportButton = jQuery('.yrm-exprot-button');

	if (!exportButton.length) {
		return false;
	}

	exportButton.bind('click', function() {
		var data = {
			action: 'yrm_export',
			beforeSend: function() {
				jQuery('.yrm-spinner').removeClass('yrm-hide-content');
			},
			ajaxNonce: yrmBackendData.nonce
		};

		jQuery.post(ajaxurl, data, function(data) {
			var hiddenElement = document.createElement('a');
			jQuery('.yrm-spinner').addClass('yrm-hide-content');
			hiddenElement.href = 'data:text/csv;charset=utf-8,' + encodeURI(data);
			hiddenElement.target = '_blank';
			hiddenElement.download = 'readMoreExportData.csv';
			hiddenElement.click()
		})
	});
};

yrmBackend.prototype.changeButtonTitle = function() {
	jQuery('#moreTitle').bind('change', function() {
		var val = jQuery(this).val();
		var readMoreButton = jQuery('.yrm-toggle-expand');
		if(!jQuery('.yrm-content').data('show-status')) {
			readMoreButton.attr('title', val);
		}
		readMoreButton.attr('data-more-title', val);
	});

	jQuery('#lessTitle').bind('change', function() {
		var val = jQuery(this).val();
		var readMoreButton = jQuery('.yrm-toggle-expand');
		readMoreButton.attr('data-less-title', val);
		if(jQuery('.yrm-content').data('show-status')) {
			readMoreButton.attr('title', val);
		}
	});
};

yrmBackend.prototype.changeButtonBoxShadow = function() {
	var spreadSizes = jQuery('#button-box-shadow-horizontal, #button-box-shadow-vertical, #button-box-spread-radius, #button-box-blur-radius');

	if (!spreadSizes) {
		return false;
	}
	var liveChangeShadow = function() {
		var shadowHorizontal = jQuery('#button-box-shadow-horizontal').val()+'px';
		var shadowVertical = jQuery('#button-box-shadow-vertical').val()+'px';
		var spreadRadius = jQuery('#button-box-spread-radius').val()+'px';
		var blurRadius = jQuery('#button-box-blur-radius').val()+'px';
		var color = jQuery('#button-box-shadow-color').val();

		jQuery('.yrm-toggle-expand').css({'box-shadow': shadowHorizontal+' '+shadowVertical+' '+blurRadius+' '+spreadRadius+' '+color});
	};

	spreadSizes.bind('change', function() {
		liveChangeShadow();
	});

	jQuery('#button-box-shadow-color').wpColorPicker({
		change: function () {
			liveChangeShadow();
		}
	});
};

yrmBackend.prototype.changeButtonBorderWidth = function() {
	var width = jQuery('#button-border-width');

	if (!width.length) {
		return false;
	}

	width.bind('change', function() {
		var width = jQuery(this).val();
		jQuery('.yrm-toggle-expand').css({'border-width': width});
	});
};

yrmBackend.prototype.changeButtonBorderColor = function() {
	var borderColor = jQuery('.button-border-color');

	if(!borderColor.length) {
		return false;
	}

	borderColor.wpColorPicker({
		change: function () {
			var val = jQuery(this).val();
			var element = '.yrm-toggle-expand';
			jQuery(element).css({'border-color': val});
		}
	});
};

yrmBackend.prototype.changeSwitch = function() {
	var switchStatus = jQuery('.yrm-status-switch');

	if (!switchStatus.length) {
		return false;
	}

	switchStatus.bind('change', function(e) {
		var isChecked = jQuery(this).is(':checked');

		var id = jQuery(this).data('id');

		var data = {
			action: 'yrm_switch_status',
			ajaxNonce: yrmBackendData.nonce,
			readMoreId: id,
			isChecked: isChecked
		};

		jQuery.post(ajaxurl, data, function(response,d) {
			window.location.reload();
		});
	})
};

yrmBackend.prototype.changeEasings = function () {

	var readMoreId = 0;
	var hiddenReadMoreId = jQuery('[name="read-more-id"]').val();
    hiddenReadMoreId = parseInt(hiddenReadMoreId);

    if (hiddenReadMoreId) {
        readMoreId = hiddenReadMoreId;
	}
	if (typeof readMoreArgs == 'undefined') {
    	return false;
	}
	var readMoreData = readMoreArgs[readMoreId];
	jQuery('.yrm-animate-easings').change(function () {
		var val = jQuery(this).val();
        readMoreData['yrm-animate-easings'] = val;
    });
};

yrmBackend.prototype.select2 = function () {

	var select2 = jQuery('.yrm-js-select2');

	if(!select2.length) {
		return false;
	}

    select2.select2();
};

yrmBackend.prototype.proOptionsWrapper = function() {

	if(jQuery('.yrm-pro-options').length == 0) {
		return '';
	}

	jQuery('.yrm-pro-options').on('click', function() {
		window.open('https://edmonsoft.com');
	});
};

yrmBackend.prototype.accordionContent = function () {

	var that = this;
	jQuery('.yrm-accordion-checkbox').each(function () {
		that.doAccordion(jQuery(this), jQuery(this).is(':checked'));
	});
	jQuery('[name="expander-font-family"]').bind('change', function() {
		var val = jQuery('option:selected', this).val() == 'customFont';
		var currentCheckbox = jQuery(this);
		that.doAccordion(currentCheckbox, val);
	});
	jQuery('[name="expander-font-family"]').change();
	jQuery('.yrm-accordion-checkbox').each(function () {
		jQuery(this).bind('change', function () {
			var attrChecked = jQuery(this).is(':checked');
			var currentCheckbox = jQuery(this);
			that.doAccordion(currentCheckbox, attrChecked);
		});
	});
};

yrmBackend.prototype.doAccordion = function (checkbox, ischecked) {
	var accordionContent = checkbox.parents('.row').nextAll('.yrm-accordion-content').first();

	if(ischecked) {
		accordionContent.removeClass('yrm-hide-content');
	}
	else {
		accordionContent.addClass('yrm-hide-content');
	}
};

yrmBackend.prototype.deleteAjaxRequest = function() {

	jQuery('.yrm-delete-link').bind('click', function (e) {
		e.preventDefault();

		var confirmStatus = confirm('Are you shure?');

		if(!confirmStatus) {
			return;
		}

		var id = jQuery(this).attr('data-id');

		var data = {
			action: 'delete_rm',
			ajaxNonce: yrmBackendData.nonce,
			readMoreId: id
		};

		jQuery.post(ajaxurl, data, function(response,d) {
			window.location.reload();
		});
	});
};

jQuery(document).ready(function() {
	
	var obj = new yrmBackend();
	obj.init();
});