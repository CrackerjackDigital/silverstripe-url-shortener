<?php
/**
 *
 */
class ShortURLExtension extends Extension {

	public function ShortLink($url = null) {
		if (empty($url)) {
			$url = $_SERVER["REQUEST_URI"];
		}

		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"];
		}

		return $pageURL . ShortUrlModel::getURL($url);
	}
}