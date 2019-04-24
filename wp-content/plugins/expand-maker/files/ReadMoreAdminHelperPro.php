<?php
class ReadMoreAdminHelperPro {
	public static function getUserDevice()
	{
		$deviceName = 'Not found any device';
		if (empty($_SERVER["HTTP_USER_AGENT"])) {
			return $deviceName;
		}

		$userAgent = $_SERVER["HTTP_USER_AGENT"];
		
		$devicesTypes = array(
			"desktop" => array("msie 10", "msie 9", "msie 8", "windows.*firefox", "windows.*chrome", "x11.*chrome", "x11.*firefox", "macintosh.*chrome", "macintosh.*firefox", "opera"),
			"tablet"   => array("tablet", "android", "ipad", "tablet.*firefox"),
			"mobile"   => array("mobile ", "android.*mobile", "iphone", "ipod", "opera mobi", "opera mini"),
			"is_bot"      => array("googlebot", "mediapartners-google", "adsbot-google", "duckduckbot", "msnbot", "bingbot", "ask", "facebook", "yahoo", "addthis")
		);

		foreach ($devicesTypes as $deviceType => $devices) {
			foreach ($devices as $device) {
				if (preg_match('/'.$device.'/i', $userAgent)) {
					$deviceName = $deviceType;
				}
			}
		}

		return $deviceName;
	}
}