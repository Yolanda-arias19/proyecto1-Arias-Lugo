
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
=======
<section>
    <div class="container mt-1 mb-1 d-flex justify-content-center">
        <div class="card" style="width: 75%;">
        <div class="card-hearder text-center">
            <!--titulo del formulario-->
            <h2>Alta de productos</h2>
        </div>

        <!--validacion-->
        <?php if(!empty(session()->getFlashdata('fail'))): ?>
            <div class="alert alert-danger"><?=session()->getFlashdata('fail')?></div>
        <?php endif; ?>
        <?php if(!empty(session()->getFlashdata('success'))): ?>
            <div class="alert alert-success"><?=session()->getFlashdata('success')?></div>
        <?php endif; ?>

        <?php $validation = \Config\Services::validation(); ?>

        <!--inicio del formulario-->
        <form action="<?= base_url('/enviar-prod'); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body" media="(max-width:568px)">

                <div class="mb-2">
                    <label for="nombre_prod" class="form-label">Producto</label>
                    <input class="form-control" type="text" name="nombre_prod" id="nombre_prod" value="<?= set_value('nombre_prod'); ?>" placeholder="Nombre del producto" autofocus>
                    
                    <!--Error-->
                    <?php if($validation->getError('nombre_prod')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('nombre_prod'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                <select class="form-control" name="categoria" id="categoria">
                    <option value="0">Seleccionar Categoría</option>
                    <?php foreach($categorias as $categoria):?>
                        <option value="<?= $categoria['id'];?>" <?= set_select('categoria', $categoria['id']);?>><?= $categoria['id'], ". ", $categoria['descripcion'];?></option>
                        <?php endforeach; ?>
                </select>
                    <!--Error-->
                    <?php if($validation->getError('categoria')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('categoria'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="precio" class="form-label">Precio de costo</label>
                    <input class="form-control" type="text" name="precio" id="precio" value="<?= set_value('precio'); ?>">
                    
                    <!--Error-->
                    <?php if($validation->getError('precio')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('precio'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="precio_vta" class="form-label">Precio de venta</label>
                    <input class="form-control" type="text" name="precio_vta" id="precio_vta" value="<?= set_value('precio_vta'); ?>">
                    
                    <!--Error-->
                    <?php if($validation->getError('precio_vta')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('precio_vta'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="stock" class="form-label">Stock</label>
                    <input class="form-control" type="text" name="stock" id="stock" value="<?= set_value('stock'); ?>">
                    
                    <!--Error-->
                    <?php if($validation->getError('stock')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('stock'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="stock_min" class="form-label">Stock Mínimo</label>
                    <input class="form-control" type="text" name="stock_min" id="stock_min" value="<?= set_value('stock'); ?>">
                    
                    <!--Error-->
                    <?php if($validation->getError('stock_min')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('stock_min'); ?></div>
                        <?php endif; ?>
                </div>

                <div class="mb-2">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen" id="imagen" accept="image/png, image/jpg, image/jpeg">
                    
                    <!--Error-->
                    <?php if($validation->getError('imagen')): ?>
                        <div class="alert alert-danger mt-2"><?= $validation->getError('imagen'); ?></div>
                        <?php endif; ?>
                </div>
                
                <!--Botones-->
                <div class="form-group">
                    <button type="submit" id="send_form" class="btn btn-success">Enviar</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                    <a href="<?= base_url('crear'); ?>" class="btn btn-secondary">Volver</a>
                </div>

            </div>
        </form><!--Fin del formulario-->
    </div>
</div>
</section>
