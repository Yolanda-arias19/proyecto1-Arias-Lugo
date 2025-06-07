<?php

namespace App\Models;
use CodeIgniter\Model;

class Producto_model extends Model {
protected $table = 'productos'; 
protected $primarykey = 'id';
protected $allowedFields = ['nombre_prod', 'imagen', 'categoria_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminado'];

public function getBuilderProductos(){
        // conect() es un metodo de la clase Database, que nos permite conectar a la base de datos
        $db = \Config\Database::connect();
        // $builder es una instancia de la clase QueryBuilder de CodeIgniter
        $builder = $db->table('productos');
        // hace una consulta a la base de datos 
        $builder->select('*');
        // hago el join de la tabla categoria
        $builder->join('categorias', 'categorias.id = productos.categoria_id');
        // retorna el builder (la consulta)
        return $builder;
}

public function getProductoAll(){
        $builder = $this->getBuilderProductos();
        // consulta a la base de datos para recuperar todos los registros por id, descendente
        $builder->select('*', 'id','DESC'); 
        return $this->findAll();
}
        
public function getProducto($id = null){
        $builder = $this->getBuilderProductos();
        $builder->where('productos.id', $id);
        $query = $builder->get();
        return $query->getRowArray();
}

public function getDeleteProductoAll(){
        $builder = $this->getBuilderProductos();
        // consulta a la base de datos para recuperar todos los registros por id, descendente
        $builder->select('*', 'id','DESC'); 
        return $this->where('eliminado', 'SI')->findAll();
}
public function getActiveProductoAll(){
        $builder = $this->getBuilderProductos();
        // consulta a la base de datos para recuperar todos los registros por id, descendente
        $builder->select('*', 'id','DESC'); 
        return $this->where('eliminado', 'NO')->findAll();
}

}
