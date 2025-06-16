<?php
namespace App\Controllers;

Use App\Models\Usuarios_model;
Use App\Models\Producto_model;
Use App\Models\Ventas_cabecera_model;
Use App\Models\Ventas_detalle_model;
use CodeIgniter\Controller;

class carrito_controller extends BaseController {
    public function __construct(){
        helper(['form', 'url', 'cart']);
        $cart = \Config\Services::Cart();
        $session = session();
    }

    public function muestra(){
        $cart = \Config\Services::Cart();
        $productoModel = new Producto_model();
        //$cart = $cart->contents();
        $data['cart'] = $cart;
        $cartItems = $cart->contents();

        $productos = new Producto_model();
        $data['productos'] = $productos->findAll();

        foreach ($cartItems as $key => $item) {
        $producto = $productoModel->find($item['id']);
        $cartItems[$key]['stock'] = $producto['stock'] ?? 0;
    }
    
    $data['cart'] = $cartItems;

        $dato['titulo']= 'Confirmar compra';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/carrito_view', $data);
        echo view('front/footer_view');
    }

    public function actualiza_carrito(){
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
        $cart->update(array(
            'id' => $request->getPost('id'),
            'qty' => 1,
            'price' => $request->getPost('precio_vta'),
            'name' => $request->getPost('nombre_prod'),
            'imagen' => $request->getPost('imagen'),
        ));
        return redirect()->back()->withInput();
    }

  public function add() {
        $cart = \Config\Services::Cart();
        $request = \Config\Services::request();
        $productoModel = new Producto_model();

        // Obtener ID del producto desde el formulario
        $productoId = $request->getPost('id');

        // Buscar el producto en la base de datos
        $producto = $productoModel->find($productoId);
        if (!$producto) {
            return redirect()->back()->with('msg', 'Producto no encontrado.');
        }

        $stockDisponible = $producto['stock'];
        $cantidadEnCarrito = 0;

        // Revisar si el producto ya está en el carrito y sumar su cantidad
        foreach ($cart->contents() as $item) {
            if ($item['id'] == $productoId) {
                $cantidadEnCarrito = $item['qty'];
                break;
            }
        }

        // Verificar si aún se puede agregar al carrito
        if ($cantidadEnCarrito + 1 <= $stockDisponible) {
            $cart->insert([
                'id' => $productoId,
                'qty' => 1,
                'price' => $request->getPost('precio_vta'),
                'name' => $request->getPost('nombre_prod'),
                'imagen' => $request->getPost('imagen'),
                'stock' => $stockDisponible, // Esto es opcional
            ]);

            return redirect()->back()->with('success', 'Producto agregado al carrito.');
        } else {
            return redirect()->back()->with('msg', 'Lo sentimos no hay más stock disponible.');
        }
    }

    public function eliminar_item($rowid){
        $cart = \Config\Services::Cart();

        $cart->remove($rowid);
        return redirect()->back();
    }

    public function borrar_carrito(){
        $cart = \Config\Services::Cart();

        $cart->destroy();
        return redirect()->back();
    
    }

    public function remove($rowid){
        $cart = \Config\Services::Cart();

        if($rowid == "all"){
            $cart->destroy();
        }else{
            $cart->remove($rowid);
        }
        return redirect()->back()->withInput();
    }

    public function devolver_carrito(){
        $cart = \Config\Services::Cart();

        return $cart->contents();
    }

    public function suma($rowid){
        $cart = \Config\Services::Cart();
        $productoModel = new Producto_model();  

        $items = $cart->contents();
        $item = null;

        // Buscamos el ítem manualmente
        foreach ($items as $i) {
            if ($i['rowid'] === $rowid) {
                $item = $i;
                break;
            }
        }

        if (!$item) {
            session()->setFlashdata('msg', 'Producto no encontrado en el carrito.');
            return redirect()->back();
        }

        // Buscar el stock del producto
        $producto = $productoModel->find($item['id']);
        $stockDisponible = $producto['stock'] ?? 0;

        if ($item['qty'] < $stockDisponible) {
            $cart->update([
                'rowid' => $rowid,
                'qty' => $item['qty'] + 1
            ]);
        } else {
            session()->setFlashdata('msg', 'No hay suficiente stock disponible para agregar más de este producto.');
        }

        return redirect()->back();
    }

    public function resta($rowid){
        $cart = \Config\Services::Cart();

        //resta 1 a la cantidad del producto
        $item = $cart->getItem($rowid);
        if($item){
            if($item['qty']>1){
                $cart->update([
                'rowid' =>$rowid,
                'qty' =>$item['qty'] - 1
            ]);
            }else{
                $cart->remove($rowid);
            }
        }
        return redirect()->back();
    }
}