<?php

namespace app\Frontend\Modules\Home;

use \Kolon\BackController;
use \Kolon\HTTPRequest;


class HomeController extends BackController {

	public function executeIndex(HTTPRequest $request ) {

		$this->page->addVar('title', 'Home');
		

	}
 }