<?php
namespace App\Controllers;
Use App\Models\Consultas_model;
use CodeIgniter\Controller;

class consulta_controller extends Controller {
    public function __construct()
    {
        helper(['form', 'url']);
    }
    
    public function validarMensajeConsultas() 
    {
        $validation = \Config\Services::validation();
        $request = \Config\Services::request();

        $validation->setRules(
        [
            'nombre' => 'required|min_length[3]',
            'email' => 'required|min_length[4]|max_length[50]',
            'mensaje' => 'required|max_length[1000]',
        ],
        [ // Mensajes de error personalizados
            'nombre' => [
                'required'   => 'Este campo es obligatorio.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
            ],
            'email' => [
                'required'   => 'Este campo es obligatorio.',
                'min_length' => 'El email debe tener al menos 4 caracteres.',
                'max_length' => 'El email debe tener como máximo 50 caracteres.',
            ],
            'mensaje' => [
                'required'   => 'Este campo es obligatorio.',
                'max_length' => 'El mensaje debe tener como máximo 1000 caracteres.',
            ],
        ]
);


        $formModel = new Consultas_model();
        if ($validation->withRequest($request)->run()) {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'mensaje'=> $this->request->getVar('mensaje'),
                'email' => $this->request->getVar('email'),
                'estado' => 'no_leido',
            ]);

            session() ->setFlashdata('success', 'Mensaje enviado con exito');
            return redirect()->route('consultas');
        } else {
        $data['titulo']='Consultas';
            $data['validation'] = $validation->getErrors();
            session() ->setFlashdata('fail', 'Ha ocurrido un problema');
            return view('\front\head_view',$data).view('front/nav_view').view('\front\consultas').view('\front\footer_view');
        }
    }

    public function mostrarMensajes($filtro){
        $consultaModel= new Consultas_model();

        if($filtro =='todos'){
            $data['consultas']=$consultaModel -> getConsultaAll();
        }elseif($filtro == 'leidos'){
            $data['consultas']=$consultaModel -> getLeidoConsultaAll();
        }else{
            $data['consultas']=$consultaModel -> getNoLeidoConsultaAll();
        }

        $dato['titulo']='Ver consultas';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/consultas_admin', $data);
        echo view ('front/footer_view');
    }

    public function marcarLeido($id){
    $consultaModel = new Consultas_model();
    $estado = [
        'estado' => 'leido',
    ];
    $consultaModel->update($id, $estado);
    return redirect()->back();
}
}