<?php
class ReadMoreIncludeManager {

	private $data;
	private $id;
	private $toggleContent;
	private $rel;
	private $dataObj;

	public function __call($name, $args) {

		$methodPrefix = substr($name, 0, 3);
		$methodProperty = lcfirst(substr($name,3));

		if ($methodPrefix == 'get') {
			return $this->$methodProperty;
		}
		else if ($methodPrefix == 'set') {
			$this->$methodProperty = $args[0];
		}
	}

	private function randomName($length = 10) {

		return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	public function render() {

		if (!ReadMore::allowRender($this)) {
			return $this->getToggleContent();;
		}

		$rel = 'yrm-'.$this->randomName(5);
		$this->setRel($rel);

		$data = $this->includeData();
		$data .= $this->includeScripts();
		$loadDataAction = array(
			'isAdmin' => is_admin()
		);
		
		do_action('readMoreLoaded', $loadDataAction);
		return $data;
	}

	private function includeData(){

		$allContent = '';
		$data = $this->getData();
		$buttonData = $this->buttonContent();
		$accordionContent = $this->accordionContent();

		if(isset($data['vertical']) && $data['vertical'] == 'top') {
			$allContent = $buttonData.$accordionContent;
			return $allContent;
		}

		$allContent = $accordionContent.$buttonData;

		return $allContent;
	}

	private function accordionContent() {

		$rel = $this->getRel();
		$id = $this->getId();
		$data = $this->getData();

		$tag = 'div';
		$inline = @$data['add-button-next-content'];
		if(!empty($inline)) {
			$tag = 'span';
		}

		$content = $this->getToggleContent();
		return "<$tag class='yrm-content yrm-content-".esc_attr($id)."' id='".esc_attr($rel)."' data-show-status='false'>
			<$tag id='yrm-cntent-$id' class='yrm-inner-content-wrapper yrm-cntent-".esc_attr($id)."'>$content</$tag>
		</$tag>";
	}

	private function buttonContent() {

		$data = $this->getData();
		$dataObj = $this->getDataObj();
		$mode = $dataObj->getOptionvalue('yrm-dimension-mode');
		$modeClassName = '';
		$textWrapperClass = 'yrm-text-wrapper-custom-dimensions';

		// pro options
		if(YRM_PKG > 1) {
			$enableIcon = $dataObj->getOptionvalue('enable-button-icon');
			
		}
		if($mode == 'autoMode') {
			$textWrapperClass = '';
			$modeClassName = 'yrm-button-auto-mode';
		}

		$id = $this->getId();
		$rel = $this->getRel();
		$more = __('Read More', YRM_LANG);
		$lessName = __('Read Less', YRM_LANG);
		
		if (!empty($data['more-button-title'])) {
			$more = $data['more-button-title'];
		}
		if (!empty($data['attrMoreName'])) {
			$more = $data['attrMoreName'];
		}
		
		if (!empty($data['less-button-title'])) {
			$lessName = $data['less-button-title'];
		}
		if (!empty($data['attrLessName'])) {
			$lessName = $data['attrLessName'];
		}
		$type = $data['type'];
		$moreTitle = @$data['more-title'];
		$lessTitle = @$data['less-title'];

		$button = "<div class='yrm-btn-wrapper yrm-btn-wrapper-".$id."'>";

		if($dataObj->getOptionvalue('show-content-gradient')) {
			$button .=	"<div class='yrm-content-gradient-".$id." yrm-content-gradient'></div>";
		}

		$button .= "<span title='".$moreTitle."' data-less-title='".$lessTitle."' data-more-title='".$moreTitle."' class='yrm-toggle-expand  yrm-toggle-expand-$id $modeClassName' data-rel='".esc_attr($rel)."' data-more='".esc_attr($more)."' data-less='".esc_attr($lessName)."'>";
				$button .= "<span class='yrm-text-wrapper ".$textWrapperClass."'>";
				if(!empty($enableIcon)) {
					$button .= "<span class='yrm-arrow-img'></span>";
				}
				$button .= "<span class=\"yrm-button-text-$id\">$more</span>";
				$button .= "</span>";
			$button .= "</span>";
		$button .= "</div>";

		if($type == 'inline') {
			$tag = 'div';
			$inlineClass = '';
			$inline = @$data['add-button-next-content'];
			if(!empty($inline)) {
				$tag = 'span';
				$inlineClass = 'yrm-btn-inline';
			}
			$button = "<$tag class='yrm-btn-wrapper yrm-inline-wrapper yrm-btn-wrapper-".esc_attr($id)." ".$inlineClass."'>";
				if($dataObj->getOptionvalue('show-content-gradient')) {
					$button .= "<$tag class='yrm-content-gradient-".$id." yrm-content-gradient'></$tag>";
				}
			$button .= "<span title='".$moreTitle."' data-less-title='".$lessTitle."' data-more-title='".$moreTitle."'  class='yrm-toggle-expand  yrm-toggle-expand-$id' data-rel='".esc_attr($rel)."' data-more='".esc_attr($more)."' data-less='".esc_attr($lessName)."' style='border: none; width: 100%;'>";
					if(!empty($enableIcon)) {
						$button .= "<span class='yrm-arrow-img'></span>";
					}
					$button .= "<span class=\"yrm-button-text-$id\">$more</span>";
				$button .= '</span>';
			$button .= "</$tag>";
		}
		return $button;
	}

	private function includeScripts() {

		$id = $this->getId();
		$savedData = $this->getData();
		$type = $savedData['type'];
		$scripts = '';
		
		$scripts .= '<script>';
			$scripts .= "readMoreArgs[$id] = ".json_encode($savedData);
		$scripts .= '</script>';
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-effects-core');
		wp_register_script('readMoreJs', YRM_JAVASCRIPT.'yrmMore.js', array(), EXPM_VERSION);
		wp_register_script('yrmMorePro', YRM_JAVASCRIPT.'yrmMorePro.js', array(), EXPM_VERSION);
		wp_enqueue_script('readMoreJs');
		if(YRM_PKG > 1) {
			wp_register_script('yrmGoogleFonts', YRM_JAVASCRIPT.'yrmGoogleFonts.js');
			wp_enqueue_script('yrmGoogleFonts');
			wp_enqueue_script('yrmMorePro');
		}
		wp_register_style('readMoreStyles', YRM_CSS_URL."readMoreStyles.css", array(), EXPM_VERSION);
		wp_enqueue_style('readMoreStyles');
		wp_register_style('yrmanimate', YRM_CSS_URL."animate.css");
		wp_enqueue_style('yrmanimate');

		if($type == 'popup') {
			wp_register_script('YrmPopup', YRM_JAVASCRIPT.'YrmPopup.js', array('readMoreJs'), EXPM_VERSION);
			wp_enqueue_script('YrmPopup');
			wp_register_script('jquery.colorbox', YRM_JAVASCRIPT.'jquery.colorbox.js', array('YrmPopup'), EXPM_VERSION);
			wp_enqueue_script('jquery.colorbox');
			wp_register_style('colorbox.css', YRM_CSS_URL."colorbox/colorbox.css");
			wp_enqueue_style('colorbox.css');
			
			$scripts .= '<script type="text/javascript">';
				$scripts .= 'yrmAddEvent(window, "load",function() {';
					$scripts .= 'var obj = new YrmPopup();';
					$scripts .= "obj.id = $id;";
					$scripts .= 'obj.init();';
				$scripts .= '});';
			$scripts .= '</script>';
		}
		if($type == 'button') {
			wp_register_script('YrmClassic', YRM_JAVASCRIPT.'YrmClassic.js', array('readMoreJs', 'jquery-effects-core'), EXPM_VERSION);
			wp_enqueue_script('YrmClassic');
			$scripts .= '<script type="text/javascript">';
				$scripts .= 'yrmAddEvent(window, "load",function() {';
					$scripts .= 'var obj = new YrmClassic();';
					$scripts .= "obj.id = $id;";
					$scripts .= 'obj.init();';
				$scripts .= '});';
			$scripts .= '</script>';
		}
		if($type == 'inline') {
			wp_register_script('YrmInline', YRM_JAVASCRIPT.'YrmInline.js', array('readMoreJs'), EXPM_VERSION);
			wp_enqueue_script('YrmInline');
			$scripts .= '<script type="text/javascript">';
				$scripts .= 'yrmAddEvent(window, "load",function() {';
				$scripts .= 'var obj = new YrmInline();';
				$scripts .= "obj.id = $id;";
				$scripts .= 'obj.init();';
			$scripts .= '});';
			$scripts .= '</script>';
		}
		$scripts .= $this->includeCustomStyle();
		$footerAction = 'wp_footer';
		if(is_admin()) {
			$footerAction= 'admin_footer';
		}
		add_action($footerAction, function() use ($scripts) {
			echo  $scripts;
		});
	}

	public function includeCustomStyle() {
		
		$styles = '';
		$id = $this->getId();
		$savedData = $this->getData();
		$type = $savedData['type'];
		$dataObj = $this->getDataObj();
		$hiddenContentPadding = (int)$dataObj->getOptionValue('hidden-content-padding').'px';

		$important = '!important';

		if(is_admin()) {
			$important = '';
		}
		
		$styles .= '<style type="text/css">';
			$styles .= '.yrm-cntent-$id {';
				$styles .= 'padding: $hiddenContentPadding;';
			$styles .= '}';
		$styles .= '</style>';
		$hoverTextColor = $dataObj->getOptionValue('btn-hover-text-color');
		$fontSize = $dataObj->getOptionvalue('font-size');
		$fontWeight = $dataObj->getOptionvalue('yrm-btn-font-weight');
		$btnColor = $dataObj->getOptionvalue('btn-text-color');
		$fontFamily = $dataObj->getOptionvalue('expander-font-family');
		$borderRadius = $dataObj->getOptionvalue('btn-border-radius');

		// pro options
		if(YRM_PKG > 1) {
			$arrowIconWidth = $dataObj->getOptionvalue('arrow-icon-width');
			$arrowIconHeight = $dataObj->getOptionvalue('arrow-icon-height');
			$buttonIcon = $dataObj->getOptionvalue('yrm-button-icon');
		}
		
		$generalStyles = '<style type="text/css" id="toggle-expand-style">';
		$generalStyles .= '.yrm-toggle-expand-'.$id.' {';
			$generalStyles .= 'font-size: '.$fontSize.';';
			$generalStyles .= 'font-weight: '.$fontWeight.';';
			if(YRM_PKG > 1) {
				$generalStyles .= 'color: '.$btnColor.';';
				$generalStyles .= 'font-family: '.$fontFamily.';';
				$generalStyles .= 'border-radius: '.$borderRadius.';';
			}
		$generalStyles .= '}';
		$generalStyles .= '.yrm-toggle-expand-'.$id.':hover {';
		$generalStyles .= '		color: '.$hoverTextColor.' !important;';
		$generalStyles .= '}';

		// general pro styles
		if(YRM_PKG > 1) {
			$generalStyles .= '.yrm-btn-wrapper-'.$id.' .yrm-arrow-img {';
			$generalStyles .= 'width: '.$arrowIconWidth.'px;';
			$generalStyles .= 'height: '.$arrowIconHeight.'px;';
			$generalStyles .= 'background-image: url("'.$buttonIcon.'") '.$important.';';
			$generalStyles .= 'background-size: cover;';
			$generalStyles .= 'vertical-align: middle;';
			$generalStyles .= '}';
		}
		$generalStyles .= '</style>';
		
		$styles .= $generalStyles;
		
		if($type == 'button' || $type == 'popup') {
			$hoverBgColor = $dataObj->getOptionValue('btn-hover-bg-color');
			$buttonBorderWidth = $dataObj->getOptionValue('button-border-width');
			$buttonBorderColor = $dataObj->getOptionValue('button-border-color');
			$paddingTop = $dataObj->getOptionValue('yrm-button-padding-top');
			$paddingRight = $dataObj->getOptionValue('yrm-button-padding-right');
			$paddingBottom = $dataObj->getOptionValue('yrm-button-padding-bottom');
			$paddingLeft = $dataObj->getOptionValue('yrm-button-padding-left');
			
			// general styling of button type
			$buttonWidth = (int)$dataObj->getOptionValue('button-width').'px';
			$buttonHeight = (int)$dataObj->getOptionValue('button-height').'px';
			$btnBackgroundColor = $dataObj->getOptionValue('btn-background-color');
			
			$buttonGeneralStyles = '<style type="text/css" id="toggle-expand-style">';
			$buttonGeneralStyles .= '.yrm-button-auto-mode.yrm-toggle-expand-'.$id.' {';
			$buttonGeneralStyles .= 'width: auto !important;';
			$buttonGeneralStyles .= 'height: auto !important;';
			$buttonGeneralStyles .= 'padding: '.$paddingTop.'px '.$paddingRight.'px '.$paddingBottom.'px '.$paddingLeft.'px;';
			$buttonGeneralStyles .= '}';

			$buttonGeneralStyles .= '.yrm-button-auto-mode.yrm-toggle-expand-'.$id.' .yrm-text-wrapper {';
			$buttonGeneralStyles .= 'position: inherit !important;';
			$buttonGeneralStyles .= 'left: 0 !important;';
			$buttonGeneralStyles .= 'margin: 0 !important;';
			$buttonGeneralStyles .= 'transform: inherit !important;';
			$buttonGeneralStyles .= '}';

			$buttonGeneralStyles .= '.yrm-toggle-expand-'.$id.' {';
			$buttonGeneralStyles .= 'width: '.$buttonWidth.';';
			$buttonGeneralStyles .= 'height: '.$buttonHeight.';';
			$buttonGeneralStyles .= 'line-height: 1;';
			if(YRM_PKG > 1) {
				$buttonGeneralStyles .= 'background-color: '.$btnBackgroundColor.';';
			}
			$buttonGeneralStyles .= '}';
			$buttonGeneralStyles .= '</style>';
			
			$styles .= $buttonGeneralStyles;
			
			if($dataObj->getOptionValue('hover-effect')) {
				$styles .= '<style type="text/css">';
					$styles .= ".yrm-toggle-expand-$id:hover {";
					$styles .= "background-color: $hoverBgColor !important;";
					$styles .= "color: $hoverTextColor !important;";
				$styles .= '}';
				$styles .= '</style>';
			}

			if($dataObj->getOptionValue('button-border')) {
				$styles .= '<style type="text/css">';
				$styles .= ".yrm-toggle-expand.yrm-toggle-expand-$id {";
					$styles .= "border-width: $buttonBorderWidth $important;";
					$styles .= "border-color: $buttonBorderColor $important;";
				$styles .= '}';
				$styles .= '</style>';
			}

			$styles .= '<style type="text/css">.yrm-content-gradient-'.$id.' {';
			$styles .= 'position: absolute;';
			$styles .= 'top: '.$dataObj->getOptionValue('show-content-gradient-position').'px;';
			$styles .= 'width: 100%;';
			$styles .= 'text-align: center;';
			$styles .= 'margin: 0;';
			$styles .= 'padding: '.$dataObj->getOptionValue('show-content-gradient-height').'px 0;';
			$styles .= 'background-image: -webkit-gradient(linear,left top,left bottom,color-stop(0, transparent),color-stop(1, '.$dataObj->getOptionvalue('show-content-gradient-color').')) !important';
			$styles .= '}</style>';
			if($dataObj->getOptionValue('button-box-shadow')) {
				$shadowHorizontal = $dataObj->getOptionValue('button-box-shadow-horizontal-length').'px';
				$shadowVertical = $dataObj->getOptionValue('button-box-shadow-vertical-length').'px';
				$shadowBlurRadius = $dataObj->getOptionValue('button-box-blur-radius').'px';
				$shadowSpreadRadius = $dataObj->getOptionValue('button-box-spread-radius').'px';
				$shadowColor = $dataObj->getOptionvalue('button-box-shadow-color');
				$styles .= '<style id="shadowTest" type="text/css">';
					$styles .= '.yrm-toggle-expand {';
					$styles .= "-webkit-box-shadow: $shadowHorizontal $shadowVertical $shadowBlurRadius $shadowSpreadRadius $shadowColor;";
					$styles .= "-moz-box-shadow: $shadowHorizontal $shadowVertical $shadowBlurRadius $shadowSpreadRadius $shadowColor;";
					$styles .= "box-shadow: $shadowHorizontal $shadowVertical $shadowBlurRadius $shadowSpreadRadius $shadowColor;";
				$styles .= "}";
				$styles .= "</style>";
			}
			
		}
		return $styles;
	}

}