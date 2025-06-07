<?php

namespace App\Models;
use CodeIgniter\Model;

class Consultas_model extends Model {
protected $table = 'consultas'; 
protected $primarykey = 'id';
protected $allowedFields = ['fecha', 'nombre', 'email', 'mensaje', 'estado'];

public function getConsultaAll(){ 
        return $this->findAll();
}
public function getLeidoConsultaAll(){ 
        return $this->where('estado', 'leido')->findAll();
}
public function getNoLeidoConsultaAll(){ 
        return $this->where('estado', 'no_leido')->findAll();
}
}