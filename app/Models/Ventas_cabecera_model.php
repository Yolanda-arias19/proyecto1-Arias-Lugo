<?php

namespace App\Models;
use CodeIgniter\Model;

class Ventas_cabecera_model extends Model {
    protected $table = 'ventas_cabeceras'; 
    protected $primarykey = 'id_venta';
    protected $allowedFields = ['fecha', 'usuario_id', 'total_venta'];

    public function getBuilderVentas_cabecera(){
        $db= \Config\Database::connect();
        $builder = $db->table('ventas_cabeceras');
        $builder->select('*');
        $builder->join('usuarios', 'usuarios.id = ventas_cabeceras.usuario_id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getVentas($id_usuario = null){
        if($id_usuario === null){
            return $this-> getBuilderVentas_cabecera();
        }else{
            $db = \Config\database::connect();
            $builder = $db->table('ventas_cabeceras');
            $builder->select('*');
            $builder->join('usuarios', 'usuarios.id = ventas_cabeceras.usuario_id');
            $builder->where('ventas_cabeceras.usuario_id', $id_usuario);
            $query = $builder->get();
            return $query->getResultArray();
        }
    }
}