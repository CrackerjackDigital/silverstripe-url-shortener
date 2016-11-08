<?php
/**
 *
 */
class ShortUrlModel extends DataObject {

	private static $db = [
		"LongURL" => "Text",
		"ShortCode" => "Varchar",
		"Visits" => "Int",
	];

	//generate short code for entry
	public function generateShortCode() {
		$id = $this->ID;
		return substr(uniqid($id), 0, 8);
	}

	// Get short url from long
	public static function getURL($long_url) {
		$obj = self::get()->filter(["LongURL" => $long_url])->first();
		if ($obj) {
			return "/link/" . $obj->ShortCode;
		}

		//if link not found
		$newLink = self::create();
		$newLink->LongURL = $long_url;
		$linkID = $newLink->write();
		//generate code from ID
		$shortCodeGen = self::get()->byID($linkID);
		$newCode = $shortCodeGen->generateShortCode();
		$shortCodeGen->ShortCode = $newCode;
		$shortCodeGen->write();

		return "/link/" . $newCode;
	}
}