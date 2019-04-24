<div class="panel panel-default">
	<div class="panel-heading"><?php _e('Live preview', YRM_LANG); ?></div>
	<div class="panel-body">
		<?php require_once(YRM_VIEWS."livePreview/buttonPreview.php");?>
	</div>
</div>
<?php $shortCode = '[expander_maker id="'.$id.'" more="Read more" less="Read less"]Read more hidden text[/expander_maker]'; ?>
<?php if($id != 0): ?>
	<div class="yrm-tooltip">
		<span class="yrm-tooltiptext" id="yrm-tooltip"><?php _e('Copy to clipboard', YRM_LANG)?></span>
		<input type="text" id="expm-shortcode-info-div" class="widefat" readonly="readonly" value='<?php echo $shortCode; ?>'>
	</div>
<?php endif; ?>
<?php if($id == 0): ?>
	<div class="no-shortcode">
		<span><?php _e('Please do save read more for getting shortcode.', YRM_LANG); ?></span>
	</div>
<?php endif; ?>

<?php $typeObj->includeOptionsBlock($dataObj); ?>