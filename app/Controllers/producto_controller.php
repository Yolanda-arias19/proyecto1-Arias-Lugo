<?php
namespace App\Controllers;
Use App\Models\Producto_model;
Use App\Models\Usuarios_model;
Use App\Models\Ventas_Cabecera_Model;
Use App\Models\Categoria_Model;
Use App\Models\Ventas_Detalle_Model;
use CodeIgniter\Controller;

class producto_controller extends Controller{
    public function __construct(){
        helper (['url','form']);
        $session= session();
    }
    public function mostrarProductos($filtro){
        $productoModel= new Producto_model();

        if($filtro =='todos'){
            $data['producto']=$productoModel -> getProductoAll();
        }elseif($filtro == 'activos'){
            $data['producto']=$productoModel -> getActiveProductoAll();
        }else{
            $data['producto']=$productoModel -> getDeleteProductoAll();
        }

        $dato['titulo']='Mostrar productos';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/productoABM', $data);
        echo view ('front/footer_view');
    }
    public function creaProducto(){
        $categoriasModel=new Categoria_model();
        $data['categorias'] = $categoriasModel-> getCategorias();
        //$productoModel = new Producto_model();
        //$data['producto']= $productoModel-> getProductoAll();
        $dato['titulo']='alta producto';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/alta_prod_view', $data);
        echo view ('front/footer_view');
    }

