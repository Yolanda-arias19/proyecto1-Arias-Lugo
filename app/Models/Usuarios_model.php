<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuario_model extends Model {protected $table = 'usuarios'; 
protected $primarykey = 'id';
protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];
}
