<?php

namespace app\Frontend\Modules\Kolon;
        
use \Kolon\BackController;
use \Kolon\HTTPRequest;

class KolonController extends BackController {

	public function executeIndex(HTTPRequest $request) {
		$this->page->addVar('title', "Home");
	}
}