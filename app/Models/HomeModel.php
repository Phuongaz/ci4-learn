<?php

namespace App\Models;

use CodeIgniter\Models;

class HomeModel extends Models{

	protected $table = "page";

	public function getPage(?string $page) {
		if(!$page) {
			return $this->findAll();
		}

		return $this->asArray()
					->where(["page"] => $page)
					->first();
	}
}
