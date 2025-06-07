<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuarios_model extends Model {
protected $table = 'usuarios'; 
protected $primarykey = 'id';
protected $allowedFields = ['nombre', 'apellido', 'email', 'usuario', 'pass', 'perfil_id', 'baja'];

public function getUsuarioAll(){ 
        return $this->findAll();
}
public function getDeleteUsuarioAll(){ 
        return $this->where('baja', 'si')->findAll();
}
public function getActiveUsuarioAll(){ 
        return $this->where('baja', 'no')->findAll();
}
}
