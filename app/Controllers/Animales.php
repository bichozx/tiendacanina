<?php

namespace App\Controllers;

class Animales extends BaseController
{
    public function index(){
        return view('registroanimal');
    }

    
    public function registromascota(){

        //datos formularios
        $nombre = $this->request->getPost("nombre");
        $foto = $this->request->getPost("foto");
        $edad = $this->request->getPost("edad");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");

        //arreglo asociativo
        $datos = array(
            "nombre" => $nombre,
            "foto" => $foto,
            "edad" => $edad,
            "descripcion" => $descripcion,
            "tipo" => $tipo
        );

        print_r($datos);
    }
}