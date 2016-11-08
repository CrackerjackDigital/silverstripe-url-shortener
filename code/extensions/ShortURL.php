<?php
/**
 *
 */
class ShortURLExtension extends Extension {

	public function ShortLink($url = null) {
		if (empty($url)) {
			$url = $_SERVER["REQUEST_URI"];
		}

		return ShortUrlModel::getURL($url);
	}
}