<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index() 
    {
        $data ['titulo'] ='principal';
         echo view ('front/head_view', $data);
         echo view ('front/nav_view');
         echo view ('front/nueva_plantilla');
         echo view ('front/footer_view');
    }


    public function quienes_somos()
    {
     $data ['titulo'] ='Quienes somos';
     echo view ('front/head_view', $data);
     echo view ('front/nav_view');
     echo view ('front/quienes_somos');
     echo view ('front/footer_view');
    }

    public function comercializacion()
    {
        $data['titulo']= 'Comercialización';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/comercializacion');
        echo view('front/footer_view');

    }

    public function contacto()
    {
        $data['titulo']= 'Información de contactos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/contacto');
        echo view('front/footer_view');

    }
    
    public function terminosYusos()
    {
        $data['titulo']= 'Términos y Usos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/terminosYusos');
        echo view('front/footer_view');

    }

    public function catalago_produc()
    {
        $data['titulo']= 'Catálogo de productos';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/catalago_produc');
        echo view('front/footer_view');

    }

    public function consultas()
    {
        $data['titulo']= 'Consultas';
        echo view('front/head_view', $data);
        echo view('front/nav_view');
        echo view('front/consultas');
        echo view('front/footer_view');

    }
}