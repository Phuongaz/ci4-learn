<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(){
		return view('pages/home');
	}

	public function info() {
		$about['info'] = "Cu to nhat xom";
		return view('pages/homepage', $about);
	}
}
