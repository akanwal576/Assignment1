<div class="panel panel-default">
	<div class="panel-heading"><?php _e('General options', YRM_LANG);?></div>
	<div class="panel-body">
		<?php if(!ReadMore::RemoveOption('btn-dimension-mode')): ?>
			<div class="yrm-dimensions-mode yrm-multichoice-wrapper">
				<?php
					$multipleChoiceButton = new ExpmMultipleChoiceButton($params['dimensionsMode'], $savedObj->getOptionValue('yrm-dimension-mode'));
					echo $multipleChoiceButton;
				?>
			</div>
		<?php endif; ?>
		<div id="dimension-mode-auto" class="yrm-hide-content yrm-sub-option">
			<div class="row row-static-margin-bottom">
				<div class="col-xs-4">
					<label class="control-label"><?php _e('Button padding', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-2">
					<label for="yrm-button-padding-top" class="yrm-label">Top</label>
					<input type="text" id="yrm-button-padding-top" data-direction="top" name="yrm-button-padding-top" class="form-control button-padding" value="<?php echo $savedObj->getOptionValue('yrm-button-padding-top')?>">
				</div>
				<div class="col-xs-2">
					<label for="yrm-button-padding-right" class="yrm-label">Right</label>
					<input type="text" id="yrm-button-padding-right" data-direction="right" name="yrm-button-padding-right" class="form-control button-padding" value="<?php echo $savedObj->getOptionValue('yrm-button-padding-right')?>">
				</div>
				<div class="col-xs-2">
					<label for="yrm-button-padding-bottom" class="yrm-label">Bottom</label>
					<input type="text" id="yrm-button-padding-bottom" data-direction="bottom" name="yrm-button-padding-bottom" class="form-control button-padding" value="<?php echo $savedObj->getOptionValue('yrm-button-padding-bottom')?>">
				</div>
				<div class="col-xs-2">
					<label for="yrm-button-padding-left" class="yrm-label">Left</label>
					<input type="text" id="yrm-button-padding-left" data-direction="left" name="yrm-button-padding-left" class="form-control button-padding" value="<?php echo $savedObj->getOptionValue('yrm-button-padding-left')?>">
				</div>
			</div>
		</div>
		<div id="dimension-mode-classic" class="yrm-hide-content yrm-sub-option">
			<?php if(!ReadMore::RemoveOption('button-width')): ?>
			<div class="row">
				<div class="col-xs-5">
					<label class="control-label" for="expm-btn-width"><?php _e('Button width', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="text" id="expm-btn-width" class="form-control input-md expm-options-margin expm-btn-width" name="button-width" value="<?php echo esc_attr($buttonWidth);?>"><br>
				</div>
				<div class="col-md-2 expm-option-info">(in pixels)</div>
			</div>
			<?php endif; ?>
			<?php if(!ReadMore::RemoveOption('button-height')): ?>
			<div class="row">
				<div class="col-xs-5">
					<label class="control-label" for="button-height"><?php _e('Button height', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="text" id="button-height" class="form-control input-md expm-options-margin expm-btn-height" name="button-height" value="<?php echo esc_attr($buttonHeight);?>"><br>
				</div>
				<div class="col-md-2 expm-option-info">(in pixels)</div>
			</div>
		<?php endif; ?>
		</div>
		<div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="font-size"><?php _e('Font size', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type='text' id="font-size" class="form-control input-md expm-option-font-size" name="font-size" value="<?php echo esc_attr($fontSize)?>"><br>
			</div>
			<div class="col-md-2 expm-option-info">(in pixels)</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Font weight', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<?php echo $functions::createSelectBox($params['btnFontWeight'],'yrm-btn-font-weight', esc_attr($yrmBtnFontWeight));?><br>
			</div>
		</div>
		<?php if(!ReadMore::RemoveOption('animation-duration')): ?>
		<div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Animation speed', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
			<input type="text" class="form-control input-md  expm-options-margin" name="animation-duration" value="<?php echo esc_attr($animationDuration)?>"><br>
			</div>
			<div class="col-md-2 expm-option-info"></div>
		</div>
        <div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Animation behavior', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
                <?php echo $functions::yrmSelectBox($params['easings'], esc_attr($yrmEasings), array('name' => 'yrm-animate-easings', 'class' => 'yrm-js-select2 yrm-animate-easings'));?><br>
			</div>
		</div>
		<?php endif; ?>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Button hover effect', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<?php echo $functions::createSelectBox($params['hoverEffect'],"yrm-btn-hover-animate", esc_attr($yrmBtnHoverAnimate));?><br>
			</div>
			<div class="col-md-2 expm-option-info"></div>
		</div>
        <div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('More text', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" data-type="more" class="form-control yrm-button-title" name="more-button-title" value="<?php echo esc_attr($savedObj->getOptionValue('more-button-title')); ?>">
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="moreTitle"><?php _e('More title', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" id="moreTitle" data-type="more" class="form-control yrm-button-title-text" name="more-title" value="<?php echo esc_attr($savedObj->getOptionValue('more-title')); ?>">
			</div>
		</div>
		<?php if(!ReadMore::RemoveOption('less-button-title')): ?>
        <div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="textinput"><?php _e('Less text', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" data-type="less" class="form-control yrm-button-title" name="less-button-title" value="<?php echo esc_attr($savedObj->getOptionValue('less-button-title')); ?>">
			</div>
		</div>
		<div class="row row-static-margin-bottom">
			<div class="col-xs-5">
				<label class="control-label" for="lessTitle"><?php _e('Less title', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="text" id="lessTitle" data-type="more" class="form-control yrm-button-title-text" name="less-title" value="<?php echo esc_attr($savedObj->getOptionValue('less-title')); ?>">
			</div>
		</div>
		<?php endif;?>
        <?php if($_GET['type'] == 'inline'): ?>
		<div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="addButtonOfTheNext"><?php _e('Add button to the next of the text', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" name="add-button-next-content" id="addButtonOfTheNext" <?php echo $savedObj->getOptionValue('add-button-next-content', true); ?>>
			</div>
			<div class="col-md-2 expm-option-info"></div>
		</div>
        <?php endif; ?>
		<?php if(!ReadMore::RemoveOption('hide-button-after-click')): ?>
		<div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="hideButtonAfterClick"><?php _e('Hide button after click more text', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" name="hide-button-after-click" id="hideButtonAfterClick" <?php echo $savedObj->getOptionValue('hide-button-after-click', true); ?>>
			</div>
			<div class="col-md-2 expm-option-info"></div>
		</div>
		<?php endif;?>
		<?php if(!ReadMore::RemoveOption('scroll-to-initial-position')): ?>
        <div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="scrollToInitialPosition"><?php _e('After "Show Less" scroll to initial position', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" name="scroll-to-initial-position" id="scrollToInitialPosition" <?php echo $savedObj->getOptionValue('scroll-to-initial-position', true); ?>>
			</div>
			<div class="col-md-2 expm-option-info"></div>
		</div>
        <?php endif; ?>
        <?php if(!ReadMore::RemoveOption('show-content-gradient')): ?>
        <div class="row">
			<div class="col-xs-5">
				<label class="control-label" for="showContentGradient"><?php _e('Show content gradient', YRM_LANG);?>:</label>
			</div>
			<div class="col-xs-4">
				<input type="checkbox" class="yrm-accordion-checkbox" name="show-content-gradient" id="showContentGradient" <?php echo $savedObj->getOptionValue('show-content-gradient', true); ?>>
			</div>
		</div>
		<div class="yrm-accordion-content">
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label" for="showContentGradientHeight"><?php _e('Height', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="number" class="form-control" name="show-content-gradient-height" id="showContentGradientHeight" value="<?php echo $savedObj->getOptionValue('show-content-gradient-height'); ?>">
				</div>
			</div>
			<div class="row row-static-margin-bottom">
				<div class="col-xs-5">
					<label class="control-label" for="showContentGradientPosition"><?php _e('Position', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="number" class="form-control" name="show-content-gradient-position" id="showContentGradientPosition" value="<?php echo $savedObj->getOptionValue('show-content-gradient-position'); ?>">
				</div>
			</div>
			<div class="row row-static-margin-bottom <?php echo $proClassWrapper; ?>">
				<?php if($proClassWrapper): ?>
						<a href="<?php echo YRM_PRO_URL; ?>" target="_blank">
						<div class="yrm-pro-option-transparent"></div>
						<div class="yrm-pro-label"><span>PRO</span></div>
						</a>
					<?php endif; ?>
				<div class="col-xs-5">
					<label class="control-label" for="showContentGradientColor"><?php _e('Background color', YRM_LANG);?>:</label>
				</div>
				<div class="col-xs-4">
					<input type="text" class="input-md show-content-gradient-color" name="show-content-gradient-color" value="<?php echo $savedObj->getOptionValue('show-content-gradient-color'); ?>"><br>
				</div>
			</div>
		</div>
		<?php endif; ?>	
	</div>
</div>