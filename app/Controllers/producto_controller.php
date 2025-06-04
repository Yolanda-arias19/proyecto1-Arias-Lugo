<?php
namespace App\Controllers;
Use App\Models\Producto_Model;
Use App\Models\Usuario_Model;
Use App\Models\Ventas_Cabecera_Model;
Use App\Models\Categoria_Model;
Use App\Models\Ventas_Detalle_Model;
use CodeIgniter\Controller;

class ProductoController extends Controller{
    public function __construc(){
        helper (['url','form']);
        $session= session();
    }
    public function index(){
        $productoModel= new Producto_Model();
        $data['producto']=$productoModel - getProductoAll();
        $dato['titulo']='Crud_productos';
        echo view ('front/head_view_crud',$dato);
        echo view ('front/nav_view');
        echo view ('front/producto_nuevo_view', $data);
        echo view ('front/footer_view');
    }
    public function creaProducto(){
        $categoriasModel=new categoria_model();
        $data['categorias'] = $categoriasModel-> getCategorias[];
        $productoModel = new Producto_Model();
        $data['producto']= $productoModel-> getProductoAll();
        $dato['titulo']='alta producto';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/alta_producto_view', $data);
        echo view ('front/footer_view');
    }

    public function store(){
        $input=$this->validate([ 
            'nombre_producto' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required',
            'stock_min' => 'required',
            'imagen' => 'uploaded[imagen]',
        ]);
        $productoModel = new Producto_Model();
        if(!$input){
            $categoria_model =new categoria_moodel();
            $data['categorias']= $categoria_model-> getCategorias();
            $data['validation'] = $this-> validator;
            $dato['titulo'] = 'alta';
                echo view ('front/head_view',$dato);
                echo view ('front/nav_view');
                echo view ('front/alta_producto_view', $data);
        }else{
            $img=$this -> getFile('imagen');
            $nombre_aleatorio = $img -> getRandomName();
            $img -> move(ROOTPATH.'assests/uploads', $nombre_aleatorio);
            $data = [ 
            'nombre_prod' => $this-> request -> getVar('nombre_prod'),
            'categoria_id' =>  $this-> request -> getVar('categoria'),
            'precio' =>  $this-> request -> getVar('precio'),
            'precio_vta' =>  $this-> request -> getVar('precio_vta'),
            'stock' =>  $this-> request -> getVar('stock'),
            'stock_min' =>  $this-> request -> getVar('stock_min'),
            'imagen' =>  $img-> getName(),
            ];
            $producto = new Producto_model();
            $producto -> insert ($data);
            session()-> setFlashdata('sucess', 'alta exitosa...');
            return $this-> response ->rediret(site_url('crear'));
        }
}
