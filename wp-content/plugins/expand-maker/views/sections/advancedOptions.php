<?php
$savedIcon = $savedObj->getOptionValue('yrm-button-icon');
$hideRemoveButton = 'yrm-hide';
if($savedIcon != YRM_BUTTON_ICON_URL) {
    $hideRemoveButton = '';
}
?>
<div class="panel panel-default yrm-pro-options-wrapper">
	<div class="panel-heading"><?php _e('Advanced options', YRM_LANG);?></div>
	<div class="panel-body">
		<?php if(!ReadMore::RemoveOption('btn-background-color')): ?>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button Background Color', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" class="input-md background-color" name="btn-background-color" value="<?php echo $btnBackgroundColor ?>"><br>
			</div>
		</div>
		<?php endif; ?>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button Text Color', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" class="input-md btn-text-color" name="btn-text-color" value="<?php echo esc_attr($btnTextColor)?>"><br>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button Font Family', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<?php echo $functions::createSelectBox($params['googleFonts'],"expander-font-family", esc_attr($expanderFontFamily));?><br>
			</div>
		</div>
		<div class="yrm-accordion-content yrm-hide-content">
			<div class="row">
				<div class="col-xs-5">
					<label class="control-label" for="custom-font-family"><?php _e('button custom font family', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="text" id="custom-font-family" class="form-control input-md custom-font-family" name="btn-custom-font-family" value="<?php echo esc_attr($dataObj->getOptionValue('btn-custom-font-family'))?>"><br>
				</div>
			</div>
		</div>
		<?php if(!ReadMore::RemoveOption('btn-border-radius')): ?>
		<div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="btn-border-radius"><?php _e('Button Border Radius', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" id="btn-border-radius" class="form-control input-md btn-border-radius" name="btn-border-radius" value="<?php echo esc_attr($btnBorderRadius)?>"><br>
			</div>
		</div>
		<?php endif; ?>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button Horizontal alignment', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<?php echo $functions::createSelectBox($params['horizontalAlign'],"horizontal", esc_attr($horizontal));?><br>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button Vertical alignment', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<?php echo $functions::createSelectBox($params['vertical'],"vertical", esc_attr($vertical));?><br>
			</div>
		</div>
		<?php if(!ReadMore::RemoveOption('button-border')): ?>
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label" for="button-border"><?php _e('Button Border', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="checkbox" id="button-border" name="button-border" class="yrm-accordion-checkbox" <?php echo $savedObj->getOptionValue('button-border', true);?>>
				</div>
			</div>
			<div class="yrm-accordion-content yrm-hide-content">
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-border-width"><?php _e('border width', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" id="button-border-width" name="button-border-width" class="yrm-button-border-width form-control" value="<?php echo esc_attr($savedObj->getOptionValue('button-border-width'));?>">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="button-border-color"><?php _e('border color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="button-border-color" name="button-border-color" value="<?php echo esc_attr($savedObj->getOptionValue('button-border-color'))?>"><br>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php if(!ReadMore::RemoveOption('button-box-shadow')): ?>
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label" for="button-box-shadow"><?php _e('Button Box Shadow', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="checkbox" id="button-box-shadow" name="button-box-shadow" class="yrm-accordion-checkbox" <?php echo $savedObj->getOptionValue('button-box-shadow', true);?>>
				</div>
			</div>
			<div class="yrm-accordion-content yrm-hide-content">
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-box-shadow-horizontal"><?php _e('Horizontal Length', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="number" class="input-md form-control" id="button-box-shadow-horizontal" placeholder="example 5 or -5" name="button-box-shadow-horizontal-length" value="<?php echo esc_attr($savedObj->getOptionValue('button-box-shadow-horizontal-length'))?>"><br>
					</div>
					<div class="col-xs-1">
						<label class="control-label"><?php _e('px', YRM_LANG);?></label>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-box-shadow-vertical"><?php _e('Vertical Length', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="number" class="input-md form-control" placeholder="example 5 or -5" id="button-box-shadow-vertical" name="button-box-shadow-vertical-length" value="<?php echo esc_attr($savedObj->getOptionValue('button-box-shadow-vertical-length'))?>"><br>
					</div>
					<div class="col-xs-1">
						<label class="control-label"><?php _e('px', YRM_LANG);?></label>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-box-blur-radius"><?php _e('Blur Radius', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="number" class="input-md form-control" placeholder="example 5 or -5" id="button-box-blur-radius" name="button-box-blur-radius" value="<?php echo esc_attr($savedObj->getOptionValue('button-box-blur-radius'))?>"><br>
					</div>
					<div class="col-xs-1">
						<label class="control-label"><?php _e('px', YRM_LANG);?></label>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-box-spread-radius"><?php _e('Spread Radius', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="number" class="input-md form-control" placeholder="example 5 or -5" id="button-box-spread-radius" name="button-box-spread-radius" value="<?php echo esc_attr($savedObj->getOptionValue('button-box-spread-radius'))?>"><br>
					</div>
					<div class="col-xs-1">
						<label class="control-label"><?php _e('px', YRM_LANG);?></label>
					</div>
				</div>
				<div class="row row-static-margin-bottom">
					<div class="col-xs-5">
						<label class="control-label" for="button-box-shadow-color"><?php _e('Shadow Color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-4">
						<input type="text" class="input-md" id="button-box-shadow-color" name="button-box-shadow-color" value="<?php echo esc_attr($savedObj->getOptionValue('button-box-shadow-color'))?>"><br>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Hidden content background color', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" class="input-md hidden-content-bg-color" name="hidden-content-bg-color" value="<?php echo esc_attr($hiddenContentBgColor)?>"><br>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Hidden content text color', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" class="input-md hidden-content-text-color" name="hidden-content-text-color" value="<?php echo esc_attr($hiddenContentTextColor)?>"><br>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="hidden-content-padding"><?php _e('Hidden content padding', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-3">
				<input type="number" class="input-md form-control js-hidden-content-padding" id="hidden-content-padding" name="hidden-content-padding" value="<?php echo esc_attr($hiddenContentPadding)?>"><br>
			</div>
			<div class="col-xs-1">
				<label class="control-label"><?php _e('Px', YRM_LANG);?></label>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label-checkbox" for="enable-button-icon"><?php _e('Enable button icon', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" class="yrm-accordion-checkbox" id="enable-button-icon" name="enable-button-icon" <?php echo $savedObj->getOptionValue('enable-button-icon', true); ?>>
			</div>
		</div>
		<div class="yrm-accordion-content yrm-hide-content">
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label-checkbox" for="arrow-icon-width"><?php _e('Icon width', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-3">
					<input type="text" id="arrow-icon-width" class="form-control" name="arrow-icon-width" value="<?php echo $savedObj->getOptionValue('arrow-icon-width'); ?>">
				</div>
			</div>
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label-checkbox" for="arrow-icon-height"><?php _e('Icon height', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-3">
					<input type="text" id="arrow-icon-height" class="form-control" name="arrow-icon-height" value="<?php echo $savedObj->getOptionValue('arrow-icon-height'); ?>">
				</div>
			</div>
            <div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label-checkbox" for="arrow-icon-height"><?php _e('Button image', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-1">
                    <input type="hidden" id="yrm-button-icon" name="yrm-button-icon" data-default-url="<?php echo YRM_BUTTON_ICON_URL; ?>" value="<?php echo $savedObj->getOptionValue('yrm-button-icon'); ?>">
                    <div class="yrm-icon-container-preview" style="background-image: url(<?php echo $savedObj->getOptionValue('yrm-button-icon'); ?>)"></div>
				</div>
                <div class="col-xs-2">
                    <input id="js-button-upload-image-button" class="btn btn-sm btn-default" type="button" value="<?php _e('Change image'); ?>">
                </div>
                <div class="col-xs-1 yrm-remove-changed-image-wrapper <?php echo $hideRemoveButton; ?>">
                    <input id="js-button-upload-image-remove-button" class="btn btn-sm btn-danger" type="button" value="<?php _e('Remove'); ?>">
                </div>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label-checkbox" for="show-only-devices"><?php _e('Show on selected devices', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" class="yrm-accordion-checkbox" id="show-only-devices" name="show-only-devices" <?php echo $showOnlyDevices;?>>
			</div>
		</div>
		<div class="yrm-accordion-content yrm-hide-content">
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label-checkbox" for="hover-effect"><?php _e('Select device(s)', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<?php echo $functions::yrmSelectBox($params['devices'], $selectedDevices, array('name'=>"yrm-selected-devices[]", 'multiple'=>'multiple', 'class'=>'yrm-js-select2'));?>
				</div>
			</div>
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label-checkbox" for="hide-content"><?php _e('hide content if not matched devices', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="checkbox" id="hide-content" name="hide-content" class="" <?php echo $savedObj->getOptionValue('hide-content', true);?>>
				</div>
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label-checkbox" for="hover-effect"><?php _e('Button Hover effect', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" id="hover-effect" name="hover-effect" class="yrm-accordion-checkbox" <?php echo $hoverEffect;?>>
			</div>
		</div>
		<div class="yrm-accordion-content yrm-hide-content">
			<div class="row">
				<div class="col-xs-5">
					<label class="control-label" for="btn-hover-text-color"><?php _e('button color', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-5">
					<input type="text" id="btn-hover-text-color" class="input-md btn-hover-color" name="btn-hover-text-color" value="<?php echo esc_attr($btnHoverTextColor)?>" >
				</div>
			</div>
			<?php if(!ReadMore::RemoveOption('btn-hover-bg-color')): ?>
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('button bg color', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<input type="text" class="input-md btn-hover-color" name="btn-hover-bg-color" value="<?php echo esc_attr($btnHoverBgColor)?>" >
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label-checkbox" for="button-for-post"><?php _e('Add button for posts', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" id="button-for-post" name="button-for-post" class="yrm-accordion-checkbox" <?php echo @$buttonForPost;?>>
			</div>
		</div>
		<div class="yrm-accordion-content yrm-hide-content yrm-multichoice-wrapper">
			<?php
				$multipleChoiceButton = new ExpmMultipleChoiceButton($params['buttonForPost'], $savedObj->getOptionValue('yrm-button-for-post'));
				echo $multipleChoiceButton;
			?>
			<div id="botton-for-selected-posts" class="yrm-hide-content yrm-sub-option">
				<div class="row">
					<div class="col-xs-5">
						<label class="control-label" for="textinput"><?php _e('Selected post', YRM_LANG);?>:</label>
					</div>
					<div class="col-xs-5">
						<?php echo $functions::yrmSelectBox($params['selectedPost'],$yrmSelectedPost, array('name'=>"yrm-selected-post[]", 'multiple'=>'multiple','size'=>10,'class' => 'yrm-js-select2'));?><br>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 5px">
				<div class="col-xs-5">
					<label class="control-label" for="hide-after-word-count" for="textinput"><?php _e('Hide after word count', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-5">
					<input type="text" id="hide-after-word-count" class="form-control input-md btn-border-radius" name="hide-after-word-count" value="<?php echo esc_attr($hideAfterWordCount)?>"><br>
				</div>
			</div>
		 </div>
	</div>
	<?php if(YRM_PKG == YRM_FREE_PKG) :?>
		<div class="yrm-pro-options">
			<p class="yrm-pro-options-title">PRO Features</p>
		</div>
	<?php endif;?>
</div>