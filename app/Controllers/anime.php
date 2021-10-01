<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AnimeModel;

class anime extends Controller
{

	private array $data = [
		"all" => [],
		"content" => ""
	];

	public function index()
	{
        $model = new AnimeModel();
        $this->data["all"] = $model->findAll();
        echo view("pages/anime", $this->data);
	}

    public function add()
    {
    	$name = $this->request->getPost('anime_name');
    	$link = $this->request->getPost('anime_link');
    	if(is_null($name) or is_null($link)){
	        $this->data["all"] = $model->findAll();
	        return view("pages/anime", $this->data);
    	}
        $model = new AnimeModel();
        $data = [
            'name' => $name,
            'link' => $link
        ];
        $model->insert($data);
        $this->data["content"] = "Đã thêm anime: ". $this->request->getPost('anime_name');
        $this->data["all"] = $model->findAll();
        echo view("pages/anime", $this->data);
    }

    public function delete($name, $anime_id) {
    	$model = new AnimeModel();
    	$model->delete($anime_id, true);
        $this->data["content"] = "Đã xóa anime: ". $name;
        $this->data["all"] = $model->findAll();
        echo view("pages/anime", $this->data);
    }
}