<?php
class ReadMoreShortCode {
	private $savedData;
	private $id;
	private $shortcodeArgs = array();
	private $shortcodeContent = '';

	public function setId($id) {
		$this->id = $id;
	}

	public function getId() {
		return $this->id;
	}

	public function setSavedData($savedData) {
		$this->savedData = $savedData;
	}

	public function getSavedData() {
		return $this->savedData;
	}

	public function setShortcodeArgs($shortcodeArgs) {
		$this->savedData = $shortcodeArgs;
	}

	public function getShortcodeArgs() {
		return $this->shortcodeArgs;
	}

	public function setShortcodeContent($shortcodeContent) {
		$this->shortcodeContent = $shortcodeContent;
	}

	public function getShortcodeContent() {
		return $this->shortcodeContent;
	}

	public function __construct() {
		add_shortcode('expander_maker', array($this, 'doShortCode'));
	}

	public function doShortCode($args, $content) {

		$id = 1;
		$content = do_shortcode($content);
		$this->setShortcodeArgs($args);
		$this->setShortcodeContent($content);
		$moreName = '';
		$lessName = '';

		if(isset($args['id'])) {
			$id = $args['id'];
		}
		if(!empty($args['more'])) {
			$moreName = $args['more'];
		}
		if(!empty($args['less'])) {
			$lessName = $args['less'];
		}

		$dataObj = new ReadMoreData();
		$dataObj->setId($id);
		$this->setId($id);
		$savedData = $dataObj->getSavedOptions();
		$this->setSavedData($savedData);

		if(empty($savedData)) {
			return $content;
		}
		$type = $savedData['type'];

		$className = ucfirst($type).'TypeReadMore';
		$classPaths = YRM_CLASSES;
		global $YRM_TYPES;
		global $YRM_EXTENSIONS;
		
		if($YRM_TYPES[$type]) {
			$classPaths = $YRM_TYPES[$type];
		}

		if(in_array($type, $YRM_EXTENSIONS)) {
			return $this->renderExtensionContent($classPaths, $className);
		}

		$savedData['attrMoreName'] = $moreName;
		$savedData['attrLessName'] = $lessName;

		$includeManagerObj = new ReadMoreIncludeManager();
		$includeManagerObj->setId($id);
		$includeManagerObj->setData($savedData);
		$includeManagerObj->setDataObj($dataObj);
		$includeManagerObj->setToggleContent($content);

		return $includeManagerObj->render();
	}

	public function renderExtensionContent($classPaths, $className) {

		if(file_exists($classPaths.$className.'.php')) {
			$id = $this->getId();
			$content = $this->getShortcodeContent();
			require_once($classPaths.$className.'.php');
			$typeObj = new $className();
			if($typeObj instanceof ReadMoreTypes) {
				$typeObj->setId($id);
				$typeObj->prepareSavedValue();
				return $typeObj->renderContent($content);
			}
		}

		return '';
	}
}