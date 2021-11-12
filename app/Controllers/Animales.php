<?php

namespace App\Controllers;

use  App\Models\MascotaModelo;

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
            //echo ('todo bien apa');

            //echo ('esto casi no funciona');
            
            //intentar conectarme a la bd
            //e insertar datos
            try {
                //Sacar una fotocopia de la clase(crear objeto)
                $modelo=new MascotaModelo();

                //armo el paquete de datos a registrar
                $datos = array(

                    "nombre"=>$nombre,
                    "foto"=>$foto,
                    "edad"=>$edad,
                    "descripcion"=>$descripcion, 
                    "tipo"=>$tipo
                );

                //agrego los datos
                $modelo->insert($datos);

                //entrego una respuesta
                $mensaje="Mascota agregada correctamente";
                return redirect()->to(site_url('/animales/registro'))->with('mensaje', $mensaje);

            } catch (\Exception $error) {
                //throw $th;
                $mensaje = $error->getMessage();
                return redirect()->to(site_url('/animales/registro'))->with('mensaje', $mensaje);
            }

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