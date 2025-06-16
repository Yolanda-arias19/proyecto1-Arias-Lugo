<?php

namespace App\Models;
use CodeIgniter\Model;

class Ventas_detalle_model extends Model {
    protected $table = 'ventas_detalle'; 
    protected $primarykey = 'id';
    protected $allowedFields = ['venta_id', 'producto_id', 'cantidad', 'precio'];

    public function getDetalles($id){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_detalle');
        $builder->select('*');
        $builder->join('ventas_cabeceras', 'ventas_cabeceras.id_venta = ventas_detalle.venta_id');
        $builder->join('productos', 'productos.id = ventas_detalle.producto_id');
        $builder->join('usuarios', 'usuarios.id = ventas_cabeceras.usuario_id');
        if($id != null){
            $builder->where('ventas_cabeceras.id_venta', $id);
        }
        $query = $builder->get();
        return $query->getResultArray();
    }
}