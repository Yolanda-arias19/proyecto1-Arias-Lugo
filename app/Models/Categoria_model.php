<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria_model extends Model{
    protected $table ='categoria';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion', 'activo'];

    public function getCategorias(){
        return $this->findAll();
    }
}