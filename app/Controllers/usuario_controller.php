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
            'email' =>'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'pass' => 'required|min_length[3]|max_length[10]',
        ],
        /**ERRORES */
    );

    $formModel = new Usuarios_model();

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
            'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
            'perfil_id' => 2,
        ]);

        session()->setFlashdata('msg', 'Usuario registrado con existo');
        return redirect()->to('/login');
    }

    }

    public function mostrarABM($filtro){
        $usuarioModel= new Usuarios_model();

        if($filtro =='todos'){
            $data['usuarios']=$usuarioModel -> getUsuarioAll();
        }elseif($filtro == 'activos'){
            $data['usuarios']=$usuarioModel -> getActiveUsuarioAll();
        }else{
            $data['usuarios']=$usuarioModel -> getDeleteUsuarioAll();
        }

        $dato['titulo']='Crud_usuarios';
        echo view ('front/head_view',$dato);
        echo view ('front/nav_view');
        echo view ('front/usuariosABM', $data);
        echo view ('front/footer_view');
    }

    public function bajaUsuario($id){
    $usuarioModel = new Usuarios_model();
    $data['baja'] = $usuarioModel ->where('id', $id)->first();
    $data['baja'] = 'si';
    $usuarioModel->update($id, $data);
    return redirect()->back();
}
public function activarUsuario($id){
    $usuarioModel= new Usuarios_model();
    $data['baja'] = $usuarioModel ->where('id', $id)->first();
    $data['baja'] = 'no';
    $usuarioModel->update($id, $data);
    return redirect()->back();
}


}