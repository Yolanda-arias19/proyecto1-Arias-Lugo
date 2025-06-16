<?php
namespace App\Controllers;
Use App\Models\Ventas_Cabecera_Model;
Use App\Models\Ventas_Detalle_Model;
Use App\Models\Producto_model;
Use App\Models\Usuario_model;
use CodeIgniter\Controller;

class ventas_controller extends Controller{

    public function registrar_venta(){
        $cart = \Config\Services::cart();
        $productos = $cart->contents();
        $request = \Config\Services::request();
        $montoTotal = 0;
        $db = \Config\Database::connect();
        $db->transStart();
    
        foreach ($productos as $producto) {
            $montoTotal += $producto["price"] * $producto["qty"];
        }
    
        $ventaCabecera = new Ventas_cabecera_model();
        if ($ventaCabecera->insert(["total_venta" => $montoTotal, "usuario_id" => session()->get('id_usuario')])){
            $idCabecera = $ventaCabecera->insertID();
            $ventaDetalle = new Ventas_detalle_model();
            $productoModel = new Producto_model();

            foreach ($productos as $producto) {
                if($ventaDetalle->insert(["venta_id" => $idCabecera, "producto_id" => $producto["id"], "cantidad" => $producto["qty"], "precio" => $producto["price"]])){
                    // Obtener el producto de la base de datos para obtener el stock actualizado
                    $productoDB = $productoModel->find($producto["id"]);
            
                    // Verificar si el producto existe en la base de datos
                    if ($productoDB && $productoDB["stock"] >= $producto["qty"]) {
                        // Actualizar el stock y las unidades vendidas
                        $nuevoStock = $productoDB["stock"] - $producto["qty"];
                        $productoModel->update($producto["id"], [
                            "stock" => $nuevoStock
                        ]);
                    } else {
                        $db->transRollback();
                        session()->setFlashdata('fail', 'Hubo un problema al procesar tu compra. Por favor, intenta de nuevo.');
                        return redirect()->back();
                    }
                } else {
                    $db->transRollback();
                    session()->setFlashdata('fail', 'Hubo un problema al procesar tu compra. Por favor, intenta de nuevo.');
                    return redirect()->back();
                }   
            }
        } else {
            session()->setFlashdata('fail', 'Hubo un problema al procesar tu compra. Por favor, intenta de nuevo.');
            return redirect()->back();
        }
       
        $db->transComplete();
        if($db->transStatus()===FALSE){
            log_message('error', 'Error en la transacción de la compra: ' . $db->error()['message']);
            session()->setFlashdata('fail', 'Hubo un problema al procesar tu compra. Por favor, intenta de nuevo.');
            return redirect()->back();
        } else {
            $cart->destroy();
            session()->setFlashdata('msg', 'Compra realizada con éxito!!');
            return redirect()->to('/');
        }
    }

    //funcion del usuario cliente para ver sus compras
    public function ver_factura($venta_id){
        $detalle_ventas = new Ventas_detalle_model();
        $data['ventas'] = $detalle_ventas->getDetalles($venta_id);
        $dato['titulo'] = "Mi compra";

        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/vistas_compras', $data);
        echo view('front/footer_view');
    }

    public function ver_facturas_usuario($id_usuario){
        $ventas = new Ventas_cabecera_model();

        $data['ventas'] = $ventas->getVentas($id_usuario);
        $dato['titulo'] = "Todas mis compras";
        
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/ver_factura_usuario', $data);
        echo view('front/footer_view');

    }

    public function ventas(){


        $ventasCabecera = new Ventas_cabecera_model();
        $data['ventas'] = $ventasCabecera->getBuilderVentas_cabecera();

        $dato['titulo'] = "ventas";
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/ver_factura_usuario', $data);
        echo view('front/footer_view');
    }
}