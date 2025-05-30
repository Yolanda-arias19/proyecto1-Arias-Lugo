<?php
namespace App\Controllers;
Use App\Models\Usuarios_model;
use CodeIgniter\Controller;

class Usuario_controller extends Controller{

    public function __construct(){
        helper(['form', 'url']);
    }

    public function registrarse(){
        $dato['titulo'] = 'Registro';
        echo view('front/head_view', $dato);
        echo view('front/nav_view');
        echo view('front/registrarse');
        echo view('front/footer_view');
    }

    public function formValidation(){

        $validation=\Config\Services::validation();
        $request= \Config\Services::request();

        $input = $this->validate([
            'nombre' => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'usuario' =>'required|min_length[3]',
            'email' =>'required|min_length[4]|max_lenght[100]|valid_email|this_unique[usuario.email]',
            'pass' => 'required|min_length[3]|max_length[10]',
        ],
        /**ERRORES */
    );

    $formModel = new Usuario_model();

    if(!$input){
        $data['titulo']= 'Registro';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/registrarse', ['validation' => $this->validator]);
    }else{
        $formModel -> save([
            'nombre' => $this->request->getVar('nombre'),
            'apellido' => $this->request->getVar('apellido'),
            'usuario' => $this->request->getVar('usuario'),
            'email' => $this->request->getVar('email'),
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT)
        ]);

        session()->setFlashdata('success', 'Usuario registrado con existo');
        return $this->response->redirect(to_url('/registrarse'));
    }

    }
}