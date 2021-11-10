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

        //se aplican validaciones
        if ($this->validate('formularioMascota')) {

            echo ('todo bien apa');

        } else {

            $mensaje = "campos obligatorios ";
            return redirect()->to(site_url('/animales/registro'))->with('mensaje', $mensaje);
        }

        /*//arreglo asociativo
        $datos = array(
            "nombre" => $nombre,
            "foto" => $foto,
            "edad" => $edad,
            "descripcion" => $descripcion,
            "tipo" => $tipo
        );

        print_r($datos);*/
    }
}