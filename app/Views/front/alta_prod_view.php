<?php
namespace App\Controllers;
Use App\Models\Productos_Model;
Use App\Models\Usuario_Model;
Use App\Models\Ventas_cabecera_model;
Use App\Models\Ventas_detalle_model;
Use App\Models\Categoria_model;
use CodeIniter\Controller;

class Productocontroller extends Controller{
    public function_construct(){
        helper(['url', 'form']);
        $session=session();
    }

    public function index(){
        $productoModel = new Producto_Model();

        $dato['producto'] = $productoModel->getProductoAll();
        $dato['titulo']= 'Crud_productos';
        echo view('front/head_view_crud', $dato);
        echo view('front/nav_view');
        echo view('back/productos/producto_nuevo_view', $data);
        echo view('front/footer_view');
    }

    public function creaproducto(){
        $categoriasmodel = new categoria_model();
        $data['categorias'] = $categoriasmodel->getCategoria();

        $productoModel = new Producto_Model();
        $data['producto'] = $productoModel->getProductoAll();

        $dato['titulo'] = 'Alta producto';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('back/productos/alta_producto_view', $data);
        echo view('front/footer_view');
    }

    public function store(){
        $input = $this->validate([
            'nombre_prod' => 'required|min_length[3]',
            'categoria' => 'is_not_unique[categorias.id]',
            'precio' => 'required|numeric',
            'precio_vta' => 'required|numeric',
            'stock' => 'required',
            'stock_min' => 'required',
            'imagen' => 'uploaded[imagen]',
        ]);

        $productoModel = new Producto_Model();

        if(!$input){
            $categoria_model = new categoria_model();
            $data['categorias'] = $categoria_model->getCategorias();
            $data['validation'] = $this->validator;

            $dato['titulo'] = 'Alta';
             echo view('front/head_view', $dato);
             echo view('front/nav_view');
             echo view('back/productos/alta_producto_view', $data);
   
        }else{
         $img = $this->request->getFile('imagen');

         $nombre_aleatorio = $img->getRandomName();

         $img->move(ROOTPATH.'assets/uploads', $nombre_aleatorio);

         $data =[
            'nombre_prod' => $this->request->getVar('nombre_prod'),
            'imagen' => $img->getName(),
            'categoria_id' => $this->request->getVar('categoria'),
            'precio' =>  $this->request->getVar('precio'),
            'precio_vta' =>  $this->request->getVar('precio_vta'),
            'stock' =>  $this->request->getVar('stock'),
            'stock_min' =>  $this->request->getVar('stock_min'),
            
         ];
         $producto = new Producto_Model();
         $producto->insert($data);
         session()->setFlashdata('success', 'Alta Exitosa...');
         return  $this->response->redirect(site_url('crear'));

        }
    }
    
      <div class = "container mt-1 d-flex justify-content-center">
      <div class = "card" style = "width:75%;">
      <div class = "card-header text-center">

    <h2> Alta de Productos </h2>
    </div>

    <?php if (!empty (session()->getFlashdata('fail'))): ?>
     <div class = "alert alert-danger"><?=session()->getFlashdata('fail'); ?></div>
    <?php endif; ?>
    <?php if (!empty(session()->getFlashdata('success'))): ?>
      <div class = "alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>
    
    <?php $validation = \Config\Services :: validation(); ?>

    <form action ="<?= base_url('/enviar-prod'); ?>" method="post"

}
