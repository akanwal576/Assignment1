<?php
$params = $dataObj::params();
$type = @$_GET['type'];
if(!isset($type)) {
	$type = 'button';
}
$proClassWrapper = '';
if(YRM_PKG == YRM_FREE_PKG) {
	$proClassWrapper = 'yrm-pro-option';
}
?>
<?php if(!empty($_GET['saved'])) : ?>
	<div id="default-message" class="updated notice notice-success is-dismissible">
		<p>Read more updated.</p><button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
	</div>
<?php endif; ?>
<div class="ycf-bootstrap-wrapper">
	<form method="POST" action="<?php echo admin_url();?>admin-post.php?action=save_data">
		<?php
			if(function_exists('wp_nonce_field')) {
				wp_nonce_field('read_more_save');
			}
		?>
		<input type="hidden" name="read-more-type" value="<?php echo esc_attr($type); ?>">
		<input type="hidden" name="read-more-id" value="<?php echo esc_attr($id); ?>">

		<div class="expm-wrapper">
			<div class="titles-wrapper">
				<h2 class="expander-page-title">Change settings</h2>
				<div class="button-wrapper">
					<p class="submit">
						<?php if(YRM_PKG == YRM_FREE_PKG): ?>
							<input type="button" class="yrm-upgrade-button-red" value="Upgrade to PRO version" onclick="window.open('<?php echo YRM_PRO_URL; ?>');">
						<?php endif;?>
						<input type="submit" class="button-primary" value="<?php echo 'Save Changes'; ?>">
					</p>
				</div>
			</div>
			<div class="clear"></div>
			<div class="row">
				<div class="col-xs-12">
					<input type="text" name="expm-title" class="form-control input-md" placeholder="Read more title" value="<?php echo $readMoreTitle; ?>">
				</div>
			</div>
			<div class="options-wrapper">
				<?php require_once(YRM_VIEWS_SECTIONS.'/generalOptions.php'); ?>
				<!-- Advanced option -->
				<?php require_once(YRM_VIEWS_SECTIONS.'/advancedOptions.php'); ?>
			</div>

			<div class="right-side">
				<?php require_once(YRM_VIEWS_SECTIONS.'/livePreview.php'); ?>
			</div>
		</div>
	</form>
	<?php echo ReadMoreFunctions::getFooterReviewBlock();?>
</div>
