<?php

namespace App\Controllers;

class Producto extends BaseController
{
    public function index()
    {
        return view('registroproducto');
    }

    public function registroproducto()
    {

        //datos formularios
        $producto = $this->request->getPost("producto");
        $foto = $this->request->getPost("foto");
        $precio = $this->request->getPost("precio");
        $descripcion = $this->request->getPost("descripcion");
        $tipo = $this->request->getPost("tipo");

        //se aplican validaciones
        if ($this->validate('formularioProducto')) {

            echo ('todo bien apa');
        } else {

            $mensaje = "Tenemos campos sin llenar";
            return redirect()->to(site_url('/productos/registro'))->with('mensaje', $mensaje);
        }

        //arreglo asociativo
        /*$datos = array(
            "producto" => $producto,
            "foto" => $foto,
            "precio" => $precio,
            "descripcion" => $descripcion,
            "tipo" => $tipo
        );

        print_r($datos);*/
    }
}
