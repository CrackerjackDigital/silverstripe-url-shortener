<?php
/**
 *
 */
class ShortURL_Controller extends Page_Controller {
	public function index() {
		$short_code = $this->request->param('ShortCode');

		if (empty($short_code)) {
			return $this->httpError(404);
		}

		// Get short code long url
		$short_url_obj = ShortUrlModel::get()->filter(["ShortCode" => $short_code])->first();
		if (!$short_url_obj) {
			return $this->httpError(404);
		}
		$url = $short_url_obj->LongURL;
		$short_url_obj->Visits = $short_url_obj->Visits + 1;
		$short_url_obj->write();

		return $this->redirect($url);
	}

}