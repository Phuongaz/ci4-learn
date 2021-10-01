<?php

namespace App\Models;

use CodeIgniter\Model;

class AnimeModel extends Model
{
    protected $table      = 'anime_l';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'link'];
}