    public function store(){

        $rules = [
            'nombre_prod'  => 'required|min_length[3]',
            'categoria_id' => 'required|numeric', // 'required' y 'numeric' para select
            'precio'       => 'required|numeric',
            'precio_vta'   => 'required|numeric',
            'stock'        => 'required|numeric', // 'required' y 'numeric' para stock
            'stock_min'    => 'required|numeric', // 'required' y 'numeric' para stock_min
            // Reglas para la imagen:
            // uploaded[imagen] asegura que se subió un archivo.
            // max_size[imagen,2048] límite de 2MB.
            // ext_in[imagen,png,jpg,jpeg] tipos de archivo permitidos.
            'imagen'       => 'uploaded[imagen]|max_size[imagen,2048]|ext_in[imagen,png,jpg,jpeg]', 
        ];

        // Mensajes personalizados para una mejor experiencia de usuario
        $messages = [
            'nombre_prod' => [
                'required'   => 'El nombre del producto es obligatorio.',
                'min_length' => 'El nombre del producto debe tener al menos 3 caracteres.',
            ],
            'categoria_id' => [
                'required' => 'Debe seleccionar una categoría.',
                'numeric'  => 'La categoría seleccionada no es válida.',
            ],
            'precio' => [
                'required' => 'El precio de costo es obligatorio.',
                'numeric'  => 'El precio de costo debe ser un número.',
            ],
            'precio_vta' => [
                'required' => 'El precio de venta es obligatorio.',
                'numeric'  => 'El precio de venta debe ser un número.',
            ],
            'stock' => [
                'required' => 'El stock es obligatorio.',
                'numeric'  => 'El stock debe ser un número.',
            ],
            'stock_min' => [
                'required' => 'El stock mínimo es obligatorio.',
                'numeric'  => 'El stock mínimo debe ser un número.',
            ],
            'imagen' => [
                'uploaded' => 'Debe subir una imagen.',
                'max_size' => 'La imagen es demasiado grande (máx. 2MB).',
                'ext_in'   => 'Solo se permiten imágenes JPG, JPEG o PNG.',
            ],
        ];

        // Se usa validate() con las reglas y mensajes definidos
        if (!$this->validate($rules, $messages)) {
            // Si la validación falla, recargamos la vista con los errores
            $categoriasModel = new Categoria_model();
            $data['categorias'] = $categoriasModel->getCategorias();
            $data['validation'] = $this->validator; // El validador contiene los errores
            $dato['titulo'] = 'alta producto';
            
            // Añadir mensaje flash de fallo para el usuario
            session()->setFlashdata('fail', 'Error en la validación. Por favor, revisa los campos.');

            return view('front/head_view', $dato)
                . view('front/nav_view')
                . view('front/alta_prod_view', $data)
                . view('front/footer_view');
        } else {
            // Si la validación es exitosa
            $img = $this->request->getFile('imagen');
            $nombre_aleatorio = $img->getRandomName(); // Genera un nombre único para el archivo
            
            $move_path = ROOTPATH . 'assets/img'; 

            if ($img->isValid() && !$img->hasMoved()) {
                $img->move($move_path, $nombre_aleatorio); // Mueve la imagen al destino
            } else {
                // Manejar el caso si la imagen no es válida o ya se movió
                session()->setFlashdata('fail', 'Error al procesar la imagen: ' . $img->getErrorString());
                return redirect()->back(); // Redirige de vuelta si hay un problema con la imagen
            }

            $data = [ 
                'nombre_prod'  => $this->request->getVar('nombre_prod'),
                'categoria_id' => $this->request->getVar('categoria_id'),
                'precio'       => $this->request->getVar('precio'),
                'precio_vta'   => $this->request->getVar('precio_vta'),
                'stock'        => $this->request->getVar('stock'),
                'stock_min'    => $this->request->getVar('stock_min'),
                'imagen'       => $nombre_aleatorio, 
                'eliminado'    => 'NO', 
            ];
            
            $productoModel = new Producto_model(); 
            if ($productoModel->save($data)) {
                session()->setFlashdata('success', 'Producto dado de alta con éxito.');
            } else {
                session()->setFlashdata('fail', 'Error al guardar el producto en la base de datos.');
            }

            return $this->response->redirect(site_url('abm_producto'.'todos')); 
        }
}

public function deleteproducto($id){
    $productoModel = new Producto_model();
    $data['eliminado'] = $productoModel ->where('id', $id)->first();
    $data['eliminado'] = 'SI';
    $productoModel->update($id, $data);
    return redirect()->back();
}
public function activarproducto($id){
    $productoModel = new Producto_model();
    $data['eliminado'] = $productoModel ->where('id', $id)->first();
    $data['eliminado'] = 'NO';
    $productoModel->update($id, $data);
    return redirect()->back();
}

public function singleProducto($id = null){
    $productoModel = new Producto_model();
    $data['old'] = $productoModel->where('id', $id)->first();
    if(empty($data['old'])){
        throw new \CodeIgniter\Exceptions\PageNotFoundException(' No se ha encontrado el producto seleccionado');
    }

    $categoriasModel=new Categoria_model();
        $data['categorias'] = $categoriasModel-> getCategorias();
        $dato['titulo']='alta producto';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/edit', $data);
        echo view ('front/footer_view');
}

public function modificaProducto($id){
     $rules = [
            'nombre_prod'  => 'required|min_length[3]',
            'precio'       => 'required|numeric',
            'precio_vta'   => 'required|numeric',
            'stock'        => 'required|numeric', // 'required' y 'numeric' para stock
            'stock_min'    => 'required|numeric', // 'required' y 'numeric' para stock_min
            
        ];

        // Mensajes personalizados para una mejor experiencia de usuario
        $messages = [
            'nombre_prod' => [
                'required'   => 'El nombre del producto es obligatorio.',
                'min_length' => 'El nombre del producto debe tener al menos 3 caracteres.',
            ],
            'precio' => [
                'required' => 'El precio de costo es obligatorio.',
                'numeric'  => 'El precio de costo debe ser un número.',
            ],
            'precio_vta' => [
                'required' => 'El precio de venta es obligatorio.',
                'numeric'  => 'El precio de venta debe ser un número.',
            ],
            'stock' => [
                'required' => 'El stock es obligatorio.',
                'numeric'  => 'El stock debe ser un número.',
            ],
            'stock_min' => [
                'required' => 'El stock mínimo es obligatorio.',
                'numeric'  => 'El stock mínimo debe ser un número.',
            ],
        ];

        // Se usa validate() con las reglas y mensajes definidos
        if ($this->validate($rules, $messages)) {
            $productoModel = new Producto_model();
            $img = $this->request->getFile('imagen');
            if($img && $img->isValid()){
                $nombre_aleatorio = $img->getRandomName();
                $img->move(ROOTPATH.'assets/img', $nombre_aleatorio);
                $data = [
                    'nombre_prod' => $this->request->getVar('nombre_prod'),
                    'imagen' => $img->getName(),
                    'categoria_id'=>$this->request->getVar('categoria_id'),
                    'precio' => $this->request->getVar('precio'),
                    'precio_vta' => $this->request->getVar('precio_vta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                ];
            }else{
                $data = [
                    'nombre_prod' => $this->request->getVar('nombre_prod'),
                    'categoria_id'=>$this->request->getVar('categoria_id'),
                    'precio' => $this->request->getVar('precio'),
                    'precio_vta' => $this->request->getVar('precio_vta'),
                    'stock' => $this->request->getVar('stock'),
                    'stock_min' => $this->request->getVar('stock_min'),
                ];
            }
            $productoModel->update($id, $data);
            session()->setFlashdata('success', 'Modificación exitosa...');
            return $this->response->redirect(site_url('abm_producto'.'todos'));

        } else {
            session()->setFlashdata('fail', 'Error se ha producido un inconveniente en su solicitud.');
            return $this->response->redirect(site_url('abm_producto'.'todos'));
        }
}

public function mostrarCatalogo($filtro){
    $productoModel= new Producto_model();
    $categoriaModel= new Categoria_model();
    if($filtro == 0){
        $data['productos']=$productoModel -> getProductoAll();
    }else{
        $data['productos']=$productoModel->where('categoria_id', $filtro)->findAll();
    }
    $data['categorias']=$categoriaModel -> getCategorias();

    $dato['titulo']='Catálogo';
    echo view ('front/head_view',$dato);
    echo view ('front/nav_view');
    echo view ('front/catalogo_produc', $data);
    echo view ('front/footer_view');
}

}