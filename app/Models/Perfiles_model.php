<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model {protected $table = 'perfiles'; 
protected $primarykey = 'id_perfiles';
protected $allowedFields = ['descripcion'];
}