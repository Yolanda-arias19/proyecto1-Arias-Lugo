<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Perfiles_model;
use App\Models\Usuarios_model;

class Login_controller extends BaseController{
    public function index(){
        helper(['form', 'url']);
    }

    public function login() // Este método sería la ruta /login o /iniciar-sesion
{
    $dato['titulo'] = 'Iniciar sesión';
    echo view('front/head_view', $dato);
    echo view('front/nav_view');
    echo view('front/login'); // Esta es tu vista del formulario
    echo view('front/footer_view');
}
    
    public function auth(){
        $session = session();
        $model = new Usuarios_model();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data = $model->where('email', $email)->first();
        if($data){
            $pass = $data['pass'];
            $ba = $data['baja'];
            if($ba == 'SI'){
                $session->setFlashdata('msg', 'usuario dado de baja');
                return redirect()->to('/');
            }

            $verify_pass = password_verify($password, $pass);

            if($verify_pass){
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE
                ];

                $session->set($ses_data);

                session()->setFlashdata('msg', 'Bienvenido!!');
                return redirect()->to('/');

            }else{

                session()->setFlashdata('msg', 'Password Incorrecta');
                return redirect()->to('/login');

            }
        }else{
            session()->setFlashdata('msg', 'No ingreso el email o el mismo es incorrecto');
            return redirect()->to('/login');
        }
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

}